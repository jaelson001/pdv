<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConfigurationController extends Controller
{
    public function tela(): View{
        $data = Configuration::all();
        return view("Configuracoes", ['configs' => $data]);
    }

    public function update(Request $request): RedirectResponse{
        $configs = $request->except("_token", "_method", "logo");

        if($request->file('logo') != null){
            $res = $request->file('logo')->store('public');
            $configs['logo'] = $res;
        }
        
        foreach($configs as $key => $value){
            Configuration::where("key", $key)->update(["value" => $value]);
        }

        $data = Configuration::all();
        return redirect()->back()->with(['configs' => $data, "response" => "Alterações salvas!"]);
    }
}
