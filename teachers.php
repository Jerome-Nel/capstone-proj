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
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Add Teacher</button>
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
                <th>Student ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($students as $student) : ?>
                <tr>
                  <td class="align-middle"><?php echo $student['id']; ?></td>
                  <td class="align-middle"><?php echo $student['fname'] . " " . $student['mname'] . " " . $student['lname'] ?></td>
                  <td class="align-middle"><?php echo $student['gender'] ?></td>
                  <td class="action-btn">
                    <span>
                      <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fa-regular fa-eye"></i></button>
                      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-regular fa-pen-to-square"></i></button>
                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa-regular fa-trash-can"></i></button>
                    </span>
                  </td>
                </tr>
              <?php endforeach;  ?>
            </tbody>
          </table>
          <!-- End of table -->
        </div>
    </div>
    <!-- End of Page content -->
    </section>
    </div>

    <!-- MODALS SECTION -->

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Title -->
          <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Add New Teacher</h5>
            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <!-- Modal Content -->
          <div class="modal-body">
            <form action="" class="row g-3">
              <!-- Teacher ID -->
              <div class="col-6">
                <label for="studentImg" class="form-label">Teacher ID</label>
                <input type="text" name="student-img" id="studentImg" class="form-control form-control-sm" />
              </div>
              <div class="col-6">
                <!-- Upload profile picture -->
                <label for="studentImg" class="form-label">Upload profile picture</label>
                <input type="file" name="student-img" id="studentImg" class="form-control form-control-sm" />
              </div>
              <!-- Firtsname -->
              <div class="col-4">
                <label for="studentFname" class="form-label">First Name</label>
                <input type="text" name="student-fname" id="studentFname" class="form-control form-control-sm" />
              </div>
              <!-- Middlename -->
              <div class="col-4">
                <label for="studentMname" class="form-label">Middle Name</label>
                <input type="text" name="student-mname" id="studentMname" class="form-control form-control-sm" />
              </div>
              <!-- Lastname -->
              <div class="col-4">
                <label for="studentLname" class="form-label">Last Name</label>
                <input type="text" name="student-lname" id="studentLname" class="form-control form-control-sm" />
              </div>
              <!-- Gender -->
              <div class="col-12">
                <label class="form-label">Select Gender:</label>
                <!-- Male -->
                <div class="form-check form-check-inline">
                  <input type="radio" name="student-gender" id="studentMale" value="male" />
                  <label for="studentMale" class="form-check-label">Male</label>
                </div>
                <!-- Female -->
                <div class="form-check form-check-inline">
                  <input type="radio" name="student-gender" id="studentFemale" value="female" />
                  <label for="studentFemale" class="form-check-label">Female</label>
                </div>
              </div>
              <!-- Email -->
              <div class="col-12">
                <label for="studentEmail" class="form-label">Email Address</label>
                <input type="email" name="student-email" id="studentEmail" class="form-control form-control-sm" />
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
    <div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewModalLabel">Teacher ID</h5>
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
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Update Teacher</h5>
            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" class="row g-3">
              <!-- Teacher ID -->
              <div class="col-6">
                <label for="teacherID" class="form-label">Teacher ID</label>
                <input type="text" name="teacher-id" id="teacherId" class="form-control form-control-sm" />
              </div>
              <div class="col-6">
                <!-- Upload profile picture -->
                <label for="teacherImg" class="form-label">Upload profile picture</label>
                <input type="file" name="teacher-img" id="teacherImg" class="form-control form-control-sm w-50" />
              </div>
              <!-- Firtsname -->
              <div class="col-4">
                <label for="teacherFname" class="form-label">First Name</label>
                <input type="text" name="teacher-fname" id="teacherFname" class="form-control form-control-sm" />
              </div>
              <!-- Middlename -->
              <div class="col-4">
                <label for="teacherMname" class="form-label">Middle Name</label>
                <input type="text" name="teacher-mname" id="teacherMname" class="form-control form-control-sm" />
              </div>
              <!-- Lastname -->
              <div class="col-4">
                <label for="teacherLname" class="form-label">Last Name</label>
                <input type="text" name="teacher-lname" id="teacherLname" class="form-control form-control-sm" />
              </div>
              <!-- Gender -->
              <div class="col-12">
                <label class="form-label">Select Gender:</label>
                <!-- Male -->
                <div class="form-check form-check-inline">
                  <input type="radio" name="teacher-gender" id="teacherMale" value="male" />
                  <label for="teacherMale" class="form-check-label">Male</label>
                </div>
                <!-- Female -->
                <div class="form-check form-check-inline">
                  <input type="radio" name="teacher-gender" id="teacherFemale" value="female" />
                  <label for="teacherFemale" class="form-check-label">Female</label>
                </div>
              </div>
              <!-- Email -->
              <div class="col-12">
                <label for="teacherEmail" class="form-label">Email Address</label>
                <input type="email" name="teacher-email" id="teacherEmail" class="form-control form-control-sm" />
              </div>
              <!-- Section -->
              <div class="col-6 mt-3">
                <label for="section" class="form-label">Subject:</label>
                <select name="section" id="section" class="form-select form-select-sm">
                  <option selected disabled></option>
                </select>
              </div>
              <!-- Footer -->
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
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Delete student</h5>
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