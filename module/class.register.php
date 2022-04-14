<?php
class Register
{
    public function index()
    {

    }
    public function checknInsert($data)
    {
        include_once "dbconnector.php";

        $userName           = $data['UserName'];
        $fatherName         = $data['FatherName'];
        $motherName         = $data['MotherName'];
        $presentAddress     = $data['PresentAddress'];
        $permanentAddress   = $data['PermanentAddress']; 
        $email              = $data['email'];
        $phoneNumber        = $data['phoneNumber'];
        $nidNumber          = $data['NIDnumber'];
        $DoB                = $data['DoB'];
        $gender             = $data['gender'];
        $password           = $data['password'];


        /*---------------------------------------
           Let's check for the duplicate Email ID
        ----------------------------------------*/
        $checkEmailSQL = "SELECT * FROM `user` WHERE `email`='$email'";

        $resultEmail = $database->query($checkEmailSQL);
       
        $duplicateEmailEntry = $resultEmail->num_rows;
        if($duplicateEmailEntry > 0):
            $message = 'আপনার ইমেইলটি আগে একবার ব্যবহার করা হয়েছে ';
            header('Location: views/registration.php?message='.$message);
            die();
        endif;

        /*----------------------------------
           Let's check for the duplicate NID
        -------------------------------------*/
        
        $checkNIDSQL = "SELECT * FROM `user` WHERE `nid`='$nidNumber'";
        $resultNID = $database->query($checkNIDSQL);
       
        $duplicateEntry = $resultNID->num_rows;
        
        if($duplicateEntry > 0):
            $message = 'আপনার জাতীয় পরিচয় পত্র নম্বরটি আমাদের সাইটে নিবন্ধিত';
            header('Location: views/registration.php?message='.$message);
            die();
        endif;

        
        /*
        CREATING USER ID ALGORITHM: 
        -------------------------------------------||
        YEAR(00) MONTH(00) DATE(00) SERIAL(000000) ||
        -------------------------------------------||
        */
        $date = date('d');
		$month = date('m');
		$year = date('y');
		$Year_full = date('Y');
		$selectQuery = "SELECT * FROM `user` WHERE `month` = '$month' AND `year` = '$Year_full'";
        $result = $database->query($selectQuery);


        if($result==false):
            $rowcount= 0;
        else:
            $rowcount= $result->num_rows;
        endif;
        $rowcount= (int)$rowcount;
        $rowcount = $rowcount+1;
        $rowcount = sprintf('%06d', $rowcount);
        $userID = $year.$month.$date.$rowcount;


        /*-------------------------------
            #inserting into USER table
        --------------------------------*/
        $insertIntoUserSQL = "INSERT INTO `user`(`name`,`father_name`, `mother_name`, `date_of_birth`, `email`, `phone_number`, `present_address`, `premanent_address`,`sex`, `nid`, `user_type`, `user_id` ,`month`, `year`) 
                                            VALUES ('$userName','$fatherName','$motherName','$DoB', '$email', '$phoneNumber', '$presentAddress', '$permanentAddress', '$gender', '$nidNumber','User', '$userID','$month', '$Year_full')";


        $insertUser = $database->query($insertIntoUserSQL);
        
        
        
        /*--------------------------------
            Hashing The Password into MD5
        ----------------------------------*/
        $password = md5($password);
        
        /*------------------------------------
            #inserting into USER_LOGIN table
        -------------------------------------*/
        
        $insertIntoUserLoginSQL = "INSERT INTO `user_login`(`email`, `password`,`user_type`) 
                                                    VALUES ('$email','$password','User')";

        $insertUserLogin = $database->query($insertIntoUserLoginSQL);

        header('Location: views/success.php?nid='.$nidNumber);

    }
}
