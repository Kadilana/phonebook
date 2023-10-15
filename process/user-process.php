<?php

session_start();

require "../includes/db_connect.php";

// signup process

if(isset($_POST['sign']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $phone = $_POST['phone'];

    $checkUser = "SELECT * FROM users WHERE email='$email'";
    $exists = mysqli_query($conn, $checkUser);

    if(mysqli_num_rows($exists) == 0) 
    {
        $addUser = "INSERT INTO users(username,email,password,phone_no) VALUES('$username','$email','$pwd','$phone')";
        $added = mysqli_query($conn, $addUser);
        
        if($added)
        {
            header("location: ../login.php?msg=Now login...");
        } else 
        {
            header("location: ../sign.php?error=Failed to sign you up...");
        }
    } else 
    {
        header("location: ../sign.php?error=User already exists, try logging in...");
    }
}

// login process

if((isset($_POST['login'])))
{
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $checkUser = "SELECT * FROM users WHERE email='$email'";
    $exists = mysqli_query($conn, $checkUser);

    if(mysqli_num_rows($exists) == 1)
    {
        $row = mysqli_fetch_assoc($exists);
        $_SESSION['id'] = $row['id'];

        header("location: ../index.php?user=".$_SESSION['id']."&msg=Welcome...!");
    } else 
    {
        header("location: ../login.php?error=User doesn't exist, try signing up");
    }
}

