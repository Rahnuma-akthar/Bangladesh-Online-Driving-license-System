<?php
include_once '../module/class.security.php';
$checkLogin = new Security();
$checkLogin->checkLogin();
include_once '../module/class.report.php';
$check = new Report;
$checkValidity = $check->checkLicenseValidity($_SESSION['user_id']);

include_once '../module/class.feedback.php';
$feedback = new Feedback();

$checkGivenFeedback = $feedback->givenFeedback($_SESSION['user_id']);

// var_dump($checkGivenFeedback);
// die();

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
        <center><h3><u> ইউজার ফিডব্যাক  </u></h3></center>

<?php
    if($checkGivenFeedback['given_feedback'] == "0"):
?>
        <table class="w3-table w3-border">
            <tr>
                <th style="width: 30%"> জরিপ  </th>
                <th style="width: 14%; text-align:center;">খুব খারাপ </th>
                <th style="width: 14%; text-align:center;">খারাপ </th>
                <th style="width: 14%; text-align:center;">মোটামোটি</th>
                <th style="width: 14%; text-align:center;">ভালো </th>
                <th style="width: 14%; text-align:center;">খুব ভালো  </th>
            </tr>
            
                <form action="../process-feedback.php" method="POST">
                <tr>
                    <td>প্রচলিত সিস্টেম ব্যবহার না করে আমাদের অনলাইন সিস্টেমে আবেদন করে আপনার অভিজ্ঞতা কেমন? </td>
                    <td style="text-align: center;"><input type="radio" name="q1" value="1"></td>
                    <td style="text-align: center;"><input type="radio" name="q1" value="2"></td>
                    <td style="text-align: center;"><input type="radio" name="q1" value="3"></td>
                    <td style="text-align: center;"><input type="radio" name="q1" value="4"></td>
                    <td style="text-align: center;"><input type="radio" name="q1" value="5"></td>

                </tr>
                <tr>
                    <td>আমাদের সিস্টেম ব্যাবহার করে আপনি কতটুকু সন্তুষ্ট?</td>
                    <td style="text-align: center;"><input type="radio" name="q2" value="1"></td>
                    <td style="text-align: center;"><input type="radio" name="q2" value="2"></td>
                    <td style="text-align: center;"><input type="radio" name="q2" value="3"></td>
                    <td style="text-align: center;"><input type="radio" name="q2" value="4"></td>
                    <td style="text-align: center;"><input type="radio" name="q2" value="5"></td>

                </tr>
                <tr>
                    <td>আমাদের সিস্টেম ব্যাবহার করে অনলাইন ট্রানজেকশন করার অভিজ্ঞতা কেমন? </td>
                    <td style="text-align: center;"><input type="radio" name="q3" value="1"></td>
                    <td style="text-align: center;"><input type="radio" name="q3" value="2"></td>
                    <td style="text-align: center;"><input type="radio" name="q3" value="3"></td>
                    <td style="text-align: center;"><input type="radio" name="q3" value="4"></td>
                    <td style="text-align: center;"><input type="radio" name="q3" value="5"></td>

                </tr>
                <tr>
                    <td>আমাদের সিস্টেমের ইউজার ইন্টারফেস কতটুকু ইউজার ফ্রেন্ডলী ছিলো?</td>
                    <td style="text-align: center;"><input type="radio" name="q4" value="1"></td>
                    <td style="text-align: center;"><input type="radio" name="q4" value="2"></td>
                    <td style="text-align: center;"><input type="radio" name="q4" value="3"></td>
                    <td style="text-align: center;"><input type="radio" name="q4" value="4"></td>
                    <td style="text-align: center;"><input type="radio" name="q4" value="5"></td>

                </tr>
                <tr>
                    <input type="hidden" name="userID" value="<?=$_SESSION['user_id']?>">
                    <td colspan="6"><input type="submit" name="sendFeedback" value="সাবমিট করুন" class="w3-button w3-green w3-block"></td>
                </tr>
                </form>
        </table>
<?php 
    else:
    ?>
    <h3>আমরা আপনার প্রদত্ত ফিডব্যাক যথাযত গুরুত্বের সাথে বিবেচনা করছি । আপনার মূল্যবান ফিডব্যাক এর জন্য ধন্যবাদ । </h3>
<?php
    endif;
?>
    </div>

    <div class="w3-panel">

    </div>
    <hr>
<?php include "template/user-footer.php";?>