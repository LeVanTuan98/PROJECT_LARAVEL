@extends('admin.layouts.glance')

@section('title')
    Thêm mới tag
@endsection
@section('content')
    <h1> Thêm mới tag</h1>
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
            <form name="tag" action="{{url('admin/content/tag')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên tag</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control1" id="focusedinput" placeholder="Tên tag">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-8">
                        <input type="text" name="slug" value="{{old('slug')}}" class="form-control1" id="focusedinput" placeholder="Slug">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Hình ảnh</label>
                    <div class="col-sm-8">
                        <input type="text" name="images" value="{{old('images')}}" class="form-control1" id="focusedinput" placeholder="Hình ảnh">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Giới thiệu</label>
                    <div class="col-sm-8"><textarea name="intro" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{old('intro')}}</textarea></div>
                </div>

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection

