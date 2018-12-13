<?php 

// Will receive a form with post concerning the moduleID

// If the moduleID matches a moduleID found in the array then deny the request. else say they will be considered for the email

$userID=$_SESSION["userID"];
$moduleID = "SELECT * from EnrolledIn WHERE userID = ?";
if(!mysqli_stmt_prepare($stmt,$moduleID)){
            header("Location: ../index.php?error=sqlerror");
            exit();
}
else{
    mysqli_stmt_bind_param($stmt, "s", $userID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($modulesEnrolledIn ,$row["moduleID"]);
        }
    }
    else{
        echo '<p>You have not been enrolled into any modules</p>';
    }
}

?>