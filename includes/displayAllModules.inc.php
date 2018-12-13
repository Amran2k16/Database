<?php
    
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
    
    $sql = "SELECT * FROM Module WHERE Title LIKE '%".$search_value."%' ORDER BY $sortBy";

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

    mysqli_close($conn);
?>
