@extends('admin.master')
@section('content-admin')
    @can('admin')
    <div class="col-12 mt-2">
        <a class="btn btn-success" href="{{ route('products.create') }}">Thêm mới</a>
    </div>
    <div class="card mt-2">
        <h5 class="card-header">Danh sách sản phẩm</h5>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th><input type="checkbox"></th>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Thương hiệu</th>
                    <th>Hình ảnh</th>
                    <th>Thể loại sản phẩm</th>
                    <th>Nhãn</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    <th>Discount</th>
                    <th>action</th>
                </tr>
                @forelse($products as $key => $product)
                    <tr id="product-item-{{$product->id}}">
                        <td><input type="checkbox" class="product-checked" value="{{$product->id}}"></td>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{$product->brand->name}}</td>
                        <td> <img src="{{asset('storage/img/products/'.$product->productImages[0]->path)}}" width="50" alt="không có ảnh"></td>
                        <td>{{$product->productCategory->name ?? 'Chưa phân loại' }}</td>
                        <td>{{$product->tag}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{ number_format($product->price) }} </td>
                        <td>{{number_format($product->discount)}}</td>
                        <td><a href="{{ route('products.update', $product->id) }}" class="btn btn-primary">Cập nhật</a>
                        <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger" onclick="confirm('mày có chắc không ')">Xóa</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No data</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
    @endcan
@endsection



