<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('companies');
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('document');
            //--- não deve preencher no cadasrto, mas em seguida
            $table->string('logo')->default("public/logo.ico");
            $table->string('primary')->default("#dedede");//color
            $table->string('secondary')->default("#242424");//sidebar
            $table->string('accent')->default("#ff8915");//accent
            $table->string('theme')->default("light");
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
    }
};
