<?php
    require 'includes/dbh.inc.php';
    $title = "modules";
    include 'layout/header.php';
    // Make it work using department from database
?>

<main class="container overflow">


    <h5>Module Catalogue</h5>
    
    <!-- Make it work without having to click submit -->
    <form action="" id="search" method="POST" autocomplete="off">
        <input type="text" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>" name="search">
        <input type="submit" name="submit" value="Search">
    </form>


    <h5>Filter</h5>
    <div class="row">
        <label for="departmentInputGroup ">Department</label>
        <select name="departmentSelect" id="departmentInputGroup">
            <option selected value="all">Choose a department</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Neuroscience">Neuroscience</option>
            <option value="Law">Law</option>
        </select> 
    </div>

    
    <form method="POST">
        <div class="row mt-2">
            <label for="semsterInputGroup ">Semester</label>
            <select name="semesterSelect" id="semesterInputGroup" >
                <option selected value="all">Choose semester</option>
                <option value="Autumn">Autumn</option>
                <option value="Spring">Spring</option>
                <option value="Summer">Summer</option>
            </select> 
        </div>
    
        <div class="row mt-2">
            <label for="creditInputGroup">Credits</label>
            <select name="creditSelect" id="creditInputGroup">
                <option selected value="all">Choose credits</option>
                <option value=20>20</option>
                <option value=10>10</option>
                <option value=5>5</option>
            </select>
        </div>
    
        <div class="row mt-2">
            <label for="levelInputGroup ">Level</label>
            <select name="levelSelect" id="levelInputGroup" >
                <option value="" selected>All</option>
                <option value=4>4</option>
                <option value=3>3</option>
                <option value=2>2</option>
                <option value=1>1</option>
            </select> 
        </div>

        <button type="submit" name="select-submit"class="mt-2 mb-3">Filter</button>

    </form>
    


    <div class=" table-header">
        <div class="row">
            <div class="col">Code</div>
            <div class="col">Title</div>
            <div class="col">Credits</div>
            <div class="col">Semester</div>
        </div>
    </div> 

    <div class='accordion' id='accordion'>
    <?php
    if (isset($_POST['search'])){
        $search_value=$_POST["search"];
    }
    else{
        $search_value="";
    }

    $department_value=$_POST["departmentSelect"];
    $semester_value=$_POST["semesterSelect"];
    $credit_value=$_POST["creditSelect"];
    $level_value=$_POST["levelSelect"];
    
    
    $sql = "SELECT * FROM Module WHERE Title LIKE ?";


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

        echo "
        <div class='card'>
            <div class='card-header module-hover' id='headingOne' data-toggle='collapse' data-target='#collapse".$i."' aria-expanded='true' aria-controls='collapse".$i."'>
                <div class='row'>
                    <div class='col'>$moduleID</div>
                    <div class='col'>$Title</div>
                    <div class='col'>$Credits</div>
                    <div class='col'>$Semester</div>
                </div>
            </div>

            <div id='collapse".$i."' class='collapse hide' aria-labelledby='headingOne' data-parent='#accordion'>
            <div class='card-body'>
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                richardson ad
                squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food
                truck quinoa
                nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on
                it squid
                single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                helvetica, craft
                beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                butcher
                vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                synth nesciunt
                you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
            </div>



        </div>
        ";

        }
    } 
    else 
    {
    echo "0 results";
    }

    mysqli_close($conn);
    ?>

</main>


<?php
require "layout/footer.php"
?>
