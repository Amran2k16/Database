<?php
    
    // prepare stmt
    $stmt = mysqli_stmt_init($conn);


    // Query will change based on search parameters
    if (isset($_POST['search'])){
        $search_value=$_POST["search"];
    }
    else{
        $search_value = "";
    }

    // SortBy Order will change based on URL which changes on button click
    if (isset($_GET['sortBy'])){
        $sortBy = $_GET["sortBy"];
    }
    else{
        $sortBy = "moduleID";
    }
    
    // $sql = "SELECT * FROM Module WHERE Title LIKE '%".$search_value."%' ORDER BY $sortBy";
    $sql = "SELECT * FROM Module WHERE Title LIKE ? ORDER BY ?";

    if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../moduleCatalogue.php?error=sqlerror");
            exit();
    }else{
        $search_value = '%' . $search_value . '%';
        mysqli_stmt_bind_param($stmt, "ss", $search_value,$sortBy);
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


            // Heading
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
                    </div> ";

                include 'includes/DisplayModulesDropdown.inc.php';

                }
            } 
            else 
            {
            echo "$search_value";
            echo "0 results";
        }
    }



    

    mysqli_close($conn);
?>
