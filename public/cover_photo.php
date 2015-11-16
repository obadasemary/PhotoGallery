<?php
require_once('../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>
<?php
	$max_file_size = 10485760;   // expressed in bytes
	                            //     10240 =  10 KB
	                            //    102400 = 100 KB
	                            //   1048576 =   1 MB
	                            //  10485760 =  10 MB
    ini_set('upload_max_filesize', $max_file_size);
    
	if(isset($_POST['submit'])) {
	       if(count($_FILES['photo']) > 0)
           {
                if(is_uploaded_file($_FILES['photo']['tmp_name']))
                {
                    if(move_uploaded_file($_FILES['photo']['tmp_name'], "user_photos/". $_FILES['photo']['name']))
                    {
                        $photo = "user_photos/". $_FILES['photo']['name'];
                        $database->query("INSERT INTO user_photo VALUES (NULL, {$_SESSION['user_id']}, 'cover', '$photo', NOW())");
                        if($database->affected_rows() == 1)
                        {
                            $database->query("UPDATE user SET cover_photo = '$photo' WHERE user_id = {$_SESSION['user_id']}");
                            $message = "uploaded successfully";
                        }
                        else
                        {
                            $message = "not uploaded";
                        }
                    }
                    else
                    {
                        $message = 'cant move file';
                    }
                }
                    else
                    {
                        $message = 'cant upload file';
                    }
           }
		} else {
			// Failure
        $message = "ERROR HAPPEND";
		}
	
	
?>


<?php include_layout_template('admin_header.php'); ?>

	<h2>Photo Upload</h2>

	<?php echo output_message($message); ?>
  <form action="cover_photo.php" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
    <p><input type="file" name="photo" /></p>
    <p>Caption: <input type="text" name="caption" value="" /></p>
    <input type="submit" name="submit" value="Upload" />
  </form>
  

<?php include_layout_template('admin_footer.php'); ?>
		
