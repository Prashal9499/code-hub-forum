<?php
    $showError = "false";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_connectdb.php';
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        if($numRows==1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['user_password'])){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['sno'] = $row['sno'];
                $_SESSION['useremail'] = $email;
                echo "logged in" . $email;
                header("Location:/codehub/index.php");
            }
            else{
                header("Location:/codehub/index.php");
            }
        }
    }
?>