@extends("layouts.guest")
@section("template")
@section("custum_styles")
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
@endsection
<x-navbar></x-navbar>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="row" style="text-align: center">
                <div class="col-md-10"></div>
                <div class="col-md-2"><h3>آخر الأخبار</h3></div>
            </div>
            <hr />
            @if($posts->count()>0)
                @foreach($posts as $post)
            <div class="row" style="text-align: right">
                <div class="col-md-11">
                    <h4>
                        <a href="{{ url('post/'.$post->id) }}"
                        >{{ $post->title }}</a
                        >
                    </h4>
                </div>

                <div class="col-md-1 my-2 text-center"  style="border-left: 2px solid #292929">
                    {{ App\Helpers\DateHelper::monthToArabic(date('m', strtotime($post->created_at))) }}
                    <div style="font-size: 30px;font-weight: bold;margin-top: -10px;margin-bottom: -10px" class="text-center">
                        {{ date('d', strtotime($post->created_at)) }}
                    </div>
                    {{ date('Y', strtotime($post->created_at)) }}
                </div>
                <br />
                <br />
                <div class="col-md-8 " style="text-align: right">
                    <p>
                    {!! \Illuminate\Support\Str::limit($post->content,300) !!}...
                        <a href="{{ url('post/'.$post->id) }}" style="color: blue; font-weight: bold">
                            <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
                            لقراءة المزيد
                        </a>
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{ url('image/'.$post->id) }}" width="100%" alt="image" style="max-height: 200px" />
                    <br />
                    @foreach($post->categories as $pc)
                    <span class="badge badge-dark">{{ $pc->libelle }}</span>
                    @endforeach
                </div>
            </div>
            <hr />
            @endforeach
            @else
                <div class="alert alert-light text-center">no posts found</div>
            @endif
        <div class="row pagination">

        </div>
    </div>
    <br />
</div>
</div>
<div class="d-flex justify-content-center">
    {{ $posts->render('vendor.pagination.bootstrap-4') }}
</div>
<x-footer></x-footer>
@endsection
    @section("custum_scripts")
        <script src="{{ asset("js/main.js") }}"></script>
        <script src="{{asset("js/scroll.js") }}"></script>
        <script src="{{ asset("js/modal.js") }}"></script>
@endsection

