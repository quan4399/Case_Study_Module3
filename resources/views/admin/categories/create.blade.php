@extends('admin.master')
@section('content-admin')
    @can('admin')
        <h5 class="card-header">Thêm mới danh mục</h5>
        <form class="m-5" enctype="multipart/form-data" method="post" action="{{route('categories.create')}}">
            @csrf
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="">
            </div>

            <div class="form-group">
                <label for="name">Số lượng</label>
                <input type="number" class="form-control" id="name" name="quantity" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
    @endcan
@endsection
