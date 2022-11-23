@extends('layouts.admin')
@section('title', 'Edit Products')
@section('content')
    <h1 class ="page-title">Edit Products</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('adminpanel.products.edit', $products->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-goup mb-3">
                                        <label for="name">Title</label>
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$products->title}}">
                                        @error('title')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-goup mb-3">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{$products->price / 100}}">
                                    @error('price')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$products->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                                <img src="{{asset('storage/' . $products->image)}}" width="100px", height="100px">
                            </div>
                        </div>

                        <div class="row mb-3">
                                <div class="form-goup mb-3">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
                                    @error('price')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                               <div class="form-group">
                                <label for="colours">Colour</label>
                                @foreach($colours as $colour)
                                    <div class="form-checkform-check-inline">
                                        <input type="checkbox" name="colours[]" class="form-check-input" id="{{$colour->name}}" value="{{$colour->id}}" {{in_array($colour->id, $products->colours->pluck('id')->toArray()) ? 'checked' : ''}}>
                                        <label for="{{$colour->name}}" class="form-check-label">{{$colour->name}}</label>
                                    </div>
                                @endforeach
                                @error('colour')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                                </div>
                               </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <textarea name="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">
                                        {{$products->description}}
                                    </textarea>
                                    @error('description')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection