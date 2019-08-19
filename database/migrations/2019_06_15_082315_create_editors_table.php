<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditorsTable extends Migration
{
    /**


     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_editor_id');
            $table->string('salutation');
            $table->string('fullname');
            $table->string('gender');
            $table->string('email');
            $table->string('position');
            $table->string('qualification');
            $table->string('current_org');
            $table->string('research_area');
            $table->string('phone');
            $table->string('authored_pub');
            $table->string('books_authored');
            $table->string('resume');
            $table->string('status')->default(0);

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
        Schema::dropIfExists('editors');
    }
}
