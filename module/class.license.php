<?php
class License{

    public $connection;

    function __construct(){
        $servername = 'localhost';
        $username   = 'root';
        $password   = '';
        $database   = 'brta_online_licensing';

        $this->connection = new mysqli($servername, $username, $password, $database);
        if($this->connection->connect_error):
            die("connection failed: " . $this->connection->connect_error);
        endif;

    }

    public function insertLicenseApplicant($data){
        $userID = $data['userID'];
        $licenseType = $data['trainingType'];
        $transactionID = $data['transactionID'];
        $amount = $data['amount'];

        $month = date("m");
        $year  = date("Y");

        $trainingInsertSQL = "INSERT INTO `payment_history`(`user_id`, `transaction_number`, `training_or_license`, `payment_for`, `amount`, `month`, `year`) 
                                                    VALUES ('$userID', '$transactionID', 2, '$licenseType', '$amount', '$month', '$year')";

        $this->connection->query($trainingInsertSQL);
        return true;
    }

    public function getExamSchedule(){
        $examScheduleSQL = "SELECT * FROM `exam_schedule` WHERE 1";

        return $this->connection->query($examScheduleSQL);

    }

    public function setExamSchedule($data){

        $shift = $data['shift'];
        $date = $data['examDate'];
        $batchNo = $data['batchNo'];

        $updateExamScheduleSQL = "UPDATE `exam_schedule` SET `exam_date`= '$date' ,`shift`= '$shift' WHERE `applied_batch` = '$batchNo'";
        $this->connection->query($updateExamScheduleSQL);
        return true;
    }

    public function getExamApplicant(){
        $applicantsSQL = "SELECT
                              `payment_history`.`is_assigned`, `payment_history`.`training_or_license`,
                              `payment_history`.`user_id`, `user`.`name`, `payment_history`.`is_paid`,
                              `payment_history`.`payment_for`
                            FROM
                              `payment_history` INNER JOIN
                              `user` ON `payment_history`.`user_id` = `user`.`user_id`
                            WHERE
                              `payment_history`.`is_assigned` = 0 AND
                              `payment_history`.`training_or_license` = 2";
        return $this->connection->query($applicantsSQL);
    }


    public function getLicenseApplicants(){
        $getLicenseApplicantSQL = "SELECT
                                      `payment_history`.`user_id`, 
                                      `user`.`name`, 
                                      `payment_history`.`payment_for`,
                                      `master_license`.`license_name`,
                                      `payment_history`.`training_or_license`,
                                      `payment_history`.`is_assigned`,
                                      `payment_history`.`is_paid`
                                    FROM
                                      `master_license` INNER JOIN
                                      `payment_history` ON `payment_history`.`payment_for` =
                                        `master_license`.`license_id` INNER JOIN
                                      `user` ON `payment_history`.`user_id` = `user`.`user_id`
                                    WHERE
                                      `payment_history`.`is_paid` = 1 AND
                                      `payment_history`.`license_given` = 0 AND
                                      `payment_history`.`training_or_license` = 2";

        return $this->connection->query($getLicenseApplicantSQL);
    }

