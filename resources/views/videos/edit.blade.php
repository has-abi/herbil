@extends("admin.template")

@section("admin")
    <div class=" mx-5 my-5 ">
        <h1 class="text-center">تعديل فيديوا</h1>
        <x-video-from title="{{ $v->title }}" url="{{ $v->url }}" postUrl="{{ 'post_update/'.$v->id }}" btnType="تعديل"></x-video-from>
    </div>
@endsection
