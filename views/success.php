<?php
include "css/style.php";
include_once '../module/class.report.php';
$successInformation = new Report;
$id = $_GET['nid'];
$successData = $successInformation->successReport($id);
// var_dump($successData);
?>
<body>

    <!-- Content  -->
    <section id="content">
        <div class="content-wrap">

            <div class="container clearfix">
                <div class="row clearfix">
                    <div class="col_full" align="center">

                        <h1 style="color: green;">বাংলাদেশ অনলাইন ড্রাইভিং লাইসেন্স সিস্টেম  <br>(বি, ও, ডি, এল, এস ) </h1>
                        <h3>
                            প্রিয়, <span style="color:red"><?=$successData['name']?></span> <br>
                            আপনার জাতীয় পরিচয় পত্র নম্বরঃ <span style="color:red"><?=$successData['nid']?></span><br>
                            বাংলাদেশ অনলাইন ড্রাইভিং লাইসেন্স অথরিটি (বি, ও, ডি, এল, এ) এর নিকট সফলভাবে নিবন্ধিত  হয়েছে। <br>
                            অনুগ্রহ করে আপনি আপনার পোর্টালে লগইন করে আপনার ড্রাইভিং লাইসেন্স এর জন্য আবেদন করুন।  
                        </h3>
                        <!-- <a href="offline_license.php" target="_blank"><button class="btn btn-warning">অফলাইন প্রসেস ফলো করুন </button></a> -->
                        <a href="login.php"><button class="btn btn-success">লগইন করুন </button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>