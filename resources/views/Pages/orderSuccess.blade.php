@extends('layouts.master')
@section('title', 'Sucess of order')
@section('content')

    <header class="success">
        <h1>Order has been placed</h1>
    </header>

    <section class="success">
        <div class="container">
            <h2>your order id is: {{$order->id}}</h2>
        </div>
    </section>

@endsection