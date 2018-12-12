<?php
    require 'includes/dbh.inc.php';
    $title = "Module Catalogue";
    include 'layout/header.php';
    // Make it work using department from database
?>

<main class="container overflow">


    <h5>Module Catalogue</h5>
    
    <!-- Make it work without having to click submit -->
    <form class="mb-2" action="" id="search" method="POST" autocomplete="off">
        <input type="text" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>" name="search">
        <input type="submit" name="submit" value="Search">
    </form>

    <div class=" table-header">
        <div class="row">
            <div class="col"><a id="CodeSort" onclick="catalogueFunction(this,'moduleID')">Code <i class="fas fa-sort"></i></a></div>
            <div class="col"><a id="TitleSort" onclick="catalogueFunction(this,'Title')">Title <i class="fas fa-sort"></i></a></div>
            <div class="col"><a id="CreditsSort" onclick="catalogueFunction(this,'Credits')">Credits <i class="fas fa-sort"></i></a></div>
            <div class="col"><a id="SemesterSort" onclick="catalogueFunction(this,'Semester')">Semester <i class="fas fa-sort"></i></a></div>
        </div>
    </div> 

    <div class='accordion' id='accordion'>
    <?php
    
    if (isset($_POST['search'])){
        $search_value=$_POST["search"];
    }
    else{
        $search_value = "";
    }

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
                </div>
            </div> ";

        include 'includes/modulesDropdown.inc.php';

        }
    } 
    else 
    {
    echo "$search_value";
    echo "0 results";
    }

    mysqli_close($conn);
    ?>

</main>


<?php
require "layout/footer.php"
?>
