<?php

include '../config/conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>Admin Logo</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">


        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure> <a href="/index.php"> <img src="images/logo.png" alt="sing up image"></a></figure>
                       
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </section>
 <?php
if (isset($_POST['signin'])) {
    
    $username = $conn->real_escape_string($_POST['your_name']);
    $password = $conn->real_escape_string($_POST['your_pass']);


    $sql = "SELECT * FROM admin WHERE User_Name='$username' AND Password='$password'";
    $result = $conn->query($sql);    

    if ($result->num_rows > 0) {
        
    
         $_SESSION['your_name'] = $username;
        

        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Bienvenue!',
                    text: 'Hello there Welcome back.',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location = '../index.php'; 
                });
              </script>";
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur!',
                    text: 'Incorrect username or password.',
                    confirmButtonText: 'Go Back to Home page'
                });
              </script>";
    }

   
}
?>


    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>