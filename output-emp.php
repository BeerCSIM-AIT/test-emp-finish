<?php
  require_once("vendor/autoload.php");
  include("connect.inc.php");
  $name = $_POST['name'];
  $sql = "SELECT * FROM employee WHERE firstname LIKE '%$name%'";
  // echo $sql;
  $qEmp = $conn->query($sql);

  $output_head = "
    <link rel='stylesheet' href='pdfstyle.css'>
    <h1 style='text-align:center'>Employee Report</h1>
    <hr>
    <table>
      <tr>
        <td class='colhead'>empcode</td>
        <td class='colhead'>pic</td>
        <td class='colhead'>firstname</td>
        <td class='colhead'>lastname</td>
      </tr>
  ";
  $output_tail="</table>";
  $output_body="";
  while($row=$qEmp->fetch_object()){
    $output_body .= "
      <tr>
        <td class='empcode'>$row->empcode</td>
        <td><img src='images/$row->id.png'></td>
        <td>$row->firstname</td>
        <td>$row->lastname</td>
      </tr>
    ";
  }
  $mpdf = new \Mpdf\Mpdf(['orientation'=> 'P']);
  $mpdf->WriteHTML($output_head);
  $mpdf->WriteHTML($output_body);
  $mpdf->WriteHTML($output_tail);
  $mpdf->output();
?>