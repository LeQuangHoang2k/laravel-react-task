<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Account', function (Blueprint $table) {
            $table->integer("AccountId")->autoIncrement();
            $table->string("AccountEmail");
            $table->string("AccountName");
            $table->string("AccountPhone");
            $table->string("AccountPictureURL");
            $table->string("PasswordHash");
            $table->string("AccountRole");
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
        Schema::dropIfExists('account');
    }
}
