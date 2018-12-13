<?php

// gets all variables required from enrolledModules

// Still have problems when the departmentID is equal to 0

    if($DepartmentID !=NULL ){
        // $departmentInformation = "SELECT * from Department WHERE departmentID ='$DepartmentID'";
        $departmentInformation = "SELECT * from Department WHERE departmentID = ? ";

        json_encode($departmentInformation);
        if(!mysqli_stmt_prepare($stmt,$departmentInformation)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $DepartmentID);
            mysqli_stmt_execute($stmt);
            $departmentInformationResult = mysqli_stmt_get_result($stmt);;
            if (mysqli_num_rows($departmentInformationResult) > 0){
                $row = mysqli_fetch_assoc($departmentInformationResult);
                $departmentName = $row["Name"];
                echo"<td>$departmentName</td>";
            }
        }        
    }
    else{
        echo "<td>No department selected</td>";
    }

?>