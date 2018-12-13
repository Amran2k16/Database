<?php 
    // Need lecturer information to display 
    include 'includes/DisplayLecturerInformation.inc.php';
    

    echo "
            <div id='collapse".$i."' class='collapse hide' aria-labelledby='headingOne' data-parent='#accordion'>
                <div class='card-body'>
                    <table class='table'>
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Module Description</h5>
                                    <p>$Description</p>
                                </td>
                            </tr>
                            <tr>
                                <td class='h6' >Module Convener</td > 
                                <td>
                                ";
                                if(sizeof($lecturerFirstNameArray)==0){
                                    echo"No Lecturer has been set";
                                }
                                else{
                                    for ($j=0; $j < sizeof($lecturerFirstNameArray); $j++){
                                        echo"
                                        $lecturerFirstNameArray[$j] $lecturerLastNameArray[$j] </br> $lecturerEmailArray[$j] </br>
                                        ";
                                    }    
                                }
                                
                                echo "
                                </td>
                            </tr>
                            <tr>
                                <td class='h6'>Timetabled Hours</td>
                                <td>$TimetabledHours</td>
                            </tr>
                            <tr>
                                <td class='h6'>Assessment Method</td>
                                <td>$AssessmentMethod</td>
                            </tr>
                            <tr>
                                <td class='h6'>Department</td>";
                                // Include the department information
                                include 'includes/DisplayDepartmentInformation.inc.php';
                            echo "
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>";



?>