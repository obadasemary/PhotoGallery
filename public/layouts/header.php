<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>After-login</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script>
// JavaScript Document
function getthebitch(){
if(document.getElementById('male').checked && document.getElementById('female').checked){
  document.getElementById('female').checked = false;
  document.getElementById('male').checked = false ;
  }
};
function hideit(){
  
  document.getElementById('Rounded_Rectangle_id').style.display = "none";
  document.getElementById('Rounded_Rectangle_id_2').style.display = "none";
  document.getElementById('rounded_notificat').style.display = "none";
  document.getElementById('rounded_pass').style.display = "inline";
  };
function hideit_h(){
  document.getElementById('Rounded_Rectangle_id').style.display = "inline";
  document.getElementById('Rounded_Rectangle_id_2').style.display = "inline";
  document.getElementById('rounded_pass').style.display = "none";
  document.getElementById('rounded_notificat').style.display = "none";
  };
function hideit_h2(){
  document.getElementById('Rounded_Rectangle_id').style.display = "none";
  document.getElementById('Rounded_Rectangle_id_2').style.display = "none";
  document.getElementById('rounded_pass').style.display = "none";
  document.getElementById('rounded_notificat').style.display = "inline";
  };
/*function function_1(){
	var el = document.getElementById('class_1'),
		maxlength = 50;
		if (el.value.length>maxlength){
			window.confirm("thats enough");
			}
	}*/
function search(e){
if (e.keyCode == 13){
var x=document.getElementById('search'); 
window.location = "search.php?search_user=search+database&search="+x.value; 
}
}
</script>
</head>

<body>
<?php if (isset($_SESSION['admin'])){
?>
<!-- ADMIN Begin-->
<div id="admin_">
<ul><li><a href="#">See DB</a></li>
<li><a href="#">Edit</a></li>
<li><a href="#">Delete</a></li>
<li><a href="#">Search</a></li>  
</ul>
</div>
<!-- End of ADMIN -->
<?php } ?>
<!-- wrap (the site body) Begin-->
<div id="wrap">
<!--Begin of Header-->
  <div class="header"> 
    
    <!--Begin of A_tags-->
    <div class="a_tags">
      <ul>
        <li class="a_tags_class"><a href="home_page_after_loging.php">Home</a></li>
        <li>
          <div class="line12"></div>
        </li>
        <li class="a_tags_class"><a href="profile.php">Profile</a></li>
        <li>
          <div class="line12"></div>
        </li>
        <li class="a_tags_class"><a href="photos.php">Photos</a></li>
        <li>
          <div class="line12"></div>
        </li>
        <li class="a_tags_class"><a href="bookmarks.php">Bookmarks</a></li>
        <li>
          <div class="line12"></div>
        </li>
        <li class="a_tags_class"><a href="connect.php">Connect</a></li>
      </ul>
    </div>
    <!--End of A_tags--> 
    
    <!--Begin of Upload Button-->
    <div class="upload_btn"> <img src="img/new-header/upload-128.png" alt="upload NOW it's free" class="upload_image">
      <p><a href="photo_upload.php">Upload</a></p>
    </div>
    <!--End of Upload Buttons--> 
    
    <!--Begin Of Search-->
    <div class="search">
        <input id="search" type="text" placeholder="Search" onkeyup="search(event)">
    </div>
    <!--End of Search--> 
    <!--Begin of the Big List-->
    <div class="big_list">
      <ul class="first_ul_l">
        <!--FOR DEV you can includ <form> befor this tag--> 
        <!--Begin of Message_n-->
        <li class="message_n" <?php echo ($not_seen==null)?"":'style="background-color: rgb( 255, 102, 0 );"';?>>
        <a href="notification.php" style="display: inline-table;;color:#fff"><input class="noti" type="image" src="img/new-header/Bell.png"><?php echo ($not_seen==null)?"":sizeof($not_seen);?></a>
        </li>
        <li class="message_n">
          <input class="noti" type="image" src="img/new-header/msg.png">
        </li>
        <li class="message_n">
          <input class="noti" type="image" src="img/new-header/add-user-xxl.png">
        </li>
      </ul>
      <!--End of Message_n--> 
      <!--Begin of Message_s-->
      <div class="message_s">
        <a href="setting.php"><input class="set_hea" type="image" src="img/new-header/settings-3-xxl.png"></a>
      </div>
      <!--End of Message_s--> 
      <!--Begin of User name and profile image-->
      <div class="user_name_image">
        <div class="userShape_IM"><a href="profile.php"><img src="<?php echo $user->user_picture ?>"></a></div>
        <a class="user_name" href="profile.php"><?php echo $user->nick_name; ?></a> </div>
      <!--End of User name and profile image--> 
      <!--Begin of logut-->
      <div class="log_out">
        <a href="logout.php"><input type="image" class="log_out_img" src="img/new-header/clarity-shutdown-icon.png" alt="why you will go out"></a>
      </div>
      <!--End of logut--> 
      <!--FOR DEV you can includ </form> after this tag--> 
    </div>
    <!--End of the Big List--> 
    
  </div>
  <!--End of Header--> 

