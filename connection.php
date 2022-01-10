<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "scandiweb";

// $username   = "id18253667_johncs";
// $password   = "25O}9M|1P3N~mqt$";
// $dbname     = "id18253667_scandiweb";


$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn->connect_error)
{
    die("Connection Failed : ".mysqli_connect_error());
}

?>