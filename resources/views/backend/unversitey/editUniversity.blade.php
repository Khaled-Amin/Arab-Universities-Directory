@extends('backend.layouts.admin_master')

@section('content')

@include('backend.layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">

                <h6 class="font-weight-bolder mb-0">اضافة الجامعة</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 px-0" id="navbar">

                <ul class="navbar-nav me-auto ms-0 justify-content-end">

                    <li class="nav-item d-xl-none pe-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown ps-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-white" role="alert">
                {{ $message }}
            </div>
        @endif
    </div>

    @if (count($errors) > 0)

        <ul>
            @foreach ($errors->all() as $item)
                <li class="text-danger">
                    {{ $item }}
                </li>
            @endforeach
        </ul>

    @endif

    <div class="row backgroundW p-4 m-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fw-bold"><a href="{{route('admin.university.main')}}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">انشاء</li>
            </ol>
        </nav>
        <form action="{{ route('admin.university.update' , $getIdData->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $item)
                        <li class="text-danger">
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            @endif
            {{-- {{$get_country->id}},{{$get_country->show_status}} --}}
            <h4>الدولة:</h4>
            <select style="width:100%;overflow-y: scroll; padding:5px;" class="form-cdontrol" id="countries" name="countries">
                <option value="">أختر الدولة</option>
                @foreach ($country as $get_country)
                    <option value="{{ $get_country->id }}" {{$getIdData->country_id == $get_country->id ? 'selected' : ''}}>
                        {{ $get_country->country_name }}
                    </option>
                @endforeach
            </select>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <label for="exampleFormControlInput1">اسم الجامعة</label>
                <input type="text" class="form-controll" name="name_uni" value="{{$getIdData->university_name}}">
                    </div>
                    <div class="col-sm-12 col-md-6">

                        {{-- <input type="text" class="form-controll" name="typeof_uni" value={{$getIdData->type_university}}> --}}
                        <select style="width:100%;height:42px;overflow-y: scroll;margin-top:1.9rem;border-radius:5px; padding:5px;" class="form-cdontrol" aria-label="Default select example" name="typeof_uni">
                            <option value="{{$getIdData->type_university}}" {{isset($Unversityy->type_university) ? 'selected' : ''}}>{{$getIdData->type_university}}</option>
                            <option value="حكومية">حكومية</option>
                            <option value="خاصة">خاصة</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-check form-check-inline">
                <label for="exampleFormControlInput1">نوع التعليم:</label><br>
                <input class="form-check-input" type="checkbox" name="type_uni[]" id="inlineCheckbox1" value="عام" {{ in_array('عام', $type_uni) ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineCheckbox1">عام</label>
                <!--<input class="form-check-input" type="checkbox" name="type_uni[]" id="inlineCheckbox1" value="خاص" {{in_array('خاص' , $type_uni) ? 'checked' : ''}}>-->
                <!--<label class="form-check-label" for="inlineCheckbox1">خاص</label>-->
                <input class="form-check-input" type="checkbox" name="type_uni[]" id="inlineCheckbox22" value="افتراضي" {{in_array('افتراضي' , $type_uni) ? 'checked' : ''}}>
                <label class="form-check-label" for="inlineCheckbox22">افتراضي</label>
                <input class="form-check-input" type="checkbox" name="type_uni[]" id="inlineCheckbox12" value="تعليم مفتوح" {{in_array('تعليم مفتوح' , $type_uni) ? 'checked' : ''}}>
                <label class="form-check-label" for="inlineCheckbox12">تعليم مفتوح</label>

            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">رابط الجامعة</label>
                <input type="text" class="form-controll" name="href_university" value="{{$getIdData->link_university}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput31">رابط الصفحة</label>
                <input type="text" class="form-controll" name="href_page_university" value="{{$getIdData->link_page_university}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">سنة التأسيس</label>
                <input type="number" class="form-controll" name="year_found" value="{{$getIdData->year_founding}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">شعار الجامعة</label>
                <input type="file" class="form-controll" name="logo_univer">
                <img src="{{url('../public/uploading/'.$getIdData->logo_university)}}" width="100px" height="100px" alt="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">رقم الهاتف</label>
                <input type="text" class="form-controll" name="num_phone" value="{{$getIdData->number_phone}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">البريد الإلكتروني</label>
                <input type="email" class="form-controll" name="email" value="{{$getIdData->Email}}">
            </div>
            <div class="col-md-12 mb-3">
                <label for="Description" class="form-labell ">نبذة عن الجامعة </label>
                <textarea class="ckeditor"  name="Description_uni" id="textarea" cols="30" rows="10">{{$getIdData->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">موقع الجامعة على الخريطة</label>
                <textarea class="ckeditor"  name="Iframe_uni" id="textarea" cols="30" rows="10">{!! $getIdData->Iframe_Map !!}</textarea>
                {{-- <textarea id="Description" rows="4" cols="50"  name="Iframe_uni" class="form-controll resizeForTextarea">{{$getIdData->Iframe_Map}}</textarea> --}}
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">غلاف الجامعة (ابعاد الصورة: 350*1349)</label>
                <input type="file" class="form-controll" name="cover_univer" />
                <img src="{{url('../public/uploading/'.$getIdData->cover)}}" width="300px" height="150px" alt="صورة">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1e">كود فيديو</label>
                <textarea class="ckeditor"  name="link_video" id="textarea" cols="30" rows="10">{{$getIdData->code_video}}</textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label for="Description" class="form-labell ">الكلمات المفتاحية ( يجب فصل بينها بفاصلة)</label>
                <textarea type="text" id="Description" name="Keywords_uni" class="form-controll resizeForTextarea">{!! $getIdData->keyword !!}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">المحافظة</label>
                <input type="text" class="form-controll" name="province_uni" value="{{$getIdData->province}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">كمالة العنوان</label>
                <input type="text" class="form-controll" name="city_uni" value="{{$getIdData->city}}">
            </div>
            <div class="col-12 mb-3 ">
                <label for="inputlink1" class="form-labell  ">رابط واتس آب</label>
                <input type="text" class="form-controll " name="socialMidiaWhatsApp" id="inputlink1" value="{{$getIdData->link_whatsApp}}">
            </div>
            <div class="col-12 mb-3 ">
                <label for="fa" class="form-labell  ">رابط فيسبوك</label>
                <input type="text" class="form-controll " name="socialMidiaFacebook" id="fa" value="{{$getIdData->link_facebook}}">
            </div>
            <div class="col-12 mb-3">
                <label for="tel" class="form-labell ">رابط تلغرام</label>
                <input type="text" class="form-controll" name="socialMidiaTelegram" id="tel" value="{{$getIdData->link_telegram}}">
            </div>
            <div class="col-12 mb-3">
                <label for="ins" class="form-labell ">رابط انستغرام</label>
                <input type="text" class="form-controll" name="socialMidiaInstagram" id="ins" value="{{$getIdData->link_instagram}}">
            </div>

            <div class="col-12 mb-3">
                <label for="inputlink4" class="form-labell ">رابط يوتيوب</label>
                <input type="text" class="form-controll" name="socialMidiaYoutube" id="inputlink4" value="{{$getIdData->link_youtube}}">
            </div>
            
            <div class="col-12 mb-3">
                <label for="inputLinkden" class="form-labell ">Linkedin رابط </label>
                <input type="text" name="socialMidiaLinkedin" id="inputLinkden" class="form-controll" value="{{$getIdData->link_lenkedIn}}">
            </div>
            <div class="col-12 mb-3">
                <label for="inputtwitter" class="form-labell ">twitter رابط </label>
                <input type="text" name="socialMidiaTwitter" id="inputtwitter" class="form-controll" value="{{$getIdData->link_twitter}}">
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="first">عدد أعضاء الهيئة التدريسية</label>
                    <input type="text"  class="form-controll" id="first" name="count_mem" value="{{$getIdData->count_mempers}}" />
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="second">عدد المعيدين</label>
                    <input type="text" class="form-controll" id="second" name="count_assis" value="{{$getIdData->count_assistance}}" />
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="Three" class="form-labell ">عدد أعضاء الهيئة الفنية</label>
                    <input type="text" class="form-controll" id="Three" name="count_supp" value="{{$getIdData->count_memper_support}}" />
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="Four" class="form-labell ">عدد طلاب جامعة</label>
                    <input type="text" class="form-controll" id="Four" name="count_std_uni" value="{{$getIdData->count_students_university}}" />
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="Five" class="form-labell ">عدد طلاب ماجستير</label>
                    <input type="text" class="form-controll" id="Five" name="count_std_mstr" value="{{$getIdData->count_student_master}}" />
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="Six">عدد طلاب دكتوراه</label>
                    <input type="text" class="form-controll" id="Six" name="count_std_doc" value="{{$getIdData->count_student_doctor}}" />
                </div>

                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="seven" class="form-labell ">عدد طلاب دبلوم تأهيل وتخصص</label>
                    <input type="text" class="form-controll" id="seven" name="count_std_dblu" value="{{$getIdData->count_student_doblum}}" />
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="eight" class="form-labell ">عدد طلاب تعليم المفتوح</label>
                    <input type="text" class="form-controll" id="eight" name="count_std_open" value="{{$getIdData->count_student_edu_open}}" />
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="nine" class="form-labell ">عدد طلاب معهد تقاني</label>
                    <input type="text" class="form-controll" id="nine" name="count_std_instiut" value="{{$getIdData->count_student_institue}}" />
                </div>
                <div class="row">
                    <h5>قسم رفع صور الجامعة</h5>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="slide1" class="form-labell">ابعاد صورة1 (350*520)</label>
                        <input type="file" class="form-controll" id="slide1" name="img_slide_one[]" multiple />
                        @php
                            $getPic = explode (",", $getIdData->slide_one);
                        @endphp
                        @foreach($getPic as $key => $item)
                            <img src="{{url('../public/uploading/'.$item)}}" width="300px" height="150px" alt="صورة">
                        @endforeach
                    </div>
                    
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">تحديث</button>
            </div>
        </form>
    </div>

</main>


<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" style="background-color: #42424a">
        <i class="material-icons py-2" style="color:#fff">settings</i>
    </a>
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-end">
                <h5 class="mt-3 mb-0">الاعدادات</h5>
            </div>
            <div class="float-start mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">الوان الشريط الجانبي</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-end">
                    <span class="badge filter bg-gradient-primary active" data-color="primary"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger"
                        onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">نوع Sidenav</h6>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"
                    onclick="sidebarType(this)">Dark</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
                    onclick="sidebarType(this)">Transparent</button>
                <button class="btn bg-gradient-dark px-3 mb-2 me-2" data-class="bg-white"
                    onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3 d-flex">
                <h6 class="mb-0">Navbar Fixed</h6>
                <div class="form-check form-switch me-auto my-auto">
                    <input class="form-check-input mt-1 float-end me-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
                <h6 class="mb-0">Light / Dark</h6>
                <div class="form-check form-switch me-auto my-auto">
                    <input class="form-check-input mt-1 float-end me-auto" type="checkbox" id="dark-version"
                        onclick="darkMode(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">

            <div class="w-100 text-center">
                <a href="https://www.twitter.com" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .form-group{
        margin-bottom: 1rem;
    }
</style>

@endsection
