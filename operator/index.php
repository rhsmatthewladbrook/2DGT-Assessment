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
    <title>Operator - <?php echo $op_info['Nick'] ?></title>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <p style="float: right; font-size: 10px;"><a href="../">Return to home</a></p>
    <div class="head">
      <h1><?php echo $op_info['Nick']; ?></h1>
      <p>ID: <?php echo $op_info['ID']; ?></p>
      <p>Operator Type: <?php echo $op_info['Type']; ?></p>
      <p>Region: <?php echo $op_info['Region']; ?></p>
      <p>Name: <?php echo $op_info['F_Name'] . " " . $op_info['L_Name'] ?></p>
    </div>
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
