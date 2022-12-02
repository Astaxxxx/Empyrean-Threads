@extends('layouts.master')
@section('name', 'Register')
@section('content')
<link rel="stylesheet" href="{{asset('css/Pages/styles.css')}}">
    <section class="">
        <div class="">
            <title>Welcome, To Empyrean Threads-Sign up</title>
            <div class="top_signUp"><header></header></div>
            <div class="signUp-Form">
            <h1>Sign Up</h1>
            <h4>
            Signing up makes it quicker for you in the future to purchase the
            items you want!
            </h4>
                <form action="{{route('register')}}" method="post">
                     @csrf

                    <div class="">
                        <label for="name">Name</label>
                        <input type="text" id = "name" name = "name" class="@error('name') has-error @enderror" placeholder="john doe">
                        @error('name')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="">
                        <label for="email">Email</label>
                        <input type="email" id = "email" name = "email" class="@error('email') has-error @enderror" placeholder="example@gmail.com">
                        @error('email')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="">
                        <label for="password">Password</label>
                        <input type="password" id = "password" name = "password" class="@error('password') has-error @enderror" placeholder="********">
                        @error('password')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id = "email" name = "password_confirmation" placeholder="********">
                    </div>

                    <div class="field">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </form>
                    

                         <a href="{{route('login')}}">Already a User? Login now</a>
                    
                         <p>Otherwise you can also return <a href="{{route('home')}}">Home</a></p>
                    
                
            </div>
        </div>
    </section>
@endsection