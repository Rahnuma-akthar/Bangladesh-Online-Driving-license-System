<?php
class Report {

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
    
    public function successReport($id){
        $userInformationSQL = "SELECT `name`, `nid` FROM `user` WHERE `nid`= '$id'";
        $resultUserInfo = $this->connection->query($userInformationSQL);
        return $resultUserInfo->fetch_assoc();
    }


    public function basicInfo($user_id){
        $sql = "SELECT * FROM `user` WHERE `user_id` = '$user_id'";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }

    public function getTrainingInfo($userID){
        $getTrainingSQL = "SELECT                
                              `training_info`.`batch_no`, `training_info`.`training_done`,
                              `training_schedule`.`training_shift`, `training_schedule`.`training_days`,
                              `user`.`user_id`, `user`.`name`
                            FROM
                              `training_info` INNER JOIN
                              `training_schedule` ON `training_schedule`.`batch_no` =
                                `training_info`.`batch_no` INNER JOIN
                              `user` ON `user`.`user_id` = `training_info`.`user_id`
                            WHERE
                                `training_info`.`user_id` = '$userID'";

        return $this->connection->query($getTrainingSQL);
    }

    public function singleTrainingInfo($batchNo){

        $singleInfoSQL = "SELECT
                              `master_training`.`training_id`,
                              `master_training`.`training_name`
                            FROM
                              `master_training`
                            WHERE
                              `master_training`.`training_id` = '$batchNo'";
        $result = $this->connection->query($singleInfoSQL);
        return $result->fetch_assoc();

    }

    public function transactionReport($userID){
        $transactionReportSQL = "SELECT * FROM `payment_history` WHERE `user_id`= '$userID'";

        return $this->connection->query($transactionReportSQL);;
    }

    public function examSchedule($userID){
        $sql = "SELECT * FROM `user_exam_schedule` WHERE `user_id` = '$userID'";

        return $this->connection->query($sql);

    }

    public function checkLicenseValidity($userID){
        $validitySQL = "SELECT
                  `license_info`.`user_id`, `license_info`.`license_issue_date`,
                  `license_info`.`license_validity`, `license_info`.`license_identity_number`,
                  `license_info`.`license_type`, `license_info`.`license_token`,
                  `license_info`.`delivered`,
                  `master_license`.`license_name`
                FROM
                  `license_info` INNER JOIN
                  `master_license` ON `master_license`.`license_id` =
                    `license_info`.`license_type`
                WHERE
                   `license_info`.user_id = '$userID'
                ORDER by `license_info`.`license_issue_date` DESC LIMIT 1";

        return $this->connection->query($validitySQL);
    }

    // FeedBack Result return Query  --------------------------------|

    public function getAllUndeliverdList(){

      $undeliveredListSQL = "SELECT * FROM `license_info` WHERE `delivered` = 0";
      return $this->connection->query($undeliveredListSQL);
    }

    public function feedbackResult($questionNumber){
      $feedbackResultSQL = "SELECT * FROM `user_feedback` WHERE `question_number`= '$questionNumber'";
      $result =  $this->connection->query($feedbackResultSQL);
      // var_dump($feedbackResultSQL);die();
      return $result->fetch_assoc();
    }
}
   