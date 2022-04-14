<?php
include_once '../module/class.security.php';
$checkLogin = new Security();
$checkLogin->checkLogin();


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
            <h1>Administrator Access</h1>
            <form class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin"  action="/process-license.php" method="post">
                <h3> Detect License </h3>

                <div class="w3-row w3-section">
                    <h3>Type the License Number to check validity </h3>
                    <div class="w3-rest">
                        <input class="w3-input w3-animate-input" type="text" name="licenseID" placeholder="License ID"  style="width:30%">
                    </div>
                </div>
                <input  class="w3-button w3-block w3-section w3-green w3-ripple w3-padding" type="submit" name="checkValidity" value="Check Validity">
                <br>
            </form>
            <u><center><h3>License Information</h3></center></u>
            <?php
            if(isset($_GET['ln'])):?>
                <h3>License Number: <?=$_GET['ln']?></h3>
                <h3>Issue Date: <?=$_GET['issueDate']?></h3>
                <h3>Validity till: <?=$_GET['validTill']?> </h3>
                <h3> Status:
                    <?php
                        date_default_timezone_set('Asia/Kolkata');
                        $toDay = date('Y-m-d');
                        $validTill = strtotime($_GET['validTill']);
                        if($validTill > $toDay):
                            echo '<span style="color: darkgreen;">VALID</span>';
                        else:
                            echo '<span style="color: crimson;">INVALID</span>';
                        endif;
                    ?>
                </h3>
            <?php
            endif;
            ?>
        </div>


        <div class="w3-panel">

        </div>
        <hr>
<?php include "template/admin-footer.php";?>