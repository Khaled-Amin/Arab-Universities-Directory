@extends('frontend.layouts.navbar_and_footer')

@section('content')

<!-- بداية قسم تحت ال navabar قسم main -->
<section class="section-slide">
    <!--  قسم تبع صورة وكتابة على يمين -->
    <div class="container">
        <div class="row blockk">
            <div class="col-sm-12 col-md-5 main-right">
                @foreach ($universityCountry as $item)
                    <h1 class="title mb-4">{{$item->title}}</h1>
                @endforeach
                <p class="info-content">
                    {!! $get_description->description !!}
                </p>
                <!--<div class="btns">-->
                <!--    <a href="register.html" class="theme-btn primary-btn">-->
                <!--        سجل الأن-->
                <!--    </a>-->
                <!--</div>-->
            </div>
        </div>
    </div>
    <div class="cover_block">
        <div class="bg-black"></div>
        <div class="w-100 img">
                    @isset($getPictureOfCountry)
                        <img src="{{url('../public/uploading/' .     $getPictureOfCountry->picture_page)}}" alt="">
                    @endisset
        </div>
    </div>
    <!-- نهاية قسم تبع صورة وكتابة على يمين -->
    <!-- قسم البحث -->
    <div class="container mt-5 section_search">
        <form action="{{ route('showPage.search') }}" method="get">
            <div class="d-search">
                <input name="q" type="text"  class="form-control search-main" id="exampleFormControlInput1" placeholder="ما الذي تبحث عنه؟" required>
                <button type="submit" class="btn-search">
                    بحث
                </button>
                {{-- <a href="#" class="btn-advace text-decoration-none">بحث متقدم</a> --}}
            </div>
        </form>
    </div>
    <!-- نهاية قسم البحث -->

    <div class="container mt-5">
        <div class="textt">
            @isset($getPictureOfCountry)
                <a href="{{route('getUniversity.all' , $getPictureOfCountry->href)}}" class="text-decoration-none d-inline-block text-black " target="_blank"><h2 class="chg"><sup><i class="fa-solid fa-arrow-up-right-from-square"></i></sup>{{$getPictureOfCountry->meta_title}}</h2></a>
            @endisset

        </div>
    </div>
    <div class="container" style="margin-top:2rem;">
        <div class="box-main">
            @foreach ($universityCountry as $getUni)
                @foreach ($getUni->university as $index=>$val)
                    @if($Settings->insertQuick == 1)
                    <a href="{{$val->link_university}}" class="mt-3 box-5" target="_blank">
                        <div class="img">
                            <img src="{{url('../public/uploading/' . $val->logo_university)}}" alt="صورة">
                        </div>
                        <p class="title">{{$val->university_name}}</p>

                    </a>
                    @else
                    <a href="{{route('viewPage.university' , [$getUni->href , $val->link_page_university])}}" class="mt-3 box-5">
                        <div class="img">
                            <img src="{{url('../public/uploading/' . $val->logo_university)}}" alt="صورة">
                        </div>
                        <p class="title">{{$val->university_name}}</p>

                    </a>
                    @endif
                @endforeach
            @endforeach
        </div>

    </div>

@endsection
