<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{--<link rel="stylesheet" href="{{asset('css/partials/nav.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/Pages/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/Pages/Auth.css')}}">
    <link rel="stylesheet" href="{{asset('css/Pages/accountsPage.css')}}">
    <link rel="stylesheet" href="{{asset('css/Pages/components/home/productBox.css')}}">
    <link rel="stylesheet" href="{{asset('css/Pages/Product.css')}}">
    <link rel="stylesheet" href="{{asset('css/Pages/productStyling.css')}}">
    <link rel="stylesheet" href="{{asset('css/Pages/components/popUP.css')}}">
    <link rel="stylesheet" href="{{asset('css/Pages/basket.css')}}">
    <link rel="stylesheet" href="{{asset('css/Pages/checkout.css')}}">
    {{--<link rel="stylesheet" href="{{asset('css/Pages/styles.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/Pages/success.css')}}">
    
    <title>@yield('title')</title>
    @yield('head')
</head>
<body>
    @include('layouts.partials.nav')
    <main class ="page">
        @yield('content')
    </main>
    @include('layouts.partials.footer')
</body>
</html>