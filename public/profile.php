<?php error_reporting(E_ALL &~ E_NOTICE);
require_once("../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("sign_in.php"); } ?>
<?php //$photos = photograph::find_all();
$user = user :: find_by_id($_SESSION['user_id']);

if(intval($_GET['user_id']) == 0 && $_SESSION['user_id']==null)
    header('Location: index.php');
else
{
    $profile_user = user :: find_by_id((intval($_GET['user_id'])==0)?$_SESSION['user_id']:$_GET['user_id']);
	
    if($profile_user->user_id == $user->user_id)
        $myprofile = true;
    
    if(!$myprofile)
    {
        $q = $database->query("SELECT * FROM follow WHERE follower_id = {$user->user_id} AND following_id = {$profile_user->user_id}");
        $r = $database->fetch_array($q);
        if($r['following_id'])
            $action = 'unfollow';
        else
            $action = 'follow';
    }
      $result=mysql_query("SELECT count(*) as total from follow WHERE follower_id= {$user->user_id}");
$data=mysql_fetch_assoc($result);
$following=$data['total'];
$result=mysql_query("SELECT count(*) as total from follow WHERE following_id= {$user->user_id}");
$data=mysql_fetch_assoc($result);
$follower=$data['total'];

}
$photo = new Photograph();
$photos=$photo->find_by_user_id($profile_user->user_id);
include('layouts/header.php');
 ?>

<!-- Container Begin-->
<div id="contianer">

<!-- Profile Cover Begin-->

<div id="profile_cover">
<!-- Cover Photo Begin-->
<div id="cover_photo" style="background-image: url(<?php echo $profile_user->cover_photo ?>);background-size: 100% 100%;">
<!-- Profile Photo Begin-->
<div id="profile_photo" class="posetion_sun">
<img src="<?php echo $profile_user->user_picture ?>" />
</div><!-- Cover Photo END-->
</div><!-- Profile Photo END-->
<div class="change_this"><a href="profile_photo.php"><img src="img/photos/1400956898_32.png"></a></div>
 <!--<a href="cover_photo.php" class="fixing_the_img"><img src="img/photos/1400956898_32.png"></a>-->
<!--<div class="change_this_1"><a href="cover_photo.php"><img src="img/photos/1400956898_32.png"></a></div>
-->
<div class="move_it_now"><a href="cover_photo.php"><img src="img/photos/1400956898_32.png"></a></div>
</div><!-- Profile Cover END-->

<!-- Top menue left Begin-->
  <div class="topmenu_left_rule_p posetion_80_rule_p">
    <h1 class="info_the_p posetion_87_info"><?php echo $profile_user->nick_name ?></h1>
    <div class="the_info_p"></div>
  </div>
  <!-- Top menue End--> 
  
  <!-- Top menue right Begin-->
  <div class="topmenu_right_rule_p posetion_81_rule_p">
    <h1 class="info_the_p posetion_88_info">Summery</h1>
    <div class="list_info_1 p_list_info_1">
      <ul class="list_o">
        <li><img src="img/photos/summery.png" alt="sub"></li>
        <li class="posetion_702_parg"> <a href="#" class="force_resume">Images</a> </li>
      </ul>
      <ul class="list_o_1">
        <li><img src="img/photos/summery.png" alt="sub"></li>
        <li class="posetion_702_parg"> <a href="#" class="force_resume">Sub-albums</a> </li>
      </ul>
    </div>
    <div class="line_info"></div>
    <div class="list_info_1">
      <ul class="list_o">
        <li><img src="img/photos/Users-Conference-icon.png" alt="sub"></li>
        <li class="posetion_702_parg"> <?php echo $follower; ?><a href="#" class="force_resume">Followers</a> </li>
      </ul>
      <ul class="list_o_1">
        <li><img src="img/photos/Users-Conference-icon.png" alt="sub"></li>
        <li class="posetion_702_parg">  <?php echo $following; ?> <a href="#" class="force_resume">Following</a> </li>
      </ul>
    </div>
  </div>
  <!-- Top menue right END--> 
  
  <!-- Top menue End--> 
  
  <!--Follow and message Begin-->
  <div class="follow_and_msg"> 
 <?php if(!$myprofile) { ?>
 <a href="follow.php?action=<?php echo $action; ?>&following_id=<?php echo $profile_user->user_id; ?>" class="follow_word"><?php echo ($action == 'follow' ? 'Follow' : 'Unfollow'); ?></a>
<?php } ?>
    <input class="msg_button_p" type="image" src="img/photos/profile.png">
  </div>
  <!--Follow and message END-->
  <div class="profile_container">
   <?php

foreach($photos as $photo){
    
    
    
    echo '<div class="rec_1">
    <a href="photo.php?id='. $photo->photo_id .'">
            <img src="'. $photo->image_path().'"  />
        </a>
    </div>';       

    
}


?>
  </div></div>
  <?php 
  include('layouts/footer.php');
  ?>