@extends('admin.layouts.glance')

@section('title')
    Banners
@endsection
@section('content')
    <h1>  Banners </h1>
    <div style="margin: 20px 0;" class="btn btn-success">
        <a href="{{url ('admin/banners/create')}}">Thêm Banner</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số: {{$total}}</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Link</th>
                    <th>Hình ảnh</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($banners as $banner)
                    <tr>
                        <th scope="row">{{$banner->id}}</th>
                        <td>{{$banner->name}}</td>
                        <td>{{$banner->link}}</td>
                        <td><img src="{{asset($banner->image)}}" style="margin-top:15px;max-height:100px;"></td>
                        <td>
                            <a href="{{url('admin/banners/'.$banner->id.'/edit')}}" class="btn btn-warning">Sửa</a>
                            <a href="{{url('admin/banners/'.$banner->id.'/delete')}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $banners->links() }}
        </div>
    </div>
@endsection

