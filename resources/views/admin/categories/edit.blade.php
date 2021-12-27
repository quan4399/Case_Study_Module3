@extends('admin.master')
@section('content-admin')
    @can('admin')
        <h5 class="card-header">Cập nhật danh mục</h5>
        <form class="m-5" enctype="multipart/form-data" method="post" action="{{route('categories.edit',$category->id)}}">
            @csrf
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
            </div>

            <div class="form-group">
                <label for="name">Số lượng</label>
                <input type="number" class="form-control" id="qantity" name="quantity" value="{{$category->quantity}}">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    @endcan
@endsection
