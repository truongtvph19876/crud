<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * Hiển thị danh sách
     */
    public function index()
    {
        $products = Products::query()->get();
        return view('products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * Hiển thị form tạo mới
     */
    public function create()
    {
        return view('products.add');
    }

    /**
     * Store a newly created resource in storage.
     * Xử lý dữ liệu form tạo mới - phương thức POST
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $imagePath = "";
        if ($request->hasFile('image')) {
            $destinationPath = 'assets/images/';
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $request->file('image')->move(public_path($destinationPath), $imageName);
            $imagePath = $destinationPath . $imageName;
        }

        Products::create([...$data, 'image'=> $imagePath]);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     * Hiển thị 1 sản phẩm
     */
    public function show(Products $product)
    {
        return "Product id: " . $product->id;
    }

    /**
     * Show the form for editing the specified resource.
     * Hiển thị form sửa sản phẩm
     */
    public function edit(Products $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     * Xử lí dữ liệu form sửa sản phẩm - phương thức PUT
     */
    public function update(Request $request, Products $product)
    {
        $product->update($request->all());
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     * Xóa sản phẩm - phương thức DELETE
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
