@extends('admin.master')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mt-4">Edit Category</h3>
                <div class="card mb-4 mt-4">
                    <div class="card-body">
                        <form action="{{route('category.update',$categories->id)}}" method="post">
                            @if (session('success'))
                                <div class="text-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @csrf
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$categories->name}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_description" class="form-label">Category Description</label>
                                <textarea class="form-control" name="description">{{$categories->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
