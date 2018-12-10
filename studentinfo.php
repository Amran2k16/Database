<?php // session_start(); // $title = "dashboard"; // $GLOBALS[ 'title' ] ='dashboard';  
$title = "Personal Information";
include 'layout/header.php';?>

  <main>
    <div class="container mt-3">
      <table class="table bg-light">
        <tr>
          <th>First Name</th>
          <th><?php echo $_SESSION["firstname"] ?></th>
        </tr>
        <tr>
          <th>Last Name</th>
          <th><?php echo $_SESSION["lastname"] ?></th>
        </tr>
        <tr>
          <th>Student ID</th>
          <th><?php echo $_SESSION["userID"] ?></th>
        </tr>
        <tr>
          <th>Course Enrolled In</th>
          <th><?php echo $_SESSION["course"] ?></th>
        </tr>
        <tr>
          <th>Accommodation</th>
          <th>...</th>
        </tr>
        <tr>
          <th>Email Address</th>
          <th><?php echo $_SESSION["email"] ?></th>
        </tr>
      </table>
    </div>
  </main>

<?php require "layout/footer.php" ?>
