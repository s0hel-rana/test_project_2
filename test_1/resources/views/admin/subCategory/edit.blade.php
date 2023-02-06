@extends('admin.master')
@section('content')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-6">
            <h3 class="mt-4">Sub Category Update</h3>
            <div class="card mb-4 mt-4">
                <div class="card-body">
                    <form action="{{route('sub-category.update',$sub_category->id)}}" method="post">
                        @if (session('success'))
                            <div class="text-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @csrf
                        <div class="mb-3">
                            <label for="sub-category_name" class="form-label">Sub-Category Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="sub_name" value="{{$sub_category->sub_name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sub-category_description" class="form-label">Select Category</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option selected value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sub-category_description" class="form-label">Description</label>
                            <textarea class="form-control" name="description">{{$sub_category->description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
