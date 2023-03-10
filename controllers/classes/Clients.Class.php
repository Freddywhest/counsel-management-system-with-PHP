<?php
declare(strict_types = 1);

class Clients extends DataBase{
    public static string $stIdNumber;
    public static string $stName;
    public static string $stDepartment;
    public static string $stProgramme;
    public static string $stLevel;
    public static string $stHall;
    public static string $stRoomNo;
    public static string $stWhatsappNo;
    public static string $stOtherNo;
    public static string $stEmail;
    public static string $stDob;
    public static string $stSiblings;
    public static string $stBirthPosition;
    public static string $stGender;
    public static string $stMaritalStatus;
    public static string $stDependents;
    public static string $stGuardianOccupation;
    public static string $stGuardianContact;
    public static string $gdAcademicAchieved;
    public static string $gdMaritalStatus;
    public static string $anyIssue;
    public static string $gdAcademic;
    public static string $gdSocial;
    public static string $gdPolitical;
    public static string $anyOther;
    public static string $gdFAcademic;
    public static string $gdFSocial;
    public static string $gdFPolitical;
    public static string $fAnyOther;
    public static string $ChildrenInSch;
    public static string $caringParent;
    public static string $caringSiblings;
    public static string $likes;
    public static string $dislikes;
    public static string $aspirations;
    public static string $strengths;
    public static string $weakness;
    public static string $healthState;
    public static string $suicide;
    public static string $contactRelative;
    public static string $contactRoomMate;
    public static string $contactFriend;
    public static string $personalIssues;
    public static string $groupCounselling;
    public static string $stReligion;


    public static string $sfName;
    public static string $sfGender;
    public static string $sfCategory;
    public static string $sfDepartment;
    public static string $sfPosition;
    public static string $sfOtherPosition;
    public static string $sfWhatsappNo;
    public static string $sfAnyContact;
    public static string $sfEmail;
    public static string $sfPersonalIssue;
    public static string $staffDate;
    public static string $staffCsvFile;


    public static string $issue;
    public static string $goal;
    public static string $intervention;
    public static string $skills;
    public static string $evaluation;
    public static string $clientType;
    public static string $dateAndTime;

    public static int $studentId;
    public static string|int $studentIndex;
    public static int $staffId;
    public static int $logId;

    public static array|bool $allStudents;
    public static int|bool $allStudentsCount;
    public static array|bool $student;
    public static int|bool $studentCount;

    public static array|bool $allStaffs;
    public static int|bool $allStaffsCount;
    public static array|bool $staff;
    public static int|bool $staffCount;
    
    public static array|bool $allLogs;
    public static int|bool $allLogsCount;
    public static array|bool $log;
    public static array|bool $setting;
    public static int|bool $logCount;

