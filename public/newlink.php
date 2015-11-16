<?php
require_once('../includes/initialize.php');
if (!$session->is_logged_in()){ redirect_to("sign_in.php"); }
?>

<?php
 include_layout_template('admin_header.php');
 echo "<a href='logout.php'>logout</a>"; 
?>

<?php
    
    if($_POST)
    {
    $newlink = new Links();
    $newlink->path=$_POST['url'];
    $newlink->date= strftime("%Y-%m-%d %H:%M:%S",time()); 
    $newlink->create();
    header('Location: bookmarks.php');
    }
	
?>
<form action="newlink.php"method="post">
<input type="text" name="url" placeholder="URL" />

<button type="submit">Submit</button>
</form>
<?php include_layout_template('admin_footer.php'); ?>

