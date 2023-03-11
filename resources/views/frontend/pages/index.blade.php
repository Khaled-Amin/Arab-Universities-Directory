@extends('frontend.layouts.navbar_and_footer')

@section('content')
    <div class="section-search">
        <div class="container mb-2 d">
            <div class="search">
                <form id="searchthis" action="{{ route('showPage.search') }}" style="display:inline;" method="get">

                    <input id="namanyay-search-box" name="q" type="text" placeholder="ما الذي تبحث عنه؟" required />
                    <button id="namanyay-search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <!-- {{-- <button class="navbar-search_button">
                    <i class="fa fa-search"></i>
                </button> --}} -->
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="jumbotron">
            <h2>{{$pinned->page_name}}</h2>
            <hr>
            <p class="lead">{!! $pinned->content !!}</p>
        </div>
    </div>

@endsection
<style>
    .search{
        top:8rem !important;
    }
</style>
