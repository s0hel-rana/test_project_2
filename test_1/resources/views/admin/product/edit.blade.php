@extends('admin.master')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mt-4">Update Product</h3>
                <div class="card mb-4 mt-4">
                    <div class="card-body">
                        <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$product->name}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$product->price}}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{$product->code}}" readonly>
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Select Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option @selected($category->id == $product->category_id)
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sub_category" class="form-label">Select Sub-Category</label>
                                <select class="form-control" name="sub_category_id">
                                    @foreach($sub_categories as $sub_category)
                                        <option @selected($sub_category->id == $product->sub_category_id)
                                            value="{{ $sub_category->id }}">{{ $sub_category->sub_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="brand" class="form-label">Select Brand</label>
                                <select class="form-control" name="brand_id">
                                    @foreach($brands as $key => $brand)
                                        <option @selected($brand->id == $product->brand_id)
                                            value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image" style="margin-bottom: -7px" class="form-label d-block">Image</label>
                                <input type="file" class="form-control w-50 d-inline @error('image') is-invalid @enderror" name="image">
                                <img width="80" src="{{asset($product->image) }}" alt="product">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
