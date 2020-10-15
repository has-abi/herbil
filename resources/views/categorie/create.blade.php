@extends('admin.template')
@section('admin')
    <h2 class="text-center my-3">أضف نوع</h2>
    <div class="d-flex justify-content-center">
    <x-categorie-form libelle="" postUrl="cat/store" btnType="أضف"></x-categorie-form>
    </div>
@endsection
