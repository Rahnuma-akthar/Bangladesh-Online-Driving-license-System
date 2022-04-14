<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
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
      <span>Welcome, <strong><?=$_SESSION['UserName']?></strong></span><br>
      
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard </h5>
  </div>
  <div class="w3-bar-block">
      <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
      <a href="/views/admin.dashboard.php" <?php if(basename($_SERVER['PHP_SELF'])=='admin.dashboard.php'):echo'class="w3-bar-item w3-button w3-padding w3-green"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-users fa-fw"></i> Dashbaord</a>
      <a href="/views/admin.payment.collection.php" <?php if(basename($_SERVER['PHP_SELF'])=='admin.payment.collection.php'):echo'class="w3-bar-item w3-button w3-padding w3-green"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-bank fa-fw"></i> Payment Collection</a>
      <a href="/views/admin.set.exam.schedule.php" <?php if(basename($_SERVER['PHP_SELF'])=='admin.set.exam.schedule.php'):echo'class="w3-bar-item w3-button w3-padding w3-green"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-diamond fa-fw"></i> Set Exam Schedule</a>
      <a href="/views/admin.set.training.schedule.php" <?php if(basename($_SERVER['PHP_SELF'])=='admin.set.training.schedule.php'):echo'class="w3-bar-item w3-button w3-padding w3-green"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-diamond fa-fw"></i> Set Training Schedule </a>
      <a href="/views/admin.assign.training.applicants.php" <?php if(basename($_SERVER['PHP_SELF'])=='admin.assign.training.applicants.php'):echo'class="w3-bar-item w3-button w3-padding w3-green"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-file fa-fw"></i> Assign Applicants for Training </a>
      <a href="/views/admin.end.training.applicants.php" <?php if(basename($_SERVER['PHP_SELF'])=='admin.end.training.applicants.php'):echo'class="w3-bar-item w3-button w3-padding w3-green"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-bell fa-fw"></i> End Training for Applicant </a>
      <a href="/views/admin.assign.applicants.for.exam.php" <?php if(basename($_SERVER['PHP_SELF'])=='admin.assign.applicants.for.exam.php'):echo'class="w3-bar-item w3-button w3-padding w3-green"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-file fa-fw"></i> Assign Applicants for Exam </a>
      <a href="/views/admin.approve.applicants.for.license.php" <?php if(basename($_SERVER['PHP_SELF'])=='admin.approve.applicants.for.license.php'):echo'class="w3-bar-item w3-button w3-padding w3-green"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-bell fa-fw"></i> Approve Applicant for License </a>
      <a href="/views/admin.license.delivered.php" <?php if(basename($_SERVER['PHP_SELF'])=='admin.license.delivered.php'):echo'class="w3-bar-item w3-button w3-padding w3-green"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-car fa-fw"></i> Deliver License </a>
      <a href="/views/admin.detect.license.php" <?php if(basename($_SERVER['PHP_SELF'])=='admin.detect.license.php'):echo'class="w3-bar-item w3-button w3-padding w3-green"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;?>><i class="fa fa-car fa-fw"></i> Detect License </a>
    <center>
    <a href="../logout.php" class="w3-button w3-padding w3-yellow w3-round-xlarge"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
    </center>
  </div>
</nav>
<!--<a href="/views/admin.training.applicants.php" -->
    <?php
//    if(basename($_SERVER['PHP_SELF'])=='admin.training.applicants.php'):echo'class="w3-bar-item w3-button w3-padding w3-green"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;
    ?>
<!-- ><i class="fa fa-bullseye fa-fw"></i> Training Applicants </a>-->
<!--<a href="/views/admin.license.applicants.php" -->
    <?php
//    if(basename($_SERVER['PHP_SELF'])=='admin.license.applicants.php'):echo'class="w3-bar-item w3-button w3-padding w3-green"';else: echo 'class="w3-bar-item w3-button w3-padding"';endif;
    ?>

<!-- ><i class="fa fa-car fa-fw"></i> License Applicants</a>-->