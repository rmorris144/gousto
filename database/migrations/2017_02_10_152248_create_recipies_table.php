<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('recipe_diet_id');
            $table->integer('comment_id');
            $table->integer('stock_levels_id');

            $table->string('box_type');
            $table->string('title');
            $table->string('slug');
            $table->string('short_title');
            $table->text('marketing_description');
            
            $table->string('equipment_needed');
            $table->string('origin_country');
            $table->string('recipe_cuisine');
            $table->text('in_your_box');
            $table->integer('gousto_reference');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('recipe_diet_id')->references('id')->on('recipe_diets')->onDelete('cascade');
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->foreign('stock_levels_id')->references('id')->on('stock_levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipies');
    }
}
