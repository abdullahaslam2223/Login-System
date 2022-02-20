<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "login_form";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Oops not connected <br>");
}