    // ----------- Assign for Exam ----------------------------------------|
    public function assignExamApplicants($data)
    {

        $userID = $data['userID'];
        $examCode = $data['examCode'];
        if ($examCode == 3):
            $getExamScheduleSQL = "SELECT * FROM `exam_schedule` WHERE 1";
            $schedule = $this->connection->query($getExamScheduleSQL);
            while ($row = mysqli_fetch_assoc($schedule)) {
                $examName = $row['name'];
                $examDate = $row['exam_date'];
                $examShift = $row['shift'];
                $insertSQL = "INSERT INTO `user_exam_schedule`(`user_id`, `exam_name`, `exam_date`, `exam_shift`)
                                    VALUES ('$userID', '$examName', '$examDate', '$examShift')";
                $this->connection->query($insertSQL);
            }
            $updateSQL = "UPDATE `payment_history` SET `is_assigned`= 1 WHERE `user_id` = '$userID' AND `payment_for` = '$examCode'";
            $this->connection->query($updateSQL);
        elseif ($examCode == 4):
            $getExamScheduleSQL = "SELECT * FROM `exam_schedule` WHERE `applied_batch` != 3";
            $schedule = $this->connection->query($getExamScheduleSQL);
            while ($row = mysqli_fetch_assoc($schedule)) {
                $examName = $row['name'];
                $examDate = $row['exam_date'];
                $examShift = $row['shift'];
                $insertSQL = "INSERT INTO `user_exam_schedule`(`user_id`, `exam_name`, `exam_date`, `exam_shift`)
                                    VALUES ('$userID', '$examName', '$examDate', '$examShift')";
                $this->connection->query($insertSQL);
            }
            $updateSQL = "UPDATE `payment_history` SET `is_assigned`= 1 WHERE `user_id` = '$userID' AND `payment_for` = '$examCode'";
            $this->connection->query($updateSQL);
            elseif ($examCode == 5):
                $deletePreviousRecordSQL = "DELETE FROM `user_exam_schedule` WHERE `user_id` = '$userID'";
                $this->connection->query($deletePreviousRecordSQL);
                $getExamScheduleSQL = "SELECT * FROM `exam_schedule` WHERE 1";
                $schedule = $this->connection->query($getExamScheduleSQL);
                while ($row = mysqli_fetch_assoc($schedule)) {
                    $examName = $row['name'];
                    $examDate = $row['exam_date'];
                    $examShift = $row['shift'];
                    $insertSQL = "INSERT INTO `user_exam_schedule`(`user_id`, `exam_name`, `exam_date`, `exam_shift`)
                                    VALUES ('$userID', '$examName', '$examDate', '$examShift')";
                    $this->connection->query($insertSQL);
                }
                $updateSQL = "UPDATE `payment_history` SET `is_assigned`= 1 WHERE `user_id` = '$userID' AND `payment_for` = '$examCode'";
                $this->connection->query($updateSQL);
        elseif ($examCode == 6):
            $deletePreviousRecordSQL = "DELETE FROM `user_exam_schedule` WHERE `user_id` = '$userID'";
            $this->connection->query($deletePreviousRecordSQL);
            $getExamScheduleSQL = "SELECT * FROM `exam_schedule` WHERE `applied_batch` != 3";
            $schedule = $this->connection->query($getExamScheduleSQL);
            while ($row = mysqli_fetch_assoc($schedule)) {
                $examName = $row['name'];
                $examDate = $row['exam_date'];
                $examShift = $row['shift'];
                $insertSQL = "INSERT INTO `user_exam_schedule`(`user_id`, `exam_name`, `exam_date`, `exam_shift`)
                                    VALUES ('$userID', '$examName', '$examDate', '$examShift')";
                $this->connection->query($insertSQL);
            }
            $updateSQL = "UPDATE `payment_history` SET `is_assigned`= 1 WHERE `user_id` = '$userID' AND `payment_for` = '$examCode'";
            $this->connection->query($updateSQL);
        endif;
    }
    // ----------- Assign for Exam ----------------------------------------|


    

