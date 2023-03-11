@extends('backend.layouts.admin_master')

@section('content')

@include('backend.layouts.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">

                    <h6 class="font-weight-bolder mb-0">الدول</h6>
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
                    <li class="breadcrumb-item"><a href="{{ route('countries.main') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">انشاء</li>
                </ol>
            </nav>
            <form action="{{ route('countries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput1">اسم الدولة</label>
                    <input type="text" class="form-controll" name="country_name" placeholder="ادخل اسم الدولة">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">رابط الصفحة</label>
                    <input type="text" class="form-controll" name="href" placeholder="https://www.example.com">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">علم الدولة</label>
                    <input type="file" name="country_flag" class="form-controll">
                    @if ($errors->has('country_flag'))
                        <span class="text-danger"><strong>{{ $errors->first('country_flag') }}</strong></span>
                        <div class="alert alert-light" role="alert">
                            You should to be picture dimensions maximum: max_width:600,max_height:600
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">عنوان الصفحة</label>
                    <input type="text" class="form-controll" name="title" placeholder="title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">نبذة عن الموقع </label>
                    <textarea type="text" id="Description" name="description" class="form-controll resizeForTextarea"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">الكلمات المفتاحية</label>
                    <input type="text" class="form-controll" name="keyword" placeholder="ادخل كلمة مفتاحية">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">meta_title</label>
                    <input type="text" class="form-controll" name="metaTitle" placeholder="meta_title">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1dd">وصف الجامعات</label>
                    {{-- <input type="text" class="form-controll" name="desMeta" placeholder="وصف الجامعات"> --}}
                    <textarea id="exampleFormControlInput1dd" name="desMeta" class="ckediator form-controll resizeForTextarea"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">صورة لصفحة الدولة</label>
                    <input type="file" class="form-controll" name="picOfCountry"/>
                </div>
                {{-- <div class="form-group">
                    <label for="exampleFormControlTextarea1"> حالة الظهور اولا</label>
                    <input type="checkbox" name="show_status" value="1">
                </div> --}}

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>

    </main>

    {{-- sittings --}}
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-white position-fixed px-3 py-2 " style="background-color:#42424a">
            <i class="material-icons py-2" style="color:white">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-end">
                    <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                    <p>See our dashboard options.</p>
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
                    <h6 class="mb-0">Sidebar Colors</h6>
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
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
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
                <a class="btn bg-gradient-info w-100"
                    href="https://www.creative-tim.com/product/material-dashboard">Free Download</a>
                <a class="btn btn-outline-dark w-100"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>



    @endsection
