<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Google', function (Blueprint $table) {
            $table->integer("AccountID");
            $table->integer("GoogleID");
            $table->string("GoogleName");  
            $table->string("GooglePictureURL");
            
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
        Schema::dropIfExists('Google');
    }
}
