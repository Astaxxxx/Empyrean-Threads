@extends('layouts.master')
@section('title', 'products')
@section('content')

    
            
                @foreach ($products as $product)
                    <x-product-box :product = "$product" />
                @endforeach




@endsection