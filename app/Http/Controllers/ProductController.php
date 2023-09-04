<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    public function tela(): View{
        //busca produtos 
        $produtos = Product::all();

        //return view;
        return view("produtos", ["products" => $produtos]);
    }

    public function create(Request $request): View{
        //validate
        $request->validate([
            "code" => "required|unique:products|min_digits:13|max_digits:13", //codigo de barras
            "name" => "required",
            "price" => "required|min:1",
            "quantity" => "required|min:0"
        ],[
            "code.required" => "Código de barras é obrigatório",
            "code.unique" => "Código de barras já cadastrado",
            "code.min" => "Formato inválido de código de barras",
            "name.required" => "Nome é obrigatório",
            "price.required" => "Preço é obrigatório",
            "price.min" => "Preço não pode ser zerado",
            "quantity.required" => "Quantidade é obrigatória",
            "quantity.min" => "Quantidade não pode ser negativa",
        ]);

        //save
        $produto = new Product();
        $res = $produto->fill($request->except("_token", "_method"))->save();

        //busca produtos 
        $products = Product::all();

        //return view
        if(!$res){
            return view("produtos", ["products" => $products])->withErrors(["save" => "Erro ao salvar roduto no banco!"]);
        }
        return view("produtos", ["products" => $products]);
    }

    public function update(Request $request): View{
        //validate
        $request->validate([
            "name" => "required",
            "price" => "required|min:1",
            "quantity" => "required|min:0"
        ],[
            "name.required" => "Nome é obrigatório",
            "price.required" => "Preço é obrigatório",
            "price.min" => "Preço não pode ser zerado",
            "quantity.required" => "Quantidade é obrigatória",
            "quantity.min" => "Quantidade não pode ser negativa",
        ]);
        //save
        $product = Product::find($request->id);
        $res = $product->update($request->except("id","_token", "_method"));
        //busca produtos 
        $products = Product::all();
        //return view
        if(!$res){
            return view("produtos", ["products" => $products])->withErrors(["update" => "Erro ao atualizar produto no banco"]);
        }
        return view("produtos", ["products" => $products]);
    }

    public function delete(int $id): string{
        //delete $id
        $res = Product::find($id)->delete();

        //return string
        if(!$res){
            return json_encode(["error" => "Produto não encontrado no banco"]);
        }
        return json_encode(["success" => "Produto excluído"]);
    }

    public function research($company_id, $code): string{
        $user = User::find($request->user);
        if($user == null){ return '{"error":"Produto não cadastrado"}';}

        $produto = Product::select("code", "name", "company_id", "description", \DB::raw("1 as quantity"), "price")
            ->where("code", $code)->where("company_id", $user->company_id)->first();
        $res = isset($produto->code) ? json_encode($produto) : '{"error":"Produto não cadastrado"}';
        return $res;
    }
}