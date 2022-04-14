<?php
class Feedback{
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

    public function givenFeedback($userID){
        $checkSQL = "SELECT `given_feedback` FROM `user` WHERE `user_id` = '$userID'";
        $result = $this->connection->query($checkSQL);
        return $result->fetch_assoc();

    }

    public function getFeedBack($data){
        // var_dump($data);
        $userID = $data['userID'];
        $q1 = $data['q1'];
        $q2 = $data['q2'];
        $q3 = $data['q3'];
        $q4 = $data['q4'];

        // ------------  QUESTION 1 ---------------------------------------|
        $sqlQ1 = "SELECT * FROM `user_feedback` WHERE `question_number` = '1'";
        $question1result = $this->connection->query($sqlQ1);
        // var_dump($question1result);
        // die();

        $Question1 = $question1result->fetch_assoc();

        $marksQ1 = (int)$Question1['answer_rating'];
        $answeredUserQ1 = (int)$Question1['total_answered_user'];

        $tempMarkQ1 = $marksQ1 + $q1;
        $tempAnsweredUserQ1 = $answeredUserQ1 + 1;

        $updateQ1SQL = "UPDATE `user_feedback` SET `answer_rating`='$tempMarkQ1',`total_answered_user`='$tempAnsweredUserQ1' WHERE `question_number` = '1'";
        $this->connection->query($updateQ1SQL);
        // ------------  QUESTION 1 ---------------------------------------|



        // ------------  QUESTION 2 ---------------------------------------|
        $sqlQ2 = "SELECT * FROM `user_feedback` WHERE `question_number` = '2'";
        $question2result = $this->connection->query($sqlQ2);

        $Question2 = $question2result->fetch_assoc();

        $marksQ2 = $Question2['answer_rating'];
        $answeredUserQ2 = $Question2['total_answered_user'];

        $tempMarkQ2 = $marksQ2 + $q2;
        $tempAnsweredUserQ2 = $answeredUserQ2 + 1;

        $updateQ2SQL = "UPDATE `user_feedback` SET `answer_rating`='$tempMarkQ2',`total_answered_user`='$tempAnsweredUserQ2' WHERE `question_number` = '2'";
        $this->connection->query($updateQ2SQL);
        // ------------  QUESTION 2 ---------------------------------------|


        // ------------  QUESTION 3 ---------------------------------------|
        $sqlQ3 = "SELECT * FROM `user_feedback` WHERE `question_number` = '3'";
        $question3result = $this->connection->query($sqlQ3);

        $Question3 = $question3result->fetch_assoc();

        $marksQ3 = $Question3['answer_rating'];
        $answeredUserQ3 = $Question3['total_answered_user'];

        $tempMarkQ3 = $marksQ3 + $q3;
        $tempAnsweredUserQ3 = $answeredUserQ3 + 1;

        $updateQ3SQL = "UPDATE `user_feedback` SET `answer_rating`='$tempMarkQ3',`total_answered_user`='$tempAnsweredUserQ3' WHERE `question_number` = '3'";
        $this->connection->query($updateQ3SQL);
        // ------------  QUESTION 3 ---------------------------------------|



        // ------------  QUESTION 4 ---------------------------------------|
        $sqlQ4 = "SELECT * FROM `user_feedback` WHERE `question_number` = '4'";
        $question4result = $this->connection->query($sqlQ4);

        $Question4 = $question4result->fetch_assoc();

        $marksQ4 = $Question4['answer_rating'];
        $answeredUserQ4 = $Question4['total_answered_user'];

        $tempMarkQ4 = $marksQ4 + $q4;
        $tempAnsweredUserQ4 = $answeredUserQ4 + 1;

        $updateQ4SQL = "UPDATE `user_feedback` SET `answer_rating`='$tempMarkQ4',`total_answered_user`='$tempAnsweredUserQ4' WHERE `question_number` = '4'";
        $this->connection->query($updateQ4SQL);


        // ------------  QUESTION 4 ---------------------------------------|

        $updateUserTableSQL = "UPDATE `user` SET `given_feedback`='1' WHERE `user_id` = '$userID'";
        $this->connection->query($updateUserTableSQL);
        // var_dump($updateUserTableSQL);
        // die();

    }
}