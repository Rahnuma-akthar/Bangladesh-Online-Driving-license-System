<?php
    include_once "css/style.php";
    
?>
<body>
<!-- Content  -->
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h1 style="color: green; text-align:center;">বাংলাদেশ অনলাইন ড্রাইভিং লাইসেন্স সিস্টেম  <br> ( বি, ও, ডি, এল, এস  ) </h1>
                <hr>
                <h3 style="color: blue; text-align:center;"> দয়া করে লগইন করুন </h3>
            </div>
            
        </div>
            <h3><center><span style="color:red; font-weight:bold"><?php if(isset($_GET['message'])):echo $_GET['message'];endif;?></center></h3>
            <form action="/process-login.php" method="POST" class="nobottommargin">
                <div class="clear"></div>
                <div class="col_full">
                    <span class="required">*</span> <label for="register-form-name">গ্রাহকের ইমেইল :</label>
                    <input type="text" id="register-form-name" name="loginEmail" required value="" class="form-control input-block-level" aria-required="true" />
                    <div id='subscriberName_availability_result'></div>
                </div>
                
                <div class="col_full">
                    <span class="required">*</span> <label for="register-form-name"> পাসওয়ার্ড দিন :</label>
                    <input type="password" id="register-form-name" name="password" required value="" onkeyup="this.value = this.value.toUpperCase()" class="form-control input-block-level" aria-required="true" />
                    <div id='subscriberName_availability_result'></div>
                <br>
                <div class="clear"></div>
                <div class="col_full col text-center">
                    <input type="submit" class="btn btn-success"value="লগইন করুন" name='login'/>
                    <input type="submit" class="btn btn-danger"value="বাতিল করুন " name='cancel'formnovalidate/>
                    <div id='subscriberName_availability_result'></div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>