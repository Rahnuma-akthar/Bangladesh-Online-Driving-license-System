<?php
include_once '../module/class.security.php';
$checkLogin = new Security();
$checkLogin->checkLogin();
include_once '../module/class.report.php';
$report = new Report;

$trainingInfo = $report->getTrainingInfo($_SESSION['user_id']);


include "template/user-header.php";
include "template/user-sidebar.php";


?>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <!-- THE END of THIS CLASS MAIN will be ended in the footer.php -->

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5 class="w3-center"><b> <?=$_SESSION['UserName']?>,  আপনাকে স্বাগতম |</b></h5>
    </header>

    <div class="w3-row-padding w3-margin-bottom">
        <!-- section of upper content of the page -->
        <center><h3><u>ট্রেনিং এর সময়সূচী </u></h3></center>

        <table class="w3-table w3-border">
            <tr>
                <th style="width: 30%">ট্রেনিং এর বিবরণ </th>
                <th style="width: 20%">সময় </th>
                <th style="width: 25%">দিন </th>
                <th style="width: 25%">ট্রেনিং শেষ হয়েছে </th>
            </tr>
        <?php
            while($row = $trainingInfo->fetch_assoc()){

        ?>
            <tr>
                <td>
        <?php
                   $trainingName =  $report->singleTrainingInfo($row['batch_no']);
                   echo $trainingName['training_name'];
        ?>
                </td>
                <td><?=$row['training_shift']?></td>
                <td><?=$row['training_days']?></td>
                <td>
        <?php
                if($row['training_done'] == 0):
                    echo 'চলছে ';
                else:
                    echo 'সম্পন্ন হয়েছে ';
                endif;
        ?>
                </td>
            </tr>
            <?php
            }
        ?>
        </table>

    </div>

    <div class="w3-panel">

    </div>
    <hr>
<?php include "template/user-footer.php";?>