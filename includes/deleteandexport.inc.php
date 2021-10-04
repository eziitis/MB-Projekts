<?php
include 'class-autoloader.inc.php';

if (isset($_POST['export'])) {
  $selected = $_POST['checkbox'];
  $elem = new EmailsContr;

  $elem->exportEmails($selected);

} else if (isset($_POST['delete'])) {
  $selected = $_POST['checkbox'];
  $elem = new EmailsContr;

  $elem->deleteEmail($selected);
  header("Location: ../results.php?delete=done");
} 


