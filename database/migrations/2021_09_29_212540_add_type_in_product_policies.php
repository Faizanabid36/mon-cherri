<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeInProductPolicies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_policies', function (Blueprint $table) {
            $table->enum('type', ['Return', 'Shipping1','Shipping2']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_policies', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
