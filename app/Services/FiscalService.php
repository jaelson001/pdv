<?php

namespace app\Services;
use App\Models\Order;
use Illuminate\Support\Facades\View;

class FiscalService{
	public static function printNote(strnig $text): void{
		//return view("print", ["text" => $text]);
		$res = exec(__DIR__."./notify.ps1 'Imprimindo' 'Imprimindo nota do pedido'");
		\Log::info(json_encode($res));
		//return view("/")
	}
	public static function makeNFe(strnig $text): void{
		//exec("node print.js ".$string);
	}
}