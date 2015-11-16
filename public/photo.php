<?php require_once("../includes/initialize.php"); ?>
<?php
 if(empty($_GET['id'])){
    $session->message("No photograph ID was provided.");
    redirect_to('index.php');
 }
 $photo = Photograph::find_by_id($_GET['id']);
 if(!$photo){
    $session->message("The photo cloud not be located.");
    redirect_to('index.php');
 }
 
 if(isset($_POST['submit'])){
    $author = trim($_SESSION['nick_name']);
    $body = trim($_POST['body']);
    $new_comment = Comment::make($photo->photo_id,$author,$body);
    $new_notification = Notification::make($photo->photo_id,$_SESSION['user_id'],$photo->user_id,'C');
    if($new_comment && $new_comment->save()){
        $new_notification->save();
        redirect_to("photo.php?id={$photo->photo_id}");
    } else {
        $message = "There was an error that prevented the comment from being saved.";
    }
 } else {
    $author = "";
    $body = "";
 }
 
 $comments = $photo->comments();
 $user=USER::find_by_id($_SESSION['user_id']);
 include('layouts/header.php');

?>

<div id="contianer">

<div class="indivual_image" >
      <div class="right_arrow_IM clear_fix"> <img class="slider_image_IM" src="img/new-header/bigarrow.png" alt="slide to the next image"> </div>
      <div class="the_image_bor_IM">
        <div class="big_photo_IM"> <a href="#"><img src="<?php echo $photo->image_path(); ?>"></a> </div>
        <div class="big_photo_IM hight_change_IM">
          <div class="the_above_share_IM hover_IM">
            <ul>
              <li><img src="img/new-header/1400033428_facebook.png" alt="share with facebook"></li>
              <li><img src="img/new-header/1400033443_twitter.png" alt="share with twitter"></li>
              <li><img src="img/new-header/1400033454_google-plus.png" alt="share with Google plus"></li>
            </ul>
          </div>
          <div class="uploader_name"> <a href="#"><?php echo $user->nick_name; ?></a> </div>
          <div class="the_above_share_IM notif_comment">
            <ul class="compli">
              <li><img class="w_h_IM" src="img/new-header/eye-icon.png" alt="share with facebook"></li>
              <li><a class="a_count" href="#">24</a></li>
              <li><img class="w_h_IM" src="img/new-header/xcomment.png" alt="share with twitter"></li>
              <li><a class="a_count" href="#">0</a></li>
              <li><img class="w_h_IM" src="img/new-header/rebort.png" alt="share with Google plus"></li>
              <li><a class="a_count" href="#">500</a></li>
              <li class="heart_pulse"><img class="w_h_IM" src="img/new-header/heart.png" alt="share with Google plus"></li>
              <li><a class="a_count" href="#">0</a></li>
            </ul>
            <div class="rate_Rectangle">
              <ul>
                <li><img src="img/new-header/star.png"></li>
                <li><img src="img/new-header/star.png"></li>
                <li><img src="img/new-header/star.png"></li>
                <li><img src="img/new-header/star.png"></li>
                <li><img src="img/new-header/star.png"></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="right_arrow_IM no_margin"> <img class="slider_image_IM margin_righ_IM" src="img/new-header/bigarrow-l.png" alt="slide to the next image"> </div>
    </div>
    <!--End Individual Image--> 

<?php //require_once("index_rate.php"); ?>
    <div class="add_title_IM">
      <ul>
        <li><a class="change_color_1" href="#">Click to add description</a></li>
        <li><a class="change_color" href="#">Click to add title</a></li>
      </ul>
    </div>


  <form action="photo.php?id=<?php echo $photo->photo_id; ?>" method="post">
     <?php echo output_message($message); ?>
     <input type="hidden" name="author" disabled  value="<?php echo $_SESSION['nick_name']; ?>"/>
      <div class="add_title_IM"> <a class="a_commet" href="profile.php?user_id=<?php echo $user->user_id; ?>"><img src="<?php echo $user->user_picture;?>"></a>
        <textarea name="body" id="class_1" class="comment_Rectangle"></textarea>
      </div>
      <input type="submit"  name="submit" value="submit" class="comment_btn" onclick="function_1()">
    </form>
    <div class="headerofcomment">
      <h1>Comments</h1>
    </div>
    <div class="line_down_comment"></div>
    <div class="comment_filed">
        <?php foreach($comments as $comment): 
$commenter=User::find_by_id($comment->user_id);
        ?>
      <div class="add_title_IM"> <a class="a_commet a_commet_2 no_float" href="#"><img src="<?php echo $commenter->user_picture;?>"></a>
        <a class="user_name_im" href="profile.php?user_id=<?php echo $comment->user_id; ?>"><?php echo htmlentities($comment->author); ?></a>
        <p class="the_user_comment"><?php echo strip_tags($comment->comment, '<strong><em><p>'); ?></p>
        
    </div>
        <?php endforeach; ?>
    <?php if(empty($comments)) { echo "No Comments."; } ?> 
</div>
</div>

<?php include_layout_template('footer.php'); ?>

