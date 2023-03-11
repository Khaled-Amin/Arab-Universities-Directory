<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries;
class University extends Model
{
    use HasFactory;

    protected $table = "universities";
    protected $fillable =
    [
        'university_name',
        'type_education',
        'type_university',
        'year_founding',
        'logo_university',
        'link_university',
        'link_page_university',
        'number_phone',
        'Email',
        'description',
        'code_video',
        'Iframe_Map',
        'cover',
        'keyword',
        'country_id',
        'province',
        'city',
        'count_mempers',
        'count_assistance',
        'count_memper_support',
        'count_students_university',
        'count_student_master',
        'count_student_doctor',
        'count_student_doblum',
        'count_student_edu_open',
        'count_student_institue',
        'link_whatsApp',
        'link_facebook',
        'link_telegram',
        'link_lenkedIn',
        'link_instagram',
        'link_twitter',
        'link_youtube',
        'slide_one',
        

    ];


    public function country(){
        return $this->belongsTo(Country::class , 'country_id' , 'id');
    }
}
