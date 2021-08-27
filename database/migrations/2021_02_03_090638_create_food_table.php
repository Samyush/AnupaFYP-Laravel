<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('details')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('image')->nullable();

            $table->unsignedBigInteger('categoris_id');

            $table->foreign('categoris_id')->references('id')->on('categoris');
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
        Schema::dropIfExists('food');
    }
}
