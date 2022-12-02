@extends('layouts.master')
@section('title', 'Checkout')
@section('head')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="icon" href="Images/about-us-icon-.png" />
    <title>Contact Us</title>
  </head>
    <main>
        </section>
        <div class="everythingholder" >
        
          <h1 class="contactTitle">Contact Us</h1>
          <p class="textundertitle">Dont be afraid to contact us with any enquires at any of the details below and we will get back to you as soon as possible</p>
  
          <div class="contactusrow">

            <div class="contactuscolumn">
              <img class="EmailPic" src="{{asset('storage/products/email1.png')}}">
              <h1>Email</h1>
              <p>RealEmpyreanThreads@gmail.com</p>
            </div>

            <div class="contactuscolumn">
              <img class="PhonePic" src="{{asset('storage/products/Phone.png')}}" >
              <h1>Telephone</h1>
              <p>07401987263</p>
            </div>

            <div class="contactuscolumn">
              <img class="AdressPic" src="{{asset('storage/products/Adress copy.png')}}" alt="">
              <h1>Address</h1>
              <p>308 pollos lane <br> b14de</p>
            </div>
            
          </div>
  
  </div>
        

    </main>
    <footer>
      Contact Us
      <a href="contactus.html"
        >Here! <br /><a href="RealEmpyreanThreads@gmail.com"
          >RealEmpyreanThreads@gmail.com</a
        >
      </a>
    </footer>
	<script src="index.js"></script>
  </body>

@endsection