    static public function addStudent(){
        (new self)->__construct();
        $addStudent = "INSERT INTO students(stIdNumber, stName, stDepartment, stProgramme, stLevel, stHall, stRoomNo, stWhatsappNo, stOtherNo, stEmail, stDob, stSiblings, stBirthPosition, stGender, stMaritalStatus, stDependents, stGuardianOccupation, stGuardianContact, gdAcademicAchieved, gdMaritalStatus, anyIssue, gdAcademic, gdSocial, gdPolitical, anyOther, gdFAcademic, gdFSocial, gdFPolitical, fAnyOther,  ChildrenInSch, caringParent, caringSiblings, likes, dislikes, aspirations, strengths, weakness, healthState, suicide, contactRelative, contactRoomMate, personalIssues, groupCounselling, contactFriend, stReligion) VALUES (:stIdNumber, :stName, :stDepartment, :stProgramme, :stLevel, :stHall, :stRoomNo, :stWhatsappNo, :stOtherNo, :stEmail, :stDob, :stSiblings, :stBirthPosition, :stGender, :stMaritalStatus, :stDependents, :stGuardianOccupation, :stGuardianContact, :gdAcademicAchieved, :gdMaritalStatus, :anyIssue, :gdAcademic, :gdSocial, :gdPolitical, :anyOther, :gdFAcademic, :gdFSocial, :gdFPolitical, :fAnyOther,  :ChildrenInSch, :caringParent, :caringSiblings, :likes, :dislikes, :aspirations, :strengths, :weakness, :healthState, :suicide, :contactRelative, :contactRoomMate, :personalIssues, :groupCounselling, :contactFriend, :stReligion)";
        $addStudentStmt = self::$pdo->prepare($addStudent);
        $addStudentStmt->execute([
            ':stIdNumber' => self::$stIdNumber,
            ':stName' => self::$stName,
            ':stDepartment' => self::$stDepartment,
            ':stProgramme' => self::$stProgramme,
            ':stLevel' => self::$stLevel,
            ':stHall' => self::$stHall,
            ':stRoomNo' => self::$stRoomNo,
            ':stWhatsappNo' => self::$stWhatsappNo,
            ':stOtherNo' => self::$stOtherNo,
            ':stEmail' => self::$stEmail,
            ':stDob' => self::$stDob,
            ':stSiblings' => self::$stSiblings,
            ':stBirthPosition' => self::$stBirthPosition,
            ':stGender' => self::$stGender,
            ':stMaritalStatus' => self::$stMaritalStatus,
            ':stDependents' => self::$stDependents,
            ':stGuardianOccupation' => self::$stGuardianOccupation,
            ':stGuardianContact' => self::$stGuardianContact,
            ':gdAcademicAchieved' => self::$gdAcademicAchieved,
            ':gdMaritalStatus' => self::$gdMaritalStatus,
            ':anyIssue' => self::$anyIssue,
            ':gdAcademic' => self::$gdAcademic,
            ':gdSocial' => self::$gdSocial,
            ':gdPolitical' => self::$gdPolitical,
            ':anyOther' => self::$anyOther,
            ':gdFAcademic' => self::$gdFAcademic,
            ':gdFSocial' => self::$gdFSocial,
            ':gdFPolitical' => self::$gdFPolitical,
            ':fAnyOther' => self::$fAnyOther,
            ':ChildrenInSch' => self::$ChildrenInSch,
            ':caringParent' => self::$caringParent,
            ':caringSiblings' => self::$caringSiblings,
            ':likes' => self::$likes,
            ':dislikes' => self::$dislikes,
            ':aspirations' => self::$aspirations,
            ':strengths' => self::$strengths,
            ':weakness' => self::$weakness,
            ':healthState' => self::$healthState,
            ':suicide' => self::$suicide,
            ':contactRelative' => self::$contactRelative,
            ':contactRoomMate' => self::$contactRoomMate,
            ':personalIssues' => self::$personalIssues,
            ':groupCounselling' => self::$groupCounselling,
            ':contactFriend' => self::$contactFriend,
            ':stReligion' => self::$stReligion
        ]);


    }


    static public function addStaff(){
        (new self)->__construct();
        $addStaff = "INSERT INTO staffs (sfName, sfGender, sfCategory, sfDepartment, sfPosition, sfOtherPosition, sfWhatsappNo, sfAnyContact, sfEmail, sfPersonalIssue, staffDate) VALUES (:sfName, :sfGender, :sfCategory, :sfDepartment, :sfPosition, :sfOtherPosition, :sfWhatsappNo, :sfAnyContact, :sfEmail, :sfPersonalIssue, :staffDate)";
        $addStaffStmt = self::$pdo->prepare($addStaff);
        $addStaffStmt->execute([
            ':sfName' => self::$sfName,
            ':sfGender' => self::$sfGender,
            ':sfCategory' => self::$sfCategory,
            ':sfDepartment' => self::$sfDepartment,
            ':sfPosition' => self::$sfPosition,
            ':sfOtherPosition' => self::$sfOtherPosition,
            ':sfWhatsappNo' => self::$sfWhatsappNo,
            ':sfAnyContact' => self::$sfAnyContact,
            ':sfEmail' => self::$sfEmail,
            ':sfPersonalIssue' => self::$sfPersonalIssue,
            ':staffDate' => date('Y-m-d')
        ]);
    }


