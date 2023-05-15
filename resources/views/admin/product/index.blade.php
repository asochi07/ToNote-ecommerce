@extends('layouts.admin')

@section('content-body')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>Products Page</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Selling Price</th>
                                        <th>Original Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->small_description }}</td>
                                            <td>{{ $item->selling_price }}</td>
                                            <td>{{ $item->original_price }}</td>
                                            <td>
                                                <img class="cate-image" src="{{ asset('assets/uploads/product/'.$item->image)}}" alt="{{$item->name}}">
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-sm"><a href="{{ url('edit-product/'.$item->id) }}">Edit</a></button>
                                                <button class="btn btn-danger btn-sm"><a href="{{ url('delete/'.$item->id) }}">Delete</a></button>
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
    </div>

@endsection