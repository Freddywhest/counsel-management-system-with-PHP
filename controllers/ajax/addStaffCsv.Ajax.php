<?php 
    if(isset($_POST['addCsv'])){
        if(class_exists('Clients')){
            $csvCheckArray = array(
                'text/csv',
                'application/csv'
            );
            if(isset($_FILES['csvFile']['name']) && !empty($_FILES['csvFile']['name'])){
                if(in_array($_FILES['csvFile']['type'], $csvCheckArray)){
                    $status = true;
                    $message = "Staff(s) successfully inserted, please wait....";
                    Clients::$staffCsvFile = $_FILES['csvFile']['tmp_name'];
                    Clients::addStaffByCsv();
                    
                }else{
                    $status = false;
                    $message = "Invalid csv file!";
                }

            }else{
                $status = false;
                $message = "Please select csv file!";
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