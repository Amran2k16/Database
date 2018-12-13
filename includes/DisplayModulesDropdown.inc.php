<?php 
    // Need lecturer information to display 
    include 'includes/DisplayLecturerInformation.inc.php';
    

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
                                if(sizeof($lecturerFirstNameArray)==0){
                                    echo"No Lecturer has been set";
                                }
                                else{
                                    for ($j=0; $j < sizeof($lecturerFirstNameArray); $j++){
                                        echo"
                                        $lecturerFirstNameArray[$j] $lecturerLastNameArray[$j] </br> $lecturerEmailArray[$j] </br>
                                        ";
                                    }    
                                }
                                
                                echo "
                                </td>
                            </tr>
                            <tr>
                                <td class='h6'>Timetabled Hours</td>
                                <td>$TimetabledHours</td>
                            </tr>
                            <tr>
                                <td class='h6'>Assessment Method</td>
                                <td>$AssessmentMethod</td>
                            </tr>
                            <tr>
                                <td class='h6'>Department</td>";
                                // Include the department information
                                include 'includes/DisplayDepartmentInformation.inc.php';
                            echo "
                            </tr>
                        </tbody>
                    </table>

                    <button> Request to enrol to this module </button>
                </div>
            </div>
        </div>";

?>

<?php 


$userID=$_SESSION["userID"];
$moduleID = "SELECT * from EnrolledIn WHERE userID = ?";
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
$sql = "SELECT * from Module WHERE moduleID IN ('$modulesEnrolledJoin') ORDER BY ?";  
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
                $i++;
                $moduleID = $row["moduleID"];
                $Title = $row["Title"];
                $Credits = $row["Credits"];
                $Semester = $row["Semester"];
                }
            }
        }
    }
    
?>