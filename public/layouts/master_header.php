<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lifeshare</title>
<link type="text/css" rel="stylesheet" href="css/home.css" />

</head>

<body>

<!-- ADMIN Begin-->
<div id="admin_">
<ul><li><a href="CRUD/user.php">See DB</a></li>
<li><a href="CRUD/update.php">Edit</a></li>
<li><a href="CRUD/delete.php">Delete</a></li>
<li><a href="search.php">Search</a></li>  
</ul>
</div>
<!-- End of ADMIN -->


<!-- header begin -->
<div id="header">
<div id="logo">
<h1><a href="#">Lifeshare</a></h1>
</div>
<div id="the_orange">
<p id="upload_w">Upload</p>
<img src="img/upload_tr.png" id="upload_b" title="upload" alt="upload image"/>
<img src="img/bookmar_button-tr.png" id="bookmark_b" title="bookmark" alt="bookmark"/></div>
<div id="login_R">
  <ul>
  	<?php 
      if (!$session->is_logged_in()){ redirect_to("login.php"); }        
    ?>
  </ul>
 </div>
</div>
<!-- header end -->
