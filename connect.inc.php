<?php
  $host = "it-nvc.cf1jmac6bmlg.ap-southeast-1.rds.amazonaws.com";
  $user = "hr001";
  $password = "hr001";
  $dbname = "hr";

  $conn = new mysqli($host, $user, $password, $dbname);

  if(!$conn){
    echo "Error during connecting";
  }
?>