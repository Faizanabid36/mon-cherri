<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('commission');
            $table->integer('commission_rate')->nullable();
            $table->dropColumn('price');
            $table->dropColumn('old_price');
            $table->dropColumn('percent_off');
            $table->dropColumn('description');
            $table->dropColumn('stock');
            $table->dropColumn('is_new');
            $table->dropColumn('video');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('commission');
            $table->dropColumn('commission_rate');
            $table->integer('price');
            $table->integer('old_price')->nullable();
            $table->string('percent_off')->nullable();
            $table->longText('description')->nullable();
            $table->integer('stock')->unsinged();
            $table->boolean('is_new')->default(false);
            $table->longText('video')->nullable();
        });
    }
}
