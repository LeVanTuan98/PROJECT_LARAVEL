@extends('admin.layouts.glance')

@section('title')
    Quản trị danh mục sản phẩm
@endsection
@section('content')
    <h1>Quản trị danh mục sản phẩm</h1>
    <div style="margin: 20px 0;" class="btn btn-success">
        <a href="{{url ('admin/shop/category/create')}}">Thêm danh mục</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số:  {{$total}}</h4>
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
                            <a href="{{url('admin/shop/category/'.$cat->id.'/edit')}}" class="btn btn-warning">Sửa</a>
                            <a href="{{url('admin/shop/category/'.$cat->id.'/delete')}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $cats->links() }}
        </div>
    </div>

@endsection
