@extends('admin.template')
@section('custum_styles')
    <link rel="stylesheet" href="{{asset("css/admin.css")}}">
@endsection
@section('admin')
    <h2 class="text-center my-2 mt-3">معلوماتي الشخصية</h2>
        <div class="container d-flex justify-content-center my-4">
            <form action="{{ url('user_update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email" class="float-right">البريد الإلكتروني</label>
                    <input type="email" id="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $userInfo->email }}">
                    @error('email')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pwd" class="float-right">كلمة السر</label>
                    <input type="password" id="pwd" class="form-control @error('pwd') is-invalid @enderror" name="pwd">
                    @error('pwd')
                    <div class="alert alert-danger my-2">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-success shadow btn-block" id="validate" type="submit">تعديل</button>
            </form>
        </div>
@endsection
@section("custum_scripts")
    <script src="{{asset("js/admin.js")}}"></script>

@endsection
