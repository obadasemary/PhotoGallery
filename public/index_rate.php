<html >
 <head>
	<link href="css/rate.css" rel="stylesheet" type="text/css" />
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script type="text/javascript" src="jquery.js"></script>
	
 	<title> rating </title>
 </head>
 <body>
	

<?php 
$page = "examplepage";
include 'rate.php' ;




echo "<br /><br />" ;
echo "<strong> current statistics for this page are: </strong><br />" ;
echo "Number of votes : $ratesnr <br />" ;
echo "All votes counted together give the number of  : $ratestotal <br />" ;
echo "Rounded to 0.5 the average rate for this page is $pagerating out of 5 stars<br />" ;





echo "<br /><br />" ;
echo 'Click <a href="index.php" >here</a> to view the current rating.' ;


?>
	
 
</body>

</html>

