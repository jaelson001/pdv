<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Configuration;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::factory(5)->create();

        User::factory()->create([
            'name' => 'Jaelson',
            'email' => 'jaelsonjacinto@outlook.com',
            'password' => Hash::make("Jesus1diavira!"),
        ]);

        $defaults = [
            "primary_color"=> "#dedede",
            "accent_color"=> "#ff8915",
            "accent_secondary"=> "#242424",
            "theme"=> "dark",//dark, light, system
            "logo"=> "public/logo.ico",
        ];
        foreach($defaults as $key=> $value){
            Configuration::factory()->create([
                'key' => $key,
                'value' => $value,
            ]);    
        }
        
    }
}
