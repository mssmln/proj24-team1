<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->foreignId('flat_id')->after('id')->references('id')->on('flats');
            $table->foreignId('plan_id')->after('flat_id')->references('id')->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropForeign(['flat_id']); 
            $table->dropColumn('flat_id');
            $table->dropForeign(['plan_id']); 
            $table->dropColumn('plan_id');
        });
    }
}
