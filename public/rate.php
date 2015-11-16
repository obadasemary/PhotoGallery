<?php


include('func_get.php');

$pagerating = getrating("$page");
$width = $pagerating *20;


?>


<script>		

function rateshow(data)
{

if (data==1)
{
	$('#ratings').hide('fast');
	$('#cannotrate').show('fast');
}
if (data==2)
{
	$('#ratings').hide('fast');
	$('#alreadyrate').show('fast');
}

if (data==3)
{
		
	$('#ratings').hide('fast');
	$('#thxyou').show('fast');
}



}



function dorate($rating)
{


$.get("func_add.php?page=<?php echo $page;?>" + "&rating=" + $rating, function(data){

rateshow(data);

});

}







</script>





<p id="thxyou" style='display:none'>
Thank you.
</p>

<p id="cannotrate" style='display:none'>
You cannot rate this page.
</p>

<p id="alreadyrate" style='display:none'>
You already rated this page.
</p>

<div id="ratings" >
	page rating :
	
	<ul class="star-rating small-star">
	<li class="current-rating" style="width:<?php echo $width; ?>%;"> </li>
	<li><a href="#" onclick="dorate(1)" title="vote 1 star" class="one-star">1</a></li>
	<li><a href="#" onclick="dorate(2)" title="vote 2 stars" class="two-stars">2</a></li>
	<li><a href="#" onclick="dorate(3)" title="vote 3 stars" class="three-stars">3</a></li>
	<li><a href="#" onclick="dorate(4)" title="vote 4 stars" class="four-stars">4</a></li>
	<li><a href="#" onclick="dorate(5)" title="vote 5 stars" class="five-stars">5</a></li>
	</ul>

</div>












