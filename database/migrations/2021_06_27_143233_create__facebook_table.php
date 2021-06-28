<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacebookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Facebook', function (Blueprint $table) {
            $table->integer("AccountID");
            $table->integer("FacebookID");
            $table->string("FacebookName");
            $table->string("FacebookPictureURL");

            $table->foreign('AccountID')->references('AccountID')->on('Account');
           
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
        Schema::dropIfExists('Facebook');
    }
}
