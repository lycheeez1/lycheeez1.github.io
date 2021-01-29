<?php
  session_start();

  $userID = $_SESSION['UID'];
  $userPoint = $_SESSION['UPOINT'];

  if(isset($userID) && !empty($userID)) {
    echo "<center><H2>".$userID."님의 포인트는</H2></center><br>";
    echo "<center><H2>".$userPoint."점입니다.</H2></center><br>";
  } else {
    echo "<script> alert('Error03: Selection denied.');location.href='./index.html'; </script>";
  }
?>
