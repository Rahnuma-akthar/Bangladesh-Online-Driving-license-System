<?php
    include_once "css/style.php";
?>
    <body>
<!-- Content  -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                    <h1 style="color: green;">বাংলাদেশ অনলাইন ড্রাইভিং লাইসেন্স সিস্টেম <br> (বি, ও, ডি, এল, এস ) </h1>
                    <h3><span style="text-align: center;"><span style="color:red; font-weight:bold"><?php if(isset($_GET['message'])):echo $_GET['message'].' !!!';endif;?></span></h3>
            </div>
            <div class="col-md-12">
                <form action="/process-registration.php" method="POST" class="nobottommargin">
                    <div class="form-group">
                        <span class="required">*</span> <label for="register-form-name">গ্রাহকের নাম :</label>
                        <input type="text" id="register-form-name" name="registerName" required value="" onkeyup="this.value = this.value.toUpperCase()" class="form-control input-block-level" aria-required="true" />
                        <div id='subscriberName_availability_result'></div>
                    </div>
                    <div class="form-group">
                        <span class="required">*</span> <label for="register-form-name">গ্রাহকের পিতার নাম :</label>
                        <input type="text" id="register-form-name" name="registerFatherName" required value="" onkeyup="this.value = this.value.toUpperCase()" class="form-control input-block-level" aria-required="true" />
                        <div id='subscriberName_availability_result'></div>
                    </div>
                    <div class="form-group">
                        <span class="required">*</span> <label for="register-form-name">গ্রাহকের মাতার নাম :</label>
                        <input type="text" id="register-form-name" name="registerMotherName" required value="" onkeyup="this.value = this.value.toUpperCase()" class="form-control input-block-level" aria-required="true" />
                        <div id='subscriberName_availability_result'></div>
                    </div>
                    <div class="form-group">
                        <span class="required">*</span> <label for="register-form-name">গ্রাহকের বর্তমান ঠিকানা :</label>
                        <input type="text" id="register-form-name" name="registerPresentAdress" required value="" onkeyup="this.value = this.value.toUpperCase()" class="form-control input-block-level" aria-required="true" />
                        <div id='subscriberName_availability_result'></div>
                    </div>
                    <div class="form-group">
                        <span class="required">*</span> <label for="register-form-name">গ্রাহকের স্থায়ী ঠিকানা :</label>
                        <input type="text" id="register-form-name" name="registerPermanentAddress" required value="" onkeyup="this.value = this.value.toUpperCase()" class="form-control input-block-level" aria-required="true" />
                        <div id='subscriberName_availability_result'></div>
                    </div>
                    <div class="form-group">
                        <span class="required">*</span> <label for="register-form-name">গ্রাহকের ইমেইল :</label>
                        <input type="text" id="register-form-name" name="registerEmail" required value="" class="form-control input-block-level" aria-required="true" />
                        <div id='subscriberName_availability_result'></div>
                    </div>
                    <div class="form-group">
                        <span class="required">*</span> <label for="register-form-name">ফোন নম্বর(1 Digits only) :</label>
                        <input type="text" id="register-form-name" name="registerPhoneNumber" required pattern="[0-9]{11}" value=""  class="form-control input-block-level" aria-required="true" />
                        <div id='subscriberName_availability_result'></div>
                    </div>
                    <div class="form-group">
                        <span class="required">*</span> <label for="register-form-name"> জাতীয় পরিচয় পত্র নম্বর (17 Digits only):</label>
                        <input type="text" id="register-form-name" name="registerNIDNumber" required value="" pattern="[0-9]{17}"class="form-control input-block-level" aria-required="true" />
                        <div id='subscriberName_availability_result'></div>
                    </div>
                    <div class="form-group">
                        <span class="required">*</span> <label for="register-form-name"> জন্ম তারিখ :</label>
                        <input type="date" id="DoB" name="registerDoB" required onblur="return dobcheck()" class="form-control input-block-level" aria-required="true" />
                        <div id='subscriberName_availability_result'></div>
                    </div>
                    <div class="form-group">
                        <span class="required">*</span> <label for="register-form-name"> লিঙ্গ </label>
                        <select id="register-form-name" name="registerGender" required class="form-control input-block-level" aria-required="true">
                            <option value="">অনুগ্রহ করে নির্বাচন করুন....</option>
                            <option value="male">পুরুষ</option>
                            <option value="female">মহিলা</option>
                            <option value="others">অন্যান্য</option>
                        </select>
                        <div id='subscriberName_availability_result'></div>
                    </div>
                    <div class="form-group">
                        <span class="required">*</span> <label for="register-form-name"> পাসওয়ার্ড দিন :</label>
                        <input type="password" id="register-form-name" name="password" class="form-control input-block-level" aria-required="true" />
                        <div id='subscriberName_availability_result'></div>
                    </div>
                        <div class="form-group">
                        <span class="required">*</span> <label for="register-form-name"> পুনরায় পাসওয়ার্ড দিন :</label>
                        <input type="password" id="register-form-name" name="repeatPassword" required value="" class="form-control input-block-level" aria-required="true" />
                        <div id='subscriberName_availability_result'></div>
                    </div>
                    <hr>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success"value="প্রেরণ করুন" name='register'/>
                        <input type="submit" class="btn btn-danger"value="বাতিল করুন " name='cancel'formnovalidate/>
                        <div id='subscriberName_availability_result'></div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
function dobcheck(){
     var userinput = document.getElementById("DoB").value;
    var dob = new Date(userinput);
    if(userinput==null || userinput=='') {
      document.getElementById("message").innerHTML = "**Choose a date please!";  
      return false; 
    } else {
    var month_diff = Date.now() - dob.getTime();
    var age_dt = new Date(month_diff); 
    var year = age_dt.getUTCFullYear();
    var age = Math.abs(year - 1970);
    alert(document.getElementById("result").innerHTML =  
             "Age is: " + age + " years. ")
    }
}

</script>
</body>
</html>