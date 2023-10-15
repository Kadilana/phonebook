<?php

require "../includes/db_connect.php";

// add contact process
if(isset($_POST['add'])) 
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $user_id = $_POST['user'];

    $checkContact = "SELECT * FROM contacts WHERE user_id=$user_id AND phone_no='$phone'";
    $exists = mysqli_query($conn, $checkContact);

    if(mysqli_num_rows($exists) == 0) 
    {
        $addContact = "INSERT INTO contacts(name,phone_no,email,user_id) VALUES('$name','$phone','$email',$user_id)";
        $added = mysqli_query($conn, $addContact);
        
        if($added)
        {
            header("location: ../home.php?user=$user_id&msg=New contact added...");
        } else 
        {
            header("location: ../home.php?user=$user_id&error=Failed to add contact...");
        }
    } else 
    {
        header("location: ../home.php?user=$user_id&error=Contact already exists...");
    }
}

// delete contact process
if(isset($_GET['del_id'])) 
{
    $del_id = $_GET['del_id'];
    $user = $_GET['user'];

    $delete = "DELETE FROM contacts WHERE id=$del_id AND user_id=$user";
    $deleted = mysqli_query($conn,$delete);

    if($deleted)
    {
        header("location: ../home.php?user=$user&msg=Contact deleted...");
    } else 
    {
        header("location: ../home.php?user=$user&error=Failed to delete contact...");
    }
}

// edit contact process
if(isset($_POST['edit'])) 
{
    $user = $_POST['user'];
    $uname = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $pwd_hash = PASSWORD_BCRYPT($pwd);

    $edit = "UPDATE users SET username='$uname', phone_no='$phone', email='$email', password='$pwd' WHERE id=$user";
    $edited = mysqli_query($conn, $edit);

    if($edited)
    {
        header("location: ../profile.php?user=$user&msg=Edited your detail(s)...");
    }else 
    {
        header("location: ../home.php?user=$user&error=Failed to edit detail(s)...");
    }
}

// share process
if(isset($_POST['share']))
{
    $share_from_id = $_POST['share_from'];
    $share_to = $_POST['share_to'];
    $shared = $_POST['shared'];

    $results = mysqli_query($conn, "SELECT * FROM users WHERE id=$share_from_id");
    $row = mysqli_fetch_assoc($results);

    $share_from_name = $row['username'];

    $sql = "INSERT INTO share(share_from, share_to, shared) VALUES('$share_from_name','$share_to','$shared')";
    $shareSuccess = mysqli_query($conn, $sql);

    if($shareSuccess)
    {
        header("location: ../home.php?user=$share_from_id&msg=Shared contact");
    }else
    {
        header("location: ../home.php?user=$share_from_id&error=Failed to share contact");
    }
}

// declined share process

if(isset($_GET['denied_share_id']))
{
    $decline = $_GET['denied_share_id'];
    $user = $_GET['user'];

    $sql = mysqli_query($conn,"UPDATE share SET status='declined' WHERE id=$decline");

    if($sql)
    {
        header("location: ../home.php?user=$user&msg=Declined to a shared contact");
    }else 
    {
        header("location: ../home.php?user=$user&error=Failed to decline a shared contact");
    }
}

// accepted share process

if(isset($_GET['accepted_share_id']))
{
    $accepted = $_GET['accepted_share_id'];
    $user = $_GET['user'];
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];

    $sql = mysqli_query($conn,"UPDATE share SET status='accepted' WHERE id=$accepted");

    if($sql)
    {
        $addShare = mysqli_query($conn, "INSERT INTO contacts(name,phone_no,email,user_id) VALUES('$name','$phone','$email',$user)");
        if($addShare)
        {
            header("location: ../home.php?user=$user&msg=Accepted to a shared contact");
        }else
        {
            header("location: ../home.php?user=$user&error=Contact shared but failed to add to phonebook");
        }
    }else 
    {
        header("location: ../home.php?user=$user&error=Failed to accept a shared contact");
    }
}