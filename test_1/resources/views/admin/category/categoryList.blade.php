@extends('admin.master')
@section('content')
    <div class="card-body">
        <h1>Category List</h1><br>
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
            @foreach($categories as $key => $data)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$data->name}}</td>
                <td>{{$data->description}}</td>
                <td>#</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection