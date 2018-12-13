<?php // session_start(); // $title = "dashboard"; // $GLOBALS[ 'title' ] ='dashboard'; 
$title = "Timetable";

 include 'layout/header.php'; 
 ?>

  <main>
    <h1>Timetable</h1>
    <div class='container'>
      <table class='table'>
        <tbody>
          <?php include "includes/DisplayTimetable.inc.php"; ?>
        </tbody>
      </table>
    </div>

  </main>

<?php require "layout/footer.php" ?>
