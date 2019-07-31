@extends('admin.layouts.glance')

@section('title')
    Menu-items
@endsection
@section('content')
    <h1>Menu-items</h1>
    <div style="margin: 20px 0;" class="btn btn-success">
        <a href="{{url ('admin/menuitems/create')}}">Thêm menu-item</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số:</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Parent</th>
                    <th>Menu</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($menu_items as $item)
                    <tr>
                        <th scope="row">{{$item['id']}}</th>
                        <td>{{str_repeat('-',$item['level']).' '.$item['name']}}</td>
                        <td>{{$item['parent_id']}}</td>
                        <td>{{$item['menu_id']}}</td>
                        <td>
                            <a href="{{url('admin/menuitems/'.$item['id'].'/edit')}}" class="btn btn-warning">Sửa</a>
                            <a href="{{url('admin/menuitems/'.$item['id'].'/delete')}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
{{--            {{ $menu_items->links() }}--}}
        </div>
    </div>
@endsection
