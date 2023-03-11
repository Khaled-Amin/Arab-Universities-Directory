@extends('frontend.layouts.navbar_and_footer')

@section('content')

    <section class="section-about mb-4 mt-3">
        <div class="cover-university">
            @isset($getInfo_university)
                <div class="cover-img">
                    <img src="{{ url('../public/uploading/' . $getInfo_university->cover) }}" alt="صورة">
                </div>
            @endisset
        </div>
        @isset($getInfo_university)
            <div class="logo-university">
                <img src="{{ url('../public/uploading/' . $getInfo_university->logo_university) }}" alt="صورة">
            </div>
        @endisset
        <div class="box-about-unviersity p-2">
            {{-- <div class="container">
                <nav class="nav nav-pills nav-fill">
                    <a class="nav-link" aria-current="page" href="#">الرئيسية</a>
                    <a class="nav-link" href="#">كورسات</a>
                    <a class="nav-link" href="#">محاضرين</a>
                    <a class="nav-link" href="#">اقسام</a>
                </nav>
            </div> --}}

            <!-- Section atRight -->
            <div class="container main-about-box">
                <div class="box-serach-about-university p-3 m">
                    <form action="{{route('searchAdvanced')}}" method="GET">
                        {{-- <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label sear-about">بحث</label>
                            <input type="text" class="form-control" name="query" id="search_university"
                                placeholder="ابحث عن جامعة">
                        </div> --}}
                        {{-- <label for="">الدولة</label> --}}
                        <h4>بحث</h4>
                        <select class="form-select mt-1" name="query_select_country" aria-label="Default select example">
                            <option disabled selected>اختر الدولة</option>
                            @foreach ($country_names as $item)
                                <option value="{{ $item->id }}">{{ $item->country_name }}</option>
                            @endforeach
                        </select>
                        
                        {{-- <label for="">نوع التعليم</label> --}}
                        <select class="form-select mt-1" name="query_select_university" aria-label="Default select example">
                            <option value="" selected>نوع الجامعة</option>
                            <option value="حكومية">حكومية</option>
                            <option value="خاصة">خاصة</option>
                            

                        </select>
                        <select class="form-select mt-1" name="query_select_edu" aria-label="Default select example">
                            <option value="" selected>نوع التعليم</option>
                            <option value="عام">عام</option>
                            <option value="افتراضي">افتراضي</option>
                            <option value="تعليم مفتوح">تعليم مفتوح</option>
                            <!--<option value="خاص">خاص</option>-->
                        </select>

                        <button type="submit" class="btn mt-3 w-100 btn_SearchUniv">بحث</button>
                    </form>

                    <hr>
                    <div class="mapp">
                        <div class="mapouter">
                            @isset($getInfo_university)
                                <div class="gmap_canvas">
                                    {!! $getInfo_university->Iframe_Map !!}
                                </div>
                            @endisset
                        </div>
                    </div>
                    <hr>
                    <div class="info-more">
                        <h5>عنوان تفصيلي</h5>
                        <div class="box-right d-flex align-items-baseline flex-column">
                            @isset($getInfo_university)
                                @isset($getIdCountry)
                                    @if (!empty($getInfo_university->country_id))
                                        <div class="locationn d-flex">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <p>{{ $getIdCountry->country_name }},
                                                <span>{{ $getInfo_university->province }}</span>,
                                                <span>{{ $getInfo_university->city }}</span>
                                            </p>
                                        </div>

                                    @endif
                                @endisset
                                @if (!empty($getInfo_university->number_phone))
                                    <div class="phonee d-flex">
                                        <i class="fa-solid fa-phone"></i>
                                        <p>{{ $getInfo_university->number_phone }}</p>
                                    </div>

                                    @endif
                            @endisset
                        </div>
                    </div>
                </div>
                <!-- End Section atRight -->
                <!-- Section atLeft -->
                <div class="background-about mm">
                    <div class="name-university-underLogo">
                        @isset($getInfo_university)
                            <h1>{{ $getInfo_university->university_name }}</h1>
                        @endisset

                        <div class="content-under-title-university">
                            @isset($getInfo_university)
                                @isset($getIdCountry)
                                    <div class="icon-country">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p class="country-city">
                                            <a href="{{route('getCountryPage.University' , $getIdCountry->href)}}" class="text-decoration-none">{{ $getInfo_university->country_id == $getIdCountry->id ? $getIdCountry->country_name : '' }}</a>-
                                            <span>{{ $getInfo_university->province }}</span></p>
                                    </div>
                                @endisset
                            @endisset
                            @isset($getInfo_university)
                                <div class="social-media mt-3">
                                    @if (!empty($getInfo_university->Email))
                                        <a href="mailto:{{ $getInfo_university->Email }}" class="text-decoration-none" target="_blank">
                                            <i class="fa-solid fa-envelope fa-xl" style="color:#61bed9;"></i>


                                        </a>
                                    @endif


                                    @if (!empty($getInfo_university->link_telegram))
                                        <a href="{{ $getInfo_university->link_telegram }}" class="text-decoration-none" target="_blank">
                                            <i class="fab fa-telegram fa-xl" style="color:#0088cc;"></i>
                                        </a>
                                    @endif
                                    @if (!empty($getInfo_university->link_whatsApp))
                                        <a href="{{ $getInfo_university->link_whatsApp }}" class="text-decoration-none" target="_blank">
                                            <i class="fa fa-whatsapp fa-xl" style="color:#25d366;"></i>
                                        </a>
                                    @endif

                                    @if (!empty($getInfo_university->link_lenkedIn))
                                        <a href="{{ $getInfo_university->link_lenkedIn }}" class="text-decoration-none" target="_blank">
                                            <i class="fab fa-linkedin fa-xl" style="color:#0a66c2;"></i>
                                        </a>
                                    @endif
                                    @if (!empty($getInfo_university->link_instagram))
                                        <a href="{{ $getInfo_university->link_instagram }}" class="text-decoration-none" target="_blank">
                                            <i class="fab fa-instagram fa-xl" style="color:#c32aa3;"></i>
                                        </a>
                                    @endif
                                    @if (!empty($getInfo_university->link_twitter))
                                        <a href="{{ $getInfo_university->link_twitter }}" class="text-decoration-none" target="_blank">
                                            <i class="fa-brands fa-twitter fa-xl" style="color:#61bed9;"></i>

                                        </a>
                                    @endif
                                    @if (!empty($getInfo_university->link_youtube))
                                        <a href="{{ $getInfo_university->link_youtube }}" class="text-decoration-none" target="_blank">
                                            <i class="fa fa-youtube fa-xl" style="color:#ff0000;"></i>
                                        </a>
                                    @endif

                                    @if (!empty($getInfo_university->link_facebook))
                                        <a href="{{ $getInfo_university->link_facebook }}" class="text-decoration-none" target="_blank">
                                            <i class="fab fa-facebook fa-xl" style="color:#1877f2;"></i>
                                        </a>
                                    @endif
                                    @if (!empty($getInfo_university->link_university))
                                        <a href="{{ $getInfo_university->link_university }}" class="text-decoration-none" target="_blank">
                                            <i class="fas fa-globe fa-xl" style="color:#61bed9;"></i>
                                        </a>
                                    @endif

                                </div>
                            @endisset
                        </div>
                    </div>
                    <hr>
                    
                    @if(isset($getSlide->slide_one))
                    
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach(explode (",", $getSlide->slide_one) as $key => $item)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                  <img src="{{url('../public/uploading/' . $item)}}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach
                           
                           
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                        </div>
                   
                    <hr>
                    
                    
                    @endif
                    <!-- <div class="property">
                        <ul class="list-unstyled d-flex justify-content-start flex-wrap list-property">
                            <li>قريبة من المواصلات</li>
                            <li>وسط البلد</li>
                            <li>تحتوي على التدريبات السنوية</li>
                            <li>كورسات تقوية اللغة الانجليزية مجانا</li>
                        </ul>
                    </div> -->

                    <div class="about-detials mb-3 socaill">
                        @isset($getInfo_university)
                            @if (!empty($getInfo_university->type_university && $getInfo_university->type_education))
                                <h4 class="mb-4 info_into">معلومات</h4>
                                <div class="info">
                                    @if(isset($getInfo_university->year_founding))<p>تأسست في عام:<span>{{$getInfo_university->year_founding}}</span></p>@endif
                                    @if(isset($getInfo_university->type_university))<p>نوع الجامعة: <span>{{$getInfo_university->type_university}}</span></p>@endif
                                    @if(isset($getInfo_university->type_education))<p>نوع التعليم: <span>{{$getInfo_university->type_education}}</span></p>@endif
                                </div>
                            @endif
                        @endisset
                        @isset($getInfo_university)
                            @if (!empty($getInfo_university->description))
                                <h4 class="mb-4 mt-2 info_uni">عن الجامعة</h4>
                                <div class="descrip">
                                    <p>{!! $getInfo_university->description !!}</p>
                                </div>
                            @endif
                        @endisset
                        @isset($getInfo_university)
                            @if (!empty($getInfo_university->code_video))
                                <h4 class="mb-4 info_into">فيديو</h4>
                                <div class="empeded-video">
                                    {!! $getInfo_university->code_video !!}
                                </div>
                            @endif
                        @endisset
                        @if(
                                isset($getInfo_university->count_mempers)
                                 || isset($getInfo_university->count_assistance)
                                 || isset($getInfo_university->count_memper_support)
                                 || isset($getInfo_university->count_students_university)
                                 || isset($getInfo_university->count_student_master)
                                 || isset($getInfo_university->count_student_doctor)
                                 || isset($getInfo_university->count_student_doblum)
                                 || isset($getInfo_university->count_student_edu_open)
                                 || isset($getInfo_university->count_student_institue)
                            )
                        <hr>
                        <div class="propert">
                            <section id="statistics">
                                <div class="container">
                                    <div class="row py-md-5 py-3 justify-content-center">
                                        @isset($getInfo_university)
                                            @if (!empty($getInfo_university->count_mempers))
                                                <div class="col-md-3 col-sm-6 mb-4" id="edit-icon">
                                                    <div class="statistic">
                                                        <div class="statistic_icon">
                                                            <i class="fas fa-chalkboard-teacher me-sm-3 me-0"></i>
                                                        </div>
                                                        <div class="statistic_content"><span dir="auto"
                                                                class="statistic_num">{{ $getInfo_university->count_mempers }}</span>
                                                            <p class="statistic_text">أعضاء الهيئة التدريسية
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                        @endisset
                                        @isset($getInfo_university)
                                            @if (!empty($getInfo_university->count_assistance))
                                                <div class="col-md-3 col-sm-6 mb-4" id="edit-icon">
                                                    <div class="statistic">
                                                        <div class="statistic_icon"><i
                                                                class="fas fa-chalkboard-teacher me-sm-3 me-0"></i></div>
                                                        <div class="statistic_content"><span dir="auto"
                                                                class="statistic_num">{{ $getInfo_university->count_assistance }}</span>
                                                            <p class="statistic_text">معيد</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endisset

                                        @isset($getInfo_university)
                                            @if (!empty($getInfo_university->count_memper_support))
                                                <div class="col-md-3 col-sm-6 mb-4" id="edit-icon">
                                                    <div class="statistic">
                                                        <div class="statistic_icon"><i
                                                                class="fas fa-user-alt me-sm-3 me-0"></i></div>
                                                        <div class="statistic_content"><span dir="auto"
                                                                class="statistic_num">{{ $getInfo_university->count_memper_support }}</span>
                                                            <p class="statistic_text">أعضاء الهيئة الفنية</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endisset

                                        @isset($getInfo_university)
                                            @if (!empty($getInfo_university->count_students_university))
                                                <div class="col-md-3 col-sm-6 mb-4" id="edit-icon">
                                                    <div class="statistic">
                                                        <div class="statistic_icon"><i
                                                                class="fas fa-user-graduate me-sm-3 me-0"></i></div>
                                                        <div class="statistic_content"><span dir="auto"
                                                                class="statistic_num">{{ $getInfo_university->count_students_university }}</span>
                                                            <p class="statistic_text">طالب جامعي</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                        @endisset
                                        @isset($getInfo_university)
                                            @if (!empty($getInfo_university->count_student_master))
                                                <div class="col-md-3 col-sm-6 mb-4" id="edit-icon">
                                                    <div class="statistic">
                                                        <div class="statistic_icon"><i
                                                                class="fas fa-user-graduate me-sm-3 me-0"></i></div>
                                                        <div class="statistic_content"><span dir="auto"
                                                                class="statistic_num">{{ $getInfo_university->count_student_master }}</span>
                                                            <p class="statistic_text">طالب ماجستير</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endisset
                                        @isset($getInfo_university)
                                            @if (!empty($getInfo_university->count_student_doctor))
                                                <div class="col-md-3 col-sm-6 mb-4" id="edit-icon">
                                                    <div class="statistic">
                                                        <div class="statistic_icon"><i
                                                                class="fas fa-user-graduate me-sm-3 me-0"></i></div>
                                                        <div class="statistic_content"><span dir="auto"
                                                                class="statistic_num">{{ $getInfo_university->count_student_doctor }}</span>
                                                            <p class="statistic_text">طالب دكتوراه</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endisset
                                        @isset($getInfo_university)
                                            @if (!empty($getInfo_university->count_student_doblum))
                                                <div class="col-md-3 col-sm-6 mb-4" id="edit-icon">
                                                    <div class="statistic">
                                                        <div class="statistic_icon"><i
                                                                class="fas fa-user-graduate me-sm-3 me-0"></i></div>
                                                        <div class="statistic_content"><span dir="auto"
                                                                class="statistic_num">{{ $getInfo_university->count_student_doblum }}</span>
                                                            <p class="statistic_text">طالب دبلوم تأهيل وتخصص
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endisset
                                        @isset($getInfo_university)
                                            @if (!empty($getInfo_university->count_student_edu_open))
                                                <div class="col-md-3 col-sm-6 mb-4" id="edit-icon">
                                                    <div class="statistic">
                                                        <div class="statistic_icon"><i
                                                                class="fas fa-user-graduate me-sm-3 me-0"></i></div>
                                                        <div class="statistic_content"><span dir="auto"
                                                                class="statistic_num">{{ $getInfo_university->count_student_edu_open }}</span>
                                                            <p class="statistic_text">طالب تعليم مفتوح</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endisset
                                        @isset($getInfo_university)
                                            @if (!empty($getInfo_university->count_student_institue))
                                                <div class="col-md-3 col-sm-6 mb-sm-0 mb-4" id="edit-icon">
                                                    <div class="statistic">
                                                        <div class="statistic_icon"><i
                                                                class="fas fa-user-graduate me-sm-3 me-0"></i></div>
                                                        <div class="statistic_content"><span dir="auto"
                                                                class="statistic_num">{{ $getInfo_university->count_student_institue }}</span>
                                                            <p class="statistic_text">طالب معهد تقاني</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endisset
                                    </div>
                                </div>
                            </section>
                        </div>

                        @endisset
                    </div>
                </div>
                <!-- End Section atLeft -->
            </div>
        </div>
        </div>
    </section>

@endsection
