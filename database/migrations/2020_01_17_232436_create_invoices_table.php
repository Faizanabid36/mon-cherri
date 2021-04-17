<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('invoice_no');
            $table->string('payment_method')->nullable();
            $table->integer('sub_total')->nullable();
            $table->integer('grand_total')->nullable();
            $table->boolean('status')->default(0);
            $table->date('due_date')->nullable();
            $table->longText('customer_note')->nullable();
            $table->timestamps();
            // $table->softDeletes();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
