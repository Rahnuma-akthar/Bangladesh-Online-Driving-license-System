<?php
class Security{

    function __construct() {
        session_start();
        if(!isset($_SESSION['UserAccess'])):
            header('Location: login.php');
            die();
        endif;
    }


    public function checkLogin(){
        if(!isset($_SESSION['UserAccess'])):
            header('Location: login.php');
            die();
        endif;

    }

}