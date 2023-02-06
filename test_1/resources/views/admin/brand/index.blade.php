@extends('admin.master')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="mt-4">Brand List</h3>
                <div class="card mb-4 mt-4">
                    @if (session('success'))
                        <div class="text-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-responsive" id="datatablesSimple">
                            <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $key => $data)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('brand.edit',$data->id)}}">Edit</a>
                                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('brand.delete',$data->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
