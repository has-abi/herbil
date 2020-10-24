@extends('layouts.guest')
@section("custum_styles")
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
@endsection
@section('title')
    {{ session()->get('search_cat') }}
@endsection
@section('template')
    <h3 class="text-center">{{ session()->get('search_cat') }}</h3>
    <x-navbar></x-navbar>
    <div class="container mt-3" >
        <h1 class="text-center mb-2" style="color: orangered;direction: rtl">{{ session()->get('search_cat') }}</h1>
        <div class="row d-flex justify-content-center">
            @foreach($posts as $post)
                <div class="col-md-4 col-lg-4 col-12 my-2 my-md-0 my-lg-0 my-xl-0 col-xl-4">
                    <a href="{{ url('post/'.$post->id) }}">
                        <div class="card shadow" style="max-height: 300px;min-height: 300px">

                            <div class="card-body p-0">
                                <img src="{{ url('image/'.$post->id)}}" alt="image" class="search-card-img h-100 card-img img-fluid image" >
                            </div>
                            <div class="card-header text-right" style="direction: rtl">
                                {!! \Illuminate\Support\Str::limit($post->title ,100) !!}@if(strlen($post->title)>100)... @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $posts->render('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
    <x-footer></x-footer>
@endsection
@section('custum_scripts')
    <script src="{{ asset("js/scroll.js") }}"></script>
@endsection
