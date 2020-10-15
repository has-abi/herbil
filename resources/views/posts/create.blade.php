@extends("admin.template")
@section('custum_styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="{{asset("css/admin.css")}}">
@endsection
@section("admin")
        @if(session("success"))
            <div class="alert alert-success shadow text-right my-2 mx-5" >{{ session("success") }}</div>
        @endif
        @if(session("error"))
            <div class="alert alert-danger shadow text-right my-2 mx-5">{{ session("error") }}</div>
        @endif
        <h1 class="text-center mt-2">معلومات المقال</h1>
        <div class="mx-xl-5 mx-md-2 mx-sm-1 ">

        <form action="{{ route('post_create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="float-right"><span class="text-danger">*</span>العنوان</label>
                <input type="text" class="form-control text-right @error('title') is-invalid @enderror" name="title">
                @error('title')
                <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="thumbnail" class="float-right"><span class="text-danger">*</span>الصورة الرئسية</label>
                        <input type="file" name="thumbnail" class="form-control" id="thumbnail" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cat" class="float-right"><span class="text-danger">*</span>الفئة</label>
                        <select name="categorie[]" id="cat" class="selectpicker shadow-sm  border text-right w-100"  multiple data-live-search="true" >
                            @foreach($categories as $cat)
                                <option class="text-right" value="{{$cat->id}}" style="direction: rtl">{{$cat->libelle}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="attachement" class="float-right">الملحقات</label>
                        <input type="file" name="attachement[]" class="form-control" id="attachement" multiple="true">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12"> <label for="dd" class="float-right"><span class="text-danger">*</span>المحتوى</label></div>
                <div class="form-group col-12">
                <textarea name="content" cols="30" rows="4" class="ckeditor @error('content') is-invalid @enderror" id="wysiwyg-editor"></textarea>
                @error('content')
                <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="album" class="float-right">ألبوم الصور</label>
                <input type="file" multiple="true" name="images[]" class="form-control" id="images" onchange="preview_images();">
            </div>
            <div class="row" id="image_preview"></div>
            <button class="btn btn-primary btn-block float-left my-2" type="submit"><span class="fa fa-check"></span>  أنشر </button>
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
        $('select').selectpicker();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

@endsection


