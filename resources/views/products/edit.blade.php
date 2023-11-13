@extends('layouts.admin')

@section('content')
    <h2 class="text-center">Cập nhật sản phẩm</h2>
    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input type="text" id="name" name="name" placeholder="Tên sản phẩm" class="form-control" value="{{ $product->name }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="price" class="form-label">Giá sản phẩm</label>
                    <input type="number" id="price" name="price" placeholder="Giá sản phẩm" class="form-control" value="{{ $product->price }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input type="number" id="quantity" name="quantity" placeholder="Số lượng sản phẩm" class="form-control" value="{{ $product->quantity }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="image" class="form-label">Ảnh sản phẩm</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group mb-3">
                    <label for="desc">Mô tả</label>
                    <textarea id="desc" name="description" class="form-control">value="{{ $product->description }}"</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-select">
                        <option value="0" @if($product->status == 0) selected @endif>Hết hàng</option>
                        <option value="1" @if($product->status == 1) selected @endif>Còn hàng</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('product.index') }}" class="btn btn-warning">Quay lại</a>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection
