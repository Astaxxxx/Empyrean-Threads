@extends('layouts.master')
@section('title', 'Cart')
@section('content')

    
        <h1>Cart</h1>
        <h3 class="#</h3>
    </header>

    
        <section class="pop-up">
            <div class="pop-up-box">
                <div class="pop-up-title">
                    
                </div>
                <div class="pop-up-actions">
                    <a href="#" class="btn btn-outlined">Continue shopping</a>
                    <a href="#" class="btn btn-primary">checkout</a>
                </div>
            </div>
        </section>
    

    <main class="cart-page">
        <div class="container">
            <div class="cart-table">
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
                                <tr>
                                    <td>
                                        <a href="#" class="cart-item-title">
                                            <img src="#"  alt="#">
                                            <p>Lorem Ipsum</p>
                                        </a>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form action="#" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">X</button>
                                        </form>
                                    </td>
                                </tr>    
                            @endforeach
                            <tr class="cart-total">
                                <td colspan="4" style="text-align: right;">Total</td>
                                <td>#</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="6" class="empty-cart">Your Cart is Empty</td>
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