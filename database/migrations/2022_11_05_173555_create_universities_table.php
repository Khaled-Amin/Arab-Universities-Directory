<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('university_name' , 128);
            $table->string('type_education' , 50);
            $table->string('type_university' , 50);
            $table->integer('year_founding')->nullable();
            $table->string('logo_university',128)->nullable();
            $table->string('link_university',128)->nullable();
            $table->string('link_page_university',128);
            $table->string('number_phone')->nullable();
            $table->string('Email')->nullable();
            $table->longText('description')->nullable();
            $table->longText('code_video' , 191)->nullable();
            $table->string('Iframe_Map',255)->nullable();
            $table->string('cover',128)->nullable();
            $table->string('keyword')->nullable();
            $table->integer('country_id')->unsigned();
            $table->string('province' ,100)->nullable();
            $table->string('city' , 256)->nullable();
            $table->integer('count_mempers')->nullable();
            $table->integer('count_assistance')->nullable();
            $table->integer('count_memper_support')->nullable();
            $table->integer('count_students_university')->nullable();
            $table->integer('count_student_master')->nullable();
            $table->integer('count_student_doctor')->nullable();
            $table->integer('count_student_doblum')->nullable();
            $table->integer('count_student_edu_open')->nullable();
            $table->integer('count_student_institue')->nullable();
            $table->string('link_whatsApp', 128)->nullable();
            $table->string('link_facebook', 128)->nullable();
            $table->string('link_telegram', 128)->nullable();
            $table->string('link_lenkedIn', 128)->nullable();
            $table->string('link_instagram' , 128)->nullable();
            $table->string('link_youtube' , 128)->nullable();
            $table->string('slide_one')->nullable();
            
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
        Schema::dropIfExists('universities');
    }
}
