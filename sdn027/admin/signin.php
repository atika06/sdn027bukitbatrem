<?php
include 'env.php'; // Assuming env.php contains database koneksiection information
session_start();

if(isset($_SESSION['sudah_login'])){
    header('location:index.php');
    exit; // Ensure script stops executing after redirection
}

if(isset($_POST['btnlogin'])){

    $userForm = $_POST['userform'];
    $passForm = $_POST['passform'];

    // Use prepared statement to prevent SQL injection
    $stmt = $koneksi->prepare("SELECT * FROM admin WHERE username=? AND password=?");
    $stmt->bind_param("ss", $userForm, $passForm);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row was returned
    if($result->num_rows == 1){
        // Fetch the row
        $row = $result->fetch_assoc();

        // Set session
        $_SESSION['sudah_login'] = true;
        $_SESSION['username'] = $userForm;
        header('location:index.php');
        exit; // Ensure script stops executing after redirection
    } else {
        echo "<script>alert('Username atau Password Salah!')</script>";
    }

    // Close statement and koneksi
    $stmt->close();
    $koneksi->close();
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico" />

    <title>Signin</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <style>
      html, body {
        height: 100%;
      }
      body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #2A3F54;
        color: black;
        font-family: 'Kameron', serif;
      }
      .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        opacity: 0.8;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
      }
      .form-group{
        margin-top: 15px;
      }
      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15zpx;
        margin: auto;
      }
      .form-signin .checkbox {
        font-weight: 400;
      }
      .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0; 
      }

      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>
  </head>

  <body style="background: #5c0a0a;">
    <div class="container">
    <form class="form-signin" method="post">
      <div  class="text-center">
      <h1 class="h3 mb-3" style="font-family: 'Kameron', serif;"><strong>Sign In</strong></h1>
      </div>
      <div  class="text-left">
      <label for="username">Username</label> 
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="username" name="userform" id="inputUsername" class="form-control" placeholder="Username" required autofocus />
      <br>
      <label for="password">Password </label> 
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="passform" id="inputPassword" class="form-control" placeholder="Password" required />
      </div>
        <div class="form-group">
        <div class="row">
        <div class="col-sm-6 d-flex justify-content-around">
        <!-- <button class="btn btn-outline-success btn-block" style="font-family: 'Poppins', sans-serif;width: auto;"><strong>Sign Up</strong></button> -->
        </div>
        <div class="col-sm-6 d-flex justify-content-around">
        <button type="submit" name='btnlogin' class="btn btn-primary" style="background: #5c0a0a;font-family: 'Poppins', sans-serif;"><strong>Sign In</strong></button></div>
        </div>
    </form>
  </div>
  </body>
</html>
