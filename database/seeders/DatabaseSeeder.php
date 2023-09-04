<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Configuration;
use App\Models\Company;
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

        Company::factory()->create([
            'name' => 'Êxodo',
            'document' => "1234567890001",
        ]);
        User::factory()->create([
            'name' => 'Jaelson',
            'admin' => 1,
            'company_id' => 1,
            'email' => 'jaelsonjacinto@outlook.com',
            'password' => Hash::make("Jesus1diavira!"),
        ]);

        $defaults = [
            "primary"=> "#333333",
            "accent"=> "#ff8915",
            "secondary"=> "#242424",
            "theme"=> "light",//dark, light, system
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
