<?php require_once("../includes/initialize.php"); ?>
<?php $photos = photograph::find_by_user_id($_SESSION['user_id']);
$user = user :: find_by_id($_SESSION['user_id']);
include('layouts/header.php');
?>

<!-- Container Begin-->
<div id="contianer">
<?php
include('layouts/cover.php');
?>

<!-- Show Hide Begin-->
<div class="show_hide posetion_78">
<div id="hide_shape" onClick="hideTheDiv()">
<img title="show_Hide" alt="hide the photos" src="img/photos/hide.png" id="img_hide">
</div>
</div><!-- Show Hide END-->

<!-- Photos Albums Begin-->
<div class="photos_albums posetion_79">
  <ul>
  <li><h1 class="h_photos">Photos</h1></li>
  <li><div class="line2"></div></li>
   <li><a href="#"><h2 class="h_photos2 h_font_style">+Creat new album</h2></a></li>
   <li class="line2"></li>
    <li><a href="#"><h3 class="h_photos2 h_photos2_p h_font_style">Recent uploads</h3></a></li>
    <li><a href="#"><h4 class="h_photos2 h_photos2_p h_font_style">Your stories</h4></a></li>
  <li><div class="line2"></div></li>
   <li><h1 class="h_photos">Albums</h1></li>
     <li><a href="#"><h4 class="h_photos2 h_photos2_p h_font_style">All photos <span id="default_p">(default)</span></h4></a></li>
  <li><div class="line2"></div></li>
  </ul>
</div><!-- Photos Albums END-->

<!-- Line1 Begin--> <div class="line1">
</div><!-- Line1 End-->

<!-- Top menue left Begin-->
<div class="topmenu posetion_80">
  <ul id="top_menue_right">
    <li id="posetion_li">Order By:</li>
    <li><div class="shape_button_1" id="posetion_32"></div></li>
    <li><div class="shape_button_1" id="posetion_33"></div></li>
  </ul>
</div><!-- Top menue End-->

<!-- Top menue right Begin-->
<div class="topmenu_right posetion_81">
  <ul>
    <li><div class="shape_button_1" ></div></li>
    <li><div id="shape_button_1"><img id="slide_img"src="img/photos/icon-slideshow.png"><span id="slide_word">Slide Show</span></div></li>
    </ul>
    <div class="the_share" id="posetion_36">
<input class="share share1" type="image" src="img/photos/share_facebook.png">
<input class="share" type="image" src="img/photos/share_twitter.png">
<input class="share" type="image" src="img/photos/share_gplus.png">
<input class="share" type="image" src="img/photos/share_generla.png">
</div><!-- Top menue right END-->
  
</div><!-- Top menue End-->

<!-- Line4 Begin--><div class="line_4 posetion_82">
</div><!-- Line4 Begin-->

<?php
	$max_file_size = 1048576;   // expressed in bytes
	                            //     10240 =  10 KB
	                            //    102400 = 100 KB
	                            //   1048576 =   1 MB
	                            //  10485760 =  10 MB

	if(isset($_POST['submit'])) {
		$nphoto = new Photograph();
		//$nphoto->caption = $_POST['caption'];
		$nphoto->attach_file($_FILES['file_upload']);
		if($nphoto->save()) {
			// Success
      $session->message("Photograph uploaded successfully.");
			header("Location: photos.php");
		} else {
			// Failure
      $message = join("<br />", $nphoto->errors);
		}
	}
	
?>

<!-- Upload Container Begin-->
<div class="upload_container posetion_83">
<?php echo output_message($message); ?>
<div id="upload_borders1">
<form action="photos.php" enctype="multipart/form-data" method="POST">
<input type="submit" name="submit" class="shape_button_1" id="posetion_330" value="Upload">
<input type="file" name="file_upload" src="img/photos/upload.png" id="posetion_40">
</form>
</div>
<?php

foreach($photos as $photo){
    
    
    
    echo '<div class="upload_borders" >
    <a href="photo.php?id='. $photo->photo_id .'">
            <img src="'. $photo->image_path().'"  />
        </a>
    </div>';       

    
}


?>

<!--
<div class="upload_borders"><a href="#"><img src="img/ballroom-wallpaper-1920x1080.jpg" alt="photo"></a></div>
<div class="upload_borders"><a href="#"><img src="img/ballroom-wallpaper-1920x1080.jpg" alt="photo"></a></div>
<div class="upload_borders"><a href="#"><img src="img/bergamo-wallpaper-1920x1080.jpg" alt="photo"></a></div>
<div class="upload_borders"><a href="#"><img src="img/ballroom-wallpaper-1920x1080.jpg" alt="photo"></a></div>
<div class="upload_borders"><a href="#"><img src="img/ballroom-wallpaper-1920x1080.jpg" alt="photo"></a></div>
<div class="upload_borders"><a href="#"><img src="img/ballroom-wallpaper-1920x1080.jpg" alt="photo"></a></div>
<div class="upload_borders"><a href="#"><img src="img/trace_image.jpg" alt="photo"></a></div>
<div class="upload_borders"><a href="#"><img src="img/ballroom-wallpaper-1920x1080.jpg" alt="photo"></a></div>
<div class="upload_borders"><a href="#"><img src="img/ballroom-wallpaper-1920x1080.jpg" alt="photo"></a></div>
<div class="upload_borders"><a href="#"><img src="img/ballroom-wallpaper-1920x1080.jpg" alt="photo"></a></div>
<div class="upload_borders"><a href="#"><img src="img/ballroom-wallpaper-1920x1080.jpg" alt="photo"></a></div>
-->
</div><!-- Upload Container END-->

<!-- Left Side Borders Begin-->
<div class="left_side_borders">

<ul>
  <li><h1 class="h_photos posetion_41">Summery</h1></li>
  </ul>
  
  <ul class="right_side">
    <li><div id="images_left_b"></div></li>
    <li><img id="eye_p" alt="eye" src="img/photos/eye.png"></li>
    <li><img id="sub_p" alt="eye" src="img/photos/summery.png"></li>
   </ul>
  
   <ul class="left_list">
  <li><a href="#">Images</a></li>
  <li><a href="#">Views</a></li>
  <li><a href="#">Sub-albums</a></li>
   </ul>
  
</div>
  
<div class="left_side_borders">
  <ul id="info_pan">
    <li><h1 class="h_photos posetion_42">Info</h1></li>
    <li id="posetion_43"><a href="#">Click to add description</a></li>
  </ul>
</div>
<!--<div class="left_side_borders"></div>-->

</div><!-- Left Side Borders Begin-->

<!-- Footer Begin-->
<div id="footer">
</div><!-- Footer END-->
</div><!-- Container END-->

</body>
</html>
