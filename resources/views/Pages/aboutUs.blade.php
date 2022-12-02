@extends('layouts.master')
@section('name', 'Account')
@section('content')
 
  <body>
    <!--Main content of the about us page-->
    <section class="about">
      <div class="content">
        <img src="{{asset('storage/products/Screenshot_2022-11-13_at_14.49.23.png')}}" />
        <div class="text">
          <h1>About Us:</h1>
          <h5>Empyrean <span>Threads</span></h5>
          <p>
            At Empyrean Threads, we believe that students deserve high quality
            apparel with affordability in mind. After several years of
            purchasing clothing which didn’t suit our needs and emptied our
            wallets, we decided to take action into our own hands. Founded by a
            group of 8, we went to work to fill this gap in the market and have
            created a new line of clothing which we at Empyrean Threads believe
            have ticked our three core values, design, affordability, and
            comfort. Join us in a new era of fashion and click on that buy
            button……Go on! what you waiting for???
          </p>
          <a href="contactUs.html"
            ><button type="button">Find out more!</button></a
          >
        </div>
      </div>
    </section>

    <!--Reference to JS code-->
    <script src="index.js"></script>
    
  </body>
</html>
@endsection
