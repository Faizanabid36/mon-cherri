<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stone_shape');
            $table->string('product_id');
            $table->string('color_id');
            // $table->string('color_to');
            $table->string('clarity_id');
            // $table->string('clarity_to');
            $table->string('size_id');
            // $table->string('size_to');
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
        Schema::dropIfExists('product_stones');
    }
}
