<?php error_reporting(E_ALL &~ E_NOTICE);
require_once("../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("sign_in.php"); } ?>
<?php
$user = user :: find_by_id($_SESSION['user_id']);

if(intval($_GET['user_id']) == 0 && $_SESSION['user_id']==null)
    header('Location: index.php');
else
{
    $profile_user = user :: find_by_id((intval($_GET['user_id'])==0)?$_SESSION['user_id']:$_GET['user_id']);
}
$error="";
$user = new user();
if(isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['newpassword2'])){
	$q = $database->query("SELECT * FROM user WHERE user_id = ".$_SESSION['user_id']);
	$r = $database->fetch_array($q);
	if($_POST['newpassword'] != $_POST['newpassword2']){
		$error="new Password don't match";
	}
	else{
		if($r['user_pass']==$_POST['oldpassword']){
			$database->query("UPDATE user SET user_pass=".$_POST['newpassword']." WHERE user_id = ".$_SESSION['user_id']);
		}
		else {
			$error="Old Password wrong";
		}
	}
}

if(isset($_POST['username'])){
	$database->query("UPDATE user SET nick_name=".$_POST['username']." 
	email=".$_POST['email']."
	first_name=".$_POST['fname']."
	last_name=".$_POST['lname']."
	WHERE user_id = ".$_SESSION['user_id']);
}

include('layouts/header.php');
 ?>

<!-- Container Begin-->
<div id="contianer">
<div style="color:red;background:#fff;"><?php echo $error;?></div>
<form method="post">
<div class="the_right_sideof">
      <ul>
        <li>
          <div class="settingShape"><img src="img/settings/settings.png" alt="settings"><span class="list_left"><a href="#">Settings</a></span></div>
        </li>
        <li><a onClick="hideit_h()" href="#" class="list_left style_1">Profile</a></li>
        <li><a onClick="hideit()" href="#" class="list_left style_1">Password</a></li>
        <li><a href="#" class="list_left style_1">Privacy </a></li>
        <li><a onClick="hideit_h2()" href="#" class="list_left style_1">Notification</a></li>
        <li><a href="#" class="list_left style_1">Sharing</a></li>
      </ul>
    </div>
    <div class="Rounded_Rectangle_10" id="rounded_notificat">
      <div class="the_checking">
        <ul>
          <li>
            <input type="checkbox" class="checki">
          </li>
          <li>
            <p>Somebody comments on my photo or my story</p>
          </li>
        </ul>
      </div>
      <div class="the_checking">
        <ul>
          <li>
            <input type="checkbox" class="checki">
          </li>
          <li>
            <p>Somebody like my photo or my story</p>
          </li>
        </ul>
      </div>
      <div class="the_checking">
        <ul>
          <li>
            <input type="checkbox" class="checki">
          </li>
          <li>
            <p>Somebody rate my photo or my story</p>
          </li>
        </ul>
      </div>
      <div class="the_checking">
        <ul>
          <li>
            <input type="checkbox" class="checki">
          </li>
          <li>
            <p>Someone comments on a photo or story I've commented on</p>
          </li>
        </ul>
      </div>
      <div class="the_checking">
        <ul>
          <li>
            <input type="checkbox" class="checki">
          </li>
          <li>
            <p>Somebody comments on a photo or story I am subscribed to</p>
          </li>
        </ul>
      </div>
      <div class="the_checking">
        <ul>
          <li>
            <input type="checkbox" class="checki">
          </li>
          <li>
            <p>Somebody starts following me</p>
          </li>
        </ul>
      </div>
      <div class="the_checking">
        <ul>
          <li>
            <input type="checkbox" class="checki">
          </li>
          <li>
            <p>News and updates from site</p>
          </li>
        </ul>
      </div>
      <div class="the_checking">
        <ul>
          <li>
            <input type="checkbox" class="checki">
          </li>
          <li>
            <p>Account changes and updates</p>
          </li>
        </ul>
      </div>
    </div>
    <div class="Rounded_Rectangle_big" id="rounded_pass">
      <ul class="list_1_R_po">
        <li><img src="img/settings/setting_pass_1.png"></li>
        <li><img src="img/settings/setting_pass_2.png"></li>
        <li><img src="img/settings/setting_pass_2.png"></li>
      </ul>
      <ul class="list_1_R_po_2">
        <li>
          <p>Current Password</p>
        </li>
        <li>
          <input name="oldpassword" type="password" class="password_change">
        </li>
        <li>
          <p>New Password</p>
        </li>
        <li>
          <input name="newpassword" type="password" class="password_change">
        </li>
        <li>
          <p>Repeat Password</p>
        </li>
        <li>
          <input name="newpassword2" type="password" class="password_change">
        </li>
      </ul>
    </div>
    <div class="the_left_sideof"  id="Rounded_Rectangle_id">
      <h1>Information</h1>
      <img class="the_image_m" src="img/settings/setting.png" alt="the settings magic">
      <div class="Rounded_Rectangle">
        <ul class="list_1_R">
          <li><img id="magic_1" src="img/settings/setting_.png"></li>
          <li><img id="magic_2" src="img/settings/setting_1.png"></li>
          <li><img src="img/settings/setting_2.png"></li>
          <li><img src="img/settings/setting_2.png"></li>
          <li><img id="magic_3" src="img/settings/setting_3.png"></li>
        </ul>
        <ul class="list_2_l">
          <li><span class="thelistword aba">Username</span></li>
          <li>
            <input type="text" class="the_input_w_h" name="username" value="<?php echo $profile_user->nick_name;?>">
          </li>
          <li><span class="thelistword aba">Email</span></li>
          <li>
            <input type="email" class="the_input_w_h" name="email" value="<?php echo $profile_user->email;?>">
          </li>
          <li><span class="thelistword aba">First name</span></li>
          <li>
            <input type="text" class="the_input_w_h" name="fname" value="<?php echo $profile_user->first_name;?>">
          </li>
          <li><span class="thelistword aba">Last name</span></li>
          <li>
            <input type="text" class="the_input_w_h" name="lname" value="<?php echo $profile_user->last_name;?>">
          </li>
          <li><span class="thelistword aba">About you</span></li>
          <li>
            <input type="text" class="the_input_w_h">
          </li>
        </ul>
      </div>
    </div>
    <div class="the_left_sideof" id="Rounded_Rectangle_id_2">
      <h1>About you</h1>
      <img class="the_image_m" src="img/settings/setting.png" alt="the settings magic">
      <div class="Rounded_Rectangle">
        <ul class="list_2_R">
          <li><img class="about_1" src="img/settings/info_.png">
            <div class="userShape"></div>
          </li>
          <li>
            <div class="browseShape color_2"> <span class="b_d_w2">Browse..</span>
              <input type="file">
            </div>
            <input type="button" value="Delete" class="browseShape color_1 b_d_w">
          </li>
          <li><img class="about_1" src="img/settings/setting_2.png"><span class="thelistword aba2">Gender</span>
            <div class="checkbox">
              <label>Male</label>
              <input type="radio" name="sex" value="male">
              <label>Female</label>
              <input type="radio" name="sex" value="female">
            </div>
          </li>
          <li><img class="about_1" src="img/settings/location.png"><span class="thelistword aba2">Location</span>
            <input type="text" class="posetion_m1 the_input_w_h">
            <input type="text" class="the_input_w_h posetion_m1">
          </li>
          <li>
            <input type="button" class="Shape_add_equipment the_left_sideof_" value="Add Cameras" />
            <input type="button" class="Shape_add_equipment the_left_sideof_" value="Add Lences" />
            <input type="button" class="Shape_add_equipment the_left_sideof_" value="Add Equipment" />
          </li>
        </ul>
      </div>
    </div>
    <div class="line_4 posetion_the1"></div>
    <input type="submit" class="save_changes save_changesw" value="Save Changes">
	</form>
</div>
  <?php 
  include('layouts/footer.php');
  ?>