<?php
  if (!isset($_SESSION)) {
      session_start();
  }

  $host = "localhost";
  $user = "root";
  $pwd = "lycheeez1";
  $dbName = "kb";
  $conn = mysqli_connect($host, $user, $pwd, $dbName);

  // Check connection
  if (mysqli_connect_errno()) {
    echo "[Error00] Connection Failed : " . mysqli_connect_error();
  }

  $id = $_POST['id'];
  $id = addslashes($id);
  $pw = $_POST['pw'];
  $pw = addslashes($pw);

  $sql = "SELECT * FROM mentee WHERE UID='$id' and UPW='$pw'";
  $sql2 = "SELECT UPOINT FROM mentee WHERE UID='$id'";
  $res = $conn -> query($sql);
  $res2 =  $conn -> query($sql2);

  if($res -> num_rows == 1) {
    $row = $res -> fetch_array(MYSQLI_ASSOC);
    $pointArr = $res2 -> fetch_array(MYSQLI_ASSOC);

    if($row['UPW'] == $pw) {
      $_SESSION['UID'] = $id;
      $_SESSION['UPOINT'] = $pointArr['UPOINT'];

      if(isset($_SESSION['UID'])) {
        header('Location: ./main.php');
      } else {
        echo "<script> alert('[Error02] Login denied.');location.href='./index.html'; </script>";
      }
      exit();
    }
  }
  else {
    echo "<script> alert('아이디 또는 비밀번호가 잘못 입력되었습니다.');location.href='./index.html'; </script>";
  }

?>
