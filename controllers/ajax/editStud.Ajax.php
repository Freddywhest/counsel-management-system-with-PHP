<?php

    if(isset($_POST['addStud'])){
        if(class_exists('Clients')){
            $stName = $_POST['stName'];
            $stIdNumber = $_POST['stIdNumber'];
            $stDepartment = $_POST['stDepartment'];
            $stProgramme = $_POST['stProgramme'];
            $stLevel = $_POST['stLevel'];
            $stHall = $_POST['stHall'];
            $stRoom = $_POST['stRoom'];
            $stWhatsapp = $_POST['stWhatsapp'];
            $stOtherContact = $_POST['stOtherContact'];
            $stEmail = $_POST['stEmail'];
            $stDob = $_POST['stDob'];
            $stSiblings = $_POST['stSiblings'];
            $stPob = $_POST['stPob'];
            $stGender = $_POST['stGender'];
            $stReligion = $_POST['stReligion'];
            $stNoc = $_POST['stNoc'];
            $stRelationship = $_POST['stRelationship'];
            $stGuOccup = $_POST['stGuOccup'];
            $stGuContact = $_POST['stGuContact'];
            $stLevelAch = $_POST['stLevelAch'];
            $stGuMarried = $_POST['stGuMarried'];
            $stAnyIssue = $_POST['stAnyIssue'];
            $stAAcademic = $_POST['stAAcademic'];
            $stASocial = $_POST['stASocial'];
            $stAPolitical = $_POST['stAPolitical'];
            $stAOther = $_POST['stAOther'];
            $stFAcademic = $_POST['stFAcademic'];
            $stFSocial = $_POST['stFSocial'];
            $stFPolitical = $_POST['stFPolitical'];
            $stFOther = $_POST['stFOther'];
            $stLikes = $_POST['stLikes'];
            $stDislikes = $_POST['stDislikes'];
            $stCis = $_POST['stCis'];
            $stCap = $_POST['stCap'];
            $stCys = $_POST['stCys'];
            $stAmbitions = $_POST['stAmbitions'];
            $stStrengths = $_POST['stStrengths'];
            $stWeaknesses = $_POST['stWeaknesses'];
            $stHealth = $_POST['stHealth'];
            $stSuicide = $_POST['stSuicide'];
            $stRelative = $_POST['stRelative'];
            $stFriend = $_POST['stFriend'];
            $stRoommate = $_POST['stRoommate'];
            $stBothering = $_POST['stBothering'];
            $stACTIVITY = $_POST['stACTIVITY'];

            if(empty($stName)){
                $status = false;
                $message = "Please enter your student name!";

            }else if(empty($stIdNumber)){
                $status = false;
                $message = "Please enter your student id number!";

            }else if(empty($stDepartment)){
                $status = false;
                $message = "Please enter your student department!";

            }else if(empty($stProgramme)){
                $status = false;
                $message = "Please enter your student programme!";

            }else if(empty($stLevel)){
                $status = false;
                $message = "Please enter your student level/year!";

            }else if(empty($stHall)){
                $status = false;
                $message = "Please enter your student hall!";

            }else if(empty($stRoom)){
                $status = false;
                $message = "Please enter your student room number!";

            }else if(empty($stDob)){
                $status = false;
                $message = "Please enter your student date of birth!";

            }else if(empty($stGender)){
                $status = false;
                $message = "Please enter your student gender!";

            }else if(empty($stSiblings) && !strlen(trim($stSiblings))){
                $status = false;
                $message = "Please enter your student number of siblings!";

            }else if(empty($stPob)){
                $status = false;
                $message = "Please enter your student position of birth!";

            }else if(empty($stReligion)){
                $status = false;
                $message = "Please enter your student religion!";
                
            }else if(empty($stNoc) && !strlen(trim($stNoc))){
                $status = false;
                $message = "Please enter your student number of children!";

            }else if(empty($stLikes)){
                $status = false;
                $message = "Please enter your student likes!";

            }else if(empty($stDislikes)){
                $status = false;
                $message = "Please enter your student dislikes!";

            }else if(empty($stStrengths)){
                $status = false;
                $message = "Please enter your student strenghts!";

            }else if(empty($stWeaknesses)){
                $status = false;
                $message = "Please enter your student weaknesses!";

            }else if(empty($stHealth)){
                $status = false;
                $message = "Please enter your student health state!";

            }else if(empty($stSuicide)){
                $status = false;
                $message = "Have you ever had any thought of suicide / attempted suicide field shouldn't be empty!";

            }else if(empty($stACTIVITY)){
                $status = false;
                $message = "GROUP COUNSELLING / PSYCHOEDUCATIONAL GROUP ACTIVITIES field shouldn't be empty!";

            }else{
                Clients::$studentIndex = $stIdNumber;
                Clients::checkStudent();
                if(Clients::$student['stIdNumber'] !== $stIdNumber && Clients::$studentCount !== 0){
                    header('Content-Type: application/json; charset=utf-8');
                    echo json_encode([
                        'status' => false,
                        'message' => "Student Id number already exist!"
                    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                    exit();
                }

                    $status = true;
                    $message = "Student details successfully updated, please wait ....";
    
                Clients::$stIdNumber = $stIdNumber;
                Clients::$stName = $stName;
                Clients::$stDepartment = $stDepartment;
                Clients::$stProgramme = $stProgramme;
                Clients::$stLevel = $stLevel;
                Clients::$stHall = $stHall;
                Clients::$stRoomNo = $stRoom;
                Clients::$stWhatsappNo = $stWhatsapp;
                Clients::$stOtherNo = $stOtherContact;
                Clients::$stEmail = $stEmail;
                Clients::$stDob = $stDob;
                Clients::$stSiblings = $stSiblings;
                Clients::$stBirthPosition = $stPob;
                Clients::$stGender = $stGender;
                Clients::$stMaritalStatus = $stRelationship;
                Clients::$stDependents = $stNoc;
                Clients::$stGuardianOccupation = $stGuOccup;
                Clients::$stGuardianContact = $stGuContact;
                Clients::$gdAcademicAchieved = $stLevelAch;
                Clients::$gdMaritalStatus = $stGuMarried;
                Clients::$anyIssue = $stAnyIssue;
                Clients::$gdAcademic = $stAAcademic;
                Clients::$gdSocial = $stASocial;
                Clients::$gdPolitical = $stAPolitical;
                Clients::$anyOther = $stAOther;
                Clients::$gdFAcademic = $stFAcademic;
                Clients::$gdFSocial = $stFSocial;
                Clients::$gdFPolitical = $stFPolitical;
                Clients::$fAnyOther = $stFOther;
                Clients::$likes = $stLikes;
                Clients::$dislikes = $stDislikes;
                Clients::$aspirations = $stAmbitions;
                Clients::$strengths = $stStrengths;
                Clients::$weakness = $stWeaknesses;
                Clients::$healthState = $stHealth;
                Clients::$suicide = $stSuicide;
                Clients::$contactRelative = $stRelative;
                Clients::$contactFriend = $stFriend;
                Clients::$contactRoomMate = $stRoommate;
                Clients::$personalIssues = $stBothering;
                Clients::$groupCounselling = $stACTIVITY;
                Clients::$ChildrenInSch = $stCis;
                Clients::$caringParent = $stCap;
                Clients::$stReligion = $stReligion;
                Clients::$caringSiblings = $stCys;
                Clients::updateStudent();
               
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