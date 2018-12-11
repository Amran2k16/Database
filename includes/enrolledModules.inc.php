<?php
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
    $sql = "SELECT * from Module WHERE moduleID IN ('$modulesEnrolledJoin')";   
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
        // Get module convener details for that specific row...


        // Display the basic module information
        echo "
        <div class='card'>
            <div class='card-header module-hover' id='headingOne' data-toggle='collapse' data-target='#collapse".$i."' aria-expanded='true' aria-controls='collapse".$i."'>
                <div class='row'>
                    <div class='col'>$moduleID</div>
                    <div class='col'>$Title</div>
                    <div class='col'>$Credits</div>
                    <div class='col'>$Semester</div>
                </div>
            </div>";
        
        // Display detailed module information
        
        // Get all the lecturerIDs Based on the current moduleID
        $lecturerIDQuery = "SELECT lecturerID from TaughtBy WHERE ModuleID=$moduleID" ; 
        $lecturerIDArray = array();
        $lecturerResult = mysqli_query($conn, $lecturerIDQuery);
        if (mysqli_num_rows($lecturerResult) > 0){
            while($row = mysqli_fetch_assoc($lecturerResult))
                 
                array_push($lecturerIDArray ,$row["lecturerID"]);
        }
        else{
            echo '<p>This module does not currently have a lecturer assigned to it</p>';
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
            echo '<p>lecturer information result failed. shouldnt ever happen</p>';
        }

        echo "
            <div id='collapse".$i."' class='collapse hide' aria-labelledby='headingOne' data-parent='#accordion'>
                <div class='card-body'>
                    <table class='table'>
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Module Description</h5>
                                    <p>$Description</p>
                                </td>
                            </tr>
                            <tr>
                                <td class='h6' >Module Convener</td > 
                                <td>
                                ";
                                for ($i=0; $i < sizeof($lecturerFirstNameArray); $i++){
                                    echo"
                                    $lecturerFirstNameArray[$i] $lecturerLastNameArray[$i] </br> $lecturerEmailArray[$i] </br>
                                    ";
                                }
                                echo "
                                </td>
                            </tr>
                            <tr>
                                <td class='h6'>Timetabled Hours</td>
                                <td>Wednesday 11-1pm </br> Thursday 2-3pm</td>
                            </tr>
                            <tr>
                                <td class='h6'>Assessment Method</td>
                                <td>Coursework (40%) </br> Exam (60%)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>";
    }
    } 

    mysqli_close($conn);
?>