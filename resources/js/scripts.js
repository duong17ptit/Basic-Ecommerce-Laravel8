// document.getElementById("submit").addEventListener("click", function (event) {
//   event.preventDefault();
// });
// validate email 

  function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }
  //validate phonenumber
  function validatePhone(phonenum) {
    var vnf_regex = /((09|01|02|03|06|04|03|07|08|05)+([0-9]{8})\b)/g;
    return vnf_regex.test(phonenum);
  }
  function validatePassword(passWord) {
    var pass_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
    return pass_regex.test(passWord);
  }

  function validate() {
    // lay value cua id name 
    var name = document.getElementById("name").value; 
    // lay value cua id phone nha ae
    var phone = document.getElementById("phone").value; 
    // lay value cua id email 
    var email = document.getElementById("email").value; 
    // lay value cua id message 
    // var message = document.getElementById("message").value; 
    // lay value cua id error_message 
    var error_message = document.getElementById("error_message"); 
    // lay value cua id pw nha ae
    let password = document.getElementById("password").value; 
  // lay value cua id confirmPassword 
    let rePassword = document.getElementById("confirmPassword").value; 
    error_message.style.padding = "10px";
    
    var text;
    if (name.length < 5 || name == "") {
      text =
        "Please Enter valid username - must be greater than 5 characters and not be Blank";
      error_message.innerHTML = text;
      document.getElementById("alert-error").classList.add("show");
      return false;
    }
    if (!validatePassword(password)) {
      text =
        "Password has minimum six characters, at least one uppercase letter, one lowercase letter, one number and one special character";
      error_message.innerHTML = text;
      document.getElementById("alert-error").classList.add("show");
      return false;
    }
    if (password != rePassword) {
      text = "Please confirm passWord - Not the same";
      error_message.innerHTML = text;
      document.getElementById("alert-error").classList.add("show");
      return false;
    }
  
    if (!validatePhone(phone) || isNaN(phone)) {
      text = "Please Enter valid Phone Number";
      error_message.innerHTML = text;
      return false;
    }
    if (!validateEmail(email) || email.length < 9) {
      text = "Please Enter valid Email";
      error_message.innerHTML = text;
      document.getElementById("alert-error").classList.add("show");
      return false;
    }
    // if (message.length <= 30) {
    //   text = "Please Enter More Than 30 Characters";
    //   error_message.innerHTML = text;
    //   return false;
    // }
    // event.preventDefault();
    // alert("Register successfully <3");
      
      return true;
  
    }
  
   
  

