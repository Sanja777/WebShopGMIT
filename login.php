<?php include "includes/database.php" ?><!doctype html>
<html lang="en">

<head>
    <!-- standard meta tags -->
    <?php include "includes/meta.php" ?>
    <!-- page title -->
    <title>Login - GMIT Web Shop</title>
    <script>
        // function executed when the value of the quantity changes
        function onLogin(){
            var elUsername = document.getElementById("username");
            var elPassword = document.getElementById("password");
            var elError = document.getElementById("error");
            if(elUsername.value == ""){
                elError.innerText = "Enter username";
            }
            else if(elPassword.value == ""){
                elError.innerText = "Enter password";
            }
            else if(elUsername.value != "user" || elPassword.value != "pass"){
                elError.innerText = "Wrong username or password"
            } else {
                elError.innerText = "";
            }
            var isValid = elError.innerText.length==0;
            elError.style.display = isValid?"none":""
            if(isValid){
                document.getElementById("form").style.display="none";
                document.getElementById("loggedIn").style.display="";
            }
            return elError.innerText.length == 0;
        }
    </script>
</head>

<body>
    <!-- header menu -->
    <?php include "includes/header.php" ?>
    <!-- page title  -->
    <h1>Sign in</h1>
    <div id="form">
        <h2 id="error" class="text-danger"></h2>
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" id="username" class="form-control" />
    <label class="form-label" for="username">Username</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="password" class="form-control" />
    <label class="form-label" for="password">Password</label>
  </div>

  <!-- Submit button -->
  <button type="button" class="btn btn-primary btn-block mb-4" onclick="onLogin()">Sign in</button>
  
    </div>

    <div id="loggedIn" style="display:none">
    <h1>Succesfull login</h1>
    <h2>Welcome user!</h2>
    </div>
    

    <?php include "includes/js.php" ?>
</body>

</html>