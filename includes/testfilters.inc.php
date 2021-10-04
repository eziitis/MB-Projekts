<?php

if(isset($_POST['button'])) {
  $new = $_POST['button'];
  header("Location: ../test.php?filter=".$new);

} else if (isset($_POST['filter3'])) {
   $filter3 = $_POST['search'];
   $adder = $_POST['filter3'];
   $filter3 = '9'.$filter3.'9';
   header("Location: ../test.php?search=". $filter3.$adder);

} else if (isset($_POST['filter1'])) {
  $newsort1 = $_POST['filter1'];
  if (preg_match("/0[^ ]+0/",$_POST['filter1'])) {
    preg_match("/0[^ ]+0/",$_POST['filter1'], $result1);
    $cheker = $result1[0];

    if ($cheker == '0name0') {
      header("Location: ../test.php?sort=".$newsort1);
    } else if ($cheker == '0date0') {
      $newsort1 = str_replace('0date0','',$newsort1);
      header("Location: ../test.php?sort=".$newsort1."0name0");
    }
  } else {
    header("Location: ../test.php?sort=".$newsort1."0name0");
  }
} else if (isset($_POST['filter2'])) {
  $newsort2 = $_POST['filter2'];
  
  if (preg_match("/0[^ ]+0/",$_POST['filter2'])) {
    preg_match("/0[^ ]+0/",$_POST['filter2'], $result2);
    $cheker = $result2[0];
    if ($cheker == '0date0') {
      header("Location: ../test.php?sort=".$newsort2);
    } else if ($cheker == '0name0') {
      $newsort2 = str_replace('0name0','',$newsort2);
      header("Location: ../test.php?sort=".$newsort2."0date0");
    }
  } else {
    header("Location: ../test.php?sort=".$newsort2."0date0");
  }
} else if (isset($_POST['testbutton'])) {
  $newtest = $_POST['testbutton'];
  header("Location: ../test2.0.php?test=".$newtest);
  /*
  if (preg_match("/9[^ ]+9/",$_POST['testbutton'])) {
    $newtest = $_POST['testbutton'];
    $newtest = rtrim($newtest, "9");
    $newtest = ltrim($newtest, $newtest[0]);
    //$newtest = str_replace('9','',$newtest);
    header("Location: ../test2.0.php?test=".$newtest."&testresult=success");
  } else {
    $newtest = $_POST['testbutton'];
    header("Location: ../test2.0.php?test=".$newtest);
  }
  */
}else {
  header("Location: ../test.php?filter=date");
}
