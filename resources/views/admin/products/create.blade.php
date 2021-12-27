@extends('admin.master')
@section('content-admin')
    <h5 class="card-header">Thêm mới sản phẩm</h5>
    <form class="m-5" enctype="multipart/form-data" method="post" action="{{route('products.create')}}">
        @csrf
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="">
        </div>
        <div class="form-group">
            <label for="brand">Tên thương hiệu</label>
            <select class="form-control" name="brand" id="brand">
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>

             <label for="brand">Thể loại sản phẩm</label>
            </select><select class="form-control" name="category" id="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Số lượng</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="">
        </div>

        <div class="form-group">
            <label for="price">Giá tiền</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="">
        </div>

        <div class="form-group">
            <label for="discount">Discount</label>
            <input type="number" class="form-control" id="discount" name="discount" placeholder="">
        </div>

        <div class="form-group">
            <label for="tag">Tag</label>
            <input type="text" class="form-control" id="tag" name="tag" placeholder="VD: shoes,colothing,...">
        </div>




            <label for="">Tiêu biểu</label><br>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="featured" class="custom-control-input" value="1" >
            <label class="custom-control-label" for="customRadioInline1">Có</label>
        </div>


        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="featured" class="custom-control-input" value="0">
            <label class="custom-control-label" for="customRadioInline2" >Không</label>
        </div>
        <br><br>

        <div class="form-group">
            <label for="description">Mô tả sản phẩm</label>
            <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Tạo mới</button>
    </form>
@endsection
