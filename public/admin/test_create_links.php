<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()){ redirect_to("sign_in.php"); }
?>

<?php
 include('master_header.php');
 echo "<a href='logout.php'>logout</a>"; 
?>

<?php
    
    $newlink = new Links();
    $newlink->path="google.com";
    $newlink->date= strftime("%Y-%m-%d %H:%M:%S",time()); 
    
    $newlink->create();
    
	
?>

<?php include('master_footer.php'); ?>

