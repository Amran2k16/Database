<?php
    // session_start();
    $title = "dashboard";
    // $GLOBALS[ 'title' ] = 'dashboard';
    $page = 'one';
 include 'layout/header.php';
//  test comment
?>

    <main>
        <div class="container">
            <div class="card-columns">
                <div class="card bg-primary">
                    <div class="card-body text-center">
                        <p class="card-text">View Modules</p>
                    </div>
                </div>
                <div class="card bg-warning">
                    <div class="card-body text-center">
                        <p class="card-text">View Exams</p>
                    </div>
                </div>
                <div class="card bg-success">
                    <div class="card-body text-center">
                        <p class="card-text">View timetables</p>
                    </div>
                </div>
                <div class="card bg-danger">
                    <div class="card-body text-center">
                        <p class="card-text">View personal information</p>
                    </div>
            </div>
        </div>
        </div>
   

    </main>

<?php
require "layout/footer.php"


?>