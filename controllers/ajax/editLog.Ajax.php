<?php
if(isset($_POST['updateLog'])){
    if(class_exists('Clients')){
        Clients::$issue = $_POST['issue'];
        Clients::$goal = $_POST['goal'];
        Clients::$intervention = $_POST['intervention'];
        Clients::$skills = $_POST['skills'];
        Clients::$evaluation = $_POST['evaluation'];
        Clients::updateLog($param);
        $status = true;
        $message = "Report successfully updated, please wait.....";
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
    'status' => $status,
    'message' => $message
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);