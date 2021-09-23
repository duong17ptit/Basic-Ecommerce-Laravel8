<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign In</title>
	<link rel="stylesheet" href="{{asset('resources/admin/theme-assets/css/style-login-admin.css')}}">
  
	<!-- <script src="scripts.js"></script> -->
</head>
<script> 
        
    function validate()
    { 
         var username = document.form.username.value; 
         var password = document.form.password.value;
     
         if (username == null || username== "")
         { 
         alert("Tai khoan khong duoc de trong"); 
         return false; 
         }
         else if(password == null || password== "")
         { 
         alert("Mat Khau khong duoc de trong"); 
         return false; 
         } 
         else if(password != "admin" && password != "admin"){
            alert(" Đăng nhập thất bại");     
            event.preventDefault();
            return false;
         }
         else if(password == "admin" && password != "admin"){
            alert(" Đăng nhập thất bại");     
            event.preventDefault();
            return false;
         }
        
    }
    </script> 
<body>

<div class="wrapper">
  <h2>Sign In</h2>
  <div id="error_message">
    @if (Session::has('message'))
      {{Session::get('message')}} 
      {{Session::forget('message')}}
    
    @endif
  </div>
        {{-- @if (Session::has('message'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							{{Session::get('message')}} 
							{{Session::forget('message')}}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						  </div>	
		    @endif --}}
  <form name="form" method="POST" action="{{URl("/checkAdmin")}}" id="myform" onsubmit="return validate();">
    @csrf
    <div class="input_field">
        <input name="email" type="email" placeholder="email" id="name">
    </div>
    <div class="input_field">
        <input name="password" required id="pw" type="password" placeholder="Password" />
    </div>
    <div class="btn">
        <input type="submit" id="signin"  value="Login">
    </div>
  </form>
</div>

</body>
</html>