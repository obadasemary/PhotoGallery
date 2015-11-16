<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lifeshare</title>
<link type="text/css" rel="stylesheet" href="css/home.css" />

</head>

<body>

<!-- ADMIN Begin-->

<?php

if (isset($_SESSION['admin'])){
    echo '
    <div id="admin_">
<ul><li><a href="#">See DB</a></li>
<li><a href="#">Edit</a></li>
<li><a href="#">Delete</a></li>
<li><a href="#">Search</a></li>
</ul>
</div>
    ';
}

?>

<!-- End of ADMIN -->


<!-- header begin -->
<div id="header">
<div id="logo">
<h1><a href="home_page_after_loging.php">Lifeshare</a></h1>
</div>
<div id="the_orange">
<p id="upload_w">Upload</p>
<a href="photo_upload.php"><img src="img/upload_tr.png" id="upload_b" title="upload" alt="upload image"/></a>
<img src="img/bookmar_button-tr.png" id="bookmark_b" title="bookmark" alt="bookmark"/></div>
<div id="login_R">
  <ul>
  <?php 
 
  
  if (!isset($_SESSION['user_id'])){
  echo '
    <li><a href="sign_in.php">login</a></li>
      <li><a href="sign_up.php" id="before_R">Register</a></li>';
      }else {
        echo '<li><a href="logout.php">logout</a></li>';
      }
  ?>
  </ul>
 </div>
</div>
<!-- header end -->
