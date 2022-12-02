@extends('layouts.master')
@section('title', 'Checkout')
@section('head')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('js/stripe.js')}}"></script>
    <style>
        .StripeElement{
            height: 40px;
            padding: 10px 12px;
            width: 100%;
            color: #32325d;
            background-color: white;
            border: 1px solid transparent;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

    </style>
@endsection
@section('content')

    <header class="page-header">
        <h1>Checkout</h1>
        <h3 class="basket-amount">${{App\Models\Basket::Amount()}}</h3>
    </header>

    <main class="checkout-page">
        <div class="container">
            <div class="checkout-form">
                <form action="{{route('stripeCheckout')}}" id="payment-form" method="post">
                    @csrf
                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" id = "name" name = "name" class="@error('name') has-error @enderror" placeholder="john doe" value="{{old('name') ? old('name') : auth()->user()->name}}">
                        @error('name')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id = "email" name = "email" class="@error('email') has-error @enderror" placeholder="john doe" value="{{old('email') ? old('email') : auth()->user()->email}}">
                        @error('email')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="phone">Phone</label>
                        <input type="text" id = "phone" name = "phonw" class="@error('phone') has-error @enderror" placeholder="john doe" value="{{old('phone') ? old('phone') : auth()->user()->phone}}">
                        @error('phone')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                       <label for="country">Country</label>
                       <select name="country" id="country">
                            <option value="">---Select Country---</option>
                            <option value="United Kingdom">United Kingdom</option>
                       </select>
                        @error('phone')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <input type="hidden" name = "payment_method_id" id = "payment_method_id" value ="" > 

                    <label>
                        card details
                        <div id="card-element"></div>
                    </label>
                    <button class= "btn btn-primary btn-block" type="submit">Submit payment</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        var stripe = Stripe('pk_test_51M8eBoEpf7ECBDDvSiPygQxxXHhyjMi6ItDVTTPX0QuWNvSDx1QYr7j6P2aUeQDZrykBxSwzHSGI6lkJa6SEovYZ00B5ZiHEgP');

        var elements = stripe.elements();

        var style = {
            base: {
                color:"#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            },
        };

        var cardElement = elements.create('card', {style: style});
        cardElement.mount('#card-element');

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event){
            event.preventDefault();

            stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {

                name :'Jenny Rosen',
                },
            }).then(stripePaymentMethodHandler);
        });

        function stripePaymentMethodHandler(result) {
            if (result.error) {

            } else {
                document.getElementById('payment_method_id').value = result.paymentMethod.id
                form.submit();
            }
        }
    </script>
@endsection