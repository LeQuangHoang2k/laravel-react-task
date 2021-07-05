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
            $table->integer("AccountID")->autoIncrement();
            $table->string("FacebookID")->default('');
            $table->string("GoogleID")->default('');
            $table->string("AccountEmail")->default('');
            $table->string("AccountName")->default('');
            $table->string("AccountPhone")->default('');
            $table->string("AccountPictureURL")->default('');
            $table->string("PasswordHash")->default('');
            $table->string("AccountRole")->default('');
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
