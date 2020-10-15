<form action="{{ url($postUrl) }}" method="POST" class="mt-2">
    @csrf
    <div class="form-group">
        <label for="title" class="float-right">العنوان</label>
        <input type="text" value="{{ $title }}" class="form-control text-right @error('title') is-invalid @enderror" name="title">
    </div>
    @error('title')
    <div class="alert alert-danger text-center">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="url" class="float-right">المصدر</label>
        <input type="text" value="{{ $url }}" class="form-control text-right @error('url') is-invalid @enderror" name="url">
    </div>

    @error('url')
    <div class="alert alert-danger text-center">{{ $message }}</div>
    @enderror
    <button class="btn btn-primary btn-block shadow" type="submit">{{ $btnType }}</button>
</form>
