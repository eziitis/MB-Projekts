<?php

include 'class-autoloader.inc.php';

if (!isset($_POST['submit'])) {
  
  //coulnt't figure out, why after succesfull data validation didn't trigger else instead showing that !isset($_POST['submit']) as true, adjusted to that for now
  $terms  = 1;
  $emailinput = $_POST['email'];
  $newEmail = new EmailsContr ();
  $newEmail->addEmail($emailinput, $terms);
  header("Location: ../submit.php?sub_added=true"); 

} else {  

  $emailinput = $_POST['email'];
  $terms = 0;
  
  if (empty($emailinput)) {
    header("Location: index.php?news=empty");
    exit();
  } else if (!filter_var($emailinput, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?news=invalidemail&email=$emailinput");
    exit();
  } else if (preg_match("/^[^ ]+\.co$/", $emailinput)) {
    header("Location: index.php?news=Colombianemail");
  } else if (!isset($_POST['terms'])) {
    header("Location: index.php?news=notchecked");
  } else {
    $terms = 1;
    header("Location: ../submit.php?news=ALLGOOD&terms=1");
  } 

}

