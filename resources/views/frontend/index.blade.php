@extends('frontend.layouts.navbar_and_footer')

@section('content')
    <div class="content-all" style="width: 100%; height:auto;">
        <div class="section-search">
            <div class="container mt-3 mb-2 d">
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
        <!---------------------------->
        <div class="part-country">
            <div class="container">
                <ul class="list-unstyled list-contry">
                    @foreach ($country_names as $item)
                        <a href="{{ url($item->href) }}" class="text-decoration-none">
                            <li>
                                <div class="img-contry" style="display: flex;
                        align-items: center;">
                                    <img src="{{ url('./public/uploading/' . $item->country_flag) }}" alt="{{ $item->country_name }}">
                                </div>
                                <span>{{ $item->country_name }}</span>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


@endsection
