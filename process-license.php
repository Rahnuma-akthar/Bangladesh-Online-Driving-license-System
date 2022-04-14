<?php
include_once './module/class.license.php';
$license = new License();

// ---------- Approve License Applicants  --------------|
if(isset($_POST['formName']) && $_POST['formName']=='license'):
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

    $license->insertLicenseApplicant($data);
    header("Location: /views/user.apply-for-license.php");
endif;

// ---------- Approve License Applicants  --------------|

    if(isset($_POST['approveLicense']) && $_POST['approveLicense'] == "Approve License"):
        $userID = $_POST['User_ID'];
        $licenseType = $_POST['licenseSeries'];

        $data = array();

        $data = [
            'userID' => $userID,
            'licenseType' => $licenseType,
        ];

        $license->createLicense($data);

        header('Location: /views/admin.approve.applicants.for.license.php');

    endif;
// ---------- Approve License Applicants  --------------|




// ---------- Decline License Applicants  --------------|

if(isset($_POST['declineLicense']) && $_POST['declineLicense'] == "Decline License"):
    $userID = $_POST['User_ID'];
    $licenseType = $_POST['licenseSeries'];

    $data = array();

    $data = [
        'userID' => $userID,
        'licenseType' => $licenseType,
    ];


    // var_dump($data);
    // die();

    $license->declineApplicant($data);

    header('Location: /views/admin.approve.applicants.for.license.php');

endif;


// ---------- Decline License Applicants  --------------|



// ---------- Check Validity    ------------------------|
if(isset($_POST['checkValidity']) && $_POST['checkValidity'] == "Check Validity"):
    $licenseID = $_POST['licenseID'];
    $validity = $license->checkLicenseValidity($licenseID);
    $result = $validity->fetch_assoc();

    $licenseNumber = $result['license_identity_number'];
    $issueDate = $result['license_issue_date'];
    $validTill = $result['license_validity'];
    header('Location: /views/admin.detect.license.php?ln='.$licenseNumber.'&issueDate='.$issueDate.'&validTill='.$validTill.'');



endif;


if(isset($_POST['delivered']) && $_POST['delivered'] == "Delivered"):
    $licenseToken = $_POST['licenseToken'];
    $license->licenseDelivered($licenseToken);
    header('Location: /views/admin.license.delivered.php');
endif;