@extends('frontend.layouts.navbar_and_footer')

@section('content')

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 72vh">
        <div class="main-box">
            <h1 class="fw-bolder" style="font-size:62px;">404</h1>
            <p class="fw-bolder"> لم نعثر على ما تبحث عنه...</p>
            <a href="{{url('/')}}" class="btn btn-warning text-white">الصفحة الرئيسية</a>
        </div>
    </div>

@endsection
