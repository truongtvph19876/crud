@extends('layouts.admin')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @forelse($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td><img srcset="{{ $product->image }} 10x"></td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 0, '.', '.') }} VND</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    @if($product->status)
                        <span class="badge bg-success">Còn hàng</span>
                    @else
                        <span class="badge bg-danger">Hết hàng</span>
                   @endif
                </td>
                <td>
                    <form action="{{ route('product.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('product.show', $product) }}" class="btn btn-info">SHOW</a>
                        <a href="{{ route('product.edit', $product) }}" class="btn btn-warning">EDIT</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Xác nhận xóa')">DELETE</button>
                    </form>
                </td>
            </tr>
        @empty
            <span class="text-center">Không có sản phẩm nào</span>
        @endforelse

        </tbody>
    </table>
@endsection
