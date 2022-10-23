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
        Schema::create('cart_models', function (Blueprint $table) {
            $table->id();
            $table->text("products");
            $table->string("user", 255);
            
            $table->float("price");
            $table->tinyInteger("status")->defualt(1);
            $table->softDeletes();
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
        Schema::dropIfExists('cart_models');
    }
};
