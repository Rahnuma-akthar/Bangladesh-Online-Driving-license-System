<?php
include_once './module/class.feedback.php';

$feedBack = new Feedback();
if($_POST['sendFeedback'] && $_POST['sendFeedback']=="সাবমিট করুন"):
// var_dump($_POST);
// die();

$userID = $_POST['userID'];
$q1Answer = $_POST['q1'];
$q2Answer = $_POST['q2'];
$q3Answer = $_POST['q3'];
$q4Answer = $_POST['q4'];

$data = array();

$data = [
    'userID' => $userID,
    'q1' => $q1Answer,
    'q2' => $q2Answer,
    'q3' => $q3Answer,
    'q4' => $q4Answer,
];

$feedBack->getFeedBack($data);
header("Location: /views/user.feedback.php");
endif;