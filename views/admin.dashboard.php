<?php
include_once '../module/class.security.php';
include_once '../module/class.report.php';
$checkLogin = new Security();
$checkLogin->checkLogin();

$feedBackResult = new Report();



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
            <h1>Feedback Result</h1>

        </div>
        <?php
        $result  = $feedBackResult->feedbackResult(1);
        $answer = $result['answer_rating'];
        $totalAnswered = $result['total_answered_user'];
        $avgResult = $answer / $totalAnswered;
        $percentage = ($avgResult/5)*100;

      
           
        
        ?>
        <div class="w3-row">
            <div class="w3-half w3-container">
            প্রচলিত সিস্টেম ব্যবহার না করে আমাদের অনলাইন সিস্টেমে আবেদন করে আপনার অভিজ্ঞতা কেমন? 
            </div>
            <div class="w3-half w3-container">
                <div class="w3-light-blue">
                <div class="w3-green w3-center" style="height:24px;width:<?=$percentage?>%"><?=$percentage?>%</div>
                </div><br>
            </div>
        </div>

        <?php
        $result  = $feedBackResult->feedbackResult(2);
        $answer = $result['answer_rating'];
        $totalAnswered = $result['total_answered_user'];
        $avgResult = $answer / $totalAnswered;
        $percentage = ($avgResult/5)*100;

       
           
        
        ?>
        <div class="w3-row">
            <div class="w3-half w3-container">
            আমাদের সিস্টেম ব্যাবহার করে আপনি কতটুকু সন্তুষ্ট?
            </div>
            <div class="w3-half w3-container">
                <div class="w3-light-blue">
                <div class="w3-green w3-center" style="height:24px;width:<?=$percentage?>%"><?=$percentage?>%</div>
                </div><br>
            </div>
        </div>

        <?php
        $result  = $feedBackResult->feedbackResult(3);
        $answer = $result['answer_rating'];
        $totalAnswered = $result['total_answered_user'];
        $avgResult = $answer / $totalAnswered;
        $percentage = ($avgResult/5)*100;

    
           
        
        ?>
        <div class="w3-row">
            <div class="w3-half w3-container">
            আমাদের সিস্টেম ব্যাবহার করে অনলাইন ট্রানজেকশন করার অভিজ্ঞতা কেমন? 
            </div>
            <div class="w3-half w3-container">
                <div class="w3-light-blue">
                <div class="w3-green w3-center" style="height:24px;width:<?=$percentage?>%"><?=$percentage?>%</div>
                </div><br>
            </div>
        </div>

        <?php
        $result  = $feedBackResult->feedbackResult(4);
        $answer = $result['answer_rating'];
        $totalAnswered = $result['total_answered_user'];
        $avgResult = $answer / $totalAnswered;
        $percentage = ($avgResult/5)*100;

      
           
        
        ?>

        <div class="w3-row">
            <div class="w3-half w3-container">
            আমাদের সিস্টেমের ইউজার ইন্টারফেস কতটুকু ইউজার ফ্রেন্ডলী ছিলো?
            </div>
            <div class="w3-half w3-container">
                <div class="w3-light-blue">
                <div class="w3-green w3-center" style="height:24px;width:<?=$percentage?>%"><?=$percentage?>%</div>
                </div><br>
            </div>
        </div>
       

        <div class="w3-panel">

        </div>
        <hr>
        


<?php include "template/admin-footer.php";?>