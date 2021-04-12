<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMessaggesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messagges', function (Blueprint $table) {
            $table->foreignId('flat_id')->after('id')->nullable()->constrained(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messagges', function (Blueprint $table) {
            $table->dropForeign(['flat_id']); 
            $table->dropColumn('flat_id'); 
        });
    }
}