    static public function addStaffByCsv(){
        (new self)->__construct();
        $csvOpen = fopen(self::$staffCsvFile, 'r');
        fgetcsv($csvOpen);
        while (($staffDetail = fgetcsv($csvOpen, 10000, ","))){
            $sfNewDate = explode(" ", $staffDetail[0]);
            $addStaff = "INSERT INTO staffs (sfName, sfGender, sfCategory, sfDepartment, sfPosition, sfOtherPosition, sfWhatsappNo, sfAnyContact, sfEmail, sfPersonalIssue, staffDate) VALUES (:sfName, :sfGender, :sfCategory, :sfDepartment, :sfPosition, :sfOtherPosition, :sfWhatsappNo, :sfAnyContact, :sfEmail, :sfPersonalIssue, :staffDate)";
            $addStaffStmt = self::$pdo->prepare($addStaff);
            $addStaffStmt->execute([
                ':sfName' => $staffDetail[1],
                ':sfGender' => $staffDetail[2],
                ':sfCategory' => $staffDetail[3],
                ':sfDepartment' => $staffDetail[4],
                ':sfPosition' => $staffDetail[5],
                ':sfOtherPosition' => $staffDetail[6],
                ':sfWhatsappNo' => $staffDetail[7],
                ':sfAnyContact' => $staffDetail[8],
                ':sfEmail' => $staffDetail[9],
                ':sfPersonalIssue' => $staffDetail[10],
                ':staffDate' => $sfNewDate[0]
            ]);
        }
    }

    static public function addLog($param){
        (new self)->__construct();
        $addLog = "INSERT INTO logs(issue, goal, intervention, skills, evaluation, dateAndTime, clientType, clientId) VALUES (:issue, :goal, :intervention, :skills, :evaluation, :dateAndTime, :clientType, :clientId)";
        $addLogStmt = self::$pdo->prepare($addLog);
        $addLogStmt->execute([
            ':issue' => self::$issue,
            ':goal' => self::$goal,
            ':intervention' => self::$intervention,
            ':skills' => self::$skills,
            ':evaluation' => self::$evaluation,
            ':dateAndTime' => date('Y-m-d'),
            ':clientType' => $_GET['etr3545-3656-32dsdf-32dsd-fdhg-323-sads-23-sddfds-a'],
            ':clientId' => $param
        ]);
    }

