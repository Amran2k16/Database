<?php 


if (isset($_POST['login-submit'])){

    //make sure you are connected to database
    require 'dbh.inc.php';

    //get username/email and password submitted
    $username = $_POST['username'];
    $password = $_POST['password'];

    //check if fields were submitted with empty arguements. Works
    if(empty($username) || empty($password)){
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else{
        //check the database to see if it matches an existing user and the password as well
        //use placeholders which will be replaced by preapared statements later
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM Users WHERE UserName=?";

        //check if statement has any errors..? 
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else{

            mysqli_stmt_bind_param($stmt, "s", $username);

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['Password']);
                if($pwdCheck == false){
                    header("Location: ../login.php?error=incorrectPassword");
                    exit();
                }
                else if ($pwdCheck == true){
                    //need to start a session... session variable is stored globally.
                    session_start();
                    $_SESSION['userID'] = $row['UserID']; 
                    $_SESSION['username'] = $row['UserName']; 
                    $_SESSION['firstname'] = $row['UserName'];
                    $_SESSION['lastname'] = $row['LastName']; 
                    $_SESSION['email'] = $row['EmailAddress']; 
                    $_SESSION['course'] = $row['CourseEnrolled']; 


                    // $_SESSION['username'] = $row['UserName']; 

                    
                    header("Location: ../index.php");
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
