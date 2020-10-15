@extends("layouts.app")
@section("custum_styles")
    <link rel="stylesheet" href="{{asset("css/admin.css")}}">
@endsection
@section("template")
    @isset($error)
        <div class="alert alert-danger shadow-sm my-2 mx-5 text-center">{{ $error }}</div>
    @endisset
    <div class="d-flex justify-content-center" style="margin-top: 150px">
        <form action="{{ url('login') }}" method="POST" class="card shadow-sm p-4 border-0">
           @csrf
            <div class="form-group">
                <label for="email" class="float-right">البريد الإلكتروني</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                @error('email')
                    <div class="alert alert-danger my-2 text-center">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="float-right">كلمة السر</label>
                <input type="password" class="form-control @error('email') is-invalid @enderror" name="password" id="password">
                @error('password')
                <div class="alert alert-danger my-2 text-center">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn bg-indigo text-white btn-block shadow" type="submit">تسجيل الدخول</button>
        </form>
    </div>

@endsection
