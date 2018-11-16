<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <!-- Overall container for entire website -->
    <div class="container-fluid h-100 flex-column">

        <!-- Top row of the website -->
        <div class="row h-10 align-items-center">
            <div class="col-2 bg-info h-100">
                <h3 class="text-white text-center align-self-end">SMS</h3>
            </div>
            <div class="col-10 bg-secondary h-100 ">
                <div class="row justify-content-between align-items-center">
                    <?php echo "<h2>" . $title . "</h2>" ?>
                    <a href="login.php">Sign Out</a>
                </div>
            </div>
        </div>

        <!-- sidebar and content area -->
        <div class="row h-90">

            <!-- Sidebar/navigation of website -->
            <div class="col-2 bg-dark h-100">
                <nav class="nav nav-pills nav-fill flex-column">
                    <a class="nav-link btn btn-secondary mb-2 mt-3 active" href="#">Dashboard</a>
                    <a class="nav-link btn btn-secondary mb-2" href="modules.html">Modules</a>
                    <a class="nav-link btn btn-secondary mb-2" href="exams.html">Exams</a>
                    <a class="nav-link btn btn-secondary mb-2" href="studentinfo.html">Personal Information</a>
                    <a class="nav-link btn btn-secondary mb-2" href="timetable.html">Timetable</a>
                </nav>
            </div>

            <!-- main content section -->
            <div class="col-10 mt-3">
            




            <!-- </div>
        </div>
    </div>
</body>
</html>
 -->
