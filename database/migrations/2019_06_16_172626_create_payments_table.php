<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Schema::create('payments', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('reference');
        //     $table->integer('amount');
        //     $table->integer('user_id');
        //     $table->string('gateway_response');
        //     $table->string('customer_code');
        //     $table->string('bank');
        //     $table->string('status');
        //     $table->string('paid_at');
        //     $table->string('customer_name');
        //     $table->string('customer_email');
        //     $table->foreign('user_id')->references('id')->on('users')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
