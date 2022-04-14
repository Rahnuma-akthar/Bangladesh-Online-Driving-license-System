<?php
include_once './module/class.training.php';
$training = new Training();

//--------- Insert Trainee  -------------------|
    if(isset($_POST['Apply']) && $_POST['formName']=='training'):

        if(isset($_POST['userID'])):
            $userID = $_POST['userID'];
        endif;

        if(isset($_POST['trainingType'])):
            $trainingType = $_POST['trainingType'];
            $trainingTypeArray = explode(" ", $trainingType);
            $trainingType = $trainingTypeArray[0];
            $amount = $trainingTypeArray[1];
        endif;

        if(isset($_POST['transaction_id'])):
            $transactionID = $_POST['transaction_id'];
        endif;

        $data = array();
        $data = [
            'trainingType' => $trainingType,
            'amount' => $amount,
            'userID' => $userID,
            'transactionID' => $transactionID,
        ];

        $training->insertTrainee($data);
        header("Location: /views/user.apply-for-training.php");

    endif;
//    ----------  Insert Trainee  -----------------|



//    ---------- Set Training Schedle -------------|
    if(isset($_POST['Approve']) && $_POST['Approve'] == 'Approve'):
    $transactionID ='';
        if(isset($_POST['transactionID'])):
            $transactionID = $_POST['transactionID'];
        endif;

        $training->approvePayment($transactionID);
        header("Location: /views/admin.payment.collection.php");
    endif;

    if(isset($_POST['Update']) && $_POST['Update'] == 'Update'):
        $trainingShift = $trainingDays = $trainingShiftFrom = $trainingShiftTo = $batchNo='';
        if(isset($_POST['trainingShiftFrom'])):
            $trainingShiftFrom = $_POST['trainingShiftFrom'];
        endif;

        if(isset($_POST['trainingShiftTo'])):
            $trainingShiftTo = $_POST['trainingShiftTo'];
            $trainingShift = $trainingShiftFrom.', '.$trainingShiftTo;
        endif;

        if(isset($_POST['trainingDays'])):
            $trainingDays = $_POST['trainingDays'];

        endif;
        if(isset($_POST['batchNo'])):
            $batchNo = $_POST['batchNo'];
        endif;
        $data = array();

        $data = [
            'trainingShift' => $trainingShift,
            'trainingDays' => $trainingDays,
            'batchNo' => $batchNo,
        ];

        $training->updateTrainingSchedule($data);

        header("Location: /views/admin.set.training.schedule.php");
    endif;
//    --------- Set Training Schedule  --------------------|



//    --------- Assign for Training    --------------------|
    if(isset($_POST['AssignforTraining']) && $_POST['AssignforTraining'] == 'Assign for Training'):
        $userID = '';
        if(isset($_POST['User_ID'])):
            $userID = $_POST['User_ID'];
        endif;

        if(isset($_POST['trainingSeries'])):
            $trainingSeries = $_POST['trainingSeries'];
        endif;

        if(isset($_POST['transactionNumber'])):
            $transactionNumber = $_POST['transactionNumber'];
        endif;

        $data = array();

        $data = [
          'userID' => $userID,
          'trainingID' => $trainingSeries,
          'transactionNumber' => $transactionNumber,
        ];

        $training->assignForTraining($data);

        header("Location: /views/admin.assign.training.applicants.php");

    endif;

//    -------- Assign for Training    --------------------|

//    ----------- End Training  --------------------------|

    if(isset($_POST['Done']) && $_POST['Done'] == 'Set to End'):
        $userID = $_POST['userId'];
        $rowID  = $_POST['rowID'];

        $data = array();
        $data = [
            'userID' => $userID,
            'rowID'  => $rowID,
        ];
        $training->setToEnd($data);
        header("Location: /views/admin.end.training.applicants.php");
    endif;
//    ----------- End Training  --------------------------|
