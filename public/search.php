<?php
require_once('../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>
<?php include_layout_template('admin_header.php'); ?>


<center>
<form method="Get" action="search.php">
    <input type="text" name="search" placeholder="please type any words .."/>
    <input type="submit" name="search_user" value="search database" /> 
</form>
<hr />
<u>Results : </u>&nbsp;
<?php

if (isset($_REQUEST['search_user'])){
    $search = $_GET['search'];
    $terms = explode(" ",$search);
    $query = "SELECT * FROM user WHERE ";
    $i =0;
    foreach($terms as $each){
        $i++;
        if ($i==1){
            $query .= "nick_name LIKE '%$each%' ";
        } else {
            $query .= "OR nick_name LIKE '%$each%' ";
        }
    }
    $query = mysql_query($query);
    $num = mysql_num_rows($query);
    if ($num > 0 && $search !=""){
        echo "$num result(s) found for <b>$search</b> !";
        while($row =mysql_fetch_assoc($query)){
            $id =$row['user_id'];
            $img =$row['user_picture'];
            $name = $row['nick_name'];            
            echo "<a href='profile.php?user_id=$id'>
            <br/><img width=200px; height=200px; src='$img' /><h3>$name</h3></a>";                       
        }
    }
    else {
        echo "No results found";
    }
    mysql_close();
}  /*else {
    echo "please type any words ..";
}*/
  
  
  
  
  
  
  
    
?>

<?php include_layout_template('admin_footer.php'); ?>