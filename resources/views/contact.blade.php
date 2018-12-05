@extends('layouts.app_master')

@section('title', 'Contact')

@section('main-content')
   
<div>
  <h1>
  
  </h1>
</div>

<div class="contact">
    <div class="contact-form">
        <form id="contact-form" method="post" action="">
        <input name="name" type="text" class="form-control" placeholder="Your Name" required>
        <br>
        <input name="email" type="email" class="form-control" placeholder="Your Email" required>
        <br>
        <textarea name="message" class="form-control" placeholder="Message" row="4" 
        required></textarea><br>
      
        <input type="submit" class="form-control submit" value="SEND MESSAGE">
        </form>
      </div>
</div>


   
@endsection