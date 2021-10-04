<?php

include 'includes/class-autoloader.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/main.css">
  <title>Project</title>
  <script defer src="./scripts/script.js"></script>
</head>
<body>
  <div class="main">
    <div class="main_content">
      <div class="top_bar">
        <img src="./img/icons/Union.png" alt="logo of a mini pineapple">
        <div class="logo_text">pineapple</div>
        <a href="#" class="top_bar_a top_link first_link" >About</a>
        <a href="#" class="top_bar_a middle top_link">How it works</a>
        <a href="#" class="top_bar_a top_link">Contact</a>
      </div>
      <div class="main_b">
        <img class="hidden_background_image" src="./img/images/image_summer.png" alt="">
        <div class="main_mobile">
          <div class="main_head">
            <h1>Subscribe to newsletter</h1>
          </div>
          <div class="main_text">
            <p>Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>
          </div>
          <form id="form" action="includes/validation.inc.php" method="POST">
            <div class="email_entry">
              <?php
                if (isset($_POST['email'])) {
                  $emailinput = $_POST['email'];
                  echo '<input class="email_box" type="text" id="email" name="email" placeholder="Type your email address here..." value="'.$emailinput.'">';
                } else {
                  echo '<input class="email_box" type="text" id="email" name="email" placeholder="Type your email address here...">';
                }  
              ?>
              <button class="email_arrow" name="submit"><img src="./img/arrow/ic_arrow.svg" alt=""> </button>
            </div>
            <div class="check_terms">
              <input class="checkbox1" type="checkbox" name="terms" id="terms">
              <label class = "just_terms" for="terms">I agree to <a class="a_terms" href="#">terms of service</a></label>
            </div>  
          </form>

          <div class="error_message" id="error" class="main_email">
            <?php
              if (isset($_POST['news'])) {
                $error = $_POST['news'];
                $errorM = new ErrorCheck ($error);
                $error_result = $errorM->determineError();
                echo '<p class="error">'.$error_result.'</p>';
              }
            ?>
          </div>
  
          <hr class="main_line">
          <div class="icons">
            <a class="mini_icon first_three first_icon facebook_icon" href="#">
              <img class="type1" src="./img/icons/ic_facebook.svg" alt="logo of facebook in a circle">
              <img class="type1" src="./img/icons/hover/ic_facebook (1).svg" alt="logo of facebook in a circle">
            </a>
            <a class="mini_icon first_three instagram_icon" href="#">
              <img class="type1" src="./img/icons/ic instagram.svg" alt="logo of instagram in a circle">
              <img class="type1 instagram_icon" src="./img/icons/hover/ic instagram (1).svg" alt="">
            </a>
            <a class="mini_icon first_three twitter_icon" href="#">
              <img class="type2" src="./img/icons/ic_twitter.svg" alt="logo of ic_twitter in a circle">
              <img class="type2" src="./img/icons/hover/ic_twitter (1).svg" alt="">
            </a>
            <a class="mini_icon youtube_icon" href="#">
              <img class="type2" src="./img/icons/ic youtube.svg" alt="logo of youtube in a circle">
              <img class="type2" src="./img/icons/hover/ic youtube (2).svg" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="main_pineapple">
      <img src="./img/images/image_summer.png" alt="2 pineapples with glasses and headphones">
    </div>  
  </div>  
</body>
</html>