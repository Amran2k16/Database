<?php
    session_start();
    
    if(!isset($_SESSION['userID']))
    {
        // not logged in
        header('Location: login.php');
        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">


    <!-- Change this based on the page i am on -->
    <title>Document</title>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
</head>
<body class="">

    <!-- Overall container for entire website -->
    <div class="container-fluid h-100 flex-column ">

        <!-- Top row of the website -->
        <div class="row h-10 align-items-center">
            <div class="col-2 bg-info h-100">
                <h3 class="text-white text-center align-self-end">SMS</h3>
            </div>
            <div class="col-10 bg-secondary h-100 ">
                <div class="container">
                     <div class="row justify-content-between align-items-center">
                    <?php echo "<h2 class='ml-2'>" . $title . "</h2>" ?>
                    <a href="includes/logout.inc.php">Sign Out</a>
                </div>
                </div>
            </div>
        </div>

        <!-- sidebar and content area -->
        <div class="row h-90 ">

            <!-- Sidebar/navigation of website -->
            <div class="col-2 bg-dark h-100 ">
                <nav class="nav nav-pills nav-fill flex-column">
                    <a class="btn mb-2 mt-3 <?php if($title=='Index') echo 'btn-primary'; else {echo 'btn-secondary' ;} ?>" href="index.php">Dashboard</a>
                    <a class="btn mb-2 <?php if($title=='Modules') echo 'btn-primary'; else {echo 'btn-secondary' ;} ?>" href="modules.php">Modules</a>
                    <a class="btn mb-2 <?php if($title=='Exams') echo 'btn-primary'; else {echo 'btn-secondary' ;} ?>" href="exams.php">Exams</a>
                    <a class="btn mb-2 <?php if($title=='Personal Information') echo 'btn-primary'; else {echo 'btn-secondary' ;} ?>" href="studentinfo.php">Personal Information</a>
                    <a class="btn mb-2 <?php if($title=='Timetable') echo 'btn-primary'; else {echo 'btn-secondary' ;} ?>" href="timetable.php">Timetable</a>
                </nav>
            </div>

            <!-- main content section -->
            <div class="col-10 mt-3 " >
            



