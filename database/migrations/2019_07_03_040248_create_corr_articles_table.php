<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corr_articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('author_name');
            $table->string('subject_area')->nullable();
            $table->string('category');
            $table->longText('abstract');
            $table->string('keywords');
            $table->integer('publication_edition')->nullable();
            $table->string('email');
            
            $table->string('phone');
            $table->string('payment_mode');
            $table->string('amount');

            $table->string('filename');
            $table->string('customer_code');

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
        Schema::dropIfExists('corr_articles');
    }
}
