@extends('layouts.master')
@section('name', 'Login')
@section('content')

    <section class="">
        <div class="">
            <div class="login-title"></div>
            <div class="loginForm">
                <form action="{{route('login')}}" method="post">
                     @csrf

                    <div class="field">
                    <h1>Login</h1>
                        <label for="email">Email</label>
                        <input type="email" id = "email" name = "email" class="@error('email') has-error @enderror" placeholder="example@gmail.com">
                        @error('email')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" id = "password" name = "password" class="@error('password') has-error @enderror" placeholder="********">
                        @error('password')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>

                    <a href="{{route('register')}}">New User? Register now</a>
                    Otherwise you can return <a href="{{route('home')}}"> Home</a>

                </form>
            </div>
        </div>
    </section>
@endsection