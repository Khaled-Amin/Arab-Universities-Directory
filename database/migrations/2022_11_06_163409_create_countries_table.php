<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country_name' , 25);
            $table->string('href' , 128);
            $table->string('country_flag', 128)->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('keyword')->nullable();
            $table->string('picture_page', 128)->nullable();
            $table->string('meta_title')->nullable();
            $table->string('description_university')->nullable();
            $table->tinyInteger('show_status')->nullable();
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
        Schema::dropIfExists('countries');
    }
}
