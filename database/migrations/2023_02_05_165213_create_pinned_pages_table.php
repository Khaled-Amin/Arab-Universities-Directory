<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinnedPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinned_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_name' , 25);
            $table->string('href' , 128);
            $table->string('slug' , 50);
            $table->longText('keyword');
            $table->longText('content');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('pinned_pages');
    }
}
