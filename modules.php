<?php
    // session_start();
    // $title = "dashboard";
    // $GLOBALS[ 'title' ] = 'dashboard';
    require 'includes/dbh.inc.php';
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

                        $userID=$_SESSION["userID"];

                        // GET ALL MODULES ENROLLED IN
                        $moduleID = "SELECT * from EnrolledIn WHERE userID = $userID";
                        $modulesEnrolledIn= array();
                        $result = mysqli_query($conn, $moduleID);

                        if (mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                array_push($modulesEnrolledIn ,$row["moduleID"]);
                            }
                        }else{
                            echo '0 results';
                        }
                        // join the array to a string
                        $modulesEnrolledJoin = join("','",$modulesEnrolledIn);

                        // get only the modules with the moduleID of those you have enrolled In
                        $sql = "SELECT * from Module WHERE Module.moduleID IN ('$modulesEnrolledJoin')"; 
                        
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
                        } else {
                        echo "0 results";
                        }

                        mysqli_close($conn);
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




