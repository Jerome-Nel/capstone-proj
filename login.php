<?php
require_once 'connection.php';

session_start();

$email = $password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // query to find user with given inputs
  $stmt = $conn->prepare("SELECT * FROM account_tbl WHERE email = :email AND password = :password");
  $stmt->execute(array('email' => $email, 'password' => $password));

  // fetch results
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  // search for match row
  if ($row) {
    // success match
    $_SESSION['user_email'] = $row['email'];
    header('Location: dashboard.php');
    exit();
  } else {
    $_SESSION['error_msg'] = "<strong>Login failed!</strong> Incorrect email or password.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SDNTS | Login</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
  <!-- connection error -->
  <?php if (isset($error_msg)) : ?>
    <div class="alert alert-danger alert-dismissible fade show position-absolute start-0 top-0 w-100 z-3 rounded-0" role="alert">
      <?php echo $error_msg; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg shadow-sm py-3">
    <div class="container d-flex">
      <!-- Logo -->
      <a href="" class="nav-brand text-decoration-none d-flex align-items-center">
        <img class="img-fluid me-2 logo-img" src="img/logo.png" alt="USHS logo" />
        <span class="text-dark fs-5 fw-bolder">USHS</span>
      </a>
      <!--Toggler button  -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-expanded="false">
        <img src="" alt="Toggler icon" class="img-fluid toggler-icon" />
      </button>
      <!-- Links -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
        <ul class="navbar-nav">
          <li class="nav-item px-3">
            <a href="index.html" class="nav-link text-dark">Home</a>
          </li>
          <li class="nav-item px-3">
            <a href="about.html" class="nav-link text-dark">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End of Navbar -->

  <!-- Login Form -->
  <div class="container mt-5">
    <div class="row w-75 mx-auto shadow-lg login-form">
      <!-- Left content (Title) -->
      <div class="d-none d-lg-block col-lg-6 left-wrap">
        <div class="d-flex flex-column justify-content-center align-items-start ps-3 w-100" style="height: 100%">
          <img class="img-fluid mb-2" src="img/qr-colored.png" alt="Qr code" height="80" width="80" />
          <h1 class="text-light w-75"><span class="text-reset title-span">QR-code</span> Based Attendance Monitoring System</h1>
        </div>
      </div>
      <!-- End of Left Content -->

      <!-- Right Content (login form) -->
      <div class="col-12 col-lg-6 px-4 pb-5 d-flex flex-column justify-content-center position-relative">
        <!-- display only if there is error -->
        <?php if (isset($_SESSION['error_msg'])) : ?>
          <!-- Error alert -->
          <div class="alert alert-danger alert-dismissible fade show position-absolute start-0 top-0 w-100 rounded-0" role="alert">
            <?php echo $_SESSION['error_msg'];
            unset($_SESSION['error_msg']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <h2 class="text-center mt-4">Welcome !</h2>
        <img class="img-fluid d-block mt-3 mb-5 mx-auto user-icon" src="img/account.png" alt="User icon" />
        <!-- LOGIN -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="form-floating mb-3">
            <input type="text" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" placeholder="Enter your email" />
            <div class="invalid-feedback">Please enter a email</div>
            <label for="username" class="form-label text-secondary">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" value="<?php echo htmlspecialchars($password); ?>" />
            <label for="password" class="form-label text-secondary">Password</label>
          </div>
          <div class="d-flex justify-content-between align-items-center mt-4">
            <a class="forgot-pass text-decoration-none" href="#">Forgot your password?</a>
            <input class="btn btn-primary py-2 px-4" type="submit" value="Login">
          </div>
        </form>
      </div>
      <!-- End of Right Content (Login) -->
    </div>
  </div>
  <!-- End of Login Form -->
</body>

</html>