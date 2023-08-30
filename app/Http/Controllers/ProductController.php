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
        $res = $produto->fill($request->all())->save();

        //busca produtos 
        $products = Product::all();

        //return view
        if(!$res){
            return view("produtos", ["products" => $products])->withErrors(["save" => "Erro ao salvar roduto no banco!"]);
        }
        return view("produtos", ["products" => $products]);
    }

    public function update(Request $request, $id): View{
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
        $product = Product::find($id);
        $res = $product->update($request->all());
        //busca produtos 
        $products = Product::all();
        //return view
        if(!$res){
            return view("produtos", ["products" => $products])->withErrors(["update" => "Erro ao atualizar produto no banco"]);
        }
        return view("produtos", ["products" => $products]);
    }

    public function delete($id): View{
        //validate
        if(!is_numeric($id)){
            $products = Product::all();
            return view("produtos", ["products" => $products])->withErrors(["delete" => "ID de produto inválido"]);
        }
        //delete $id
        $res = Product::find($id)->delete();
        //busca produtos 
        $products = Product::all();
        //return view
        if(!$res){
            return view("produtos", ["products" => $products])->withErrors(["delete" => "Produto não encontrado no banco"]);
        }
        return view("produtos", ["products" => $products]);
    }

    /**
     * Get the product from code  
     * @method GET
     * @param string $code | barcode from product
     * @return json product
    */
    public function product($code): string{
        $produto = Product::select("code", "name", "description", \DB::raw("1 as quantity"), "price")->where("code", $code)->first();
        $res = isset($produto->code) ? json_encode($produto) : '{"error":"Produto não cadastrado"}';
        return $res;
    }
}