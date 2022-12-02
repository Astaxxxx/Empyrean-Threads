@extends('layouts.master')
@section('title', 'Basket')
@section('content')

    <header class="page-header">
        <h1>Basket</h1>
        <h3 class="basket-amount">£{{App\Models\Basket::Amount()}}</h3>
    </header>

    @if(session()->has('success'))
        <section class="push">
            <div class="push-box">
                <div class="push-title">
                    {{session()->get('success')}}
                </div>
                <div class="push-actions">
                    <a href="{{route('basket')}}" class="btn btn-outlined">Continue shopping</a>
                    <a href="{{route('basket')}}" class="btn btn-primary">checkout</a>
                </div>
            </div>
        </section>
    @endif

    <main class="basket-page">
        <div class="container">
            <div class="basket-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>colour</th>
                            <th>Price</th>
                            <th>Quanity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(session()->has('basket') && count(session()->get('basket')) > 0)
                            @foreach (session()->get('basket') as $key => $item)
                                <tr>
                                    <td>
                                        <a href="{{route('product', $item['product']['id'])}}" class="basket-item-title">
                                            <img src="{{asset('storage/' . $item['product']['image'])}}"  alt="">
                                            <p>{{$item['product']['title']}}</p>
                                        </a>
                                    </td>
                                    <td>{{$item['colour']['name']}}</td>
                                    <td>£{{$item['product']['price']}}</td>
                                    <td>{{$item['quantity']}}</td>
                                    <td>£{{App\Models\Basket::unitPrice($item)}}</td>
                                    <td>
                                        <form action="{{route('removeFrombasket', $key)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">X</button>
                                        </form>
                                    </td>
                                </tr>    
                            @endforeach
                            <tr class="basket-total">
                                <td colspan="4" style="text-align: right;">Total</td>
                                <td>>£{{App\Models\Basket::Amount()}}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="6" class="empty-basket">Your Basket is Empty</td>
                            </tr>
                        @endif
                    </tbody>
                </table>        
            </div>
            <div class="car-actions">
                <a href="{{route('checkout')}}" class="btn">go to checkout</a>
            </div>
        </div>
    </main>

@endsection