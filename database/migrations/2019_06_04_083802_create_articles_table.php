<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title');
            $table->string('author_name');
            $table->string('subject_area')->nullable();
            $table->string('category');
            $table->longText('abstract');
            $table->string('keywords');
            $table->integer('publication_edition')->nullable();
            $table->string('email');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('phone');
            $table->string('payment_mode');
            $table->string('amount');
            $table->string('know_us');
            $table->string('filename');
            $table->string('payment_proof');
            $table->boolean('agree');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
