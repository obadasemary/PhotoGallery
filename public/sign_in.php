<?php 
require_once("../includes/initialize.php");

if(isset($_SESSION['user_id']))
{
	header("Location: index.php");
}
if (isset ($_GET['do'])){
$do = $_GET['do'];

if($do == 'logout')
{
	session_destroy();
	header("Location: index.php");
}
}

if($_POST)
{
	if(!empty($_POST['user_name']) && !empty($_POST['user_pass']))
	{
	   $nametest=$_POST['user_name'];
       $namehtml=htmlspecialchars($nametest);
       $namephp=strip_tags($namehtml);
       //$name4=mysql_real_escape_string($namephp,$connection);       
		$query = "SELECT * FROM user WHERE nick_name = '{$_POST['user_name']}' AND user_pass = PASSWORD('{$_POST['user_pass']}')";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		if($row['user_id'])
		{
		  
         
			// Logged in Successfully
			$message = 'Welcome '. $row['nick_name'];
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['nick_name'] = $row['nick_name'];
			$_SESSION['full_name'] = $row['first_name'].' '.$row['last_name'];
            
            
            
             
            if ($row['admin'] == '1'){
                
                $_SESSION['admin'] = true;
            }else {
               
                $_SESSION['user'] = true;
            }
            
           
			//header('Location: home_page_after_loging.php');
            log_action('Login', "{$_SESSION['nick_name']} logged in.");
          
            
            //$session->login($row);
    
    
    header('Location:index.php');  
    
            
		}
		else
		{
			$message = 'Wrong Password or Nick Name';
		}
	}
	else
		$message = 'Fill all fields';
}
?>
 <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign In</title>
<link type="text/css" rel="stylesheet" href="css/signin.css" />
</head>

<body>
    <div id="signin_container">
    <!--<h1>Sign in form</h1>-->
    <div id="form_signin">
        <form name="signin_form" action="sign_in.php" method="post">
        	<?php echo ($message ? '<div class="error">'. $message .'</div>' : '') ?>
            <input type="text" placeholder="Enter your user name" name="user_name" id="username_i" />
            <input type="password" id="password_i" name="user_pass" />
            <input type="image" id="sign_in_button" alt="sign up now" src="img/sign_in/sign_in_button.png" />
            
        </form>
</div></div>
</body>
</html>
