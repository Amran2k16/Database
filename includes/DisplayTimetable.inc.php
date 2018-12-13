<?php

// This php file will display all the information regarding the modules the user has enrolled in

    require 'includes/dbh.inc.php';
    $userID=$_SESSION["userID"];
    
    // Initialise stmt
    $stmt = mysqli_stmt_init($conn);

    // GET ALL MODULES ENROLLED IN
    $moduleID = "SELECT * from EnrolledIn WHERE userID = ?";
    $modulesEnrolledIn= array();

    // prepare stmt
    // $result = mysqli_query($conn, $moduleID);

    if(!mysqli_stmt_prepare($stmt,$moduleID)){
            header("Location: ../index.php?error=sqlerror");
            exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "s", $userID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

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

        $sql = "SELECT Title, TimetabledHours from Module WHERE moduleID IN ('$modulesEnrolledJoin') ORDER BY ?";  
        // $sql = "SELECT * from Module WHERE moduleID IN (?) ORDER BY (?)";  
        
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{

            mysqli_stmt_bind_param($stmt, "s", $sortBy);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            $i = 0; 
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                $Title = $row["Title"];
                $TimetabledHours = $row["TimetabledHours"];
                if($TimetabledHours==NULL){
                    $TimetabledHours = "The Timetables Hours are not available";
                }

                // Display the basic module information
                echo "
                    
                            <tr>
                                <td>$Title</td>
                                <td>$TimetabledHours</td>
                            </tr>
                        ";
                
                // Display detailed module information
                
                // Get lecturers information. It returns an array containing information about all the lecturers which teach the current module
                // Might not need this because its only required inside of displayModulesDropdown
                // include 'includes/DisplayLecturerInformation.inc.php';
                
                // dropdown for each module header
                // include 'includes/DisplayModulesDropdown.inc.php';

                
            }
            }
            } 

    }
    
    mysqli_close($conn);
?>
