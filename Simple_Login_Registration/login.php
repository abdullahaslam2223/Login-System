<?php

require 'partials/_header.php';

$login = false;
$showErr = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lusername = $_POST['lusername'];
    $lpassword = $_POST['lpassword'];

    $sql = "SELECT * FROM `signup` where username = '$lusername'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($lpassword, $row['Password'])) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $lusername;
                header("location: welcome.php");
            } else {
                $showErr = true;
            }
        }
    } else {
        $showErr = true;
    }
}



require 'partials/_navbar.php';

?>

<h1 class="text-center mt-5">Login here...</h1>
<div class="container mt-3">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="mb-3">
            <label for="lusername" class="form-label">Username</label>
            <input type="text" name="lusername" class="form-control" id="lusername">
        </div>
        <div class="mb-3">
            <label for="lpassword" class="form-label">Password</label>
            <input type="password" name="lpassword" class="form-control" id="lpassword">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    if ($showErr)
        echo '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! Invalid Cradentials!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    if ($login)
        echo '<div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">Success! You are loged in successfully<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    ?>

</div>

<?php
require 'partials/_footer.php';
?>