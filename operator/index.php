<?php
include '../database_details.php';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_data);
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
