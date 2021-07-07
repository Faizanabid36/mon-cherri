<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('name');
            // $table->unsignedBigInteger('brand_id')->unsinged();
            $table->integer('price');
            $table->integer('old_price')->nullable();
            $table->string('percent_off')->nullable();
            $table->longText('description')->nullable();
            $table->integer('stock')->unsinged();
            $table->boolean('is_new')->default(false);
            $table->longText('video')->nullable();
            $table->timestamps();
            // $table->softDeletes();

            // $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
