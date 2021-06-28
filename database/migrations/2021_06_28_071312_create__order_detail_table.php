<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OrderDetail', function (Blueprint $table) {
            $table->integer("ID")->autoIncrement();
            $table->integer("OrderID");
            $table->integer("ProductID");
            $table->integer("Amount");
            $table->integer("OptionID");

            $table->foreign('ProductID')->references('ProductID')->on('Product');
            $table->foreign("OptionID")->references('OptionID')->on('ProductOption');
            $table->foreign("OrderID")->references('OrderID')->on('Order');

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
        Schema::dropIfExists('OrderDetail');
    }
}
