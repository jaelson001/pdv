<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
    public function tela(): View{
        //busca produtos 
        $produtos = Product::all();

        //return view("produtos");
        return view("produtos", ["products" => $produtos]);
    }

    public function create(Request $request): View{
        //validate
        //save
        //busca produtos 
        //return view
    }

    public function update(Request $request, $id): View{
        //validate
        //save
        //busca produtos 
        //return view
    }

    public function delete($id): View{
        //validate
        //delete $id
        //busca produtos 
        //return view
    }
}
