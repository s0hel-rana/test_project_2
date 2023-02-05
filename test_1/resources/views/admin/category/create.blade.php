@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="mt-4">Create Category</h2>
                <form action="{{route('category.store')}}" method="post">
                    @if (session('success'))
                        <div class="text-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Category Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_description" class="form-label">Category Description</label>
                        <textarea class="form-control" name="description" placeholder="Category Description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">save</button>
                </form>
            </div>
        </div>

    </div>
@endsection
