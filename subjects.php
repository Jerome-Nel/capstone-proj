<?php

session_start();

require_once 'functions.php';

// prevent user from redirecting without logging
// if (!isset($_SESSION['user_email'])) {
//   header('Location: login.php');
//   die();
// }

$students = read('students_tbl');

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
        <!-- Button/Filters -->
        <div class="d-flex justify-content-between align-items-center mb-1">
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Add Subject</button>
          <div class="input-group flex-nowrap w-25">
            <input type="text" id="searchBar" class="form-control form-control-sm" placeholder="Search ..." aria-label="Username" aria-describedby="addon-wrapping">
            <span class="input-group-text search-icon" id="addon-wrapping">
              <i class="fa-solid fa-magnifying-glass"></i>
            </span>
          </div>
        </div>

        <div class="table-responsive mt-3">
          <!-- Table -->
          <table id="dataTable" class="table table-striped table-bordered table-hover mb-2">
            <thead class="table-dark">
              <tr>
                <th>Subject Code</th>
                <th>Subject Title</th>
                <th>Days</th>
                <th>Time</th>
                <th>Adviser</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php // foreach ($students as $student) : 
              ?>
              <tr>
                <td class="align-middle">?</td>
                <td class="align-middle">?</td>
                <td class="align-middle">?</td>
                <td class="align-middle">?</td>
                <td class="align-middle">?</td>
                <td class="action-btn">
                  <span>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fa-regular fa-eye"></i></button>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-regular fa-pen-to-square"></i></button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa-regular fa-trash-can"></i></button>
                  </span>
                </td>
              </tr>
              <?php // endforeach;  
              ?>
            </tbody>
          </table>
          <!-- End of table -->
        </div>
    </div>
    <!-- End of Page content -->
    </section>
    </div>

    <!-- MODALS SECTION -->

    <!-- Create Modal for Subject -->
    <div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createSubjModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Title -->
          <div class="modal-header">
            <h5 class="modal-title" id="createSubjModalLabel">Add New Subject</h5>
            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <!-- Modal Content -->
          <div class="modal-body">
            <form action="" class="row g-3">
              <!-- Teacher ID -->
              <div class="col-6">
                <label for="" class="form-label">Subject Code</label>
                <input type="text" name="" id="" class="form-control form-control-sm" />
              </div>
              <!-- Subject Title -->
              <div class="col-6">
                <label for="" class="form-label">Subject Title</label>
                <input type="text" name="" id="" class="form-control form-control-sm" />
              </div>
              <!-- Days -->
              <div class="col-12">
                <label class="form-label">Select Days:</label><br />
                <!-- Monday -->
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="day" id="monday" class="form-check-input" value="monday" />
                  <label for="monday" class="form-check-label">Mon</label>
                </div>
                <!-- Tuesday -->
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="day" id="tuesday" class="form-check-input" value="tuesday" />
                  <label for="tuesday" class="form-check-label">Tue</label>
                </div>
                <!-- Wednesday -->
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="day" id="wednesday" class="form-check-input" value="wednesday" />
                  <label for="wednesday" class="form-check-label">Wed</label>
                </div>
                <!-- Thurs -->
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="day" id="thursday" class="form-check-input" value="thursday" />
                  <label for="thursday" class="form-check-label">Thurs</label>
                </div>
                <!-- Fridays -->
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="day" id="friday" class="form-check-input" value="friday" />
                  <label for="friday" class="form-check-label">Fri</label>
                </div>
              </div>
              <!-- Start Time -->
              <div class="col-6">
                <label for="startTime" class="mb-1">Start Time:</label>
                <input type="time" name="start-time" id="startTime" class="form-control form-control-sm" />
              </div>
              <!-- End Time -->
              <div class="col-6">
                <label for="endTime" class="mb-1">End Time:</label>
                <input type="time" name="end-time" id="endTime" class="form-control form-control-sm" />
              </div>
              <!-- Adviser -->
              <div class="col-6 mt-3">
                <label for="" class="form-label">Adviser:</label>
                <select name="" id="" class="form-select form-select-sm">
                  <option selected disabled></option>
                </select>
              </div>
              <!-- Modal Footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end of create modal -->

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewSubjModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewSubjModalLabel">Teacher ID</h5>
            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-4">
                <span class="mb-2 fw-bold text-secondary">Profile Image</span>
                <img src="/src/assets/svg/user.svg" alt="" class="img-fluid mb-4 d-block mx-auto modal-img" />
              </div>
              <div class="col-8">
                <span class="d-inline-block fw-bold text-secondary mb-2">General</span>
                <ul class="list-unstyled">
                  <li class="fw-bold text-dark me-2">Name:</li>
                  <li class="fw-bold text-dark me-2">Gender:</li>
                  <li class="fw-bold text-dark me-2">Email:</li>
                </ul>
                <span class="d-inline-block fw-bold text-secondary mb-2">Accounts</span>
                <ul class="list-unstyled">
                  <li class="fw-bold text-dark me-2">Username:</li>
                  <li class="fw-bold text-dark me-2">Password:</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of view modal -->

    <!-- Edit modal -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editSubjModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editSubjModalLabel">Update Subject</h5>
            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" class="row g-3">
              <!-- Teacher ID -->
              <div class="col-6">
                <label for="" class="form-label">Subject Code</label>
                <input type="text" name="" id="" class="form-control form-control-sm" />
              </div>
              <!-- Subject Title -->
              <div class="col-6">
                <label for="" class="form-label">Subject Title</label>
                <input type="text" name="" id="" class="form-control form-control-sm" />
              </div>
              <!-- Days -->
              <div class="col-12">
                <label class="form-label">Select Days:</label><br />
                <!-- Monday -->
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="day" id="monday" class="form-check-input" value="monday" />
                  <label for="monday" class="form-check-label">Mon</label>
                </div>
                <!-- Tuesday -->
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="day" id="tuesday" class="form-check-input" value="tuesday" />
                  <label for="tuesday" class="form-check-label">Tue</label>
                </div>
                <!-- Wednesday -->
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="day" id="wednesday" class="form-check-input" value="wednesday" />
                  <label for="wednesday" class="form-check-label">Wed</label>
                </div>
                <!-- Thurs -->
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="day" id="thursday" class="form-check-input" value="thursday" />
                  <label for="thursday" class="form-check-label">Thurs</label>
                </div>
                <!-- Fridays -->
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="day" id="friday" class="form-check-input" value="friday" />
                  <label for="friday" class="form-check-label">Fri</label>
                </div>
              </div>
              <!-- Start Time -->
              <div class="col-6">
                <label for="startTime" class="mb-1">Start Time:</label>
                <input type="time" name="start-time" id="startTime" class="form-control form-control-sm" />
              </div>
              <!-- End Time -->
              <div class="col-6">
                <label for="endTime" class="mb-1">End Time:</label>
                <input type="time" name="end-time" id="endTime" class="form-control form-control-sm" />
              </div>
              <!-- Adviser -->
              <div class="col-6 mt-3">
                <label for="" class="form-label">Adviser:</label>
                <select name="" id="" class="form-select form-select-sm">
                  <option selected disabled></option>
                </select>
              </div>
              <!-- Modal Footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end of edit modal -->

    <!-- Delete modal -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteSubjModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editSubjModalLabel">Delete</h5>
            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">Are you sure you want to move this record to the archive?</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger">Confirm</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of delete modal -->

  </body>

  </html>
</body>

</html>