<?php
session_start();

if($_SESSION['UserAccess']=='User'):
    header('Location: views/user.dashboard.php');
elseif($_SESSION['UserAccess']=='Admin'):
    header('Location: views/admin.dashboard.php');
else:
    header('Location: views/login.php?message="অনুগ্রহ করে আপনি আপনার পোর্টালে লগইন করুন"');
endif;

