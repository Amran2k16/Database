<?php 

if(isset($_POST['login-submit'])){

    //make sure you are connected to database
    require 'dbh.inc.php';

    //get username/email and password submitted
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    //check if fields were submitted with empty arguements
    if(empty($mailuid) || empty($password)){
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else{
        //check the database to see if it matches an existing user and the password as well
        //use placeholders which will be replaced by preapared statements later
        $sql = "SELECT * FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);

        //check if statement has any errors..? 
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else{

            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if($pwdCheck == false){
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true){
                    //need to start a session... session variable is stored globally.
                    session_start();
                    $_SESSION['userId'] = $row['idUsers']; 
                    $_SESSION['userUid'] = $row['uidUsers']; 
                    
                    header("Location: ../login.php?login=success");
                    exit();
                }else{
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
            }
            else{
                header("Location: ../login.php?error=nouser");
                exit();
            }

        }
    }

}
else{
    header("Location: ../login.php");
    exit();
}
