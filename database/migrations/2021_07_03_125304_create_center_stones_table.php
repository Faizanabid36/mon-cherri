<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCenterStonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_stones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('diamond_id')->nullable();
            $table->string('description')->nullable();
            $table->string('shape')->nullable();
            $table->string('center_stone_sizes')->nullable();
            $table->string('center_stone_colors')->nullable();
            $table->string('center_stone_clarities')->nullable();
            $table->string('cut')->nullable();
            $table->string('polish')->nullable();
            $table->string('symm')->nullable();
            $table->string('fluor')->nullable();
            $table->string('lab')->nullable();
            $table->string('certificate_no')->nullable();
            $table->string('vendor_stock_no')->nullable();
            $table->string('total_price')->nullable();
            $table->string('price_cc')->nullable();
            $table->string('seller')->nullable();
            $table->string('ham_page')->nullable();
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
        Schema::dropIfExists('center_stones');
    }
}
