<?php
include_once("module/class.register.php");
// ___________________________________________________________________
// 
// This section will be activated when the user will try to register
// ___________________________________________________________________

$register = new Register(); //creating an object instance 

// After pressing the Cancel button
        if(isset($_POST['cancel'])):
            header('Location: /views/index.php');
        endif;
        
// After pressing the Register button
        if(isset($_POST['register'])):
            if(isset($_POST['registerName'])):                                  //--------------NAME
                $userName   = $_POST['registerName'];
            endif;
            if(isset($_POST['registerFatherName'])):                            //--------------FATHER NAME
                $fatherName = $_POST['registerFatherName'];
            endif;
            if(isset($_POST['registerMotherName'])):                            //--------------MOTHER NAME
                $motherName = $_POST['registerMotherName'];
            endif;
            if(isset($_POST['registerPresentAdress'])):                         //--------------PRESENT ADDRESS
                $presentAddress = $_POST['registerPresentAdress'];
            endif;
            if(isset($_POST['registerPermanentAddress'])):                      //--------------PERMANENT ADDRESS
                $permanentAddress = $_POST['registerPermanentAddress'];
            endif;
            if(isset($_POST['registerEmail'])):                                 //--------------EMAIL
                $email = $_POST['registerEmail'];
            endif;
            if(isset($_POST['registerPhoneNumber'])):                           //--------------PHONE NUMBER
                $phoneNumber = $_POST['registerPhoneNumber'];
            endif;
            if(isset($_POST['registerNIDNumber'])):                             //--------------NID NUMBER
                $NIDnumber = $_POST['registerNIDNumber'];
            endif;
            if(isset($_POST['registerDoB'])):                                   //--------------DATE of BIRTH
                $DoB = $_POST['registerDoB'];
            endif;
            if(isset($_POST['registerGender'])):                                   //--------------GENDER
                $gender = $_POST['registerGender'];
            endif;
            if(isset($_POST['password'])):                                      //--------------PASSWORD
                $password= $_POST['password'];
            endif;
            if(isset($_POST['repeatPassword'])):                                //--------------REPEAT PASSWORD
                $repeatPassword = $_POST['repeatPassword'];
            endif;   

            $data= array(
                        'UserName'          => $userName,
                        'FatherName'        => $fatherName,
                        'MotherName'        => $motherName,
                        'PresentAddress'    => $presentAddress,
                        'PermanentAddress'  => $permanentAddress,
                        'email'             => $email,
                        'phoneNumber'       => $phoneNumber,
                        'NIDnumber'         => $NIDnumber,
                        'DoB'               => $DoB,
                        'gender'            => $gender,
                        'password'          => $password,
            );

            $insertData = $register->checknInsert($data);
        endif;
