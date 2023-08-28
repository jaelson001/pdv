<?php

namespace app\Services;
use App\Models\Order;
use Illuminate\Support\Facades\View;

class FiscalService{
	public static function printNote(strnig $text): View{
		//return view("print", ["text" => $text]);
		return view("/")
	}
	public static function makeNFe(strnig $text): void{
		//exec("node print.js ".$string);
	}
}