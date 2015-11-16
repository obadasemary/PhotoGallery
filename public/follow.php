<?php require_once("../includes/initialize.php"); ?>
<?php $user = user :: find_by_id($_SESSION['user_id']); ?>

<?php
$action = $_GET['action'];

if(intval($_GET['following_id']) > 0)
{
    $q = $database->query("SELECT user_id FROM user WHERE user_id = ". intval($_GET['following_id']));
    $exist_r = $database->fetch_array($q);
    if($exist_r['user_id'])
    {
        // Exist user_id 
        if($action == 'follow')
            $database->query("REPLACE INTO follow VALUES ({$_SESSION['user_id']},  {$exist_r['user_id']})");
        else
            $database->query("DELETE FROM follow WHERE follower_id = {$_SESSION['user_id']} AND following_id = {$exist_r['user_id']}");
        
        header('Location: profile.php?user_id='. $exist_r['user_id']);
    }
}

?>

