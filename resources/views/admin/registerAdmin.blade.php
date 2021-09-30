<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="{{asset('resources/admin/theme-assets/css/style-login-admin.css')}}">
    {{-- <script src="{{ asset('resources/js/scripts.js') }}"></script> --}}
    
</head>
<body>

<div class="wrapper">
  <h2>SignUp Form</h2>
  <div id="alert-error">
  <div id="error_message">
    @if (Session::has('message'))
      {{Session::get('message')}} 
      {{Session::forget('message')}}
    
    @endif
  </div>
  </div>
  <form id="myform" onsubmit="return validate();" method="POST" action="{{url('/registerAdmin')}}" id="register_form">
    @csrf
    <div class="input_field">
        <input type="text" name="name" placeholder="User Name" id="name">
    </div>
    <div class="input_field">
        <input type="text" placeholder="Email" name="email" id="email">
    </div>
    <div class="input_field">
        <input required id="password" name="password" type="password" placeholder="Password" />
    </div>
    <div class="input_field">
    <input required type="password" id="confirmPassword" placeholder="Confirm Your Password" />
    </div>
    <div class="input_field">
        <input type="text" placeholder="Phone Number" name="phone" id="phone">
    </div>
    
    {{-- <div class="input_field">
        <textarea placeholder="Message" id="message"></textarea>
    </div> --}}
    <div class="btn">
        <input type="submit" id="submit">
    </div>
  </form>
</div>
<script src="{{ asset('resources/js/scripts.js') }}"></script>
</body>
</html>