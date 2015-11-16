<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()){ redirect_to("sign_in.php"); }
?>

<?php
 include('master_header.php');
 echo "<a href='logout.php'>logout</a>"; 
?>

<?php
    $user = User::find_by_id(25);
    $user->delete();
?>

<?php include('master_footer.php'); ?>
