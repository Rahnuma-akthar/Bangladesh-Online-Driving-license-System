<?php
include_once '../module/class.security.php';
$checkLogin = new Security();
$checkLogin->checkLogin();
include_once '../module/class.report.php';
$check = new Report;
$checkValidity = $check->checkLicenseValidity($_SESSION['user_id']);

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
        <center><h3><u> লাইসেন্সের ভ্যালিডিটি </u></h3></center>


        <table class="w3-table w3-border">
            <tr>
                <th style="width: 30%"> লাইসেন্সের নাম </th>
                <th style="width: 20%"> লাইসেন্সের নম্বর </th>
                <th style="width: 15%"> ইস্যুর তারিখ  </th>
                <th style="width: 20%"> ভ্যালিডিটি শেষ হবে </th>
                <th style="width: 15%"> টোকেন নম্বর </th>
            </tr>
            <?php
            while($row = $checkValidity->fetch_assoc()){

                ?>
                <tr>
                    <td><?=$row['license_name']?></td>
                    <td><?=$row['license_identity_number']?></td>
                    <td><?=$row['license_issue_date']?></td>
                    <td><?=$row['license_validity']?></td>
                    <td><?=$row['license_token']?></td>

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