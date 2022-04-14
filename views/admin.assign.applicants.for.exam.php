<?php
include_once '../module/class.security.php';
include_once '../module/class.license.php';

$checkLogin = new Security();
$checkLogin->checkLogin();

$exam = new License();

$getExamApplicants = $exam->getExamApplicant();
// print_r($getExamApplicants->fetch_assoc());die();

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
            <h1>Assign Applicants for Exam</h1>

            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for User Ids.." title="Type in a name" style="width: 100%;">

            <table id="myTable" class="w3-table w3-border">
                <tr class="header">
                    <th style="width:20%;">User ID</th>
                    <th style="width:10%;">Name</th>
                    <th style="width:10%;">Type</th>
                    <th style="width:10%;">Action</th>

                </tr>

                <?php
                while($row = mysqli_fetch_assoc($getExamApplicants)){
                    if($row['training_or_license'] == 1):
                        continue;
                    endif;
                    if($row['payment_for'] == 1 || $row['payment_for'] == 2 ):
                        continue;
                    else:
?>
 <tr>
                        <td><?=$row['user_id']?></td>
                        <td><?=$row['name']?></td>
                        <td>
                            <?php
                            if($row['training_or_license'] == 2):
                                echo 'License';
                            endif;
                            ?>
                        </td>
                        <td>
                            <form action="../process-exam.php" method="post">
                                <input type="hidden" name="User ID" value="<?=$row['user_id']?>">
                                <input type="hidden" name="examSeries" value="<?=$row['payment_for']?>">
                                <input type="submit" name="AssignforExam" value="Assign for Exam">
                            </form>
                        </td>
                    </tr>
<?php
                    endif;
                    ?>
                   
                <?php    }
                ?>

            </table>
            <script>
                function myFunction() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("myTable");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            </script>

        </div>

        <div class="w3-panel">

        </div>
        <hr>
<?php include "template/admin-footer.php";?>