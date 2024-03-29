@extends('admin.layouts.glance')
@section('title')
    Xóa nhãn hàng
@endsection
@section('content')
    <h1>Xóa nhãn hàng: {{$brand->id.' : '.$brand->name}}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form name="brand" action="{{url('admin/shop/brand/'.$brand->id.'/delete')}}" method="post" class="form-horizontal">
                @csrf
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>
@endsection
