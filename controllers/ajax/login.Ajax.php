<?php
    if(isset($_POST['login'])){
        if(class_exists('Login')){
            $userEmail = $_POST['userEmail'];
            $userPassword = $_POST['userPassword'];

            if(empty($userEmail)){
                $status = false;
                $message = "Please enter your email!";

            }else if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
                $status = false;
                $message = "Please enter a valid email!";
     
            }else if(empty($userPassword)){
                $status = false;
                $message = "Please enter your password!";

            }else{
                $login = new Login();
                $login->userEmail = $userEmail;
                $login->userPass = $userPassword;
                $login->logUserIn();
                $message = $login->message;
                $status = $login->status;
            }
        }else{
            $status = false;
            $message = "The website scripts are not complete or some of the files are missing! <br /> Contact the creator for help on <b>Email: alfrednti466@gmail.com</b>.";

        }
    }else{

        $status = false;
        $message = "Bad request, Please try again!";

    }
header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    "status" => $status,
    "message" => $message
], JSON_PRETTY_PRINT);