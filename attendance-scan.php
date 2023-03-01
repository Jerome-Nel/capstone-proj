<?php

session_start();

require_once 'functions.php';

// prevent user from redirecting without logging
// if (!isset($_SESSION['user_email'])) {
//   header('Location: login.php');
//   die();
// }

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

      <!-- Button/Filters -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <span id="cameraBtn" class="btn btn-primary">
          <span class="me-2">Stop Camera</span>
        </span>
        <div class="d-flex">
          <span class="mx-1 border px-3 py-2 rounded-2">Section</span>
          <span class="mx-1 border px-3 py-2 rounded-2">Subject</span>
          <span class="mx-1 border px-3 py-2 rounded-2">Date - Time</span>
        </div>
      </div>

      <!-- body content -->

      <div class="container-fluid">
        <div class="row">
          <!-- scanner wrap -->
          <div class="col-4 me-3 p-0 d-flex flex-column">
            <!-- camera -->
            <video id="preview" class="w-100 my-video"></video>
            <div class="result fw-bold fs-4 border mt-3 text-center">ID Number</div>
          </div>
          <!-- visualization -->
          <div class="col bg-light fs-4 text-center student-icon">
            <div class="col"><i class="fa-solid fa-chalkboard-user fs-1 text-primary"></i></div>
            <!-- row 1 -->
            <div class="row">
              <div class="col" draggable="true"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col" draggable="true"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col" draggable="true"><i class="fa-solid fa-user-tie text-warning"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-danger"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-warning"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-warning"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-danger"></i></div>
            </div>
            <!-- row 2 -->
            <div class="row">
              <div class="col" draggable="true"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col" draggable="true"><i class="fa-solid fa-user-tie text-danger"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-danger"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
            </div>
            <!-- row 3 -->
            <div class="row">
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-warning"></i></div>
            </div>
            <!-- row 4 -->
            <div class="row">
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-danger"></i></div>
            </div>
            <!-- row 5 -->
            <div class="row">
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-danger"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
              <div class="col"><i class="fa-solid fa-user-tie text-success"></i></div>
            </div>

          </div>
        </div>
      </div>

    </div>

  </body>

  </html>
</body>

</html>