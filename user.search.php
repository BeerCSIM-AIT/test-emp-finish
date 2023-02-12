<?php
  include("connect.inc.php");
  $empcode = $_POST['empcode'];

  $sql = "SELECT * FROM employee WHERE empcode = '$empcode'";
  $qEmp = $conn->query($sql);

  $emp = $qEmp->fetch_object();

  echo json_encode($emp);
?>