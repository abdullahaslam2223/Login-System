<?php

require 'partials/_header.php';

$showSuccess = false;
$showErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $sqlExist = "SELECT * FROM `signup` WHERE username = '$username'";
    $existResult = mysqli_query($conn, $sqlExist);
    $existEntry = mysqli_num_rows($existResult);

    if ($existEntry > 0) {
        $showErr = "Error! Username already exist";
    } else {
        if ($password == $cpassword) {
            $pHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `signup` (`Username`, `Password`) VALUES ('$username', '$pHash')";
            $result = mysqli_query($conn, $sql);
            $showSuccess = true;
        } else {
            $showErr = "Error! Both passwords must be same";
        }
    }
}


require 'partials/_navbar.php';

?>

<h1 class="text-center mt-5">Signup here...</h1>
<div class="container mt-3">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" aria-describedby="userhelp">
            <div id="userhelp" class="form-text">Your username should be unique.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" name="cpassword" class="form-control" id="cpassword">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    if ($showErr)
        echo "<div class='mt-2 alert alert-danger alert-dismissible fade show' role='alert'>" . $showErr . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    if ($showSuccess)
        echo '<div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">Success! Your account has been created successfully<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    ?>
</div>


<?php
require 'partials/_footer.php';
?>