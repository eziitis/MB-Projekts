<?php

if(isset($_POST['button'])) {
 $new = $_POST['button'];
 header("Location: ../results.php?filter=".$new);
} else if (isset($_POST['filter3'])) {
  echo 'filter3 works'.'<br>';
  $filter2 = $_POST['search'];
  header("Location: ../results.php?filter=". $filter2);
}
