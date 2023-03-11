<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
// use Image;
class UniversityController extends Controller
{

    public function __construct(){
        return $this->middleware('admin');
    }


    public function index()
    {
        $showAllUniversity = University::with('country')->select('id' , 'university_name' , 'type_university' , 'type_education' , 'description' , 'country_id')->latest()->paginate(8);
        // dd($showAllUniversity);
        return view('backend.unversitey.showAllUniversity' , compact('showAllUniversity'));
    }


    public function create()
    {
        $country = Country::all();
        return view('backend.unversitey.createUniversity' , compact('country'));

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_uni'            => 'required|max:256',
            // 'type_uni'            => 'required',
            // 'Description_uni'     => 'required',
            // 'province_uni'        => 'required',
            // 'city_uni'            => 'required'
        ]);

        if($request->logo_univer){
            $time=time();
            Image::make($request->file('logo_univer')->getRealPath())->encode('webp', 100)->resize(250, 250)->save(public_path('uploading/'  .  $time . '.webp'));
        }else{
            $time = " ";
        }
        if($request->cover_univer){
            $time_two='cover'.'.'.time();
            Image::make($request->file('cover_univer')->getRealPath())->encode('webp', 100)->resize(1349, 352)->save(public_path('uploading/'  .  $time_two . '.webp'));
        }else{
            $time_two=" ";
        }
        
        // if($request->img_slide_one){
        //     $time_one='pic'.'.'.time();
        //     Image::make($request->file('img_slide_one')->getRealPath())->encode('webp', 100)->resize(520, 350)->save(public_path('uploading/'  .  $time_one . '.webp'));
        //     $newImg = $time_one . '.' . 'webp'; 
        // }else{
        //     $newImg = Null;
        // }
       
       
       if($request->hasFile('img_slide_one')){
            $images = $request->file('img_slide_one');
            // $arr = array();
            $path = './public/uploading/';
            foreach($images as $image){
                $name = 'pic'.'.'.hexdec(uniqid());
                // $name = time();
                Image::make($image)->encode('webp' , 100)->resize(520, 350)->save($path . $name.'.' . 'webp');
                $saving = $name .'.'. 'webp';
                $image_arr[] = $saving;
            }
            
            
            $insertData = University::create([
                'university_name' => $request->input('name_uni'),
                'type_education'  => implode(',', (array) $request->input('type_uni'    )),
                'type_university' => $request->input('typeof_uni'),
                'year_founding'   => $request->input('year_found'),
                'logo_university' => $time . '.' . 'webp',
                'link_university' => $request->input('href_university'),
                'link_page_university' =>$request->input('href_page_university'),
                'number_phone'    => $request->input('num_phone'),
                'Email'           => $request->input('email'),
                'description'     => $request->input('Description_uni'),
                'code_video'      => $request->input('link_video'),
                'Iframe_Map'      => $request->input('Iframe_uni'),
                'cover'           => $time_two . '.' . 'webp',
                'keyword'         => $request->input('Keywords_uni'),
                'country_id'      => $request->countries,
                'province'        => $request->input('province_uni'),
                'city'            => $request->input('city_uni'),
                'count_mempers'     => $request->input('count_mem'),
                'count_assistance'    => $request->input('count_assis'),
                'count_memper_support'    => $request->input('count_supp'),
                'count_students_university'    => $request->input('count_std_uni'),
                'count_student_master'    => $request->input('count_std_mstr'),
                'count_student_doctor'    => $request->input('count_std_doc'),
                'count_student_doblum'    => $request->input('count_std_dblu'),
                'count_student_edu_open'    => $request->input('count_std_open'),
                'count_student_institue'    => $request->input('count_std_instiut'),
                'link_whatsApp'   => $request->input('socialMidiaWhatsApp'),
                'link_facebook'   => $request->input('socialMidiaFacebook'),
                'link_telegram'   => $request->input('socialMidiaTelegram'),
                'link_instagram'  => $request->input('socialMidiaInstagram'),
                'link_lenkedIn'   => $request->input('socialMidiaLinkedin'),
                'link_youtube'    => $request->input('socialMidiaYoutube'),
                'link_twitter'    => $request->input('socialMidiaTwitter'),
                'slide_one'       => implode(',' , $image_arr)
               
            ]);
            
            
            
            
            
            
       }
       else{

            $insertData = University::create([
                'university_name' => $request->input('name_uni'),
                'type_education'  => implode(',', (array) $request->input('type_uni'    )),
                'type_university' => $request->input('typeof_uni'),
                'year_founding'   => $request->input('year_found'),
                'logo_university' => $time . '.' . 'webp',
                'link_university' => $request->input('href_university'),
                'link_page_university' =>$request->input('href_page_university'),
                'number_phone'    => $request->input('num_phone'),
                'Email'           => $request->input('email'),
                'description'     => $request->input('Description_uni'),
                'code_video'      => $request->input('link_video'),
                'Iframe_Map'      => $request->input('Iframe_uni'),
                'cover'           => $time_two . '.' . 'webp',
                'keyword'         => $request->input('Keywords_uni'),
                'country_id'      => $request->countries,
                'province'        => $request->input('province_uni'),
                'city'            => $request->input('city_uni'),
                'count_mempers'     => $request->input('count_mem'),
                'count_assistance'    => $request->input('count_assis'),
                'count_memper_support'    => $request->input('count_supp'),
                'count_students_university'    => $request->input('count_std_uni'),
                'count_student_master'    => $request->input('count_std_mstr'),
                'count_student_doctor'    => $request->input('count_std_doc'),
                'count_student_doblum'    => $request->input('count_std_dblu'),
                'count_student_edu_open'    => $request->input('count_std_open'),
                'count_student_institue'    => $request->input('count_std_instiut'),
                'link_whatsApp'   => $request->input('socialMidiaWhatsApp'),
                'link_facebook'   => $request->input('socialMidiaFacebook'),
                'link_telegram'   => $request->input('socialMidiaTelegram'),
                'link_instagram'  => $request->input('socialMidiaInstagram'),
                'link_lenkedIn'   => $request->input('socialMidiaLinkedin'),
                'link_youtube'    => $request->input('socialMidiaYoutube'),
                'link_twitter'    => $request->input('socialMidiaTwitter'),
                
               
            ]);
        }
        
        // dd($insertData);
        return  redirect()->route('admin.university.main')
            ->with('success' , 'تم اضافة الجامعة');
    }



    public function edit(University $university , $id)
    {
        $country = Country::all();
        $Unversityy = University::all();
        $getIdData = University::find($id);
        return view('backend.unversitey.editUniversity' , ['Unversityy'=>$Unversityy,'getIdData' => $getIdData  , 'country' =>$country, 'type_uni' => explode(',' , $getIdData->type_education)]);
    }


    public function update(Request $request, University $university, $id)
    {
        $university = University::find($id);
        $validated = $request->validate([
            'name_uni'            => 'required|max:50',
            // 'type_uni'            => 'required',
            // 'Description_uni'     => 'required',
            // 'province_uni'        => 'required',
            // 'city_uni'            => 'required'
        ]);
        if($request->logo_univer){
            $pathImg = str_replace('\\' , '/' ,public_path('uploading/')).$university->logo_university;

            if(File::exists($pathImg)){
                File::delete($pathImg);
            }
            $time=time();
            Image::make($request->file('logo_univer')->getRealPath())->encode('webp', 100)->resize(250, 250)->save(public_path('uploading/'  .  $time . '.webp'));
            DB::table('universities')->where('id' , $id)->update([
                'logo_university' => $time . '.' .'webp'
            ]);
        }
        if($request->cover_univer){
            $pathImg = str_replace('\\' , '/' ,public_path('uploading/')).$university->cover;

            if(File::exists($pathImg)){
                File::delete($pathImg);
            }
            $time_two='cover'.'.'.time();
            Image::make($request->file('cover_univer')->getRealPath())->encode('webp', 100)->resize(1349, 352)->save(public_path('uploading/'  .  $time_two . '.webp'));
            DB::table('universities')->where('id' , $id)->update([
                'cover'=>$time_two . '.' .'webp'
            ]);
        }

        
        // 1
        if($request->hasFile('img_slide_one')){
            $show_all_Pictures_by_id = University::select('id','slide_one')->where('id' , $id)->first();
            $get_Pictrue = explode (",", $show_all_Pictures_by_id->slide_one);
            foreach($get_Pictrue as $index => $val){
                $destination =  str_replace('\\' , '/' , public_path('uploading/')) . $val;
                if(File::exists($destination)){
                    File::delete($destination);
                }
            }
            $images = $request->file('img_slide_one');
            $arr = array();
            foreach($images as $image){
                $name = 'pic' . hexdec(uniqid());
                // $name = time();
                $path = './public/uploading/';
                Image::make($image)->encode('webp' , 100)->resize(520, 350)->save($path . $name.'.' . 'webp');
                $saving = $name .'.'. 'webp';
                $image_arr[] = $saving;
            }
            DB::table('universities')->where('id' , $id)->update([
                'slide_one' => implode(',' , $image_arr)
            ]);
        }
        // if($request->img_slide_one){
        //     $pathImg = str_replace('\\' , '/' ,public_path('uploading/')).$university->slide_one;
        //     if(File::exists($pathImg)){
        //         File::delete($pathImg);
        //     }
        //     $time='pic'.'.'.time();
        //     $path = './public/uploading/';
        //     Image::make($request->file('img_slide_one')->getRealPath())->encode('webp', 100)->resize(790, 415)->save(public_path($path  .  $time . '.webp'));
        //     DB::table('universities')->where('id' , $id)->update([
        //         'slide_one' => $time . '.' .'webp'??  Null
        //     ]);
        // }
        

        $university->university_name            = $request->name_uni;
        $university->type_education             = implode(',', (array) $request->type_uni);
        $university->type_university		= $request->typeof_uni;
        $university->year_founding              = $request->year_found;
        $university->link_university            = $request->href_university;
        $university->link_page_university       = $request->href_page_university;
        $university->number_phone               = $request->num_phone;
        $university->Email                      = $request->email;
        $university->description                = $request->Description_uni;
        $university->code_video                 = $request->link_video;
        $university->Iframe_Map                 = $request->Iframe_uni;
        $university->keyword                    = $request->Keywords_uni;
        $university->country_id                 = $request->countries;
        $university->province                   = $request->province_uni;
        $university->city                       = $request->city_uni;
        $university->count_mempers              = $request->count_mem;
        $university->count_assistance           = $request->count_assis;
        $university->count_memper_support       = $request->count_supp;
        $university->count_students_university  = $request->count_std_uni;
        $university->count_student_master       = $request->count_std_mstr;
        $university->count_student_doctor       = $request->count_std_doc;
        $university->count_student_doblum       = $request->count_std_dblu;
        $university->count_student_edu_open     = $request->count_std_open;
        $university->count_student_institue     = $request->count_std_instiut;
        $university->link_whatsApp              = $request->socialMidiaWhatsApp;
        $university->link_facebook              = $request->socialMidiaFacebook;
        $university->link_telegram              = $request->socialMidiaTelegram;
        $university->link_instagram             = $request->socialMidiaInstagram;
        $university->link_lenkedIn              = $request->socialMidiaLinkedin;
        $university->link_youtube              =  $request->socialMidiaYoutube;
        $university->link_twitter               = $request->socialMidiaTwitter;
        $university->update();
        return  redirect()->route('admin.university.main')
            ->with('success' , 'تم تحديث معلومات الجامعة');
    }


    public function destroy(University $university , $id)
    {
        $university = University::find($id);
        $destination =  str_replace('\\' , '/' ,public_path('uploading/')).$university->logo_university;
        $destination_two =  str_replace('\\' , '/' ,public_path('uploading/')).$university->cover;
        // $pathImg_slider =  str_replace('\\' , '/' ,public_path('uploading/')).$university->slide_one;
        $show_Pic = University::select('id' , 'slide_one')->where('id' , $id)->first();
        $get_Pictrue = explode (",", $show_Pic ->slide_one);
        
        foreach($get_Pictrue as $index => $val){
            $pathImg_slider =  str_replace('\\' , '/' , public_path('uploading/')) . $val;
            if(File::exists($pathImg_slider )){
                File::delete($pathImg_slider );
            }
        }
        if(File::exists($destination)){
            File::delete($destination);
        }
        if(File::exists($destination_two)){
            File::delete($destination_two);
        }
        // if(File::exists($pathImg_slider)){
        //     File::delete($pathImg_slider);
        // }
        $university->delete();
        return  redirect()->route('admin.university.main')
            ->with('success' , 'تم حذف بنجاح');
    }
}
