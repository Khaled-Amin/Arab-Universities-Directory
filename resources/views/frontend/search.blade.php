@extends('frontend.layouts.navbar_and_footer')

@section('content')

<div class="container mt-5 mb-5">
    
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

<div class="container" style="margin-top:2rem;">
    <div style="font-size:32px; font-weight:600;">نتائج البحث </div>

    <div class="box-main">
        @forelse ($getAllResults as $item)

                <a href="{{route('viewPage.university' , [$item->country->href , $item->link_page_university])}}" class="mt-3 box-5">
                    <div class="img">
                        <img src="{{url('../public/uploading/' . $item->logo_university)}}" alt="صورة">
                    </div>
                    <p class="title">{{$item->university_name}}</p>
                    
                </a>
            @empty
            <p class="w-100 text-center mt-5" style="margin-bottom:3.88rem;">لايوجد شيئ ما تبحث عنه</p>
        @endforelse
    </div>

</div>


@endsection
