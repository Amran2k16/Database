<?php
 // session_start();
 // $title = "dashboard";
 // $GLOBALS[ 'title' ] = 'dashboard';
$title = "Exams";

 include 'layout/header.php';
?>

 <main>
         
    <div class="container">
        <table class="table bg-light">
            <tr>
                <th>Exam</th>
                <th>Date</th>
            </tr>
            <tr>
                <th>Machine Learning</th>
                <th>25/01/2019</th>
            </tr>
            <tr>
                <th>Systems and network</th>
                <th>29/03/2019</th>
            </tr>
            <tr>
                <th>Database Interfaces</th>
                <th>12/01/2019</th>
            </tr>

        </table>
    </div>

 </main>

<?php
require "layout/footer.php"
?>