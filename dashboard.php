<?php

session_start();

require_once 'functions.php';

// prevent user from redirecting without logging
if (!isset($_SESSION['user_email'])) {
  header('Location: login.php');
  die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SDNTS | Dashboard</title>
</head>

<body>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SDNTS | Dashboard</title>

    <?php require_once 'includes/links.php' ?>
  </head>

  <body>
    <?php require_once 'includes/sidebar.php' ?>

    <!-- Page Container -->
    <div id="mainContent" class="container-fluid panel-content px-4">
      <!-- Page heading -->
      <section class="mt-4">
        <?php require_once 'includes/header.php' ?>
      </section>
      <!-- End of Page heading -->

      <!-- Page content -->
      <section class="">
        <ul class="list-unstyled d-flex flex-row flex-wrap overview">
          <li class="px-5 py-4 bg-light rounded mx-2 text-center">
            <span class="fw-bold">Students</span>
            <span class="d-block fw-bolder fs-4">150</span>
          </li>
          <li class="px-5 py-4 bg-light rounded mx-2 text-center">
            <span class="fw-bold">Teachers</span>
            <span class="d-block fw-bolder fs-4">150</span>
          </li>
          <li class="px-5 py-4 bg-light rounded mx-2 text-center">
            <span class="fw-bold">Classes</span>
            <span class="d-block fw-bolder fs-4">150</span>
          </li>
          <li class="px-5 py-4 bg-light rounded mx-2 text-center">
            <span class="fw-bold">Attendance</span>
            <span class="d-block fw-bolder fs-4">150</span>
          </li>
        </ul>
      </section>
    </div>
  </body>

  </html>
</body>

</html>