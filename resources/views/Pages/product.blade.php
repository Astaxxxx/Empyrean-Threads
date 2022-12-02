@extends('layouts.master')
@section('title', $product->title)
@section('content')

    @if(session()->has('addedTobasket'))
        <section class="push">
            <div class="push-box">
                <div class="push-title">
                    {{session()->get('addedTobasket')}}
                </div>
                <div class="push-actions">
                    <a href="{{route('home')}}" class="btn btn-outlined">Continue shopping</a>
                    <a href="{{route('basket')}}" class="btn btn-primary">Go to basket</a>
                </div>
            </div>
        </section>
    @endif
   <div class="product-page">
    <div class="container">
        <div class="product-page-row">
            <section class="product-page-image">
                <div id="first"><img src="{{asset('storage/' . $product->image)}}" alt="" class="ten"></div>
                <div id="second"><img src="{{asset('storage/products/product1img1.jpg')}}"class="ten"> </div>
                <div id="third"><img src="{{asset('storage/products/product1img3.png')}}" class="ten"> </div>
                

        <div class="small-img-row">
            <div class="small-img-col">
               <button class="b1" onClick="myFunction()"> <img src="{{asset('storage/' . $product->image)}}" width="200px" height="100px" alt=""></button>
            </div>
            <div class="small-img-col">
              <button class="b2" onClick="myFunction2()"><img src="{{asset('storage/products/product1img1.jpg')}}" width="200px" height="100px" alt=""></button>
            </div>
            <div class="small-img-col">
              <button class="b3" onClick="myFunction3()"><img src="{{asset('storage/products/product1img3.png')}}" width="200px" height="100px" alt=""></button>
        </div>
            </section>
            
            <section class="product-page-details">
                <p class="p-title">{{$product->title}}</p>
                <p class="p-price">£{{$product->price}}</p>
                <p class="p-category">{{$product->category->name}}</p>
                <p class="p-description">{{$product->description}}</p>
                <form action="{{route('addTobasket', $product->id)}}" method="post">
                    @csrf
                    <div class="p-form">
                        <div class="p-colours">
                            <label for="colour">Colour</label>
                            <select name="colour" id="colour" required>
                                <option value="">--- Colour ---</option>
                                @foreach ($product->colours as $colour)
                                    <option value="{{$colour->id}}">{{$colour->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="p-quantity">
                            <label for="quanity">Quanity</label>
                            <input type="number" name="quantity" min="1" max="100" value="1" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-basket">Add To Basket</button>
                </form>
            </section>
        </div>
    </div>
   </div>

   <script>
    const myFunction = () => {
        document.getElementById("first").style.display ='block';
        document.getElementById("second").style.display ='none'
        document.getElementById("third").style.display ='none'
        }

        const myFunction2 = () => {
        document.getElementById("second").style.display ='block'
        document.getElementById("first").style.display ='none'
        document.getElementById("third").style.display ='none'
        }

        const myFunction3 = () => {
        document.getElementById("third").style.display ='block'
        document.getElementById("first").style.display ='none'
        document.getElementById("second").style.display ='none'
}
</script>
@endsection