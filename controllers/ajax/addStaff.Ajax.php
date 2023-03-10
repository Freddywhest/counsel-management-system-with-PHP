<?php
    if(isset($_POST['addStaff'])){
        if(class_exists('Clients')){
            $sfName = $_POST['sfName'];
            $sfGender = $_POST['sfGender'];
            $sfCategory = $_POST['sfCategory'];
            $sfDepartment = $_POST['sfDepartment'];
            $sfPosition = $_POST['sfPosition'];
            $sfOtherPosition = $_POST['sfOtherPosition'];
            $sfWhatsappNo = $_POST['sfWhatsappNo'];
            $sfAnyContact = $_POST['sfAnyContact'];
            $sfEmail = $_POST['sfEmail'];
            $sfPersonalIssue = $_POST['sfPersonalIssue'];

            if(empty($sfName)){
                $status = false;
                $message = "Please enter staff name!";

            }else if(empty($sfGender)){
                $status = false;
                $message = "Please enter staff gender!";
                
            }else if(empty($sfCategory)){
                $status = false;
                $message = "Please enter staff category!";
                
            }else if(empty($sfDepartment)){
                $status = false;
                $message = "Please enter staff department!";

            }else{
                $status = true;
                    $message = "Staff successfully added, please wait ....";
    
                Clients::$sfName = $sfName;
                Clients::$sfGender = $sfGender;
                Clients::$sfCategory = $sfCategory;
                Clients::$sfDepartment = $sfDepartment;
                Clients::$sfPosition = $sfPosition;
                Clients::$sfOtherPosition = $sfOtherPosition;
                Clients::$sfWhatsappNo = $sfWhatsappNo;
                Clients::$sfAnyContact = $sfAnyContact;
                Clients::$sfEmail = $sfEmail;
                Clients::$sfPersonalIssue = $sfPersonalIssue;
                Clients::addStaff();
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
        'status' => $status,
        'message' => $message
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);