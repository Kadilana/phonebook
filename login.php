<?php
    include "includes/auth-midware.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">LOGIN NOW!</h2>
        <form action="process/user-process.php" method="post">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col-md-4 offset-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="pwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                </div>
            </div>
            <button name="login" type="submit" class="btn btn-primary offset-md-4">Login Now</button>
            <span>Don't have an account <a href="index.php"> Signup</a></span>
        </form>
    </div>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>