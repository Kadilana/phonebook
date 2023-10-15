<?php

require "db_connect.php";

// get session id and call all data from contacts by user id
if(isset($_GET['user']))
{
    $user = $_GET['user'];

    $call = "SELECT * FROM contacts WHERE user_id=$user ORDER BY name";
    $contacts = mysqli_query($conn, $call);

    $total_contacts = mysqli_num_rows($contacts);

    $sql = "SELECT * FROM users WHERE id=$user";
    $user_details = mysqli_query($conn, $sql);
    $details = mysqli_fetch_assoc($user_details);

    // share query process
    $shared_to = $details['username'];
    $sharedRows = mysqli_query($conn, "SELECT * FROM share WHERE share_to='$shared_to' AND status='pending'");

    if(mysqli_num_rows($sharedRows) != 0)
    {
        $totalShared = mysqli_num_rows($sharedRows);
        
    }

}

// get the edit id
if(isset($_GET['edit_id']))
{
    $edit_id = $_GET['edit_id'];
    $user = $_GET['user'];

    $call = "SELECT * FROM contacts WHERE id=$edit_id AND user_id=$user";
    $edits = mysqli_query($conn, $call);
    $edit = mysqli_fetch_assoc($edits);
}

// get the user edit id
if(isset($_GET['user_edit_id']))
{
    $user_edit_id = $_GET['user_edit_id'];
    $user = $_GET['user'];

    $call = "SELECT * FROM users WHERE id=$user_edit_id";
    $edits = mysqli_query($conn, $call);
    $edit = mysqli_fetch_assoc($edits);
}








