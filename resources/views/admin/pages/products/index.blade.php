@extends('layouts.admin')
@section('title', 'Products')
@section('content')
    <h1 class ="page-title">Products</h1>
    <div class="container">
        <a href="{{route('adminpanel.products.create')}}" class="btn btn-primary">+ &nbsp; Create Product</a>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Products</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>category</th>
                                    <th>colours</th>
                                    <th>Images</th>
                                    <th>published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>
                                        @foreach ($product->colours as $colour)
                                            <span class="badge" style="background: red">{{$colour->name}}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <img src="{{asset('storage/' . $product->image)}}" style="height: 40px;">
                                    </td>
                                    <td>{{$product->created_at}}</td>
                                    <td>
                                        <div class="d-flex" style="gap: 5px;">
                                            <a href="{{route('adminpanel.products.edit', $product->id)}}" class="btn btn-secondary">Edit</a>
                                            <form action="{{route('adminpanel.products.destroy', $product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
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