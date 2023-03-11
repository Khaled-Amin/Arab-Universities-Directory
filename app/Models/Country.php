<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\University;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';
    protected $fillable =
    [
        'country_name',
        'href',
        'country_flag',
        'title',
        'description',
        'keyword',
        'picture_page',
        'meta_title',
        'description_university'
    ];


    public function university(){
        return $this->hasMany(University::class , 'country_id');
    }


}

