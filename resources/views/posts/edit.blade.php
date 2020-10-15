@extends("admin.template")
@section('custum_styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="{{asset("css/admin.css")}}">
@endsection
@section("admin")
    @php
    global  $ids ;
    $ids = [];
    @endphp
    @if(session("success"))
        <div class="alert alert-success shadow text-right my-2 mx-5" >{{ session("success") }}</div>
    @endif
    @if(session("error"))
        <div class="alert alert-danger shadow text-right my-2 mx-5">{{ session("error") }}</div>
    @endif
    <h1 class="text-center mt-2">تعديل المقال</h1>
    <div class="mx-xl-5 mx-md-2 mx-sm-1">

        <form action="{{ url('post_update/'.$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="float-right">العنوان</label>
                <input type="text" value="{{ $post->title }}" class="form-control text-right @error('title') is-invalid @enderror" name="title">
                @error('title')
                <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cat" class="float-right">الفئة</label>
                        <select name="categorie[]" id="cat" class="selectpicker shadow-sm  border text-right w-100"  multiple data-live-search="true" >
                            @foreach($post->categories as $c)
                                @php

                                @endphp
                                <option value="{{ $c->id }}" selected>{{ $c->libelle }}</option>
                            @endforeach
                            @foreach($categories as $cat)
                                @if(!in_array($cat->id,App\Helpers\DataHelper::catsToArray($post->categories)))
                                    <option value="{{$cat->id}}" style="direction: rtl">{{$cat->libelle}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="attachement" class="float-right">الملحقات</label>
                        <input type="file" name="attachement" class="form-control" id="attachement">
                        <div class="alert alert-light"><a href="{{ url('image/'.$post->id) }}">{{ $post->thumbnail }} <span class="fa fa-file-pdf"></span></a></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <textarea name="content" cols="30" rows="4" class="ckeditor @error('content') is-invalid @enderror" id="wysiwyg-editor" >{{ $post->content }}</textarea>
                @error('content')
                <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-warning float-left shadow-sm btn-block mb-3" type="submit"><span class="fa fa-check"></span>  تعديل </button>
        </form>
    </div>
@endsection
@section("custum_scripts")
    <script src="{{asset("ckeditor/ckeditor.js")}}"></script>
    <script src="{{asset("js/admin.js")}}"></script>
    <script>
        CKEDITOR.replace('wysiwyg-editor', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

@endsection
