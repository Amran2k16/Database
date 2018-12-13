<?php

// gets all variables required from enrolledModules

    if($DepartmentID !=NULL ){
        $departmentInformation = "SELECT * from Department WHERE departmentID ='$DepartmentID'";
        $departmentInformationResult = mysqli_query($conn, $departmentInformation);
        if (mysqli_num_rows($departmentInformationResult) > 0){
            $row = mysqli_fetch_assoc($departmentInformationResult);
            $departmentName = $row["Name"];
            echo"<td>$departmentName</td>";
        }
    }
    else{
        echo "<td>No department selected</td>";
    }

?>