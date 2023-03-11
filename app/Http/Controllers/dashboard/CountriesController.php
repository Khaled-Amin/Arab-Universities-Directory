<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
// use Image;
use Intervention\Image\Facades\Image;
class CountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $showallcountries = Country::latest()->paginate(8);
        return view('backend.countries.allcountry', compact('showallcountries'));
    }


    public function create()
    {
        return view('backend.countries.createcountry');
    }


    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'country_name'  => 'required',
            'href'          => 'required',
            'title'         => 'required'
        ]);

            if($request->country_flag){
                $time=time();
                $image = Image::make($request->file('country_flag')->getRealPath())->encode('webp', 100)->resize(16, 11)->save(public_path('uploading/'  .  $time . '.webp'));
                // $newImageName = time(). '.' . $request->country_flag->extension();
            }else{
                $time=Null;
            }
            if($request->picOfCountry){
                $image = $request->file('picOfCountry');
                $name = hexdec(uniqid());
                Image::make($image)->encode('webp' , 100)->resize(1368,720)->save('uploading/' . $name.'.' . 'webp');
            }
            else{
                $name = Null;
            }

            $datacountry = Country::create([
                'country_name'         => $request->input('country_name'),
                'href'                 => $request->input('href'),
                'country_flag'         => $time . '.' . 'webp',
                // 'show_status'       => $request->input('show_status'),
                'title'                => $request->input('title'),
                'description'          => $request->input('description'),
                'keyword'              => $request->input('keyword'),
                'meta_title'           => $request->input('metaTitle'),
                'description_university' => $request->input('desMeta'),
                'picture_page'         => $name . '.' . 'webp',
            ]);



        return  redirect()->route('countries.main')
            ->with('success', 'تم اضافة الدولة');
    }


    public function edit(Country $countries, $id)
    {
        $countries = Country::find($id);
        return view('backend.countries.editcountry', compact('countries'));
    }

    public function update(Request $request, Country $countries, $id)
    {
        $countries = Country::find($id);
        $request->validate([
            'country_name'  => 'required',
            'href'          => 'required',
            // 'country_flag'  => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048|dimensions:max_width=600,max_height=600',
            'title'         => 'required'
        ]);
        $pathImg = str_replace('\\', '/', public_path('uploading/')) . $countries->country_flag;
        if($request->country_flag){
            if (File::exists($pathImg)) {
                File::delete($pathImg);
            }
            $time=time();
            Image::make($request->file('country_flag')->getRealPath())->encode('webp', 100)->resize(16, 11)->save(public_path('uploading/'  .  $time . '.webp'));
            DB::table('countries')->where('id' , $id)->update([
                'country_flag' => $time . '.' . 'webp',
            ]);
        }
        $dis_img = str_replace('\\', '/', public_path('uploading/')) . $countries->picture_page;
        if($request->picOfCountry){
            if (File::exists($dis_img)) {
                File::delete($dis_img);
            }
            $image = $request->file('picOfCountry');
            $name = hexdec(uniqid());
            $real_path = './public/uploading/';
            Image::make($image)->encode('webp' , 100)->resize(1368,720)->save($real_path . $name.'.'. 'webp');
            DB::table('countries')->where('id' , $id)->update([
                'picture_page' => $name . '.' . 'webp'
            ]);
        }
        $countries->country_name = $request->country_name;
        $countries->href = $request->href;
        $countries->title = $request->title;
        $countries->description = $request->description;
        $countries->keyword = $request->keyword;
        $countries->meta_title = $request->metaTitle;
        $countries->description_university = $request->desMeta;
        $countries->update();

        return  redirect()->route('countries.main')
            ->with('success', 'تم تحديث البيانات');
    }


    public function destroy(Country $countries, $id)
    {
        $countries = Country::find($id);

        $destination = str_replace('\\', '/', public_path('uploading/')) . $countries->country_flag;
        $dis_img = str_replace('\\', '/', public_path('uploading/')) . $countries->picture_page;
        // dd($destination);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        if (File::exists($dis_img)) {
            File::delete($dis_img);
        }
        $countries->delete();
        return redirect()->route('countries.main')
            ->with('success', 'تم الحذف');
    }
}
