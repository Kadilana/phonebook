<?php
include "includes/auth-midware.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <title>Signup</title>
</head>
<body>
    <div class="container w-75 mt-5">
        <h2 class="text-center mb-3">SIGN ME UP!</h2>
        <form action="process/user-process.php" method="post">
            <div class="row">
                <div class="col-md-5 offset-md-4">
                    <div class="form-group">
                        <label for="exampleInputUser1">Username</label>
                        <input name="username" type="text" class="form-control" id="exampleInputUser1" placeholder="Enter username">
                    </div>
                </div>
                <div class="col-md-5 offset-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col-md-5 offset-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="pwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                </div>
                <div class="col-md-5 offset-md-4">
                    <div class="form-group">
                        <label for="exampleInputPhone1">Phone</label>
                        <input name="phone" type="tel" class="form-control" id="exampleInputPhone1" placeholder="Your phone number">
                    </div>
                </div>
            </div>
            <button name="sign" type="submit" class="btn btn-primary offset-md-4">Sign Me Up</button>
            <span>Already have an account <a href="login.php"> Login</a></span>
        </form>
    </div>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>