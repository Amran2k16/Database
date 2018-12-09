<?php
    // session_start();
    // $title = "dashboard";
    // $GLOBALS[ 'title' ] = 'dashboard';
    
    $title = "modules";
    include 'layout/header.php';
  
?>

    <main>
       
        <div class="container">
            <h3 class="">My Modules</h3>
    
            <!-- Accordian created using bootstrap4  -->
            <!-- <div class="row flex-column"> -->
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
                        include 'includes/enrolledModules.inc.php'
                    ?>

                    <!-- Add a module -->
                    <a class="col-4 mt-2 btn btn-light offset-8 border" href="moduleCatalogue.php" >
                        Enroll to a new module 
                    </a>
                </div>
            </div>
    </main>

<?php
require "layout/footer.php"


?>




