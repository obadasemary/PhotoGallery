<?php require_once("../includes/initialize.php"); ?>
<?php $user = user :: find_by_id($_SESSION['user_id']);
$randam_photos = photograph::rand_all();
$photos = photograph::find_by_user_ids("SELECT following_id FROM follow WHERE follower_id = {$user->user_id}");
include('layouts/header.php');

 ?>


<!--Begin contianer-->
<div id="contianer">

<!--Begin The big Borders(the_first_slider)-->
<div id="the_first_slider">

<?php 
$count = 1;
foreach($randam_photos as $photo){
    
    if ($count <= 3){
    if($count==3)echo'<div id="shape_2">';
elseif($count==2)echo'<div id="shape_3">';
else echo'<div id="shape_1">';
    echo '
    <a href="photo.php?id='. $photo->photo_id .'">
            <img src="'. $photo->image_path().'"  />
        </a>
    </div>';
    
    }else
    {
        break;
    }
    $count++;
    
}

?>

</div>

<!--<div id="shape_1"></div>

<div id="shape_3"></div>

<div id="shape_2"></div>-->

</div><!--End of The big Borders(the_first_slider)-->

<!--Begin Creat Story-->
<div class="creat_story_class the_second_slider"> <!--creat story border-->

<div id="shape_4"></div>

<div id="shape_5"></div>

<div id="shape_6"></div>



</div><!--End Creat Story-->
<!--Begin View library-->

<div class="view_library the_second_slider">
<?php
$count = 8;
foreach($photos as $photo){
    
    if ($count <= 16){
    
    echo '<div class="shape_library" id="shape_'.$count.'">
    <a href="photo.php?id='. $photo->photo_id .'">
            <img src="'. $photo->image_path().'"  />
        </a>
    </div>';
    
    }else
    {
        break;
    }
    $count++;
    
}


?>

<!--<div class="shape_library" id="shape_8"></div>
<div class="shape_library" id="shape_9"></div>
<div class="shape_library" id="shape_10"></div>
<div class="shape_library" id="shape_11"></div>
<div class="shape_library" id="shape_12"></div>
<div class="shape_library" id="shape_13"></div>
<div class="shape_library" id="shape_14"></div>
<div class="shape_library" id="shape_15"></div>
<div class="shape_library" id="shape_16"></div>
-->

</div><!--õEnd of View library-->


<!--Begin Edit Photos-->
<div class="edit_photos_b the_second_slider">
<div id="shape_20"></div>
<div id="shape_21"></div>

</div><!--õEnd of Edit Photos-->

<!--Begin Buttons-->
<div id="buttons">
<div class="shape_button" id="creat_posetion_1"><a href="#" class="creat_story">Creat Story</a></div>

<div class="shape_button" id="creat_posetion_2"><a href="photos.php" class="creat_story">View Library</a></div>
<div class="shape_button" id="creat_posetion_3"><a href="#" class="creat_story">Edit Photos</a></div>

</div><!--õEnd of Buttons-->

<!--Begin Most Popular(a_tags_container_border)-->
<div id="a_tags_container_border">
<ul id="most_popular">
<li><a href="home_page_after_loging.php"  class="a_middle">Most Popular</a></li>
 <li><div class="line12"></div></li>

<li><a href="your_Upload.php" class="a_middle">Your Upload</a></li>

  <li><div class="line12"></div></li>

<li><a href="friends_upload.php"  class="a_middle">Friends Upload</a></li>
</ul>
</div><!--End of Most Popular(a_tags_container_border)-->
<!--Begin Sliders Borders-->
<div id="sliders_borders">
<?php
$count = 23;
foreach($photos as $photo){
    
    
    
    echo '<div class="shape_23" id="posetion_shape_'.$count.'">
    <a href="photo.php?id='. $photo->photo_id .'">
            <img src="'. $photo->image_path().'"  />
        </a>
    </div>';       
    $count++;
    
}


?>



</div><!--End of Sliders Borders-->

<!--End of Container-->

<?php include('layouts/footer.php'); ?>
