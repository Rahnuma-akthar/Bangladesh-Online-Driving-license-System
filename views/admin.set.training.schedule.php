<?php
include_once '../module/class.security.php';
include_once '../module/class.training.php';
$checkLogin = new Security();
$checkLogin->checkLogin();

$training = new Training();

$trainingSchedule = $training->getTrainingSchedule();
$updateSchedule = $training->getTrainingSchedule();;

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
            <h5><b><i class="fa fa-dashboard"></i> Administrator Panel</b></h5>
        </header>

        <div class="w3-row-padding w3-margin-bottom">
            <h1>Set times for Training</h1>
            <table class="w3-table w3-border">
                <tr class="header">
                    <th style="width:20%;">Training Shift</th>
                    <th style="width:10%;">Training Days</th>
                    <th style="width:10%;">Batch Name</th>
                </tr>
                <?php
                while($row = mysqli_fetch_assoc($trainingSchedule)){
                    ?>
                    <tr>
                        <td><?=$row['training_shift']?></td>
                        <td><?=$row['training_days']?></td>
                        <td><?=$row['batch_no']?> -
                            <?php
                            if($row['batch_no'] == 1):
                                echo 'হালকা গাড়ী';
                            elseif($row['batch_no'] == 2):
                                echo 'ভারী গাড়ী';
                            elseif($row['batch_no'] == 3):
                                echo 'মোটর সাইকেল';
                            elseif($row['batch_no'] == 4):
                                echo 'ওরিয়েন্টেশন';
                            endif;
                            ?>
                        </td>
                    </tr>
                <?php    }
                ?>

            </table>

            <table class="w3-table w3-border">
                <tr class="header">
                    <th style="width:30%;">Batch Name</th>
                    <th style="width:30%;">Training Shift</th>
                    <th style="width:30%;">Training Days</th>
                    <th style="width:10%;">Action</th>
                </tr>
                <?php
                while($row = mysqli_fetch_assoc($updateSchedule)){
                    ?>
                    <tr>
                        <td><?=$row['batch_no']?>-
                            <?php
                            if($row['batch_no'] == 1):
                                echo 'হালকা গাড়ী';
                            elseif($row['batch_no'] == 2):
                                echo 'ভারী গাড়ী';
                            elseif($row['batch_no'] == 3):
                                echo 'মোটর সাইকেল';
                            elseif($row['batch_no'] == 4):
                                echo 'ওরিয়েন্টেশন';
                            endif;
                            ?>

                        </td>
                        <form action="../process-training.php"  method="post">
                            <td>
                                From
                                <select name="trainingShiftFrom">
                                    <option value="5:00am">5:00am</option>
                                    <option value="6:00am">6:00am</option>
                                    <option value="7:00am">7:00am</option>
                                    <option value="8:00am">8:00am</option>
                                    <option value="9:00am">9:00am</option>
                                </select>
                                To
                                <select name="trainingShiftTo">
                                    <option value="5:00am">5:00am</option>
                                    <option value="6:00am">6:00am</option>
                                    <option value="7:00am">7:00am</option>
                                    <option value="8:00am">8:00am</option>
                                    <option value="9:00am">9:00am</option>
                                </select>
                            </td>
                            <td>
                                <select name="trainingDays">
                                    <option value="Sun, Tue">Sun, Tue</option>
                                    <option value="Mon, Wed">Mon, Wed</option>
                                    <option value="Thu, Sat">Thu, Sat</option>
                                </select>
                                <input type="hidden" name="batchNo" value="<?=$row['batch_no']?>">
                            </td>
                            <td>
                                <input type="submit" name="Update" value="Update">
                            </td>
                        </form>

                    </tr>
                <?php    }
                ?>

            </table>
        </div>

        <div class="w3-panel">

        </div>
        <hr>
<?php include "template/admin-footer.php";?>