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

    @if ($errors->all())
        <div class="container">
            <div class="alert row" style="background-color:#42424a ">
                <ul style="color:white">
                    انتبه !!!
                    @foreach ($errors->all() as $error)
                        <li style="color:white ;font-family: Arabic;" class=>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="row backgroundW p-4 m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main_pagess') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">تعديل</li>
            </ol>
        </nav>
        <form action="{{ route('update_Page', $findId->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-md-12 mb-3">
                <label for="Description" class="form-labell ">اسم الصفحة</label>
                <input type="text" name="page_name" value="{{ $findId->page_name }}" class="form-controll">
            </div>

            <div class="col-md-12 mb-3">
                <label for="Description" class="form-labell ">رابط الصفحة</label>
                <input type="text" name="href" value="{{ $findId->href }}" class="form-controll">
            </div>

            <div class="col-md-12 mb-3">
                <label for="Description" class="form-labell ">كلمات مفتاحية</label>
                <input type="text" name="keyword" value="{{ $findId->keyword }}" class="form-controll">
            </div>


            <div class="col-md-12 mb-3">
                <label><strong>محتوى الصفحة :</strong></label>
                <textarea class="ckeditor form-controll" name="content" placeholder="ادخل محتوى الصفحة">{{ $findId->content }}</textarea>
            </div>



            <label for="" class="form-labell  ">صورة </label>
            <input type="file" name="photoForPindPage" id="photoForPindPage" class="profilePhotoInput">
            <div class="col-md-3 border-right">

                @isset($findId->photoForPindPage)
                    <label for="photoForPindPage" class="cursor d-flex justify-content-center">

                        <div class="d-flex flex-column align-items-center text-center p-3 py-5  "> <img
                                class="rounded-circle  heightPhoto hoverPhoto  "
                                src="{{ url('../public/uploading/' . $findId->photoForPindPage . '') }}">
                            <h5 class="editButtonFor2 rounded-circle ">تعديل</h5><span class="text-black-50"></span><span>
                            </span>
                        </div>
                    </label>
                @endisset
                @empty($findId->photoForPindPage)
                    <label for="photoForPindPage" class="cursor d-flex justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                class="rounded-circle mt-5 " width="150px"
                                src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                                class="font-weight-bold">أدرج صورة</span><span class="text-black-50"></span><span> </span>
                        </div>
                    </label>
                @endempty
            </div>



            <!--                <div class="col-md-12 mb-3">-->
            <!--                    <label for="Description" class="form-labell  ">صورة</label>-->
            <!--                    <input type="file"  name="photoForPindPage" id="photoForPindPage"  class=" styleFile ">-->
            <!--                    <div style="border:1px solid;    height: 2.6rem;"><label for="photoForPindPage" class="btn btn-dark d-inline-flex " style="background-color:#42424a; width:8rem; border-radius:0px;left: 1px;"> اضافة صورة</label>-->
            <!--               <span class="me-3" style="position:relative;top: -6px;"> {{ $findId->photoForPindPage }}</span>-->
            <!--                    </div> -->
            <!--                </div>-->
            <!--<input type="hidden" value="{{ $findId->photoForPindPage }}" name="namePhoto">-->
            <div class="col-12">
                <button type="submit" class="btn btn-dark">تحديث</button>
            </div>
        </form>
    </div>

</main>

@endsection
<style>

    .styleFile {
        position: absolute;
        display: none;
        width: 0.1px;
    }
</style>
