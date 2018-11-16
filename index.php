<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <title>Student Management System</title>
</head>

<body>

    <div class="container-fluid h-100 flex-column">
        <div class="row h-10 align-items-center">
            <div class="col-2 bg-info h-100">
                <h3 class="text-white text-center align-self-end">SMS</h3>
            </div>
            <div class="col-10 bg-secondary h-100 ">
                <div class="row justify-content-between align-items-center">
                    <h3 class="ml-3 ">Dashboard</h3>
                    <a href="login.php">Sign Out</a>
                </div>
            </div>
        </div>
        <div class="row h-90">

            <div class="col-2 bg-dark h-100">
                <nav class="nav nav-pills nav-fill flex-column">
                    <a class="nav-link btn btn-secondary mb-2 mt-3 active" href="#">Dashboard</a>
                    <a class="nav-link btn btn-secondary mb-2" href="modules.html">Modules</a>
                    <a class="nav-link btn btn-secondary mb-2" href="exams.html">Exams</a>
                    <a class="nav-link btn btn-secondary mb-2" href="studentinfo.html">Personal Information</a>
                    <a class="nav-link btn btn-secondary mb-2" href="timetable.html">Timetable</a>
                </nav>
            </div>

            <!-- Cards -->
            <div class="col-10 mt-3">
                <?php
                    if (isset($_SESSION['userId'])) {
                        echo '<p>You are logged in</p>'
                    }
                    else{
                        echo '<p>You are logged out</p>'
                    }
                ?>
                
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
        </div>





        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
</body>

</html>