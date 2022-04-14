<?php
class LoginLogout {

    public function login($data){
        include_once 'dbconnector.php';


        $loginEmail      = $data['email'];
        $loginPassword   = md5($data['password']);

        $loginSQL = "SELECT * 
                     FROM `user_login` 
                     WHERE `email` = '$loginEmail'";

        $resultLogin = $database->query($loginSQL);
        $passwordData = $resultLogin->fetch_assoc();
        if($passwordData):
            $password = $passwordData['password'];
            $userAccess = $passwordData['user_type'];
            if($loginPassword == $password):
                 $userSQL = "SELECT * 
                             FROM `user` 
                             WHERE `email` = '$loginEmail'";

                $resultUser = $database->query($userSQL);
                $userData = $resultUser->fetch_assoc();
                $userName = $userData['name'];
                $userSex  = $userData['sex'];
                $userID   = $userData['user_id'];

                session_start();
                $_SESSION['UserAccess'] = $userAccess;
                $_SESSION['UserName']   = $userName;
                $_SESSION['UserSex']    = $userSex;
                $_SESSION['user_id']    = $userID;
                // TESTED OK
                header('Location: process-dashboard.php');
            else:
                $message = 'আপনি ভুল ইমেইল অথবা ভুল পাসওয়ার্ড দিয়েছেন !!! ';
                header('Location: views/login.php?message='.$message);
            endif;
        else:
                $message = 'আপনি ভুল ইমেইল অথবা ভুল পাসওয়ার্ড দিয়েছেন !!! ';
                header('Location: views/login.php?message='.$message);        
        endif;

        

    }

    public function logout(){
        session_start();
        session_destroy();
        header('Location: /index.php');

    }
}