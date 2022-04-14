<?php
include_once '../module/class.security.php';
include_once '../module/class.training.php';
$checkLogin = new Security();
$checkLogin->checkLogin();
include "template/admin-header.php";
include "template/admin-sidebar.php";
$paidList = new Training();
$pendingPaidList = $paidList->getPendingList();


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
            <h1>Administrator Access</h1>

            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for transaction Ids.." title="Type in a name" style="width: 100%;">

            <table id="myTable" class="w3-table w3-border">
                <tr class="header">
                    <th style="width:20%;">Transaction ID</th>
                    <th style="width:20%;">Name</th>
                    <th style="width:10%;">Amount</th>
                    <th style="width:10%;">Type</th>
                    <th style="width:10%;">Date</th>
                    <th style="width:10%;">Action</th>

                </tr>

    <?php
        while($row = mysqli_fetch_assoc($pendingPaidList)){
    ?>
            <tr>
                <td><?=$row['transaction_number']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['amount']?></td>
                <td>
    <?php
                if($row['training_or_license'] == 1):
                    echo 'Training';
                elseif($row['training_or_license'] == 2):
                    echo 'License';
                endif;
    ?>
                </td>
                <td><?=$row['date']?></td>
                <td>
                    <form action="../process-training.php" method="post">
                        <input type="hidden" name="transactionID" value="<?=$row['transaction_number']?>">
                        <input type="submit" name="Approve" value="Approve">
                    </form>
                </td>
            </tr>
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