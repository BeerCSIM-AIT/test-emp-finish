<?php
  require_once("vendor/autoload.php");
  include("connect.inc.php");

  $sql = "SELECT * FROM employee";
  $qEmp = $conn->query($sql);

  $output_head = "
    <link rel='stylesheet' href='pdfstyle.css'>
    <table>
      <tr>
        <td class='colhead' width='5%'>empcode</td>
        <td class='colhead' width='10%'>pic</td>
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
      <td>$row->firstname</td><td>$row->lastname</td>
      </tr>
    ";
  }
  $mpdf = new \Mpdf\Mpdf(['orientation'=> 'L']);
  $mpdf->WriteHTML($output_head);
  $mpdf->WriteHTML($output_body);
  $mpdf->WriteHTML($output_tail);
  $mpdf->output();
?>