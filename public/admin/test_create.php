<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()){ redirect_to("sign_in.php"); }
?>

<?php
 include('master_header.php');
 echo "<a href='logout.php'>logout</a>"; 
?>

<?php
    $user =new User();
    $user->nick_name = "obada.semary";
    $user->user_pass = "admin";
    $user->first_name = "obada";
    $user->last_name = "semray";
    $user->email = "obadasemary@gamil.com"; 
    $user->create();
?>

<?php include('master_footer.php'); ?>

