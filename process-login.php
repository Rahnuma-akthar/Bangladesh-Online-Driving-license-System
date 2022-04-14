<?php
include_once 'module/class.loginlogout.php';

// After pressing the Cancel button
        if(isset($_POST['cancel'])):
            header('Location: /views/index.php');
        endif;

$login = new LoginLogout();
if(isset($_POST['login']) && $_POST['login']=='লগইন করুন'):
    if($_POST['loginEmail']):
        $email = $_POST['loginEmail'];
    endif;

    if($_POST['password']):
        $password = $_POST['password'];
    endif;

    $data = array(
        'email'     => $email,
        'password'  => $password
    );
    
    $login->login($data);


    
endif;