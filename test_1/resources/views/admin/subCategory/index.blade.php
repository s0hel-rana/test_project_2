@extends('admin.master')
@section('content')
    <div class="card-body">
        <h1>Sub Category List</h1><br>
        <table class="table table-responsive" id="datatablesSimple">
            <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sub_cat as $key => $data)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$data->category->name}}</td>
                    <td>{{$data->sub_name}}</td>
                    <td>{{$data->description}}</td>
                    <td>#</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
