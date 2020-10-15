
    <form action="{{ url($postUrl) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="libelle" class="float-right">الإسم</label>
            <input type="text" value="{{ $libelle }}" class="form-control text-right @error('libelle') is-invalid @enderror" id="libelle" name="libelle">
        @error('libelle')
            <div class="alert alert-danger text-center">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-warning btn-block" type="submit">{{ $btnType }}</button>
    </form>

