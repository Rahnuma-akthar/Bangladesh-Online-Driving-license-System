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
        <h5 class="w3-center"><b>বিআরটিসি কর্তৃক নির্ধারিত ড্রাইভিং লাইসেন্স ফী</b></h5>
    </header>

    <div class="w3-row-padding w3-margin-bottom">
        <!-- section of upper content of the page -->
        <p>
            বিআরটিসি কর্তৃক নির্ধারিত ড্রাইভিং লাইসেন্স এর বর্তমান ফী নিম্নরুপঃ
        </p>
        <table class="w3-table w3-border">
            <tr>
                <th style="width: 10%">ক্রঃ নং</th>
                <th style="width: 40%">লাইসেন্স এর নাম</th>
                <th style="width: 25%">মেয়াদ</th>
                <th style="width: 25%">লাইসেন্স ফী </th>
            </tr>
            <tr>
                <td>১.</td>
                <td> <b>লার্নার ড্রাইভিং লাইসেন্স (এক) ক্যাটাগরি, </b> [শুধু মোটরসাইকেল অথবা শুধু হালকা মোটরযান অর্থাৎ যে কোনো এক ধরণের মোটরযান] </td>
                <td>১৬ সপ্তাহ</td>
                <td>৩৪৫/-টাকা</td>
            </tr>
            <tr>
                <td>২.</td>
                <td> <b>লার্নার ড্রাইভিং লাইসেন্স (দুই) ক্যাটাগরি,</b> [মোটরসাইকেল এবং হালকা মোটরযান একসাথে অর্থাৎ মোটরসাইকেলের সাথে যে কোনো এক ধরণের মোটরযান] </td>
                <td>১৬ সপ্তাহ</td>
                <td>৫১৮/-টাকা</td>
            </tr>
            <tr>
                <td>৩.</td>
                <td> <b>স্মার্ট কার্ড ড্রাইভিং লাইসেন্স - পেশাদার</b> (০৫ বছরের নবায়ন ফী সহ)</td>
                <td>৫ বছর </td>
                <td>১৬৮০/-টাকা</td>
            </tr>
            <tr>
                <td>৪.</td>
                <td> <b>স্মার্ট কার্ড ড্রাইভিং লাইসেন্স - অপেশাদার</b> (১০ বছরের নবায়ন ফী সহ)</td>
                <td>১০ বছর </td>
                <td>২৫৪২/-টাকা</td>
            </tr>
            <tr>
                <td>৫.</td>
                <td> ড্রাইভিং লাইসেন্স নবায়ন ফী:<b> পেশাদার </b></td>
                <td>৫ বছর</td>
                <td>১৫৬৫/- টাকা</td>
            </tr>
            <tr>
                <td>৬.</td>
                <td> ড্রাইভিং লাইসেন্স নবায়ন ফী:<b> অপেশাদার</b></td>
                <td>১০ বছর</td>
                <td>২৪২৭/- টাকা</td>
            </tr>
        </table>
        <br>
        <hr>
        <form class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin"  action="/process-license.php" method="post">
            <h3>লাইসেন্স এর জন্য আবেদন করুন </h3>
            <div class="w3-row w3-section">
                <div class="w3-rest">
                    <select name="trainingType" class="w3-select w3-border" required>
                        <option value="">লাইসেন্স টাইপ সিলেক্ট করুন </option>
                        <option value="1 345">লার্নার ড্রাইভিং লাইসেন্স (এক) ক্যাটাগরি</option>
                        <option value="2 518">লার্নার ড্রাইভিং লাইসেন্স (দুই) ক্যাটাগরি</option>
                        <option value="3 1680">স্মার্ট কার্ড ড্রাইভিং লাইসেন্স - পেশাদার</option>
                        <option value="4 2542">স্মার্ট কার্ড ড্রাইভিং লাইসেন্স - অপেশাদার</option>
                        <option value="5 1565">ড্রাইভিং লাইসেন্স নবায়ন ফী - পেশাদার </option>
                        <option value="6 2427">ড্রাইভিং লাইসেন্স নবায়ন ফী - অপেশাদার</option>
                    </select>
                </div>
            </div>
            <div class="w3-row w3-section">
                <h3>আপনার বিকাশ ট্রানজেকশন নাম্বার টাইপ করুন </h3>
                <div class="w3-rest">
                    <input class="w3-input w3-animate-input" type="text" name="transaction_id" placeholder="Transaction ID"  style="width:30%">
                    <input type="hidden" name="userID" value="<?=$_SESSION['user_id']?>">
                    <input type="hidden" name="formName" value="license">
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