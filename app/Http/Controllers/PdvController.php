<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Events\OrderPurchased;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;


class PdvController extends Controller
{
    public function tela(){
        $estoqueBaixo = Product::where("quantity", "<", 100)->count();
        if($estoqueBaixo > 0){
            return view("pdv")->withErrors(["estoque" => "Há produtos com poucos itens no estoque!"]);
        }
        return view('pdv');
    }


    public function order(Request $request): string{
        $carrinho = $request?->products;
        if($carrinho == null){
            \Log::debug($request->all());
            return '{"error": "Erro ao fechar pedido"}';
        }
        //cria pedido
        $carrinho = \collect(json_decode($carrinho));
        $pedido = new Order();
        $pedido->company_id = $carrinho->max('company_id');
        $pedido->user = preg_replace("/[^A-Za-z ]/", '', $request->user);
        $pedido->total = $carrinho->sum('price');
        $pedido->payment = $request->payment;
        $pedido->installments = 1;//por enquanto
        $pedido->save();

        //cria produtos do pedido
        foreach($carrinho as $item){
            $prodsPedido = new OrderProduct();
            $prodsPedido->order_id = $pedido->id;
            $prodsPedido->product = Product::where("code", $item->code)->first()->name;
            $prodsPedido->price = $item->price;
            $prodsPedido->save();
            //remove produto do estoque
            Product::where("code", $item->code)->decrement('quantity',1);
        }

        \event(new OrderPurchased($pedido));
        return '{"success":"Pedido fechado"}';
    }

    public function orders(){
        $orders = Order::orderBy("created_at", "DESC")->with("products")->get();
        return view('orders',['orders' => $orders]);
    }
}
