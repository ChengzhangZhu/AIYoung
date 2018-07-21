<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '123';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_query($conn,"set names 'utf8'");
if(! $conn ){
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($conn, "aiyoung");
 