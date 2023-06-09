@extends('backend.layouts.admin_master')


@section('content')
    @include('backend.layouts.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">

                    <h6 class="font-weight-bolder mb-0">الاعدادات العامة</h6>
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
                            <ul class="dropdown-menu  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  ms-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm bg-gradient-dark  ms-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  ms-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                            fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->


        {{-- الاعدادات العامة --}}

        <form method="POST" action="{{ route('admin.setSittings') }}" class=" m-5  shadow " enctype="multipart/form-data">
            @csrf

            {{-- @if (!empty(session('msg')))
                <div class="row backgroundW p-4  ">
                    <div class="alert" style="background-color: #42424a ">
                        <ul>
                            <li style="color:white" class="">{{ session('msg') }}</li>
                        </ul>
                    </div>
                </div>
            @endif --}}
            <div class="container">
                @if ($message = Session::get('msg'))
                    
                    <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="row backgroundW p-4  ">
                @if ($errors->any())
                    <div class="alert" style="background-color: #42424a ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color:white" class=>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-check">
                    <input class="form-check-input" name="insertCheck" type="checkbox" id="flexCheckIndeterminate" @isset($getShowSettings) {{ $getShowSettings->insertQuick ? 'checked ' : '' }} @endisset>
                    <label class="form-check-label" for="flexCheckIndeterminate">
                      تفعيل دخول سريع
                    </label>
                </div>
                
                <hr>
                <div class="col-12 mb-3">
                    <label for="inputFirstNmae" class="form-labell">أسم الموقع</label>
                    <input type="text" class="@error('nameWebsite') is-invalid @enderror form-controll "
                        name="nameWebsite" id="inputFirstNmae"
                        value="@isset($getShowSettings) {{ $getShowSettings->nameWebsite }} @endisset" required>
                </div>
                
                <div class="col-12 mb-3">
                    <label for="inputLastNmae" class="form-labell  ">رابط الموقع</label>
                    <input type="text" class="form-controll" name="linkWebsite" id="inputLastNmae"
                        value="@isset($getShowSettings) {{ $getShowSettings->linkWebsite }} @endisset">
                </div>
                {{-- <div class="col-12 mb-3">
                    <label for="inputLastNmae" class="form-labell  ">عدد الجامعات</label>
                    <input type="numeric" class="form-controll" name="count_University" id="inputLastNmae"
                        value="@isset($getShowSettings) {{ $getShowSettings->count_University }} @endisset">
                </div> --}}
                <div class="col-md-6 mb-3 ">
                    <label for="inputlink1" class="form-labell  ">رابط فيسبوك</label>
                    <input type="text" class="form-controll " name="socialMidiaFacebook" id="inputlink1"
                        value="@isset($getShowSettings) {{ $getShowSettings->socialMidiaFacebook }} @endisset">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="inputlink2" class="form-labell ">رابط تلغرام</label>
                    <input type="text" class="form-controll" name="socialMidiaTelegram" id="inputlink2"
                        value="@isset($getShowSettings) {{ $getShowSettings->socialMidiaTelegram }} @endisset">
                </div>
                <div class="col-12 mb-3">
                    <label for="inputlink3" class="form-labell ">رابط انستغرام</label>
                    <input type="text" class="form-controll" name="socialMidiaInstagram" id="inputlink3"
                        value="@isset($getShowSettings) {{ $getShowSettings->socialMidiaInstagram }} @endisset">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="inputlink4" class="form-labell ">رابط يوتيوب</label>
                    <input type="text" class="form-controll" name="socialMidiaYoutube" id="inputlink4"
                        value="@isset($getShowSettings) {{ $getShowSettings->socialMidiaYoutube }} @endisset">
                </div>

                {{-- <div class="col-md-6 mb-3">
                    <label for="inputLinkden" class="form-labell ">Linkedin رابط </label>
                    <input type="text" id="inputLinkden" class="form-controll"
                        value="@isset($getShowSettings) {{ $getShowSettings->socialMidiaFacebook }} @endisset">
                </div> --}}

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">نبذة عن الموقع </label>
                    <textarea id="Description" name="Description" class="form-controll resizeForTextarea">@isset($getShowSettings){{ $getShowSettings->Description }}@endisset</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="gg" class="form-labell ">الكلمات المفتاحية ( يجب الفصل بينها بفاصلة)</label>
                    <textarea id="gg" name="Keywords" class="form-controll resizeForTextarea">@isset($getShowSettings) {{ $getShowSettings->Keywords }} @endisset</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="ph" class="form-labell">اضافة صورة favicon</label>
                    <input type="file" name="favicon" id="ph" class="form-controll">
                    @isset($getShowSettings)
                        <img src="{{url('../public/uploading/' . $getShowSettings->favicon)}}" alt="">
                    @endisset
                </div>
                <div class="col-md-12 mb-3">
                    <label for="aa" class="form-labell ">اضافة صورة meta_image</label>
                    <input type="file" name="meta_image" id="aa" class="form-controll">
                    @isset($getShowSettings)
                        <img src="{{url('../public/uploading/' . $getShowSettings->meta_image)}}" alt="">
                    @endisset
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-dark" style="background-color: #42424a">حفظ</button>
                </div>
        </form>
        </div>

        </div>


        {{-- نهاية الاعدادات العامة --}}

        {{-- Footer --}}

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



@endsection
