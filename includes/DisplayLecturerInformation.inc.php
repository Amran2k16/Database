<?php 

// get all required information from enrolledModules

    // Get the ID of the lecturer associated with this moduleID
    $lecturerIDQuery = "SELECT lecturerID from TaughtBy WHERE ModuleID=$moduleID" ; 
    $lecturerIDArray = array();
    $lecturerResult = mysqli_query($conn, $lecturerIDQuery);
    if (mysqli_num_rows($lecturerResult) > 0){
        while($row = mysqli_fetch_assoc($lecturerResult))
            array_push($lecturerIDArray ,$row["lecturerID"]);
    }
    else{
        // echo '<p>This module does not currently have a lecturer assigned to it</p>';
    }

    // Join the array to a string so it can be queried
    $lecturerIDArrayJoined = join("','",$lecturerIDArray);

    // Get all the columns from Lecturer which match the LecturerIDs associated with this module
    $lecturerInformationQuery = "SELECT * from Lecturer WHERE lecturerID IN ('$lecturerIDArrayJoined')";
    $lecturerInformationResult = mysqli_query($conn, $lecturerInformationQuery);
    $lecturerFirstNameArray = array();
    $lecturerLastNameArray =array();
    $lecturerEmailArray =array();

    // If there are results, then store them inside an array which can be printed later
    if (mysqli_num_rows($lecturerInformationResult) > 0){
        while($row = mysqli_fetch_assoc($lecturerInformationResult)){
            //store lecturers first name, last name and email into an array. Then for each item in the array 
            // can show different tr
            array_push($lecturerFirstNameArray ,$row["FirstName"]);
            array_push($lecturerLastNameArray ,$row["LastName"]);
            array_push($lecturerEmailArray ,$row["EmailAddress"]);
        }
    }
    else{
        // echo '<p>lecturer information result failed. shouldnt ever happen</p>';
        
    }

?>