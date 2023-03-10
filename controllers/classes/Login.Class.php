<?php
declare(strict_types = 1);
    class Login extends DataBase{
        public string $userEmail;
        public string $userPass;
        public string $message;
        public bool $status;

        public function logUserIn(){
            $checkUser = "SELECT * FROM users WHERE userEmail =:email";
            $checkUserStmt = self::$pdo->prepare($checkUser);
            $checkUserStmt->execute([
                ':email' => $this->userEmail
            ]);

            $userCount = $checkUserStmt->rowCount();

            if($userCount === 1){
                $userDetails = $checkUserStmt->fetch(PDO::FETCH_ASSOC);
                if(password_verify($this->userPass, $userDetails['userPassword'])){
                    $_SESSION['userId'] = $userDetails['userId'];
                    $_SESSION['userEmail'] = $userDetails['userEmail'];
                    $_SESSION['userName'] = $userDetails['userName'];
                    $_SESSION['login'] = true;

                    $this->message = "Logging in, please wait........";
                    $this->status = true;
                }else{
                    $this->message = "Wrong password!";
                    $this->status = false;

                }
            }elseif($userCount > 1){
                
                $this->message = "This email is associated with more than one account!";
                $this->status = false;
            }else{
                
                $this->message = "Account does not exist!";
                $this->status = false;
            }

            /* echo json_encode([
                "status" => $this->status,
                "message" => $this->message
            ], JSON_PRETTY_PRINT); */
        }

        public function logUserOut(){
            session_destroy();

            header('Location: /');
        }
    }