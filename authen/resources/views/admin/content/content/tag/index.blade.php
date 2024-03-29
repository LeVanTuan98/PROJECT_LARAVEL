@extends('admin.layouts.glance')

@section('title')
    Quản trị tag
@endsection
@section('content')
    <h1> Quản trị tag </h1>
    <div style="margin: 20px 0;" class="btn btn-success">
        <a href="{{url ('admin/content/tag/create')}}">Thêm tag</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số:  {{$total}}</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Tác giả</th>
                    <th>Lượt xem</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                        <td><img src="{{asset($tag->images)}}" style="margin-top:15px;max-height:100px;"></td>
                        <td>{{$tag->author_id}}</td>
                        <td>{{$tag->view}}</td>
                        <td>
                            <a href="{{url('admin/content/tag/'.$tag->id.'/edit')}}" class="btn btn-warning">Sửa</a>
                            <a href="{{url('admin/content/tag/'.$tag->id.'/delete')}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $tags->links() }}
        </div>
    </div>

@endsection

