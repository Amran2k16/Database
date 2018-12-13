<?php
    require 'includes/dbh.inc.php';
    $title = "Module Catalogue";
    include 'layout/header.php';
    // Make it work using department from database
?>

<main class="container ">


    <h5>Module Catalogue</h5>
    
    <!-- Search query -->
    <form class="mb-2" action="" id="search" method="POST" autocomplete="off">
        <input type="text" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>" name="search">
        <input type="submit" name="submit" value="Search">
    </form>

    <div class=" table-header">
        <div class="row">
            <div class="col <?php if($sortBy=='moduleID') echo 'btn-secondary';?>"><a class=""id="CodeSort" onclick="catalogueFunction(this,'moduleID')">Code <i class="fas fa-sort"></i></a></div>
            <div class="col <?php if($sortBy=='Title') echo 'btn-secondary';?>"><a id="TitleSort" onclick="catalogueFunction(this,'Title')">Title <i class="fas fa-sort"></i></a></div>
            <div class="col <?php if($sortBy=='Credits') echo 'btn-secondary';?>"><a id="CreditsSort" onclick="catalogueFunction(this,'Credits')">Credits <i class="fas fa-sort"></i></a></div>
            <div class="col <?php if($sortBy=='Semester') echo 'btn-secondary';?>"><a id="SemesterSort" onclick="catalogueFunction(this,'Semester')">Semester <i class="fas fa-sort"></i></a></div>
            <div class="col <?php if($sortBy=='Level') echo 'btn-secondary';?>"><a id="LevelSort" onclick="catalogueFunction(this,'Level')">Level <i class="fas fa-sort"></i></a></div>
        </div>
    </div>   

    <div class='accordion' id='accordion'>

    <?php include 'includes/DisplayAllModules.inc.php' ?>
    
</main>


<?php
require "layout/footer.php"
?>
