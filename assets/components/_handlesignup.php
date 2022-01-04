<?php
    $showError = "false";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_connectdb.php';
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $user_confirmpass = $_POST['confirmpass'];
        $existsql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
        $result = mysqli_query($conn, $existsql);
        $numRows = mysqli_num_rows($result);
        if($numRows>0){
            $showError = "Username or Email already in use";
        }
        else{
            if($user_password == $user_confirmpass){
                $hash = password_hash($user_password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_email`, `user_password`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $showAlert = true;
                    header("Location: /codefork/index.php?signupsuccess=true");
                    exit();
                }
            }
            else{
                $showError = "Passwords do not match";  
            }
        }
        header("Location: /codefork/index.php?signupsuccess=false&error=$showError");
    }
?>