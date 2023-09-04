<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function autenticar(Request $request): RedirectResponse{
        $request->validate([
            "email" => "required|email",
            "senha" => "required"
        ],
        [
            "email.required" => "Email é obrigatório",
            "email.email" => "Formato de email inválido",
            "senha.required" => "Senha inválida",
        ]
    );

        if(Auth::attempt([
            "email" => $request->email, 
            "password" => $request->senha
        ], true)){ 
            $request->session()->regenerate();
            return redirect("/"); 
        }else{
            return redirect("login")->withErrors(["error" => "Erro ao fazer login"]);
        }
    }

    public function registrar(Request $request): RedirectResponse{
        $request->validate([
            "comp_name" => "required",
            "comp_document" => "required",
            "name" => "required",
            "email" => "required|email|unique:users",
            "senha" => "required"
        ],
        [
            "comp_name.required" => "Empresa deve ter um nome",
            "comp_document.required" => "Documento deve ser um CNPJ",
            "email.required" => "Email é obrigatório",
            "email.email" => "Formato de email inválido",
            "senha.required" => "Senha inválida",
        ]);

        $company = new Company();
        $company->name = $request->comp_name;
        $company->document = $request->comp_document;
        $company->save();

        $user = new User();
        $user->name = $request->name;
        $user->admin = 1;
        $user->email = $request->email;
        $user->password = Hash::make($request->senha);
        $user->save();

        if(Auth::attempt([
            "email" => $request->email, 
            "password" => $request->senha
        ], true)){ 
            $request->session()->regenerate();
            return redirect("/"); 
        }else{
            return redirect("login")->withErrors(["error" => "Erro ao fazer login"]);
        }
    }

    public function sair(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect("login");
    }
}
