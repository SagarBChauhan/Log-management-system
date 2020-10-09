<?php
$host="localhost";
$user="root";
$password="root";
$database="Log";

$con=mysqli_connect($host, $user, $password, $database);

if($con)
{
    $con_status= 'Connected Successfully';
}
else
{
    $con_status= 'Connection Failes';
}