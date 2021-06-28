<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product', function (Blueprint $table) {
            $table->integer("ProductID")->autoIncrement();
            $table->string("ProductCategory");
            $table->string("ProductName");
            $table->text("ProductDescription");   
            $table->decimal('PriceDefault', $precision = 15, $scale = 3);
            $table->integer("ProductPriority");
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
        Schema::dropIfExists('product');
    }
}
