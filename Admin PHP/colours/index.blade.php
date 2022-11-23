@extends('layouts.admin')
@section('title', 'Colours')
@section('content')

   <h1 class= "page-title">Colours</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Create colour</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('adminpanel.colour.store')}}" method="post">
                            @csrf
                            <div class="form-goup mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                                <div class="form-goup mb-3">
                                <label for="code">Code</label>
                                <input type="colour" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{old('colour')}}">
                                @error('code')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Colours</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Total Product</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colours as $colour)
                                <tr>
                                    <th>{{$colour->id}}</th>
                                    <th>{{$colour->name}}</th>
                                    <th>{{$colour->code}}</th>
                                    <th>-</th>
                                    <th>{{$colour->created_at}}</th>
                                    <td>
                                        <form action="{{route('adminpanel.colour.destroy', $colour->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit" class="btn btn-danger">Delete</button>
                                        </form>
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