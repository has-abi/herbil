@extends("admin.template")
@section("admin")
    <h1 class="text-center mt-2 ">  {{ $contact->name }} :رسالة </h1>
<div class="card mx-5 my-3 p-4 text-right">
    <div class="card-header text-center bg-indigo text-white">
        <h2> {{ $contact->email }} :إلى </h2>
    </div>
    <div class="card-body">
        <div class="card border-0 shadow ">
            <div class="card-header bg-light"><h3>{{ $contact->subject }} :الموضوع </h3></div>
            <div class="card-body">
                <p>{{ $contact->content }}</p>
            </div>
        </div>
        <div class="card border-0 shadow my-2 p-4">
            <form action="{{ url("send") }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $contact->email }}" name="email">
                <label for="resp">الجواب</label>
                <textarea name="content" id="resp"  cols="30" rows="4" class="form-control text-right @error('content') is-invalid @enderror"></textarea>
                    @error('content')
                    <div class="alert alert-danger text-right">{{ $message }}</div>
                @enderror
                <button class="btn btn-success shadow my-1"> أرسل <span class="fa fa-send"></span></button>
            </form>
        </div>
    </div>
</div>
@endsection