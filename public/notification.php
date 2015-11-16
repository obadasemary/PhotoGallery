<?php require_once("../includes/initialize.php");

if (!$session->is_logged_in()){ redirect_to("sign_in.php"); }
?>


<?php
  $user = user :: find_by_id($_SESSION['user_id']);
	$all_notification = Notification::find_all($_SESSION['user_id']);
  include('layouts/header.php');
    #var_dump($all_notification);
?>



<!-- Container Begin-->

<?php 
foreach ($all_notification as $notification ) {
	$photo = Photograph::find_by_id($notification->photo_id);
    $user = User::find_by_id($notification->maker_id);
    $event_type=($notification->event_type=='C')? "Comment on":"";
    if ($notification->seen==1){
      echo "#";
    }
	echo "<a href='photo.php?id=".$photo->photo_id."'><img src='".$user->user_picture."' height=30px width=30px>
  ".$user->nick_name." ".$event_type." ".$notification->time." <img src='". $photo->image_path()."'height=40px width=40px />
	</a>";
  echo "<br/>";
  //var_dump($notification);
Notification::seen($notification->notification_id);
}

?>


</div><!--End of Container-->

<!--Begin Footer-->
<div id="footer">
</div><!--End of Footer-->
</div><!-- End of Wrap-->

</body>
</html>
