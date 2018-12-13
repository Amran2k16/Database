<?php

// This php file will display all the information regarding the modules the user has enrolled in

    require 'includes/dbh.inc.php';
    $userID=$_SESSION["userID"];

    // GET ALL MODULES ENROLLED IN
    $moduleID = "SELECT * from EnrolledIn WHERE userID = $userID";
    $modulesEnrolledIn= array();
    $result = mysqli_query($conn, $moduleID);

    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($modulesEnrolledIn ,$row["moduleID"]);
        }
    }else{
        echo '<p>You have not been enrolled into any modules</p>';
    }
    // join the array to a string
    $modulesEnrolledJoin = join("','",$modulesEnrolledIn);

    // get only the modules with the moduleID of those you have enrolled In
     
    $sql = "SELECT * from Module WHERE moduleID IN ('$modulesEnrolledJoin') ORDER BY $sortBy";   
    $result = mysqli_query($conn, $sql);

    $i = 0; 
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
        $i++;
        $moduleID = $row["moduleID"];
        $Title = $row["Title"];
        $Credits = $row["Credits"];
        $Semester = $row["Semester"];
        $Level = $row["Level"];
        $Description = $row["Description"];
        $DepartmentID = $row["departmentID"];
        $AssessmentMethod = $row["AssessmentMethod"];
        if($AssessmentMethod==NULL){
            $AssessmentMethod = "The Assessment methods are not available";
        }
        $TimetabledHours = $row["TimetabledHours"];
        if($TimetabledHours==NULL){
            $TimetabledHours = "The Timetables Hours are not available";
        }

        // Display the basic module information
        echo "
        <div class='card'>
            <div class='card-header module-hover' id='headingOne' data-toggle='collapse' data-target='#collapse".$i."' aria-expanded='true' aria-controls='collapse".$i."'>
                <div class='row'>
                    <div class='col'>$moduleID</div>
                    <div class='col'>$Title</div>
                    <div class='col'>$Credits</div>
                    <div class='col'>$Semester</div>
                    <div class='col'>$Level</div>

                </div>
            </div>";
        
        // Display detailed module information
        
        // Get lecturers information. It returns an array containing information about all the lecturers which teach the current module
        // Might not need this because its only required inside of displayModulesDropdown
        // include 'includes/DisplayLecturerInformation.inc.php';
        
        // dropdown for each module header
        include 'includes/DisplayModulesDropdown.inc.php';
        
    }
    } 

    mysqli_close($conn);
?>