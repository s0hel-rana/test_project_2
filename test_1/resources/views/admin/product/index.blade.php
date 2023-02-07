@extends('admin.master')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="mt-4">Product List</h3>
                <div class="card mb-4 mt-4">
                    <div class="card-body">
                        <table class="table table-responsive" id="datatablesSimple">
                            <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Sub-Category</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key => $data)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->code}}</td>
                                    <td>{{number_format($data->price,2).' Tk'}}</td>
                                    <td>{{$data->category->name}}</td>
                                    <td>{{$data->sub_category->sub_name}}</td>
                                    <td>{{$data->brand->name}}</td>
                                    <td>
                                        <img width="100" src="{{asset($data->image) }}" alt="product photo">
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('product.edit',$data->id)}}">Edit</a>
                                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('product.delete',$data->id)}}">Delete</a>
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
