<?php

namespace App\Http\Controllers\frontSite;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\PinnedPages;
use App\Models\Setting;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchAdvancedController extends Controller
{

    public function resultSearch(Request $request){

        $country_select = $request->input('query_select_country');
        $typeUniversity_select = $request->input('query_select_university');
        $typeEdu_select = $request->input('query_select_edu');
        $Settings = Setting::first();
        $country_names = Country::select('id', 'country_name','href' , 'country_flag')->get();
        $getCountry = Country::select('id', 'country_name','href' , 'country_flag' , 'picture_page')->first();
        $pinnedPage = PinnedPages::get();
        $pineed = PinnedPages::first();
        if(isset($country_select) || isset($typeUniversity_select) || isset($typeEdu_select)){

            if(isset($typeUniversity_select)){
                $getAllResults = University::with('country')->where('country_id' , 'LIKE' ,  $country_select .'%')->where('type_university' , 'LIKE' , '%'. $typeUniversity_select .'%')->where('type_education' , 'LIKE' , '%'. $typeEdu_select .'%')->get();
                // dd($getAllResults);
                return view('frontend.search')->with(['pineed'=>$pineed ,'pinnedPage'=>$pinnedPage,'country_names' =>$country_names , 'getAllResults' => $getAllResults , 'Settings' => $Settings , 'getCountry' =>$getCountry]);
            }
            else if($typeEdu_select){
                $getAllResults = University::with('country')->where('country_id' , 'LIKE' ,  $country_select .'%')->where('type_university' , 'LIKE' , '%'. $typeUniversity_select .'%')->where('type_education' , 'LIKE' , '%'. $typeEdu_select .'%')->get();
                // dd($getAllResults);
                return view('frontend.search')->with(['pineed'=>$pineed ,'pinnedPage'=>$pinnedPage,'country_names' =>$country_names , 'getAllResults' => $getAllResults , 'Settings' => $Settings , 'getCountry' =>$getCountry]);
            }
            else{
                $getAllResults = University::with('country')->where('country_id' , 'LIKE' ,  $country_select .'%')->where('type_university' , 'LIKE' , '%'. $typeUniversity_select .'%')->where('type_education' , 'LIKE' , '%'. $typeEdu_select .'%')->get();
                // dd($getAllResults[32]);
                return view('frontend.search')->with(['pineed'=>$pineed ,'pinnedPage'=>$pinnedPage,'country_names' =>$country_names , 'getAllResults' => $getAllResults , 'Settings' => $Settings , 'getCountry' =>$getCountry]);
            }

            // return redirect($getAllResults->country->href . '/' . 'university' . '/' . $getAllResults->link_page_university);

        }
        else{
            // return redirect()->back()->with('success' , 'لم نعثر على ما تبحث عنه');
            return view('frontend.errorSearch.errorSearch')->with(['pineed'=>$pineed ,'pinnedPage'=>$pinnedPage,'country_names' =>$country_names , 'Settings' => $Settings , 'getCountry' =>$getCountry]);
        }
    }
}
