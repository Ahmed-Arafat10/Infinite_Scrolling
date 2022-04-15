<?php

$host="localhost";
$username="root";
$password="";
$dbname="infinite_scrolling";
$connect = new mysqli($host,$username,$password,$dbname);
$error = $connect->connect_error;
if($error) die("failed: ". $error);
// else echo "done";
