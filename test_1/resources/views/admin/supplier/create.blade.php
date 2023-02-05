@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="mt-4">Add Supplier</h2>
                <form action="{{route('supplier.store')}}" method="post">
                    @if (session('success'))
                        <div class="text-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Supplier Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Supplier Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="code" placeholder="Code">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" name="status">
                                <option value="Active">Active</option>
                                <option value="De-Active">De-Active</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" placeholder="Address"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">save</button>
                </form>
            </div>
        </div>

    </div>
@endsection
