<?php

include ('config_rate.php');



//### bring rating from database ###

function getrating($page)

{ 



	global $ratestotal ,$ratesnr ,$page,$localhost, $dbuser, $dbpass, $dbname, $dbtablerates,$dbtableip; 


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
	




	if(mysql_num_rows($result = mysql_query("SELECT * FROM $dbtablerates WHERE page = '$page'")))
	{
	
	$row = mysql_fetch_array( $result ) ;
	
	//This page exsists. ratings are:

	$ratesnr = $row['ratings'] ;
	$ratestotal = $row['totalrate'] ;
	
	if ($row['ratings'] ==0) 
		{
			// no ratings exsist yet. 			
			return (0) ; 
		}
		else
		{
			// some ratings exsists, get the average  rating now.
			$number   = $row['totalrate'] / $row['ratings'] ; 	// Replace with the number you wish to round
			$rounding = 0.5;   				   	// Replace this with whatever you want to round to

			$rounded     = round($number/$rounding)*$rounding; 	
		}

	return ($rounded);
	

	}	

	else
	{
	// the page does not exsist in the database (yet).Create it first

	return (0) ;


	}
	
mysql_close($link);

} 

?>
