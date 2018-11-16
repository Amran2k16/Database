<?php
//if we actually clicked the sign up button to access the page
if (isset($_POST['signup-submit'])) {
    
    //get access to variable conn to gain access to the database
    require 'dbh.inc.php';

    //fetch information from the form when user signs up
    $username = $_POST['uid'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    //before we put the information into our database check if they made mistakes in the form
        //did they leave out any fields?
        if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat) ) {
            header("Location: ../signup.php?error=emptyFields&uid=".$username."&email=".$email);
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../signup.php?error=invaliduid&mail=");
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=invalidmail&uid=".$username."&email=".$email);
            exit();
        }
        elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../signup.php?error=invaliduid&mail=".$email);
            exit();
        }
        elseif ($password !== $passwordRepeat) {
            header("Location: ../signup.php?error=passwordcheck&uid".$username."&email=".$email);
            exit();
        }
        else{

            $sql = "SELECT uidUsers FROM users WHERE uidUsers=?"; //do these exist already?. useplaceholder instead using question marks.

            //create prepared statement
            $stmt = mysqli_stmt_init($conn); 

            //preparing the placeholders     
                //if it doesnt work...   
            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ../signup.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck>0){
                    header("Location: ../signup.php?error=usertaken&email=".$email);
                    exit();
                }
                else{
                    $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) Values (?,?,?)";

                    $stmt = mysqli_stmt_init($conn); 

                    if(!mysqli_stmt_prepare($stmt, $sql)){ 
                        header("Location: ../signup.php?error=sqlerror");
                        exit();
                    }
                    else{
                        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sss", $username,$email, $hashedpwd );
                        mysqli_stmt_execute($stmt);
                        header("Location: ../signup.php?signup=success");
                        exit();
                    }

                }
            }

        }

   mysqli_stmt_close($stmt);
    mysqli_close($conn);

    }

    
else{
    header("Location: ../signup.php");
    exit();
}



