<?php

$conn = mysqli_connect('localhost','root','','contact_php');

if(!$conn)
{
    echo "Error connecting to the database";
}