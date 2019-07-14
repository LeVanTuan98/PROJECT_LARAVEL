@extends('admin.layouts.glance')

@section('title')
    Quản trị Media
@endsection
@section('content')
    <h1> Quản trị Media </h1>
    <div style="margin-top: 30px">
        <iframe src="http://localhost/PROJECT_LARAVEL/authen/public/laravel-filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
    </div>

@endsection

