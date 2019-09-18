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
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('author_name');
            $table->string('subject_area')->nullable();
            
            $table->longText('abstract');
            $table->string('keywords');
            $table->integer('publication_edition')->nullable();
            $table->string('email');

            $table->string('phone');
            
            $table->string('know_us');
            $table->string('filename');

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
        Schema::dropIfExists('articles');
    }
}
