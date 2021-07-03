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
            $table->string('diamond_id');
            $table->string('description');
            $table->string('shape');
            $table->integer('center_stone_sizes_id');
            $table->integer('center_stone_colors_id');
            $table->integer('center_stone_clarities_id');
            $table->string('polish')->nullable();
            $table->string('symm')->nullable();
            $table->string('fluor')->nullable();
            $table->string('lab')->nullable();
            $table->string('certificate_no')->nullable();
            $table->string('vendor_stock_no')->nullable();
            $table->integer('price_cc')->nullable();
            $table->integer('total_price')->nullable();
            $table->integer('price_cc')->nullable();
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
