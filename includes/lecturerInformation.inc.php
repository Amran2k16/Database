<?php 

// get all required information from enrolledModules

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

        $lecturerIDArrayJoined = join("','",$lecturerIDArray);

        // echo json_encode($lecturerIDArrayJoined);
        $lecturerInformationQuery = "SELECT * from Lecturer WHERE lecturerID IN ('$lecturerIDArrayJoined')";
        $lecturerInformationResult = mysqli_query($conn, $lecturerInformationQuery);
        $lecturerFirstNameArray = array();
        $lecturerLastNameArray =array();
        $lecturerEmailArray =array();

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