<?php 
include 'config.php';

//if he already signed in 
if(isset($_SESSION['user_id']))
{
    header("Location: index.php");
}

if($_POST)
{
    if(!empty($_POST['nick_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['r_password']))
    {
        if($_POST['password'] == $_POST['r_password'])
        {
            $query = mysql_query("SELECT user_id FROM user WHERE email = '{$_POST['email']}'");
            $row = mysql_fetch_array($query);
            if(!$row['user_id'])
            {
                $query = mysql_query("insert into user (nick_name,email,user_pass) values
                        ('{$_POST['nick_name']}','{$_POST['email']}', PASSWORD('{$_POST['password']}'))");
                if(mysql_affected_rows() == 1)
                {
                    echo "You have successfully joined , please <a href='sign_in.php'>Sign In</a> now";
                }
                else
                    echo "Error Happend";
            }
            else
                echo "This Email is already belongs to another account. <a href='forget_password.php'>Forgot your password?</a>";
        }
        else
            echo "Passwords didn't match";
    }
    else echo "Make sure that u filled all the fields";
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign up now</title>
<link type="text/css" rel="stylesheet" href="css/signup.css" />
</head>

<body>
    <div id="signup_container">
<!--<h1>Sign Up form</h1>-->    
<div id="form_signup">
    <form name="signup_form" action="sign_up.php" method="post">
        <input type="text" placeholder="Enter your user name" id="username_i" name="nick_name" />
        <input type="email" placeholder="Enter your email" id="email_i" name="email" />
        <input type="password" id="password_i" name="password" />
        <input type="password" id="r_password_i" name="r_password" />
        <input type="image" id="sign_up_button" alt="sign up now" src="img/sign_up/sign_up.png" />
    </form>
    </div>
    </div>
</body>
</html>
