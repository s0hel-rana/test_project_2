@extends('admin.master')
@section('content')
    <div class="card-body">
        <h1>Supplier List</h1><br>
        <table class="table table-responsive" id="datatablesSimple">
            <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Name</th>
                <th scope="col">Code</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($suppliers as $key => $data)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->code}}</td>
                    <td>{{$data->address}}</td>
                    <td>
                        <a class="btn btn-primary" href="">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('supplier.delete',$data->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
