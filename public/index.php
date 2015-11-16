<?php require_once("../includes/initialize.php"); ?>
<?php $photos = photograph::rand_all(); ?>
<?php include_layout_template('admin_header.php'); ?>
<!-- container begin -->

<div id="container">
</div>
<!-- container end -->
<!-- container_slider begin -->
<div id="container_slider">
<a id="slider_button_left" href="index.php"></a>
<a id="slider_button_right" href="index.php"></a>

<div id="container_borders">

<?php
$count = 1;
foreach($photos as $photo){
    
    if ($count <= 8){
    
    echo '<div class="shape_1" id="posetion_shape_'.$count.'">
    <a href="photo.php ? id='. $photo->photo_id .'">
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

</div>
<!-- container_slider end -->
<?php include_layout_template('admin_footer.php'); ?>