<?php

$conn = mysqli_connect('localhost','root','','contact-php');

if(!$conn)
{
    echo "Error connecting to the database";
}