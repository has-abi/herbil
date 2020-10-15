@extends('layouts.guest')
@section("custum_styles")
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
@endsection
@section('template')
    <h3 class="text-center">{{ session()->get('search_cat') }}</h3>

    <x-navbar></x-navbar>
    <div class="container mt-3" >
        <h1 class="text-center mb-2" style="color: orangered;direction: rtl">{{ session()->get('search_cat') }}</h1>
        <div class="row d-flex justify-content-center">
            @foreach($posts as $post)
                <div class="col-md-4 col-12 col-xl-4">
                    <a href="{{ url('post/'.$post->id) }}">
                        <div class="card shadow">
                            <div class="card-header text-right" style="direction: rtl">
                                {{ $post->title }}
                            </div>
                            <div class="card-body p-0">
                                <img src="{{ url('image/'.$post->id)}}" alt="image" class="search-card-img card-img img-fluid">
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
