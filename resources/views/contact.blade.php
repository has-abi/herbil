@extends("layouts.guest")
@section("custum_styles")
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/contact.css") }}">
@endsection
@section('title')
    إتصل بنا
@endsection
@section("template")
    <x-navbar></x-navbar>
    <br />
    <div class="row">
        <div class="col-md-2"></div>
        <div
            class="col-md-8"
            style="
            text-align: center;
            padding: 50px;
            background-color: #ececec;
            border-bottom-left-radius: 25%;
            border-top-right-radius: 30%;
          "
        >
            <h1>اتـصـل بـنـا</h1>
            <h4>جـمـاعـة تـامـنـصـورت</h4>
            <br />
            <form action="{{ url('contact') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="الإيميل" name="email"/>
                        @error('email')
                        <div class="alert alert-success shadow mx-5 text-right my-2">{{ $message }}</div>
                        @enderror
                        <br />
                    </div>
                    <br />
                    <div class="col-md-6">
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="الإسم الكامل"
                            name="name"
                        />
                        @error('name')
                        <div class="alert alert-success shadow mx-5 text-right my-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-6">
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" placeholder="رقم الهاتف" name="phone" />
                        @error('phone')
                        <div class="alert alert-success shadow mx-5 text-right my-2">{{ $message }}</div>
                        @enderror
                        <br />
                    </div>
                    <br />
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="الموضوع" name="subject"/>

                        @error('subject')
                        <div class="alert alert-success shadow mx-5 text-right my-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12">
              <textarea
                  class="form-control @error('content') is-invalid @enderror"
                  rows="4"
                  cols="2"
                  placeholder="اكتب لنا رسالتك او مشكلتك هنا مفصلة وشكرا ..."
                  name="content"
              ></textarea>
                        @error('content')
                        <div class="alert alert-success shadow mx-5 text-right my-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn shadow  btn-block btn-custom " >
                            <span class="fa fa-send"></span>  أرسل
                        </button>
                    </div>
                </div>
            </form>
            @if(session("success"))
                <div class="alert alert-success shadow my-2 ml-5 text-right">{{ session("success") }}</div>
            @endif
            @if(session("error"))
                <div class="alert alert-danger shadow mx-5 text-right">{{ session("error") }}</div>
            @endif
        </div>

        <div class="col-md-2"></div>
    </div>

    <br />
    <x-footer></x-footer>
@endsection
@section("custum_scripts")
    <script src="{{ asset("js/scroll.js") }}"></script>
@endsection
