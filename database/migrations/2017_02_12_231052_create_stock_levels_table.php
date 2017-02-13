<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipies_id');

            $table->integer('gousto_reference');
            $table->timestamps();

            $table->foreign('recipies_id')->references('id')->on('recipies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_levels');
    }
}