    static public function updateStudent(){
        (new self)->__construct();
        $updateStud = "UPDATE students SET stIdNumber=:stIdNumber, stName=:stName, stDepartment=:stDepartment, stProgramme=:stProgramme ,stLevel=:stLevel ,stHall=:stHall, stRoomNo=:stRoomNo, stWhatsappNo=:stWhatsappNo, stOtherNo=:stOtherNo, stEmail=:stEmail, stDob=:stDob, stSiblings=:stSiblings, stBirthPosition=:stBirthPosition, stGender=:stGender, stMaritalStatus=:stMaritalStatus, stDependents=:stDependents, stGuardianOccupation=:stGuardianOccupation, stGuardianContact=:stGuardianContact, gdAcademicAchieved=:gdAcademicAchieved, gdMaritalStatus=:gdMaritalStatus, anyIssue=:anyIssue, gdAcademic=:gdAcademic, gdSocial=:gdSocial, gdPolitical=:gdPolitical, anyOther=:anyOther, gdFAcademic=:gdFAcademic, gdFSocial=:gdFSocial, gdFPolitical=:gdFPolitical, fAnyOther=:fAnyOther,  ChildrenInSch=:ChildrenInSch, caringParent=:caringParent, caringSiblings=:caringSiblings, likes=:likes, dislikes=:dislikes, aspirations=:aspirations, strengths=:strengths, weakness=:weakness, healthState=:healthState, suicide=:suicide, contactRelative=:contactRelative, contactRoomMate=:contactRoomMate, personalIssues=:personalIssues, groupCounselling=:groupCounselling, contactFriend =:contactFriend, stReligion =:stReligion WHERE id =:id";

        $updateStudStmt = self::$pdo->prepare($updateStud);
        $updateStudStmt->execute([
            ':stIdNumber' => self::$stIdNumber,
            ':stName' => self::$stName,
            ':stDepartment' => self::$stDepartment,
            ':stProgramme' => self::$stProgramme,
            ':stLevel' => self::$stLevel,
            ':stHall' => self::$stHall,
            ':stRoomNo' => self::$stRoomNo,
            ':stWhatsappNo' => self::$stWhatsappNo,
            ':stOtherNo' => self::$stOtherNo,
            ':stEmail' => self::$stEmail,
            ':stDob' => self::$stDob,
            ':stSiblings' => self::$stSiblings,
            ':stBirthPosition' => self::$stBirthPosition,
            ':stGender' => self::$stGender,
            ':stMaritalStatus' => self::$stMaritalStatus,
            ':stDependents' => self::$stDependents,
            ':stGuardianOccupation' => self::$stGuardianOccupation,
            ':stGuardianContact' => self::$stGuardianContact,
            ':gdAcademicAchieved' => self::$gdAcademicAchieved,
            ':gdMaritalStatus' => self::$gdMaritalStatus,
            ':anyIssue' => self::$anyIssue,
            ':gdAcademic' => self::$gdAcademic,
            ':gdSocial' => self::$gdSocial,
            ':gdPolitical' => self::$gdPolitical,
            ':anyOther' => self::$anyOther,
            ':gdFAcademic' => self::$gdFAcademic,
            ':gdFSocial' => self::$gdFSocial,
            ':gdFPolitical' => self::$gdFPolitical,
            ':fAnyOther' => self::$fAnyOther,
            ':ChildrenInSch' => self::$ChildrenInSch,
            ':caringParent' => self::$caringParent,
            ':caringSiblings' => self::$caringSiblings,
            ':likes' => self::$likes,
            ':dislikes' => self::$dislikes,
            ':aspirations' => self::$aspirations,
            ':strengths' => self::$strengths,
            ':weakness' => self::$weakness,
            ':healthState' => self::$healthState,
            ':suicide' => self::$suicide,
            ':contactRelative' => self::$contactRelative,
            ':contactRoomMate' => self::$contactRoomMate,
            ':personalIssues' => self::$personalIssues,
            ':groupCounselling' => self::$groupCounselling,
            ':contactFriend' => self::$contactFriend,
            ':stReligion' => self::$stReligion,
            ':id' => self::$studentId
        ]);
    } 
    
    static public function updateStaff(){
        (new self)->__construct();
        $updateStaff = "UPDATE staffs SET sfName =:sfName, sfGender =:sfGender, sfCategory =:sfCategory, sfDepartment =:sfDepartment, sfPosition =:sfPosition, sfOtherPosition =:sfOtherPosition, sfWhatsappNo =:sfWhatsappNo, sfAnyContact =:sfAnyContact, sfEmail =:sfEmail, sfPersonalIssue =:sfPersonalIssue WHERE id =:id";
        $updateStaffStmt = self::$pdo->prepare($updateStaff);
        $updateStaffStmt->execute([
            ':sfName' => self::$sfName,
            ':sfGender' => self::$sfGender,
            ':sfCategory' => self::$sfCategory,
            ':sfDepartment' => self::$sfDepartment,
            ':sfPosition' => self::$sfPosition,
            ':sfOtherPosition' => self::$sfOtherPosition,
            ':sfWhatsappNo' => self::$sfWhatsappNo,
            ':sfAnyContact' => self::$sfAnyContact,
            ':sfEmail' => self::$sfEmail,
            ':sfPersonalIssue' => self::$sfPersonalIssue,
            ':id' => self::$staffId
        ]);
    }

