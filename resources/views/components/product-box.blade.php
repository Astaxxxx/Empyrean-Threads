

<section class="box">

    <div class="image">
        <img src="{{asset('storage/' . $product->image)}}" style= "height: 100px;">
       
    </div>
    <a href = "{{route('product', $product->id)}}" class="product-box">
    <div class="title">{{$product->title}}</div>
    <div class="plates">
        @foreach($product->colours as $colour)
            <div class="plate" style="background: red"></div>
        @endforeach
    </div>
    <div class="category">clothes</div>
    <div class="price">£{{$product->price}}</div>
    </a>
</section>