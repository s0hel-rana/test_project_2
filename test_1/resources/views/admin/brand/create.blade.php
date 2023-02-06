@extends('admin.master')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mt-4">Brand List</h3>
                <div class="card mb-4 mt-4">
                    <div class="card-body">
                        <form action="{{route('brand.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="brand_name" class="form-label">Brand Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Brand Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="brand_description" class="form-label">Brand Description</label>
                                <textarea class="form-control" name="description" placeholder="Brand Description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