    static public function updateLog($param){
        (new self)->__construct();
        $updateLog = "UPDATE logs SET issue =:issue, goal =:goal, intervention =:intervention, skills =:skills, evaluation =:evaluation WHERE id =:id";
        $updateLogStmt = self::$pdo->prepare($updateLog);
        $updateLogStmt->execute([
            ':issue' => self::$issue,
            ':goal' => self::$goal,
            ':intervention' => self::$intervention,
            ':skills' => self::$skills,
            ':evaluation' => self::$evaluation,
            ':id' => $param
        ]);
    }

    static public function getAllStudents(){
        (new self)->__construct();
        $getAllStuds = "SELECT * FROM students";
        $getAllStudsStmt = self::$pdo->prepare($getAllStuds);
        $getAllStudsStmt->execute();

        self::$allStudents = $getAllStudsStmt->fetchAll(PDO::FETCH_ASSOC);
        self::$allStudentsCount = $getAllStudsStmt->rowCount();

    }

    static public function getStudent(){
        (new self)->__construct();
        $getStud = "SELECT * FROM students WHERE id =:id";
        $getStudStmt = self::$pdo->prepare($getStud);
        $getStudStmt->execute([
            ':id' => self::$studentId
        ]);

        self::$student = $getStudStmt->fetch(PDO::FETCH_ASSOC);
        self::$studentCount = $getStudStmt->rowCount();

    }

    static public function checkStudent(){
        (new self)->__construct();
        $getStud = "SELECT stIdNumber FROM students WHERE stIdNumber =:id";
        $getStudStmt = self::$pdo->prepare($getStud);
        $getStudStmt->execute([
            ':id' => self::$studentIndex
        ]);

        self::$studentCount = $getStudStmt->rowCount();
    }

    static public function getAllStaffs(){
        (new self)->__construct();
        $getAllStaffs = "SELECT * FROM staffs";
        $getAllStaffsStmt = self::$pdo->prepare($getAllStaffs);
        $getAllStaffsStmt->execute();

        self::$allStaffs = $getAllStaffsStmt->fetchAll(PDO::FETCH_ASSOC);
        self::$allStaffsCount = $getAllStaffsStmt->rowCount();
    }

    static public function getStaff(){
        (new self)->__construct();
        $getStaff = "SELECT * FROM staffs WHERE id =:id";
        $getStaffStmt = self::$pdo->prepare($getStaff);
        $getStaffStmt->execute([
            ':id' => self::$staffId
        ]);

        self::$staff = $getStaffStmt->fetch(PDO::FETCH_ASSOC);
        self::$staffCount = $getStaffStmt->rowCount();
    }

    static public function getAllLogs(){
        (new self)->__construct();
       $getAllLogs = "SELECT * FROM logs";
       $getAllLogsStmt = self::$pdo->prepare($getAllLogs);
       $getAllLogsStmt->execute();

       self::$allLogs = $getAllLogsStmt->fetchAll(PDO::FETCH_ASSOC);
       self::$allLogsCount = $getAllLogsStmt->rowCount();
    }

    static public function getLog(){
        (new self)->__construct();
       $getLog = "SELECT * FROM logs WHERE id =:id";
       $getLogStmt = self::$pdo->prepare($getLog);
       $getLogStmt->execute([
        ':id' => self::$logId
       ]);

       self::$log = $getLogStmt->fetch(PDO::FETCH_ASSOC);
       self::$logCount = $getLogStmt->rowCount();
    }

    static public function getSettings(){
        (new self)->__construct();
       $getSettings = "SELECT * FROM settings";
       $getSettingsStmt = self::$pdo->prepare($getSettings);
       $getSettingsStmt->execute();

       self::$setting = $getSettingsStmt->fetch(PDO::FETCH_ASSOC);
    }

}