<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeDietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_diets', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('recipies_id');


            $table->string('diet_type');
            $table->integer('calories_kcal');
            $table->integer('protein_grams');
            $table->integer('fat_grams');
            $table->integer('carbs_grams');
            $table->integer('preparation_time_mins');
            $table->integer('shelf_life_days');

            $table->string('season');
            $table->string('base');
            $table->string('protein_source');

            $table->timestamps();

//            $table->foreign('recipies_id')->references('id')->on('recipies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_diets');
    }
}
