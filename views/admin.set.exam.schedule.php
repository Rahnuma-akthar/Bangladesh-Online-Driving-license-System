<?php
include_once '../module/class.security.php';
include_once '../module/class.license.php';
$checkLogin = new Security();
$checkLogin->checkLogin();

$license = new License();

$getExamSchedule = $license->getExamSchedule();
$updateExamSchedule = $license->getExamSchedule();
include "template/admin-header.php";
include "template/admin-sidebar.php";


?>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <!-- THE END of THIS CLASS MAIN will be ended in the footer.php -->

        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
        </header>

        <div class="w3-row-padding w3-margin-bottom">
            <h1>Set Exam Schedule For Next Exam</h1>

            <table class="w3-table w3-border">
                <tr class="header">
                    <th style="width:20%;">Exam Shift</th>
                    <th style="width:10%;">Exam Date</th>
                    <th style="width:10%;">Batch Name</th>
                </tr>
                <?php
                while($row = mysqli_fetch_assoc($getExamSchedule)){
                    ?>
                    <tr>
                        <td><?=$row['shift']?></td>
                        <td><?=$row['exam_date']?></td>
                        <td><?=$row['applied_batch']?> - <?=$row['name']?></td>
                    </tr>
                <?php    }
                ?>

            </table>

            <h4>Set exam schedule:</h4>

            <table class="w3-table w3-border">
                <tr class="header">
                    <th style="width:30%;">Batch Name</th>
                    <th style="width:20%;">Exam Shift</th>
                    <th style="width:20%;">Exam Date</th>
                    <th style="width:30%;">Action</th>
                </tr>
                <?php
                while($row = mysqli_fetch_assoc($updateExamSchedule)){
                    ?>
                    <form action="../process-exam.php" method="post">
                    <tr>
                        <td><?=$row['applied_batch']?> - <?=$row['name']?></td>
                        <td>
                            <select name="shift">
                                <option value="9:00am">9:00am</option>
                                <option value="10:00am">10:00am</option>
                                <option value="11:00am">11:00am</option>
                                <option value="12:00pm">12:00pm</option>
                                <option value="1:00pm">1:00pm</option>
                                <option value="2:00pm">2:00pm</option>
                            </select>
                        </td>
                        <td>
                            <input type="date" name="examDate">
                        </td>

                        <td>
                            <input type="hidden" name="batchNo" value="<?=$row['applied_batch']?>">
                            <input type="submit" name="setExamSchedule" value="Set Exam Schedule">
                        </td>

                    </tr>
                    </form>
                <?php    }
                ?>

            </table>

        </div>

        <div class="w3-panel">

        </div>
        <hr>
<?php include "template/admin-footer.php";?>