    // ----------------- Approve License Applicants   ----------------------------------|
    public function createLicense($data){
        $userID = $data['userID'];
        $licenseType = $data['licenseType'];
        $licenseToken = $licenseType.$userID;
        $issueDate =  date("Y-m-d");


        if($licenseType == 1): // For Learner License category 1
                $your_date = strtotime("112 day", strtotime($issueDate));
                $validTill = date("Y-m-d", $your_date);
                $insertLicenseCat1SQL = "INSERT INTO `license_info`
                                                (`user_id`, `license_issue_date`, `license_validity`, `license_identity_number`, `license_type`, `license_token`)
                                                VALUES ('$userID', '$issueDate', '$validTill', '$licenseToken', '$licenseType', '$licenseToken')";
                $this->connection->query($insertLicenseCat1SQL);
                $updatePaymentHistorySQL = "UPDATE `payment_history` SET `is_assigned`= 1, `license_given`= 1 WHERE `user_id`= '$userID' AND `payment_for`= '$licenseType' AND `training_or_license`= '2'";
                $this->connection->query($updatePaymentHistorySQL);

        elseif($licenseType == 2):   // For Learner License category 2
                $your_date = strtotime("112 day", strtotime($issueDate));
                $validTill = date("Y-m-d", $your_date);
                $insertLicenseCat2SQL = "INSERT INTO `license_info`
                                                (`user_id`, `license_issue_date`, `license_validity`, `license_identity_number`, `license_type`, `license_token`)
                                                VALUES ('$userID', '$issueDate', '$validTill', '$licenseToken', '$licenseType', '$licenseToken')";
                $this->connection->query($insertLicenseCat2SQL);
                $updatePaymentHistorySQL = "UPDATE `payment_history` SET `is_assigned`= 1, `license_given`= 1 WHERE `user_id`= '$userID' AND `payment_for`= '$licenseType' AND `training_or_license`= '2'";
                $this->connection->query($updatePaymentHistorySQL);

        elseif($licenseType == 3):  // Smart Card Professional
                $your_date = strtotime("1825 day", strtotime($issueDate));
                $validTill = date("Y-m-d", $your_date);
                $insertLicenseSmartCardProfSQL = "INSERT INTO `license_info`
                                                (`user_id`, `license_issue_date`, `license_validity`, `license_identity_number`, `license_type`, `license_token`, `delivered`)
                                                VALUES ('$userID', '$issueDate', '$validTill', '$licenseToken', '$licenseType', '$licenseToken', 0)";
                $this->connection->query($insertLicenseSmartCardProfSQL);
                $updatePaymentHistorySQL = "UPDATE `payment_history` SET `license_given`= 1 WHERE `user_id`= '$userID' AND `payment_for`= '$licenseType' AND `training_or_license`= '2'";
                $this->connection->query($updatePaymentHistorySQL);

        elseif($licenseType == 4):   // Smart Card Non-professional
                $your_date = strtotime("3650 day", strtotime($issueDate));
                $validTill = date("Y-m-d", $your_date);
                $insertLicenseSmartCardNonProfSQL = "INSERT INTO `license_info`
                                                (`user_id`, `license_issue_date`, `license_validity`, `license_identity_number`, `license_type`, `license_token`, `delivered`)
                                                VALUES ('$userID', '$issueDate', '$validTill', '$licenseToken', '$licenseType', '$licenseToken', 0)";
                $this->connection->query($insertLicenseSmartCardNonProfSQL);
                $updatePaymentHistorySQL = "UPDATE `payment_history` SET `license_given`= 1 WHERE `user_id`= '$userID' AND `payment_for`= '$licenseType' AND `training_or_license`= '2'";
                $this->connection->query($updatePaymentHistorySQL);

        elseif($licenseType == 5):   // Renew License Professional
                $selectLicenseIDSQL = "SELECT
                                          `license_info`.`user_id`, `license_info`.`license_validity`,
                                          `license_info`.`license_type`, `license_info`.`license_identity_number`
                                        FROM
                                          `license_info`
                                        WHERE 
                                           `user_id` = '$userID' AND
                                           `license_type` = '3'";
                $getLicenseInfo = $this->connection->query($selectLicenseIDSQL);
                $licenseInfo = $getLicenseInfo->fetch_assoc(); 
                $licenseNumber = $licenseInfo['license_identity_number'];

                $your_date = strtotime("1825 day", strtotime($issueDate));
                $validTill = date("Y-m-d", $your_date);

                $licenseValidityUpdateSQL = "UPDATE `license_info` SET `license_validity`= '$validTill', `updated_at`='$issueDate', `delivered` = 0 WHERE `license_identity_number` = '$licenseNumber'";
                 
                $this->connection->query($licenseValidityUpdateSQL);

                $updatePaymentHistorySQL = "UPDATE `payment_history` SET `license_given`= 1 WHERE `user_id`= '$userID' AND `payment_for`= '$licenseType' AND `training_or_license`= '2'";
                $this->connection->query($updatePaymentHistorySQL);



        elseif($licenseType == 6):   // Renew License Non-Professional
            $selectLicenseIDSQL = "SELECT
                                          `license_info`.`user_id`, `license_info`.`license_validity`,
                                          `license_info`.`license_type`, `license_info`.`license_identity_number`
                                        FROM
                                          `license_info`
                                        WHERE 
                                           `user_id` = '$userID' AND
                                           `license_type` = '4'";
                $getLicenseInfo = $this->connection->query($selectLicenseIDSQL);
                $licenseInfo = $getLicenseInfo->fetch_assoc();
                $licenseNumber = $licenseInfo['license_identity_number'];

                $your_date = strtotime("3650 day", strtotime($issueDate));
                $validTill = date("Y-m-d", $your_date);

                $licenseValidityUpdateSQL = "UPDATE `license_info` SET `license_validity`= '$validTill', `updated_at`='$issueDate', `delivered` = 0 WHERE `license_identity_number` = '$licenseNumber'";
                $this->connection->query($licenseValidityUpdateSQL);

                $updatePaymentHistorySQL = "UPDATE `payment_history` SET `license_given`= 1 WHERE `user_id`= '$userID' AND `payment_for`= '$licenseType' AND `training_or_license`= '2'";
                $this->connection->query($updatePaymentHistorySQL);

        endif;
    }

    // ----------------- Approve License Applicants   ----------------------------------|

    public function checkLicenseValidity($licenseID){
        $sqlForCheck = "SELECT * FROM `license_info` WHERE `license_identity_number` = '$licenseID'";
        return $this->connection->query($sqlForCheck);

    }

    public function licenseDelivered($licenseToken){
        $deliveredSQL = "UPDATE `license_info` SET `delivered`=1 WHERE `license_token` = '$licenseToken'";
        return $this->connection->query($deliveredSQL);
    }

    // ---------------------- Decline Applicant for  License  ---------------------------------|

    public function declineApplicant($data){
        $userID=  $data['userID']; 
        $examCode= $data['licenseType'];
        #------ Detele from Exam Schedule ----------|

        $deleteSQL = "DELETE FROM `user_exam_schedule` WHERE `user_id` = '$userID'";
        
        $this->connection->query($deleteSQL);



        #------ Update Pyament History Table for Back Track  ---------------------------------|

        $updateSQL = "UPDATE `payment_history` SET `is_assigned`= 0 WHERE `user_id` = '$userID' AND `payment_for` = '$examCode'";
        // var_dump($updateSQL);die();
        $this->connection->query($updateSQL);

        return 0;


    }

    // ---------------------- Decline Applicant for  License  ---------------------------------|

}