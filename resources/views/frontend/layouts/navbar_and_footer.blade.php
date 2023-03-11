<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(isset($get_title->description))<meta name="description" content="@isset($get_title){{$get_title->description}}@endisset">
    @elseif(isset($get_title_all_uni))
<meta name="description" content="@isset($get_title_all_uni){{$get_title_all_uni->description_university}}@endisset">
    @else
    <meta name="description" content="@isset($Settings){{$Settings->Description}}@endisset">@endif
@if(isset($get_title->keyword))<meta name="keywords" content="@isset($get_title){{$get_title->keyword}}@endisset"/>
@elseif(isset($get_title_all_uni))<meta name="keywords" content="@isset($get_title_all_uni){{$get_title_all_uni->keyword}}@endisset"/>
@else
    <meta name="keywords" content="@isset($Settings){{$Settings->Keywords}}@endisset"/>
@endif
    <meta name="author" content="">
@if(isset($get_title->title))
    <meta property="og:title" content="@isset($get_title){{$get_title->title}}@endisset">
    @elseif(isset($get_title_all_uni))
    <meta property="og:title" content="@isset($get_title_all_uni){{$get_title_all_uni->meta_title}}@endisset">
    @elseif(isset($get_title_share))
    <meta property="og:title" content="@isset($get_title_share){{$get_title_share->university_name}}@endisset">
    @else
<meta property="og:title" content="@isset($Settings){{$Settings->nameWebsite}}@endisset">
    @endif
@if(isset($get_title->description))<meta property="og:description" content="@isset($get_title){{$get_title->description}}@endisset">
    @elseif(isset($get_title_all_uni))
<meta property="og:description" content="@isset($get_title_all_uni){{$get_title_all_uni->description_university}}@endisset">
    @elseif(isset($get_desc_share ))
    <meta property="og:description" content="@isset($get_desc_share ){{$get_desc_share ->description}}@endisset">
    @else
<meta property="og:description" content="@isset($Settings){{$Settings->Description}}@endisset">
    @endif
@isset($Settings)<meta property="og:image" content="{{url('../public/uploading/' . $Settings->meta_image)}}">
    @endisset
<meta property="og:url" content="">
    @isset($Settings)
<link rel="icon" type="image/x-icon" href="{{url('../public/uploading/' . $Settings->favicon)}}">
    @endisset
<title>
    @if (isset($Settings) && empty($getPictureOfCountry->title) && empty($getInfo_university->university_name) && empty($get_title_all_uni))
    {{$Settings->nameWebsite}}
    @elseif (isset($getPictureOfCountry->title))
    {{$getPictureOfCountry->title}}
    @elseif (isset($getInfo_university->university_name))
    {{$getInfo_university->university_name}}
    @elseif($get_title_all_uni->meta_title)
    {{$get_title_all_uni->meta_title}}
    @endif
    
    @yield('title')
</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{url('../public/assets')}}/css/style.css">

    <script src="https://kit.fontawesome.com/c7392f690f.js" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!--<img src="images/img.png" alt="">-->
            <h2><a class="navbar-brand" href="{{url('/')}}"><span style="color:#F2AF2F;">دليل</span> الجامعات العربية</a></h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}">الرئيسية</a>
                    <a class="nav-link menu-search" aria-current="page" href="{{route('page.search')}}">بحث</a>
                    @isset($pineed)<a class="nav-link" href="{{route('viewpinned', $pineed->href)}}">عن الموقع</a>@endisset
                    {{-- <a class="nav-link" href="#">جامعات</a>
                    <a class="nav-link last" href="#">الأقسام</a>
                    <a class="nav-link last" href="#">الكليات</a>
                    <a class="nav-link last" href="#">محاضرين</a> --}}

                </div>
                <!-- Example single danger button -->
                <div class="btn-group btn-group-change">
                    <div class="left-nav">

                        <button class="btn btn-sm dropdown-toggle" id="bbb" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="border:1px solid #dee0e1;">
                            اختر الدولة
                        </button>

                        <div class="dropdown-menu menuu">
                            <ul class="list" id="drop_list">
                                @foreach ($country_names as $get_country)
                                    <li id="eee" class="">
                                        <img src="{{ url('../public/uploading/' . $get_country->country_flag) }}" alt="">
                                        <a href="{{route('getCountryPage.University' , $get_country->href)}}" class="text-decoration-none text-dark mb-1" style="text-align: right;">
                                            {{ $get_country->country_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- <a href="{{route('toPageLogin')}}" class="link-one text-decoration-none link-mid">
                            <span>دخول</span>
                        </a>

                        <a href="{{route('toPageRegister')}}" class="link-two text-decoration-none link-mid">
                            <span>حساب جديد</span>
                        </a> --}}

                    </div>
                </div>
            </div>
        </div>
    </nav>

        @yield('content')

    <footer>
        <div class="container ff">
            <ul class="ul">
                @foreach ($pinnedPage as $pinned)
                    <a href="{{route('viewpinned' , ['href' =>$pinned->href])}}">
                        <li>{{$pinned->page_name}}</li>
                    </a>
                @endforeach

            </ul>
            <div class="text-descr">
                <p>{{$Settings->Description}}</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('success'))
        <script>
            swal("{{ session('success') }}");
        </script>
    @endif

</body>

</html>

<style>
     @font-face {
        font-family: NotoKufiArabic;
        src: url({{url('../public/fonts/NotoKufiArabic-VariableFont_wght.ttf')}});
    }
</style>
