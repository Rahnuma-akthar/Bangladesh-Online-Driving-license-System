<?php
include_once 'module/class.license.php';

$exam = new License();


// -----------Set Exam Schedule-------------------|
if(isset($_POST['setExamSchedule']) && $_POST['setExamSchedule'] == 'Set Exam Schedule'):

    $shift = $_POST['shift'];
    $examDate = $_POST['examDate'];
    $batchNo = $_POST['batchNo'];

    $data = array();

    $data = [
        'shift'      => $shift,
        'examDate'  => $examDate,
        'batchNo'   => $batchNo,
    ];

    $exam->setExamSchedule($data);
    header('Location: views/admin.set.exam.schedule.php');
endif;

// -----------Set Exam Schedule-------------------|

// ----------- Assign For Exam ------------------------|
if(isset($_POST['AssignforExam']) && $_POST['AssignforExam']=="Assign for Exam"):
    $userID = $_POST['User_ID'];
    $examCode = $_POST['examSeries'];

    $data = array();
    $data = [
        'userID' => $userID,
        'examCode' => $examCode,
    ];
    $exam->assignExamApplicants($data);
    header('Location: views/admin.assign.applicants.for.exam.php');
endif;
// ----------- Assign For Exam ------------------------|

