<?php error_reporting(E_ALL &~ E_NOTICE);
require_once("../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("sign_in.php"); } ?>
<?php //$photos = photograph::find_all();
$user = user :: find_by_id($_SESSION['user_id']);
$links = links :: find_all();
//$links = links :: find_by_id($_SESSION['user_id']);
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
  <li><h1 class="h_photos">Bookmarks</h1></li>
  <li><div class="line2"></div></li>
  <li><a href="newlink.php"><h2 class="h_photos2 h_font_style_2">+New Link</h2></a></li>
   <li><a href="#"><h2 class="h_photos2 h_font_style_2">+Creat new folder</h2></a></li>
   <li class="line2"></li>
   <li><h1 class="h_photos">Folders</h1></li>
      <li><div class="line2"></div></li>
   <li><a href="#"><h4 class="h_photos2 h_photos2_p h_font_style">All links <span id="default_p">(default)</span></h4></a></li>
   <li><h1 class="h_photos2 h_photos2_p h_font_style">Folder name</h1></li>
     
  </ul>
</div><!-- Photos Albums END-->

<!-- Top menue left Begin-->
<div class="topmenu posetion_80">
  <ul id="top_menue_right">
    <li id="posetion_li">Order By:</li>
    <li><div class="shape_button_1" id="posetion_32"></div></li>
  </ul>
</div><!-- Top menue End-->

<!-- Line4 Begin--><!-- Line4 Begin-->

<!-- Bookmarks Container Begin-->
<div class="bookmarks_container">

<!--Line4 Begin--><div class="line_4">
</div><!--Line4 Begin-->

<!--Line9 Begin--><div class="line_9">

</div><!--Line9 End-->

<div class="bookmarks_links">
  <?php foreach ($links as $newlink )
  {
?>
<div class="main_b_list main_p_list_1">
<span class="main_a_link" ><a href="<?php echo $newlink->path ?>"><?php echo $newlink->path ?></a></span>
</div>

<div class="main_b_list main_p_list_2">
<input class="inputs_b posetion_701" type="image" src="img/bookmarks/add-link-24.png" alt="add your link">
<input class="inputs_b" type="image" src="img/bookmarks/copy-link-24.png" alt="add your link">
<input class="inputs_b" type="image" src="img/bookmarks/delete-link-24.png" alt="add your link">
<input class="inputs_b" type="image" src="img/bookmarks/sharethis-24.png" alt="add your link">
<span class="date_time"><?php echo datetime_to_text($newlink->date) ?></span>
</div>
<?php   }  ?>

</div>
</div><!-- Bookmarks Container End-->
<div class="line_9 posetion_831">
</div>

<!-- Left Side Borders Begin-->
<div class="left_side_borders">

<ul>
  <li><h1 class="h_photos posetion_41">Summery</h1></li>
  </ul>
  
  <ul class="right_side">
 <li><img id="book_b" alt="eye" src="img/bookmarks/book-512.png"></li>    
 <li><img id="eye_p" alt="eye" src="img/photos/eye.png"></li>
    <li><img id="sub_p" alt="eye" src="img/photos/summery.png"></li>
   </ul>
  
   <ul class="left_list">
  <li><a href="#">Bookmarks</a></li>
  <li><a href="#">Views</a></li>
  <li><a href="#">Sub-folders</a></li>
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
