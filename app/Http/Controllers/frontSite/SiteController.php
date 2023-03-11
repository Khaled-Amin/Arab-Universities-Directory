<?php

namespace App\Http\Controllers\frontSite;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Country;
use App\Models\PinnedPages;
use App\Models\University;
class SiteController extends Controller
{
    public function homePage(Request $request){
        $Settings = Setting::first();
        $country_names = Country::select('id', 'country_name','href' , 'country_flag')->get();
        $getUniversity = University::get();
        $pinnedPage = PinnedPages::get();
        $pineed = PinnedPages::first();
        return view('frontend.index' , compact('pineed','pinnedPage','Settings' , 'country_names' , 'getUniversity'));
    }

    public function getPinnedPage($href){
        $Settings = Setting::first();
        $country_names = Country::select('id', 'country_name','href' , 'country_flag')->get();
        $pinnedPage = PinnedPages::get();
        $pinned = PinnedPages::where('href' , $href)->first();
        $pineed = PinnedPages::first();

        return view('frontend.pages.index' , compact(['pineed','Settings','country_names' ,'pinnedPage' , 'pinned']));
    }

    
    public function loginPage(){
        $Settings = Setting::first();
        $country_names = Country::select('id', 'country_name','href' , 'country_flag')->get();
        $pinnedPage = PinnedPages::get();
        return view('frontend.loginPage' , compact('pinnedPage','Settings' , 'country_names'));
    }
     
    public function registerPage(){
        $Settings = Setting::first();
        $country_names = Country::select('id', 'country_name','href' , 'country_flag')->get();
        $pinnedPage = PinnedPages::get();
        return view('frontend.registerPage' , compact('pinnedPage','Settings' , 'country_names'));
    }

    public function getPageCountryUniversity($slug){
        $Settings = Setting::first();
        $country_names = Country::select('id', 'country_name','href' , 'country_flag')->get();
        $universityCountry = Country::with('university')->select('id' , 'href' , 'title' , 'description')->where('href' , $slug)->get();
        $getPictureOfCountry = DB::table('countries')->select('id' , 'href' , 'title' , 'picture_page' , 'meta_title')->where('href' , $slug)->first();
        $get_description = DB::table('countries')->select('id' , 'href' , 'description' )->where('href' , $slug)->first();
        $get_title = DB::table('countries')->select('id' , 'href' , 'title' ,'description' , 'description_university' , 'meta_title' , 'keyword')->where('href' , $slug)->first();
        $href_country = DB::table('countries')->select('id' , 'href' , 'title' )->where('href' , $slug)->first();
        $pinnedPage = PinnedPages::get();
        $pineed = PinnedPages::first();
        // dd($universityCountry);
        return view('frontend.changeCountry' , compact('href_country','pineed','get_title','get_description','pinnedPage','getPictureOfCountry','universityCountry','Settings' , 'country_names'));
    }

    public function viewPageUniversity($slug , $slug_link){
        $Settings = Setting::first();
        $country_names = Country::select('id', 'country_name','href' , 'country_flag')->get();
        $universityPage = Country::with('university')->where('href' , $slug)->get();
        $getInfo_university = University::where('link_page_university' , $slug_link)->first();
        $getIdCountry = Country::select('id' , 'country_name' , 'href')->where('href' , $slug)->first();
        $getSlide = University::select('id','university_name','link_page_university' , 'slide_one')->where('link_page_university' , $slug_link)->first();
        $get_title_share = University::select('id','university_name' , 'link_page_university' , 'description')->where('link_page_university' , $slug_link)->first();
        $get_desc_share = DB::table('countries')->select('id', 'country_name','href' , 'description')->where('href' , $slug)->first();
        $pinnedPage = PinnedPages::get();
        $pineed = PinnedPages::first();
        // dd($getSlide);
        return view('frontend.aboutUniversity' , compact('get_desc_share','get_title_share','pineed','pinnedPage','getSlide','getIdCountry','getInfo_university','universityPage','Settings' , 'country_names'));
    }

    public function goPageSearch(){
        $Settings = Setting::first();
        $country_names = Country::select('id', 'country_name','href' , 'country_flag')->get();
        $pinnedPage = PinnedPages::get();
        $pineed = PinnedPages::first();
        return view('frontend.allsearchedresult', compact('pineed','pinnedPage' , 'Settings' , 'country_names'));
    }

    public function getAll($slug){
        $Settings = Setting::first();
        $country_names = Country::select('id', 'country_name','href' , 'country_flag')->get();
        $universityCountry = Country::with('university')->select('id' , 'href' , 'meta_title' , 'description_university')->where('href' , $slug)->get();
        $getPictureOfCountry = DB::table('countries')->select('id' , 'href' , 'picture_page' , 'meta_title')->where('href' , $slug)->first();
        $get_description = DB::table('countries')->select('id' , 'href' , 'description_university' )->where('href' , $slug)->first();
        $get_title_all_uni = DB::table('countries')->select('id' , 'href' , 'title' ,'meta_title' ,'description_university' , 'keyword')->where('href' , $slug)->first();
        $pinnedPage = PinnedPages::get();
        $pineed = PinnedPages::first();

        
        
        return view('frontend.universities', compact('get_title_all_uni','get_description','getPictureOfCountry','universityCountry','pineed','pinnedPage' , 'Settings' , 'country_names'));
    }


}
