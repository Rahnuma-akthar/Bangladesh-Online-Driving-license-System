<?php
include_once '../module/class.security.php';
$checkLogin = new Security();
$checkLogin->checkLogin();
include_once '../module/class.report.php';
$dashboardReport = new Report;
$basicInfo = $dashboardReport->basicInfo($_SESSION['user_id']);
$getLicenseValidity = $dashboardReport->checkLicenseValidity($_SESSION['user_id']);

include "template/user-header.php";
include "template/user-sidebar.php";


?>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;"> 
<!-- THE END of THIS CLASS MAIN will be ended in the footer.php -->

  <!-- Header -->
  <header class="w3-container noPrint" style="padding-top:22px">
    <h5 class="w3-center"><b> <?=$_SESSION['UserName']?>,  আপনাকে স্বাগতম |</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <!-- section of upper content of the page -->
      <center><h3><u>পরিচিতি</u></h3></center>
      <table width="50%">
          <tr>
              <th style="text-align: left">
                  Father Name:
              </th>
              <td>
                  <?=$basicInfo['father_name']?>
              </td>
          </tr>
          <tr>
              <th style="text-align: left">
                  Mother  Name:
              </th>
              <td>
                  <?=$basicInfo['mother_name']?>
              </td>
          </tr>
          <tr>
              <th style="text-align: left">
                  Phone Number:
              </th>
              <td>
                  <?=$basicInfo['phone_number']?>
              </td>
          </tr>
          <tr>
              <th style="text-align: left">
                  E-mail:
              </th>
              <td>
                  <?=$basicInfo['email']?>
              </td>
          </tr>
          <tr>
              <th style="text-align: left">
                  Present Address:
              </th>
              <td>
                  <?=$basicInfo['present_address']?>
              </td>
          </tr>
          <tr>
              <th style="text-align: left">
                  Permanent Address:
              </th>
              <td>
                  <?=$basicInfo['premanent_address']?>
              </td>
          </tr>
          <tr>
              <th style="text-align: left">
                  National ID:
              </th>
              <td>
                  <?=$basicInfo['nid']?>
              </td>
          </tr>
          <tr>
              <th style="text-align: left">
                  Gender:
              </th>
              <td>
                  <?=$basicInfo['sex']?>
              </td>
          </tr>
          <tr>
              <th style="text-align: left">
                  User ID:
              </th>
              <td>
                  <?=$basicInfo['user_id']?>
              </td>
          </tr>
          <tr>
              <th style="text-align: left">
                  Date of Birth:
              </th>
              <td>
                  <?=$basicInfo['date_of_birth']?>
              </td>
          </tr>
          <?php
                $result = $getLicenseValidity->fetch_assoc();
                // var_dump($result);die();

                $licenseNumber = $result['license_identity_number'];
                $issueDate = $result['license_issue_date'];
                $validTill = $result['license_validity'];
          if(isset($licenseNumber)):
                ?>
                <tr>
                    <th style="text-align: left">
                        License Number :
                    </th>
                    <td>
                        <?=$licenseNumber?>
                    </td>
                </tr>
          <?php
            endif;

          if(isset($issueDate)):
          ?>
          <tr>
              <th style="text-align: left">
                  License Issue Date :
              </th>
              <td>
                  <?=$issueDate?>
              </td>
          </tr>
          <?php
            endif;
          if(isset($validTill)):
              ?>
              <tr>
                  <th style="text-align: left">
                      License Valid Till :
                  </th>
                  <td>
                      <?=$validTill?>
                  </td>
              </tr>
                <tr>
                    <th style="text-align: left">
                        License Status :
                    </th>
                    <td>
              <?php
              date_default_timezone_set('Asia/Kolkata');
              $toDay = date('Y-m-d');
              if($validTill > $toDay):
                  echo '<span style="color: darkgreen;">VALID</span>';
              else:
                  echo '<span style="color: crimson;"> 	<b> INVALID </b>   </span>';
              endif;
              ?>
                    </td>
                </tr>
                <?php
                    if($result['license_type'] == 1):
                        
                    elseif($result['license_type'] == 2):
                        
                    else:
                    
                ?>
                <tr>
                    <td><strong>License Collection: </strong></td>
                    <td>
                        <?php
                        
                            if($result['delivered'] == 1):
                                echo '<span style="color: darkgreen;"><strong>Received</strong></span>';
                            else:
                                echo '<span style="color: crimson;"> 	<b> Please Collect Your License from the Office </b>   </span>';
                            endif;
                        ?>
                    </td>
                </tr>
              <?php
                    
                endif;
          endif;
          ?>
      </table>
      <button onclick="window.print();" class="noPrint w3-button w3-green w3-block">Print As Document</button>
  </div>
  <div class="w3-panel">
  
  </div>
  <hr>
<?php include "template/user-footer.php";?>