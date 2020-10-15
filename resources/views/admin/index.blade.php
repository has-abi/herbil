@extends('admin.template')
@section('custum_styles')
    <link rel="stylesheet" href="{{asset("css/admin.css")}}">
@endsection
@section('admin')
<div class="container my-3">
<div class="row">
    <div class="col-xl-6 col-12 order-xl-0 order-1">
        <div class="card border-0 shadow ">
            <div class="card-header bg-light text-indigo text-right">
                <h2>آخر فيديوا</h2>
            </div>
            <div class="card-body">
                <div class="card border-0">
                @if(isset($lastVideo))
                        <div class="card-header bg-light text-indigo text-right ">
                            <h4>{{ $lastVideo->title }}</h4>
                            <div class="card-body">
                                <iframe width="100%" height="200" src="{{ url($lastVideo->url) }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="card-footer bg-light text-indigo text-right">
                                <div class="btn-group btn-group-sm">
                                    <form action="{{ url('video_delete',$lastVideo->id  ) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn-sm border-0 btn-danger shadow-sm text-center"> حذف <span class="fa fa-trash"></span></button>
                                    </form>
                                    <a href="{{ url("video/edit/".$lastVideo->id) }}" class="btn-sm border-0 btn-primary shadow-sm text-center"> تعديل <span class="fa fa-edit"></span></a>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="alert alert-light text-center">لا يوجد أي فيديوا حاليا</div>
                        @endif
                    </div>
            </div>
        </div>
        <div class="card border-0 shadow my-2">

            <div class="card-header bg-indigo text-white text-right">
                <h2>آخر 3 رسائل</h2>
            </div>

            <div class="card-body">
                @if($lastContacts->count())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td>التحكم</td>
                            <td>الموضوع</td>
                            <td>البريد الإلكتروني</td>
                            <td>المرسل</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lastContacts as $c)
                            <tr>
                                <td>
                                    <a href="{{ url("contact/respond/".$c->id) }}" class="btn btn-sm border-0 btn-primary shadow-sm"> أجب <span class="fa fa-send"></span></a>
                                </td>
                                <td>{{ $c->subject }}</td>
                                <td>{{ $c->email }}</td>
                                <td>{{ $c->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-light text-center">لا توجد أي رسائل جديدة</div>
                @endif
            </div>
        </div>

    </div>
    <div class="col-xl-6 col-12 order-xl-1 order-0">
        <div class="card border-0 shadow">
            <div class="card-header bg-light text-indigo text-right">
                <h2>آخر مقال</h2>
            </div>
            @if(isset($lastPost))
                <div class="card-body">
                    <div class="card">
                        <div class="card-header text-right  bg-indigo text-white" style="direction: rtl">
                            <h4>{{ $lastPost->title }}</h4>
                        </div>
                        <img src="{{ url('image/'.$lastPost->id) }}" class="card-img border-0" alt="{{ $lastPost->title }}">
                        <div class="card-body">
                            <div class="card-title text-right">

                                <span>{{ date('Y', strtotime($lastPost->created_at)) }}</span>
                                <span>{{ App\Helpers\DateHelper::monthToArabic(date('m', strtotime($lastPost->created_at))) }}</span>
                                <span> {{ date('d', strtotime($lastPost->created_at)) }}</span>
                                -
                                @foreach($lastPost->categories as $pc)
                                    <span class="badge badge-dark">{{ $pc->libelle }}</span>
                                @endforeach
                            </div>
                            <div class="card-text text-right" style="direction: rtl">
                                <div id="half_content">
                                    {!! \Illuminate\Support\Str::limit($lastPost->content,300) !!}
                                    @if(strlen($lastPost->content)>300)
                                        ...
                                        <span
                                            style="color: blue; font-weight: bold"
                                            id="more"
                                            class="cursor"
                                        >
                                            <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
                                            لقراءة المزيد
                                        </span>
                                    @endif
                                </div>

                                <div id="post_content" class="hide">
                                    {!! $lastPost->content !!}
                                    <button class="btn-sm btn-outline-primary shadow float-right" id="back">عودة</button>
                                </div>
                                <div>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn-sm btn-primary" href="{{ url('post/edit/'.$lastPost->id) }}"> تعديل <span class="fa fa-edit"></span></a>
                                        <form action="{{ url('post_delete',$lastPost->id  ) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn-sm border-0 btn-danger shadow-sm text-center"> حذف <span class="fa fa-trash"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            @else
                <div class="alert alert-light text-center">لا يوجد أي مقال حاليا</div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
@section("custum_scripts")
    <script src="{{asset("js/admin.js")}}"></script>
    <script>
        $(document).ready(function (){
                $("#more").click(function (){
                    $("#post_content").toggleClass("hide");
                    $("#half_content").addClass("hide");
                });
                $("#back").click(function (){
                    $("#post_content").toggleClass("hide");
                    $("#half_content").removeClass("hide");
                });
        });
    </script>
@endsection
