<?php
    // session_start();
    // $title = "dashboard";
    // $GLOBALS[ 'title' ] = 'dashboard';
    
    $title = "Modules";
    include 'layout/header.php';
    if (isset($_GET['sortBy'])){
        $sortBy = $_GET["sortBy"];
    }
    else{
        $sortBy = "moduleID";
    }
  
?>

    <main>
       
        <div class="container">
            <h3 class="">My Modules</h3>
    
            <!-- Accordian created using bootstrap4  -->
            <!-- <div class="row flex-column"> -->
                <div class=" table-header">
                    <div class="row">
                        <div class="col <?php if($sortBy=='moduleID') echo 'btn-secondary';?>"><a class=""id="CodeSort" onclick="another(this,'moduleID')">Code <i class="fas fa-sort"></i></a></div>
                        <div class="col <?php if($sortBy=='Title') echo 'btn-secondary';?>"><a id="TitleSort" onclick="another(this,'Title')">Title <i class="fas fa-sort"></i></a></div>
                        <div class="col <?php if($sortBy=='Credits') echo 'btn-secondary';?>"><a id="CreditsSort" onclick="another(this,'Credits')">Credits <i class="fas fa-sort"></i></a></div>
                        <div class="col <?php if($sortBy=='Semester') echo 'btn-secondary';?>"><a id="SemesterSort" onclick="another(this,'Semester')">Semester <i class="fas fa-sort"></i></a></div>
                        <div class="col <?php if($sortBy=='Level') echo 'btn-secondary';?>"><a id="LevelSort" onclick="another(this,'Level')">Level <i class="fas fa-sort"></i></a></div>
                    </div>
                </div>  
                
                <div class='accordion' id='accordion'>

                    <?php include 'includes/DisplayEnrolledModules.inc.php' ?>

                    <!-- Enroll to a a module -->
                    <a class="col-4 mt-2 btn btn-light offset-8 border" href="moduleCatalogue.php" >
                        Enroll to a new module 
                    </a>
                </div>
            </div>
    </main>

<?php
require "layout/footer.php"


?>




