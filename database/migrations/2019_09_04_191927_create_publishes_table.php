<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishes', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->string('title');
            $table->integer('archive_id');

            $table->string('author_name');
            $table->string('authors_email');
            $table->string('filename');
            $table->string('no_pages');
            $table->longText('abstract');
            $table->string('keywords');
           
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
        Schema::dropIfExists('publishes');
    }
}
