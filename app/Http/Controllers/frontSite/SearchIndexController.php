<?php

namespace App\Http\Controllers\frontSite;

use App\Http\Controllers\Controller;
use App\Models\Adds;
use App\Models\Country;
use App\Models\PinnedPages;
use App\Models\Setting;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;



class SearchIndexController extends Controller
{
    public function searchOfIndex(Request $request)
    {
        $searched_university = $request->q;

        if($searched_university != ''){
            $Settings = Setting::first();
            $pinnedPage = PinnedPages::get();
            $country_names = Country::select('id', 'country_name','href' , 'country_flag')->get();
            $Adds = Adds::first();
            $pineed = PinnedPages::first();
            $columns = ['university_name' , 'type_education' ,'description' ,'type_university' , 'year_founding'];
            $query = University::query();
            foreach($columns as $column){
                $query->orWhere($column, 'LIKE', '%' . $searched_university . '%');
            }
            $getAllResults = $query->paginate(config('product.paginate'))->withQueryString();
            // dd($getAllResults->total());
            if($getAllResults->first()){
                // return redirect('category/' . $product->category->slug . '/' . $product->slug);
                // return redirect($getAllResults->country . '/' . 'university' . '/' . $getAllResults->link_page_university);
                return view('frontend.allsearchedresult')->with(
                    ['country_names' =>$country_names ,
                     'getAllResults' => $getAllResults ,
                     'Settings' => $Settings ,
                     'pinnedPage' =>$pinnedPage,
                     'Adds'=>$Adds,
                     'pineed'=>$pineed 
                    ]);

            }
            else{
                // return redirect()->back()->with('success' , 'لم نعثر على ما تبحث عنه');
                
                
                return view('frontend.allsearchedresult')->with(
                    ['country_names' =>$country_names ,
                     'getAllResults' => $getAllResults ,
                     'Settings' => $Settings ,
                     'pinnedPage' =>$pinnedPage,
                     'Adds'=>$Adds,
                     'pineed'=>$pineed 
                    ]);
                // return view('frontend.errorSearch.errorSearch')->with(
                //     ['country_names' =>$country_names ,
                //      'Settings' => $Settings ,
                //      'pinnedPage' =>$pinnedPage,
                //      'Adds'=>$Adds,
                //      'pineed'=>$pineed
                //     ]);
            }
        }
        else{
            return redirect()->back();
        }

    }
    
    public function paginate($items, $perPage = 4, $page = null)
{
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $total = count($items);
    $currentpage = $page;
    $offset = ($currentpage * $perPage) - $perPage ;
    $itemstoshow = array_slice($items , $offset , $perPage);
    return new LengthAwarePaginator($itemstoshow ,$total ,$perPage);
}
   

}
