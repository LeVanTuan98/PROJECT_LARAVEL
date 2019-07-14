@extends('admin.layouts.glance')

@section('title')
    Quản trị khách mua hàng
@endsection
@section('content')
    <h1>    Quản trị khách mua hàng </h1>
    <div style="margin: 20px 0;" class="btn btn-success">
        <a href="{{url ('admin/shop/customer/create')}}">Thêm admin</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số:</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <th scope="row">{{$admin->id}}</th>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>
                            <a href="{{url('admin/users/'.$admin->id.'/edit')}}" class="btn btn-warning">Sửa</a>
                            <a href="{{url('admin/users/'.$admin->id.'/delete')}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $admins->links() }}
        </div>
    </div>

@endsection

