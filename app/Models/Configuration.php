<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Configuration extends Model
{
    use HasFactory;

    public static function sideTextColor(String $hexa){
        $color = [
            "R" =>hexdec(substr($hexa, 1, 2)),
            "G" =>hexdec(substr($hexa, 3, 2)),
            "B" =>hexdec(substr($hexa, 5, 2))
        ];
        $luminance = ((0.299 * $color['R']) + (0.587 * $color['G']) + (0.114 * $color['B']))/255;
        return $luminance > 0.5 ? "#333" : "#eee";
    }

    public static function asObject($id = null){
        $configs = null;
        if($id != null){
            $configs = Company::find($id);
            return $configs;
        }else{
            $configs = Configuration::all();
            $c = [];
            foreach($configs as $item){ $c[$item->key] = $item->value; }
            $configs = json_decode(json_encode($c));
        }
        return $configs;
    }
}
