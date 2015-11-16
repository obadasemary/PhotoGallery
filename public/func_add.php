<?php

include ('config_rate.php');

//////////////////////////////////////////////////////////// get stuff
if(isset($_GET['page']) && isset($_GET['rating'] )) 
{



$page = $_GET['page'];
$rating =$_GET['rating'] ;

// in case a funnyman is trying to mess up your ratings :
if ($rating  != '1' && $rating !='2' && $rating !='3' && $rating !='4' && $rating !='5') die ("error , out of bound") ; 

$result = addrating($page, $rating);
echo $result ;

}


//////////////////////////////////////////////////////////////////

function addrating($page, $rating)

{ 


	global $localhost, $dbuser, $dbpass, $dbname, $dbtablerates,$dbtableip; 

	$ip= $_SERVER["REMOTE_ADDR"]; 


	$link = mysql_connect($localhost, $dbuser, $dbpass); 
	
	if (!$link) 
	{
	    die('Could not connect: ' . mysql_error());
	}	

	$dbselect=mysql_select_db($dbname); 
	if (!$dbselect) 
	{
    	die ("Can\'t use database $dbname! : " . mysql_error());
	}





	if(!mysql_num_rows(mysql_query("SELECT page FROM $dbtablerates WHERE page = '$page'")))
	return(1);  // You cannot rate.The page cannot be found in the database... create it first.

	


	if(mysql_num_rows(mysql_query("SELECT page FROM $dbtableip WHERE IP = '$ip' AND page ='$page'")))
	{
	//echo("You already voted.");
	return (2);
	} 
	else
	{
	
	$insert = mysql_query("INSERT INTO $dbtableip (page, IP)VALUES ('$page', '$ip')");

	//echo "You ($ip) have not voted for this page ($page). Your IP will not be added to the IP's that have voted for this page" ;
	

	if (!$insert) 
		{
    		die ("Can't insert into $dbtablehits : " . mysql_error());
		}
	}
	

// Now we know the user has not voted for the particulair page before, and we will add the vote. 

if(mysql_num_rows(mysql_query("SELECT page FROM $dbtablerates WHERE page = '$page'")))
	{


		$updatecounter = mysql_query("UPDATE $dbtablerates SET ratings = ratings+1 , totalrate = totalrate +'$rating' WHERE page = '$page'");
		if (!$updatecounter) 
		{
    		die ("Can't update the rater : " . mysql_error());
		}
		// vote accepted. thank you
		return (3);
	
	} 


mysql_close($link);

} 

?>
