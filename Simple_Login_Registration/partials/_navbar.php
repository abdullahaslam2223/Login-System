<?php

$isLogin = false;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $isLogin = true;
} else {
  $isLogin = false;
}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/SIMPLE_LOGIN_REGISTRATION/index.php">ABSecure</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">';
if (!$isLogin) {
  echo ' <li class="nav-item">
          <a class="nav-link" href="/SIMPLE_LOGIN_REGISTRATION/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/SIMPLE_LOGIN_REGISTRATION/signup.php">Signup</a>
        </li>';
}

if ($isLogin) {
  echo '<li class="nav-item">
          <a class="nav-link" href="/SIMPLE_LOGIN_REGISTRATION/logout.php">Logout</a>
        </li>';
}
echo '
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>';
