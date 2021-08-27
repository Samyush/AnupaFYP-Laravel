<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderFluttersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_flutters', function (Blueprint $table) {
            $table->id();
            $table->string('orderNo');
            $table->string('foodName');
            $table->string('quantity');
            $table->string('bill');
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('tables_id');
            $table->foreign('tables_id')->references('id')->on('tables');
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
        Schema::dropIfExists('order_flutters');
    }
}
