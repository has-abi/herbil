@extends('layouts.guest')
@section("custum_styles")
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
@endsection
@section('title')
    {{ session()->get('search_word') }}
@endsection
@section('template')

    <x-navbar></x-navbar>
        <div class="container mt-3" >
            <h3 class="text-center" style="color: orangered;direction: rtl">نتائج البحث لكلمة: {{ session()->get('search_word') }}</h3>
            <p class="text-right" style="direction: rtl;font-size: 20px">{{ $posts->total() }} نتيجة </p>
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
    <svg style="margin-bottom: -20px;margin-top: -100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <x-footer></x-footer>
@endsection
@section('custum_scripts')
    <script src="{{ asset("js/scroll.js") }}"></script>
@endsection
