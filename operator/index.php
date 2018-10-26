<?php
include '../database_details.php';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_data);

$op_info_query = "SELECT o.ID, o.Nick, t.Name AS Type, r.Name AS Region, o.F_Name, o.L_Name FROM operators o JOIN regions r ON o.Region = r.ID JOIN user_types t ON t.ID = o.Type WHERE o.ID = '" . $_GET['id'] . "'";
$op_info_result = mysqli_query($conn, $op_info_query);

$op_info = mysqli_fetch_assoc($op_info_result);
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <h1>Java</h1>
    <p>ID: 1</p>
    <p>Operator Type: IRCOp</p>
    <p>Region: Oceania</p>
    <p>Name: Matthew Ladbrook</p>
    <div>
      <h2>Bans</h2>
      <table>
        <thead>
          <tr>
            <td>ID</td>
            <td>Nick</td>
            <td>Channel</td>
            <td>Expires</td>
            <td>Reason</td>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Moe_Lester</td>
            <td>English</td>
            <td>23rd November 2018 3:42pm</td>
            <td>ScoutLink is not a dating sevice.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>
