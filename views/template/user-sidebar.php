<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-green w3-animate-left noPrint" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
        <?php
            if($_SESSION['UserSex']=='male'):?>
            <img src="../images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
            <?php
            elseif($_SESSION['UserSex']=='female'):?>
            <img src="../images/avatar.jpg" class="w3-circle w3-margin-right" style="width:46px">
            <?php
            endif;
        ?>
    </div>
    <div class="w3-col s8 w3-bar">
      <span>স্বাগতম, <strong><?=$_SESSION['UserName']?></strong></span><br>
      
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>ড্যাশবোর্ড </h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="/views/user.dashboard.php" <?php if(basename($_SERVER['PHP_SELF'])=='user.dashboard.php'):echo'class="w3-bar-item w3-button w3-padding w3-red"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-users fa-fw"></i> পরিচিতি</a>
    <a href="/views/user.apply-for-training.php" <?php if(basename($_SERVER['PHP_SELF'])=='user.apply-for-training.php'):echo'class="w3-bar-item w3-button w3-padding w3-red"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-file fa-fw"></i> ট্রেনিং এর জন্য আবেদন</a>
    <a href="/views/user.apply-for-license.php" <?php if(basename($_SERVER['PHP_SELF'])=='user.apply-for-license.php'):echo'class="w3-bar-item w3-button w3-padding w3-red"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-car fa-fw"></i> লাইসেন্স এর জন্য আবেদন</a>
    <a href="/views/user.training-schedule.php" <?php if(basename($_SERVER['PHP_SELF'])=='user.training-schedule.php'):echo'class="w3-bar-item w3-button w3-padding w3-red"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-bullseye fa-fw"></i> ট্রেনিং এর সময়সূচী </a>
    <a href="/views/user.exam-schedule.php"<?php if(basename($_SERVER['PHP_SELF'])=='user.exam-schedule.php'):echo'class="w3-bar-item w3-button w3-padding w3-red"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-bell fa-fw"></i> লাইসেন্স এর পরীক্ষার সময়সূচী  </a>
    <a href="/views/user.license-validity.php" <?php if(basename($_SERVER['PHP_SELF'])=='user.license-validity.php'):echo'class="w3-bar-item w3-button w3-padding w3-red"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-diamond fa-fw"></i>  লাইসেন্স ভ্যালিডিটি যাচাই </a>
    <a href="/views/user.transaction-history.php" <?php if(basename($_SERVER['PHP_SELF'])=='user.transaction-history.php'):echo'class="w3-bar-item w3-button w3-padding w3-red"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-bank fa-fw"></i>  অর্থ প্রদান এর ইতিহাস</a>
    <a href="/views/user.feedback.php" <?php if(basename($_SERVER['PHP_SELF'])=='user.feedback.php'):echo'class="w3-bar-item w3-button w3-padding w3-red"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-bank fa-fw"></i>  আপনার ফিডব্যাক দিন</a>
    <hr>
    <center>
    <a href="../logout.php" class="w3-button w3-padding w3-red"><i class="fa fa-sign-out fa-fw"></i>  Logout</a>

    </center>
  </div>
</nav>
