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
                    <label for="focusedinput" class="col-sm-2 control-label">Home Page</label>
                    <div class="col-sm-8">
                        <select name="homepage">
                            <option value="0" <?php echo ($cat->homepage == 0) ? ' selected' : ''?> >Không hiển thị</option>
                            <option value="1" <?php echo ($cat->homepage == 1) ? ' selected' : ''?>>Hiển thị</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Hình ảnh</label>
                    <div class="col-sm-8">

                        <span class="input-group-btn">
                         <a id="lfm" data-input="thumbnai" data-preview="holder" class="lfm-btn btn btn-primary">
                           <i class="fa fa-picture-o"></i> Choose
                         </a>

                        </span>
                        <input id="thumbnai" class="form-control" type="text" name="images" value="{{$cat->images}}" placeholder="Hình ảnh">

                        <img id="holder" src="{{asset($cat->images)}}" style="margin-top:15px;max-height:100px;">
                    </div>

                </div>

                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Giới thiệu</label>
                    <div class="col-sm-8"><textarea name="intro" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{$cat->intro}}</textarea></div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-8"><textarea name="desc" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{$cat->desc}}</textarea></div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-warning">Sửa</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var domain = "http://localhost/PROJECT_LARAVEL/authen/public/laravel-filemanager";
            $('.lfm-btn').filemanager('image', {prefix: domain});


        });

    </script>
@endsection