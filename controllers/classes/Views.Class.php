<?php 
    class Views{
        public function Home(){
            if(isset($_SESSION['userId']) && isset($_SESSION['userEmail']) && isset($_SESSION['login'])){
                include $_SERVER['DOCUMENT_ROOT'].'/views/dashboard.phtml';
                /* echo "Home"; */
            }else{
                session_destroy();
                include $_SERVER['DOCUMENT_ROOT'].'/views/login.phtml';
            }

        }

        public function About(){
            if(isset($_SESSION['userId']) && isset($_SESSION['userEmail']) && isset($_SESSION['login'])){
                /* include $_SERVER['DOCUMENT_ROOT'].'/views/login.phtml'; */
                echo "About";
            }else{
                session_destroy();
                include $_SERVER['DOCUMENT_ROOT'].'/views/login.phtml';
            }
        }

        public function Reports(){
            if(isset($_SESSION['userId']) && isset($_SESSION['userEmail']) && isset($_SESSION['login'])){
                include $_SERVER['DOCUMENT_ROOT'].'/views/logs.phtml';
            }else{
                session_destroy();
                include $_SERVER['DOCUMENT_ROOT'].'/views/login.phtml';
            }
        }

        public function Staffs(){
            if(isset($_SESSION['userId']) && isset($_SESSION['userEmail']) && isset($_SESSION['login'])){
                include $_SERVER['DOCUMENT_ROOT'].'/views/staffs.phtml';
            }else{
                session_destroy();
                include $_SERVER['DOCUMENT_ROOT'].'/views/login.phtml';
            }
        }

        public function Students(){
            if(isset($_SESSION['userId']) && isset($_SESSION['userEmail']) && isset($_SESSION['login'])){
                include $_SERVER['DOCUMENT_ROOT'].'/views/students.phtml';
            }else{
                session_destroy();
                include $_SERVER['DOCUMENT_ROOT'].'/views/login.phtml';
            }
        }

        public function AddStudent(){
            if(isset($_SESSION['userId']) && isset($_SESSION['userEmail']) && isset($_SESSION['login'])){
                include $_SERVER['DOCUMENT_ROOT'].'/views/addStud.phtml';
            }else{
                session_destroy();
                include $_SERVER['DOCUMENT_ROOT'].'/views/login.phtml';
            }
        }

        public function AddStaff(){
            if(isset($_SESSION['userId']) && isset($_SESSION['userEmail']) && isset($_SESSION['login'])){
                include $_SERVER['DOCUMENT_ROOT'].'/views/addStaff.phtml';
            }else{
                session_destroy();
                include $_SERVER['DOCUMENT_ROOT'].'/views/login.phtml';
            }
        }

        public function EditStudent($param){
            if(isset($_SESSION['userId']) && isset($_SESSION['userEmail']) && isset($_SESSION['login'])){
                Clients::$studentId = $param;
                Clients::getStudent();
                if(Clients::$studentCount === 0){
                    include $_SERVER['DOCUMENT_ROOT'].'/views/404.phtml';
                }else{
                    include $_SERVER['DOCUMENT_ROOT'].'/views/editStud.phtml';

                }
            }else{
                session_destroy();
                include $_SERVER['DOCUMENT_ROOT'].'/views/login.phtml';
            }
        }

        public function NewCounsel($param){
            if(isset($_SESSION['userId']) && isset($_SESSION['userEmail']) && isset($_SESSION['login'])){
                if(isset($_GET['etr3545-3656-32dsdf-32dsd-fdhg-323-sads-23-sddfds-a']) && $_GET['etr3545-3656-32dsdf-32dsd-fdhg-323-sads-23-sddfds-a'] === 'student'){
                    Clients::$studentId = $param;
                    Clients::getStudent();
                    if(Clients::$studentCount === 0){
                        include $_SERVER['DOCUMENT_ROOT'].'/views/404.phtml';
                    }else{
                        include $_SERVER['DOCUMENT_ROOT'].'/views/newLog.phtml';
    
                    }

                }else if(isset($_GET['etr3545-3656-32dsdf-32dsd-fdhg-323-sads-23-sddfds-a']) && $_GET['etr3545-3656-32dsdf-32dsd-fdhg-323-sads-23-sddfds-a'] === 'staff'){
                        Clients::$staffId = $param;
                        Clients::getStaff();
                        if(Clients::$staffCount === 0){
                            include $_SERVER['DOCUMENT_ROOT'].'/views/404.phtml';
                        }else{
                            include $_SERVER['DOCUMENT_ROOT'].'/views/newLog.phtml';
        
                        }
                }else{
                    include $_SERVER['DOCUMENT_ROOT'].'/views/404.phtml';
                }
            }else{
                session_destroy();
                include $_SERVER['DOCUMENT_ROOT'].'/views/login.phtml';
            }
        }

        public function EditCounsel($param){
            if(isset($_SESSION['userId']) && isset($_SESSION['userEmail']) && isset($_SESSION['login'])){
                if(isset($_GET['etr3545-3656-32dsdf-32dsd-fdhg-323-sads-23-sddfds-a']) && $_GET['etr3545-3656-32dsdf-32dsd-fdhg-323-sads-23-sddfds-a'] === 'student'){
                    Clients::$studentId = $_GET['cidmt'];
                    Clients::getStudent();
                    if(Clients::$studentCount === 0){
                        include $_SERVER['DOCUMENT_ROOT'].'/views/404.phtml';
                    }else{
                        Clients::$logId = $param;
                        Clients::getLog();
                        if(Clients::$logCount === 0){
                            include $_SERVER['DOCUMENT_ROOT'].'/views/404.phtml';

                        }else{
                            include $_SERVER['DOCUMENT_ROOT'].'/views/editLog.phtml';

                        }
    
                    }

                }else if(isset($_GET['etr3545-3656-32dsdf-32dsd-fdhg-323-sads-23-sddfds-a']) && $_GET['etr3545-3656-32dsdf-32dsd-fdhg-323-sads-23-sddfds-a'] === 'staff'){
                        Clients::$staffId = $_GET['cidmt'];
                        Clients::getStaff();
                        if(Clients::$staffCount === 0){
                            include $_SERVER['DOCUMENT_ROOT'].'/views/404.phtml';
                        }else{
                            Clients::$logId = $param;
                            Clients::getLog();

                            if(Clients::$logCount === 0){
                                include $_SERVER['DOCUMENT_ROOT'].'/views/404.phtml';
    
                            }else{
                                include $_SERVER['DOCUMENT_ROOT'].'/views/editLog.phtml';
    
                            }        
                        }
                }else{
                    include $_SERVER['DOCUMENT_ROOT'].'/views/404.phtml';
                }
            }else{
                session_destroy();
                include $_SERVER['DOCUMENT_ROOT'].'/views/login.phtml';
            }
        }

        public function EditStaff($param){
            if(isset($_SESSION['userId']) && isset($_SESSION['userEmail']) && isset($_SESSION['login'])){
                Clients::$staffId = $param;
                Clients::getStaff();
                if(Clients::$staffCount === 0){
                    include $_SERVER['DOCUMENT_ROOT'].'/views/404.phtml';
                }else{
                    include $_SERVER['DOCUMENT_ROOT'].'/views/editStaff.phtml';

                }
            }else{
                session_destroy();
                include $_SERVER['DOCUMENT_ROOT'].'/views/login.phtml';
            }
        }
    }