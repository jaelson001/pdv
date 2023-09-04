<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use App\Models\Configuration;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ConfigurationController extends Controller
{
    public function tela(): View{
        $id = auth()->user()->company_id;
        $data = Company::find($id);
        return view("Configuracoes", ['configs' => $data]);
    }

    public function update(Request $request): RedirectResponse{
        $configs = $request->except("_token", "_method", "logo");

        if($request->file('logo') != null){
            $request->validate([
                'logo'=>'Mimes:jpeg,jpg,gif,png| dimensions:max_width=150,max_height=150'
            ],[
                'logo.Mimes' => "Logotipo só pode ser uma imagem",
                'logo.dimensions' => 'Tamanho do logo deve ser de no máximo 150px'
            ]);
            $res = $request->file('logo')->store('public');
            $configs['logo'] = $res;
        }
        $id = auth()->user()->company_id;
        Company::where("id", $id)->update($configs);
        
        $data = Company::find($id);
        return redirect()->back()->with(['configs' => $data, "response" => "Alterações salvas!"]);
    }
}
