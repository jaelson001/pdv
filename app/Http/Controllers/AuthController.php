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
        ])){ return redirect("/"); }
    }

    public function sair(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect("login");
    }
}
