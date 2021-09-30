@extends('admin/layout')
@section('content_ad')
<link rel="stylesheet" href="{{asset('resources/admin/theme-assets/css/style-login-admin.css')}}">
    <div class="container-fluid">
        <section id="content-types">
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">Change Your Password</h4>
                </div>
            </div>
            <div class="row match-height">

                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">Password</h4>
                                <h6 class="card-subtitle text-muted">Change password below here !</h6>
                               
                                @if (Session::has('message_success'))
                              
                                <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="alert">
                                    {{Session::get('message_success')}} 
                                    {{Session::forget('message_success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                              @endif
                                <div id="alert-error">
                                    <div id="error_message">
                                      @if (Session::has('message'))
                                        {{Session::get('message')}} 
                                        {{Session::forget('message')}}
                                      
                                      @endif
                                    </div>
                                    </div>
                            </div>
                            <div class="card-body">
                                <form class="form" method="POST" onsubmit="return validate();" action="{{ url('/admin/profile/change-pass') }}">
                                    @csrf
                                    <div class="form-body">
                                      
                                        <div class="form-group">
                                            <label for="current_pass" class="sr-only">Current password</label>
                                            <input type="password" id="current_pass"
                                                class="form-control" placeholder="Current Password" name="current_pass">
                                        </div>
                                        <div class="form-group">
                                            <label for="new_pass" class="sr-only">New password</label>
                                            <input type="password"  id="new_pass"
                                                class="form-control" placeholder="New password" name="new_pass">
                                        </div>
                                        <div class="form-group">
                                            <label for="rnew_pass" class="sr-only">Confirm New password</label>
                                            <input type="password"  id="rnew_pass"
                                                class="form-control" placeholder="Repeat New password" name="rnew_pass">
                                        </div>
                                    </div>
                                    <div class="form-actions center">
                                        <button type="submit" class="btn btn-outline-primary">Change</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
   <script>


function validatePassword(passWord) {
    var pass_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
    return pass_regex.test(passWord);
  }

  function validate() {
    // lay value cua id name 
    var current_pass = document.getElementById("current_pass").value; 
    // lay value cua id phone nha ae
    var new_pass = document.getElementById("new_pass").value; 
    // lay value cua id email 
    var rnew_pass = document.getElementById("rnew_pass").value; 
    // lay value cua id message 
    // var message = document.getElementById("message").value; 
    // lay value cua id error_message 
    var error_message = document.getElementById("error_message"); 
    // lay value cua id pw nha ae
  // lay value cua id confirmPassword 
    error_message.style.padding = "10px";
    
    var text;
    // if (name.length < 5 || name == "") {
    //   text =
    //     "Please Enter valid username - must be greater than 5 characters and not be Blank";
    //   error_message.innerHTML = text;
    //   document.getElementById("alert-error").classList.add("show");
    //   return false;
    // }
    if (!validatePassword(new_pass)) {
      text =
        "Password has minimum six characters, at least one uppercase letter, one lowercase letter, one number and one special character";
      error_message.innerHTML = text;
      document.getElementById("alert-error").classList.add("show");
      return false;
    }
    if (new_pass != rnew_pass) {
      text = "Please confirm password - Not the same";
      error_message.innerHTML = text;
      document.getElementById("alert-error").classList.add("show");
      return false;
    }
  
    // if (!validatePhone(phone) || isNaN(phone)) {
    //   text = "Please Enter valid Phone Number";
    //   error_message.innerHTML = text;
    //   return false;
    // }
    // if (!validateEmail(email) || email.length < 9) {
    //   text = "Please Enter valid Email";
    //   error_message.innerHTML = text;
    //   document.getElementById("alert-error").classList.add("show");
    //   return false;
    // }
    // if (message.length <= 30) {
    //   text = "Please Enter More Than 30 Characters";
    //   error_message.innerHTML = text;
    //   return false;
    // }
    // event.preventDefault();
    // alert("Register successfully <3");
      
      return true;
  
    }
   </script>
@endsection
