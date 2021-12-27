@extends('admin.master')
@section('content-admin')
    @can('admin')
        <div class="col-12 mt-2">
            <a class="btn btn-success" href="{{ route('categories.create') }}">Thêm mới</a>
        </div>
        <div class="card mt-2">
            <h5 class="card-header">Danh mục sản phẩm</h5>
            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Số lượng</th>
                        <th>action</th>
                    </tr>
                    @forelse($categories as $key => $category)
                        <tr id="product-item-{{$category->id}}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{$category->quantity}}</td>
                            <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Cập nhật</a>
                            <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger" onclick="confirm('are you sure ?')">Xóa</a>
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
