<?php
include_once '../module/class.security.php';
$checkLogin = new Security();
$checkLogin->checkLogin();

include_once '../module/class.report.php';

$examSchedule = new Report();
$getSchedule = $examSchedule->examSchedule($_SESSION['user_id']);


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
        <center><h3><u>পরীক্ষার সময়সূচী </u></h3></center>

        <table class="w3-table w3-border">
            <tr>
                <th style="width: 30%">পরীক্ষার নাম  </th>
                <th style="width: 20%">সময় </th>
                <th style="width: 25%">তারিখ  </th>
            </tr>
            <?php
            while($row = $getSchedule->fetch_assoc()){

                ?>
                <tr>
                    <td><?=$row['exam_name']?></td>
                    <td><?=$row['exam_shift']?></td>
                    <td><?=$row['exam_date']?></td>

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