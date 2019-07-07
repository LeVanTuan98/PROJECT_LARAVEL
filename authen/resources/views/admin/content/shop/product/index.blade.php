@extends('admin.layouts.glance')

@section('title')
    Quản trị sản phẩm
@endsection
@section('content')
    <h1>Quản trị sản phẩm</h1>
    <div style="margin: 20px 0;" class="btn btn-success">
        <a href="{{url ('admin/shop/product/create')}}">Thêm danh mục</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số:</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Giá niêm yết</th>
                    <th>Giá bán</th>
                    <th>Số lượng tồn kho</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->images}}</td>
                        <td>{{$product->priceCore}}</td>
                        <td>{{$product->priceSale}}</td>
                        <td>{{$product->stock}}</td>
                        <td>
                            <a href="{{url('admin/shop/product/'.$product->id.'/edit')}}" class="btn btn-warning">Sửa</a>
                            <a href="{{url('admin/shop/product/'.$product->id.'/delete')}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>

@endsection

