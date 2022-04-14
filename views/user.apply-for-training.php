<?php
include_once '../module/class.security.php';
$checkLogin = new Security();
$checkLogin->checkLogin();
include_once '../module/class.report.php';
$dashboardReport = new Report;
$basicInfo = $dashboardReport->basicInfo($_SESSION['user_id']);

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
        <h5 class="w3-center"><b>বিআরটিসি ট্রেনিং ইনস্টিটিউট এর বর্তমান ড্রাইভিং কোর্সের ফী</b></h5>
    </header>

    <div class="w3-row-padding w3-margin-bottom">
        <!-- section of upper content of the page -->
        <p>
            বিআরটিসি ট্রেনিং ইনস্টিটিউট এর বর্তমান ড্রাইভিং কোর্সের ফী নিম্নরুপঃ
        </p>
       <table class="w3-table w3-border">
           <tr>
               <th>ক্রঃ নং</th>
               <th>কোর্সের নাম</th>
               <th>মেয়াদ</th>
               <th>কোর্স ফী (টাকা)</th>
           </tr>
           <tr>
               <td>১.</td>
               <td>বেসিক ড্রাইভিং (হালকা গাড়ী : শুধু মোটরসাইকেল অথবা শুধু হালকা মোটরযান অর্থাৎ যে কোনো এক ধরণের মোটরযান)</td>
               <td>০৪ সপ্তাহ</td>
               <td>৬,০০০/-</td>
           </tr>
           <tr>
               <td>২.</td>
               <td>বেসিক ড্রাইভিং (ভারী গাড়ী : শুধু ট্রাক অথবা শুধু ভারী মোটরযান অর্থাৎ যে কোনো এক ধরণের মোটরযান)</td>
               <td>০৮ সপ্তাহ</td>
               <td>৯,০০০/-</td>
           </tr>
           <tr>
               <td>৩.</td>
               <td>আপগ্রেডিং (হালকা)</td>
               <td>০২ সপ্তাহ</td>
               <td>৩,৫০০/-</td>
           </tr>
           <tr>
               <td>৪.</td>
               <td>আপগ্রেডিং (ভারী)</td>
               <td>০৪ সপ্তাহ</td>
               <td>৪,৫০০/-</td>
           </tr>
           <tr>
               <td>৫.</td>
               <td>মোটর সাইকেল</td>
               <td>০২ সপ্তাহ</td>
               <td>৩,৫০০/-</td>
           </tr>
           <tr>
               <td>৬.</td>
               <td>ওরিয়েন্টেশন (দক্ষতা আইনে প্রশিক্ষণ প্রাপ্ত চালকদের জন্য প্রযোজ্য)</td>
               <td>০১ সপ্তাহ</td>
               <td>১,০০০/-</td>
           </tr>
       </table>
        <br>
        <hr>
        <form class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin"  action="/process-training.php" method="post">
            <h3>ট্রেনিং এর জন্য আবেদন করুন </h3>
            <div class="w3-row w3-section">
                <div class="w3-rest">
            <select name="trainingType" class="w3-select w3-border" required>
                <option value="">ট্রেনিং টাইপ সিলেক্ট করুন </option>
                <option value="1 6000">বেসিক ড্রাইভিং (হালকা গাড়ী )</option>
                <option value="2 9000">বেসিক ড্রাইভিং (ভারী গাড়ী )</option>
                <option value="3 3500">আপগ্রেডিং (হালকা)</option>
                <option value="4 4500">আপগ্রেডিং (ভারী)</option>
                <option value="5 3500">মোটর সাইকেল</option>
                <option value="6 1000">ওরিয়েন্টেশন (দক্ষতা আইনে প্রশিক্ষণ প্রাপ্ত চালকদের জন্য প্রযোজ্য)</option>
            </select>
                </div>
            </div>
            <div class="w3-row w3-section">
                <h3>আপনার বিকাশ ট্রানজেকশন নাম্বার টাইপ করুন </h3>
                <div class="w3-rest">
            <input class="w3-input w3-animate-input" type="text" name="transaction_id" placeholder="Transaction ID"  style="width:30%">
                    <input type="hidden" name="userID" value="<?=$_SESSION['user_id']?>">
                    <input type="hidden" name="formName" value="training">
                </div>
            </div>
            <input  class="w3-button w3-block w3-section w3-green w3-ripple w3-padding" type="submit" name="Apply" value="Apply">
            <br>
        </form>

        <!-- section of upper content of the page -->
    </div>

    <div class="w3-panel">

    </div>
    <hr>
<?php include "template/user-footer.php";?>