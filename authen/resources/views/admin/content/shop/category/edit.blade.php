@extends('admin.layouts.glance')
@section('title')
    Sửa danh mục
@endsection
@section('content')
    <h1>Sửa danh mục: {{$cat->id.' : '.$cat->name}}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="form-three widget-shadow">
            <form name="category" action="{{url('admin/shop/category/'.$cat->id)}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên danh mục</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control1" id="focusedinput" value="{{$cat->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-8">
                        <input type="text" name="slug" class="form-control1" id="focusedinput" value="{{$cat->slug}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Hình ảnh</label>
                    <div class="col-sm-8">
                        <input type="text" name="images" class="form-control1" id="focusedinput" value="{{$cat->images}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Giới thiệu</label>
                    <div class="col-sm-8"><textarea name="intro" id="txtarea1" cols="50" rows="4" class="form-control1">{{$cat->intro}}</textarea></div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-8"><textarea name="desc" id="txtarea1" cols="50" rows="4" class="form-control1">{{$cat->desc}}</textarea></div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-warning">Sửa</button>
                </div>
            </form>
        </div>
    </div>
@endsection