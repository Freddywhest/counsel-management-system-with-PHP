<?php
declare(strict_types = 1);


    class Models extends DataBase{
        public static string $userName;
        public static string $userPass;
        public static string $userEmail;
        public static string $siteLogo;
        public static string $siteName;
        protected static string $tableName;

        static public function studentTable(){
            self::$tableName = 'students';
            $student = "CREATE TABLE IF NOT EXISTS 
            ".self::$tableName."
            (id int(11) NOT NULL AUTO_INCREMENT,
           stIdNumber varchar(55) NOT NULL,
           stName varchar(155) NOT NULL,
           stDepartment varchar(155) NOT NULL,
           stProgramme varchar(155) NOT NULL,
           stLevel varchar(55) NOT NULL,
           stHall varchar(55) NOT NULL,
           stRoomNo varchar(55) NOT NULL,
           stWhatsappNo varchar(55) NOT NULL,
           stOtherNo varchar(55) NOT NULL,
           stEmail varchar(55) DEFAULT NULL,
           stDob varchar(155) NOT NULL,
           stSiblings varchar(55) DEFAULT NULL,
           stBirthPosition varchar(55) DEFAULT NULL,
           stGender varchar(55) NOT NULL,
           stMaritalStatus varchar(55) DEFAULT NULL,
           stDependents varchar(55) DEFAULT NULL,
           stGuardianOccupation varchar(155) DEFAULT NULL,
           stGuardianContact varchar(55) DEFAULT NULL,
           gdAcademicAchieved varchar(155) DEFAULT NULL,
           gdMaritalStatus varchar(155) DEFAULT NULL,
           anyIssue text DEFAULT NULL,
           gdAcademic varchar(155) DEFAULT NULL,
           gdSocial varchar(155) DEFAULT NULL,
           gdPolitical varchar(155) DEFAULT NULL,
           anyOther text DEFAULT NULL,
           gdFAcademic varchar(155) DEFAULT NULL,
           gdFSocial varchar(155) DEFAULT NULL,
           gdFPolitical varchar(155) DEFAULT NULL,
           fAnyOther text DEFAULT NULL,
           ChildrenInSch varchar(55) DEFAULT NULL,
           caringParent varchar(55) DEFAULT NULL,
           caringSiblings varchar(55) DEFAULT NULL,
           likes text DEFAULT NULL,
           dislikes text DEFAULT NULL,
           aspirations text DEFAULT NULL,
           strengths text DEFAULT NULL,
           weakness text DEFAULT NULL,
           healthState text DEFAULT NULL,
           suicide varchar(55) DEFAULT NULL,
           contactRelative varchar(55) DEFAULT NULL,
           contactRoomMate varchar(55) DEFAULT NULL,
           personalIssues text DEFAULT NULL,
           groupCounselling text DEFAULT NULL,
           contactFriend varchar(55) DEFAULT NULL,
           stReligion varchar(155) DEFAULT NULL,
            PRIMARY KEY (id)
           ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;";
           
           $studentStmt = self::$pdo->prepare($student);
           $studentStmt->execute();
        }

        static public function logs(){
            self::$tableName = 'logs';
            $logs = "CREATE TABLE IF NOT EXISTS 
            ".self::$tableName."(
                id int(11) NOT NULL AUTO_INCREMENT,
                issue text NOT NULL,
                goal text NOT NULL,
                intervention text NOT NULL,
                skills text NOT NULL,
                evaluation text NOT NULL,
                dateAndTime varchar(105) NOT NULL,
                clientType varchar(50) NOT NULL,
                clientId INT NOT NULL,
                PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC";

            $logsStmt = self::$pdo->prepare($logs);
            $logsStmt->execute();

        }

        static public function staffs(){
            self::$tableName = 'staffs';
            $staffs = "CREATE TABLE IF NOT EXISTS 
            ".self::$tableName."(
            id int(11) NOT NULL AUTO_INCREMENT,
            sfName varchar(155) NOT NULL,
            sfGender varchar(255) NOT NULL,
            sfCategory varchar(155) NOT NULL,
            sfDepartment varchar(155) NOT NULL,
            sfPosition varchar(155) NOT NULL,
            sfOtherPosition text DEFAULT NULL,
            sfWhatsappNo varchar(55) DEFAULT NULL,
            sfAnyContact varchar(55) DEFAULT NULL,
            sfEmail varchar(155) DEFAULT NULL,
            sfPersonalIssue text NOT NULL,
            staffDate varchar(80) DEFAULT NULL,
            PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC";
            $staffsStmt = self::$pdo->prepare($staffs);
            $staffsStmt->execute();
        }

        static public function users(){
            self::$tableName = 'users';
            $users = "CREATE TABLE IF NOT EXISTS 
            ".self::$tableName." (
            userId int(11) NOT NULL AUTO_INCREMENT,
            userEmail varchar(155) NOT NULL,
            userName varchar(155) NOT NULL,
            userPassword varchar(255) NOT NULL,
            PRIMARY KEY (userId)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC";
            $usersStmt = self::$pdo->prepare($users);
            $usersStmt->execute();
        }

        static public function websiteSettings(){
            self::$tableName = 'settings';
            $websiteSettings = "CREATE TABLE IF NOT EXISTS 
            ".self::$tableName." (
            siteLogo varchar(155) NULL DEFAULT NULL,
            siteName varchar(155) NULL DEFAULT NULL
            ) ENGINE = InnoDB ROW_FORMAT=DYNAMIC";
            $websiteSettingsStmt = self::$pdo->prepare($websiteSettings);
            $websiteSettingsStmt->execute();
        }

        static public function addUser(){
            $passHash = password_hash(self::$userPass, PASSWORD_DEFAULT);
            $addUser = "INSERT INTO users(userEmail, userName, userPassword) VALUES (:uemail, :uname, :upass)";
            $addUserStmt = self::$pdo->prepare($addUser);
            $addUserStmt->execute([
                ':uemail' => self::$userEmail,
                ':uname' => self::$userName,
                ':upass' => $passHash
            ]);
        }

        static public function addWebsite(){
            $addWebsite = "INSERT INTO settings(siteLogo, siteName) VALUES (:siteLogo, :siteName)";
            $addWebsiteStmt = self::$pdo->prepare($addWebsite);
            $addWebsiteStmt->execute([
                ':siteLogo' => self::$siteLogo,
                ':siteName' => self::$siteName
            ]);
        }
    }