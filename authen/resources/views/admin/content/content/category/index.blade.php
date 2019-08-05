@extends('admin.layouts.glance')

@section('title')
    Danh mục nội dung
@endsection
@section('content')
    <h1> Danh mục nội dung </h1>
    <div style="margin: 20px 0;" class="btn btn-success">
        <a href="{{url ('admin/content/category/create')}}">Thêm danh mục</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số:</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Slug</th>
                    <th>Hình ảnh</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cats as $cat)
                    <tr>
                        <th scope="row">{{$cat->id}}</th>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->slug}}</td>
                        <td><img src="{{asset($cat->images)}}" style="margin-top:15px;max-height:100px;"></td>
                        <td>
                            <a href="{{url('admin/content/category/'.$cat->id.'/edit')}}" class="btn btn-warning">Sửa</a>
                            <a href="{{url('admin/content/category/'.$cat->id.'/delete')}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $cats->links() }}
        </div>
    </div>
@endsection

