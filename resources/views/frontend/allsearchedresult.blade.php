@extends('frontend.layouts.navbar_and_footer')

@section('title')
    دليل الجامعات العربية
@endsection

@section('content')

<div class="section-search edited-searchpage">
    <div class="container mt-3 mb-2 d">
        <div class="search search-pagee">
            <form id="searchthis" action="{{route('showPage.search')}}" style="display:inline;" method="get">

                <input id="namanyay-search-box" name="q" type="text" placeholder="ما الذي تبحث عنه؟"  required/>
                <button id="namanyay-search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                <!-- {{-- <button class="navbar-search_button">
                    <i class="fa fa-search"></i>
                </button> --}} -->
            </form>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="jumbotron">
        <h2>نتائج البحث</h2>
        {{-- <p class="lead"></p> --}}
        <hr class="my-4">

      </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <section class="main">
                
                @if(isset($getAllResults))
                    @php
                        $i = 1;
                    @endphp
                    <div class="res">Showing {{$getAllResults->firstItem()}} To {{$getAllResults->lastItem()}} of {{$getAllResults->total()}}</div>
                    @forelse ($getAllResults as $key => $item)
                        
                        <div class="content-box">
                            
                                
                                <div class="linked">
                                    
                                    <a href="{{route('viewPage.university' , [$item->country->href , $item->link_page_university])}}" class="d-inline-block text-decoration-none">
                                        <div style="display:flex; align-items:center;">
                                        <div class="numm" style="margin-left:.5rem;">{{$getAllResults->firstItem() + $key}}-</div>    
                                        <h3>{{$item->university_name}}</h3>
                                        </div>
                                        
                                        <!--<small class="text-black-50">https://{{$item->link_page_university}}</small>-->
                                        
                                        
                                    </a>
                                    <p>{!! Str::limit($item->description, 80) !!}</p>
                                </div>
                            
                        
                        
                        </div>
                        @empty
                        <p>لا يوجد شيئ عما تبحث عنه</p>
                    
                    @endforelse
                    
                    @endif
                
            </section>
            <div class="d-flex justify-content-start">
                @if(isset($getAllResults))
                {{ $getAllResults->links() }}
                @endif
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center search-all">
            <div class="content_adss">
                @isset($Adds)
                    {{$Adds->atRight}}
                @endisset
            </div>
        </div>
    </div>

</div>


@endsection

<style>
    .hh{
        padding: 5px 15px !important;
    background-color: burlywood !important;
    }
</style>
