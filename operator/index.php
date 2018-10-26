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
          <?php
          $bans_query = "SELECT b.ID, b.Nick, c.Name AS Channel, b.Expires, b.Reason FROM bans b LEFT JOIN channels c ON c.ID = b.Channel LEFT JOIN operators o ON o.ID = b.Operator WHERE b.Expires >= CURRENT_TIMESTAMP AND b.Operator = " . $_GET['id'] . " ORDER BY b.Expires";
          $bans_result = mysqli_query($conn, $bans_query);

          if (mysqli_num_rows($bans_result) > 0) {
            while ($row = mysqli_fetch_assoc($bans_result)) {
              echo "<tr>
              <td>" . $row['ID'] . "</td>
              <td>" . $row['Nick'] . "</td>
              <td>" . $row['Channel'] . "</td>
              <td>" . date("jS F Y g:ia", strtotime($row['Expires'])) . "</td>
              <td>" . $row['Reason'] . "</td>
              </tr>";
            }
          } else {
            echo "<h1>Insert Facepalm Here</h1>
            <p>We aren't sure if there's been a mistake or if this operator is just really, really nice. If you think they have set some bans then tell us by clicking on this link</p>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
