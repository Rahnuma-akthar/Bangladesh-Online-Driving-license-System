<?php

class Training{

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

    public function insertTrainee($data){
        $userID = $data['userID'];
        $trainingType = $data['trainingType'];
        $transactionID = $data['transactionID'];
        $amount = $data['amount'];

        $month = date("m");
        $year  = date("Y");

        $trainingInsertSQL = "INSERT INTO `payment_history`(`user_id`, `transaction_number`, `training_or_license`, `payment_for`, `amount`, `month`, `year`) 
                                                    VALUES ('$userID', '$transactionID', 1, '$trainingType', '$amount', '$month', '$year')";

        $this->connection->query($trainingInsertSQL);
        return true;
    }


    public function getPaidList(){
        $getPaidListSQL = "SELECT * FROM `payment_history` WHERE `is_paid` = 1";
        return $this->connection->query($getPaidListSQL);
    }

    public function getPendingList(){
        $getPendingListSQL = "SELECT
                              `payment_history`.`user_id`,
                              `payment_history`.`transaction_number`,
                              `payment_history`.`training_or_license`,
                              `payment_history`.`amount`,
                              `payment_history`.`date`,
                              `user`.`name`
                            FROM
                              `payment_history`
                              INNER JOIN `user` ON `payment_history`.`user_id` = `user`.`user_id` 
                            WHERE `is_paid` = 0";
        return $this->connection->query($getPendingListSQL);
    }

    public function approvePayment($transactionID){
        $approvePaymentSQL = "UPDATE `payment_history` SET `is_paid`= 1 WHERE`transaction_number` = '$transactionID'";
        $this->connection->query($approvePaymentSQL);
    }

    public function getTrainingSchedule(){
        $getTrainingScheduleSQL= "SELECT * FROM `training_schedule` WHERE 1";
        return $this->connection->query($getTrainingScheduleSQL);
    }

    public function updateTrainingSchedule($data){
        $trainingShift = $data['trainingShift'];
        $trainingDays  = $data['trainingDays'];
        $batchNo = $data['batchNo'];
        $updateTrainingScheduleSQL = "UPDATE `training_schedule` SET `training_shift`= '$trainingShift' ,`training_days`= '$trainingDays' WHERE `batch_no`= '$batchNo'";
        $this->connection->query($updateTrainingScheduleSQL);
    }

    public function getApplicantAssign(){

        $getApplicantAssignSQL = "SELECT
                                      `payment_history`.`transaction_number`,
                                      `payment_history`.`training_or_license`,
                                      `payment_history`.`payment_for`,
                                      `payment_history`.`is_paid`,
                                      `payment_history`.`is_assigned`,
                                      `payment_history`.`user_id`,
                                      `user`.`name`
                                    FROM
                                      `payment_history`
                                      INNER JOIN `user` ON `payment_history`.`user_id` = `user`.`user_id`
                                  WHERE 
                                      `payment_history`.`is_paid` = 1 AND 
                                      `payment_history`.`is_assigned` = 0";
        return $this->connection->query($getApplicantAssignSQL);


    }

    public function assignForTraining($data){

        $userID = $data['userID'];
        $trainingID = $data['trainingID'];
        $transactionNumber = $data['transactionNumber'];

        $insertSQL = "INSERT INTO `training_info`(`user_id`, `batch_no`)
                                          VALUES ('$userID','$trainingID')";

        $this->connection->query($insertSQL);

        $updateSQL = "UPDATE `payment_history` SET `is_assigned`= 1 WHERE `transaction_number` = '$transactionNumber'";

        $this->connection->query($updateSQL);
        return 0;

    }

    public function getAllTrainee(){
        $getAllTraineeSQL = "SELECT
                              `training_info`.`user_id`,
                              `training_info`.`training_done`,
                              `training_info`.`batch_no`,
                              `training_info`.`id`,
                              `user`.`name`,
                              `master_training`.`training_name`
                            FROM
                              `training_info`
                              INNER JOIN `user` ON `training_info`.`user_id` = `user`.`user_id`
                              INNER JOIN `master_training` ON `training_info`.`batch_no` =
                            `master_training`.`training_id`
                            WHERE `training_done` = 0";
        return $this->connection->query($getAllTraineeSQL);
    }

    public function setToEnd($data){
        $userID = $data['userID'];
        $rowID  = $data['rowID'];

        $updateTrainingInfoSQL = "UPDATE `training_info` SET `training_done`= 1 WHERE `id` = '$rowID'AND `user_id` = '$userID'";
        $this->connection->query($updateTrainingInfoSQL);
        return 0;
    }

}