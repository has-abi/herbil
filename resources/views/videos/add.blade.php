@extends("admin.template")

@section("admin")
    <div class=" mx-5 my-5 ">
        <h1 class="text-center">أنشر فيديوا</h1>
        <x-video-from title="" url="" postUrl="video_post" btnType="أنشر"></x-video-from>
    </div>
@endsection
