<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}


require 'partials/_header.php';
require 'partials/_navbar.php';

?>

<h1 class="text-center mt-5">Hey <?php echo $_SESSION['username'] ?> - Welcome to our website</h1>


<?php
require 'partials/_footer.php';
?>