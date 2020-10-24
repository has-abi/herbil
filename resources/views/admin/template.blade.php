@extends("layouts.app")

@section("custum_styles")
    <link rel="stylesheet" href="{{asset("css/admin.css")}}">
@endsection

@section("template")
    @include('notify::messages')
    <x:notify-messages />
    <div class="row no-gutters">
        <div class="col-xl-10 col-md-9 col-sm-12" id="content">
            <nav class="navbar  navbar-light bg-white" id="navbar"  >
                <div class="navbar-brand float-left" >
                    <div class="btn-group float-left" id="icons">
                        <a  href="{{ url('profile') }}" class="btn bg-transaprent border-0"><span class="fa fa-user text-indigo"></span></a>
                    </div>
                </div>
                <div class="btn-group px-2">
                    <a href="{{url("video/add")}}" class="btn btn-danger shadow-sm mx-2" style="border-radius: 5px"> أنشر فيديوا  <span class="fa fa-youtube"></span></a>
                    <a href="{{url("posts/create")}}" class="btn btn-success shadow-sm" style="border-radius: 5px"><span class="fa fa-plus"></span> أنشئ مقال </a>
                    <button class="btn bg-transparent border-0"><span class="fa fa-bars text-indigo cursor" style="font-size: 20px" id="toggler"></span> </button>
                </div>

                <!--
                    search
                -->
                <!--
                <div class="form-group search-class w-100 mt-2" id="search">
                    <div class="input-group shadow-sm">
                        <div class="input-group-prepend">
                            <button class="btn bg-transparent text-indigo  search-btn" style="border-bottom: 1px solid lightgrey"><span class="fa fa-times"></span></button>
                        </div>
                        <input type="text" placeholder="أبحث عن ..." class="form-control text-right" style="border:none;border-bottom: 1px solid lightgrey">
                        <div class="input-group-append">
                            <button class="btn bg-transparent text-indigo " style="border-bottom: 1px solid lightgrey"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                </div>
                -->
            </nav>
            @yield("admin")
        </div>
        <x-side-bar></x-side-bar>
    </div>
@endsection
@section("custum_scripts")
    <script src="{{asset("js/admin.js")}}"></script>
@endsection

