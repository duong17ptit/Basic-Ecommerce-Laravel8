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
         else if(password == "admin" || password == "admin"){
            alert(" Đăng nhập thành công");
            window.location.replace("");
            event.preventDefault();
            return true;
         }
    }
    </script> 
<body>

<div class="wrapper">
  <h2>Sign In</h2>
  <div id="error_message"></div>
  <form name="form" id="myform" onsubmit="return validate();">
    <div class="input_field">
        <input name="username" type="text" placeholder="User Name" id="name">
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