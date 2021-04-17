<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('review');
            $table->boolean('is_viewed')->default(0);
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->unsignedBigInteger('rating_id')->unsigned();
            $table->boolean('status')->default(false);
            $table->timestamps();
            // $table->softDeletes();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('rating_id')->references('id')->on('ratings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
