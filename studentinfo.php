<?php // session_start(); // $title = "dashboard"; // $GLOBALS[ 'title' ] ='dashboard';  
$title = "personal info";
include 'layout/header.php';?>

  <main>
    <div class="container mt-3">
      <table class="table bg-light">
        <tr>
          <th>First Name</th>
          <th>Amran</th>
        </tr>
        <tr>
          <th>Last Name</th>
          <th>Ahmed</th>
        </tr>
        <tr>
          <th>Student ID</th>
          <th>312389</th>
        </tr>
        <tr>
          <th>Course Enrolled In</th>
          <th>MSC Computer Science</th>
        </tr>
        <tr>
          <th>Accommodation</th>
          <th>Manor Villages</th>
        </tr>
        <tr>
          <th>Phone Number</th>
          <th>0889231723</th>
        </tr>
      </table>
    </div>
  </main>

<?php require "layout/footer.php" ?>
