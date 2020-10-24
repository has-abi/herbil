@extends("layouts.guest")
@section("custum_styles")
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
@endsection
@section('title')
    {{ $post->title }}
@endsection
@section('extra_metadata')
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ $content }}" />

    <meta property="article:section" content="{{ $content }}" />
    <meta property="article:published_time" content="{{ $post->created_at }}" />
    <meta property="article:modified_time" content="{{ $post->updated_at }}" />

    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="400" />
    <meta name="description" content="{{ $content }}" />
    <meta name="keywords" content="{{ $keywords }}" />
@endsection
@section("template")
    <x-navbar></x-navbar>
        <div class="container my-5">
            <h2 class="text-right" style="direction: rtl">
                {{ $post->title }}
            </h2>
            <div class="d-flex justify-content-center">
                <img src="{{ url('image/'.$post->id) }}" alt="{{ $post->title }}" class="img-fluid mx-xl-5 mx-md-2 post_image">
            </div>

            <div class="my-2 text-right" style="direction: rtl"> {!! $post->content !!}</div>
            @if($photos->count()>0)
            <div class="container">
                <p class="text-right" style="direction: rtl">ألبوم الصور:</p>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-sm-12">
                        <div class="row">
                            @foreach($photos as $p)
                                <div class="col-lg-6 col-md-6 col-xs-12 thumb">
                                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="{{ $post->title }}"
                                       data-image="{{ url('album/image/'.$p->id) }}"
                                       data-target="#image-gallery">
                                        <img class="img-thumbnail"
                                             src="{{ url('album/image/'.$p->id) }}"
                                             alt="صورة">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-right" id="image-gallery-title"></h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="image-gallery-image" class="img-responsive col-md-12" src="" alt="صورة">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light float-left shadow" id="show-previous-image"><i class="fa fa-chevron-left"></i>
                            </button>

                            <button type="button" id="show-next-image" class="btn btn-light float-right shadow"><i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($attachements->count()>0)
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sx-8 offset-lg-4 offset-sm-2 offset-md-3">
                        <p class="text-right" style="direction: rtl">ملفات:</p>
                        <ul class="list-group list-group-horizontal-lg list-group-flush ">
                            @foreach($attachements as $a)
                                <li class="list-group-item"> <span class="fa fa-file"></span> <a href="{{ url('fattachement/'.$a->id) }}" target="_blank">{{ $a->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    <x-footer></x-footer>
@endsection
@section("custum_scripts")
    <script src="{{ asset("js/main.js") }}"></script>
    <script src="{{ asset("js/scroll.js") }}"></script>
    <script src="{{ asset("js/modal.js") }}"></script>
@endsection
