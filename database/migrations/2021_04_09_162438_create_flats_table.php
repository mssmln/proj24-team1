<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('overview')->nullable();
            $table->smallInteger('price');
            $table->tinyInteger('rooms')->default(1);
            $table->tinyInteger('beds')->default(1);
            $table->tinyInteger('baths')->default(1);
            $table->smallInteger('sqm');
            $table->string('address');
            $table->double('lat', 12, 9);
            $table->double('lng', 13, 9);
            $table->string('flat_img');
            $table->boolean('visibility')->default(1);
            $table->integer('views')->default(0);
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
        Schema::dropIfExists('flats');
    }
}
