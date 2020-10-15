@extends('admin.template')
@section('admin')
    <div class="container">
        <h2 class="text-center">تعديل النوع</h2>
        <x-categorie-form libelle="{{ $categorie->libelle }}" postUrl="{{ 'cat/update/'.$categorie->id }}" btnType="تعديل"></x-categorie-form>
    </div>
@endsection
