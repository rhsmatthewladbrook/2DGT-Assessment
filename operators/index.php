<!DOCTYPE html>
<html>
  <head>
    <title>Operators</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script>
    function script() {
      document.getElementById("OpType").submit();
    }
    </script>
  </head>
  <body>
    <h1>Operators</h1>
    <form id='OpType'>
      <select name="type" onchange="submit()">
        <option value='0' <?php if (!isset($_GET['type']) or $_GET['type'] == 0) {echo "selected";} ?>>All Operators</option>
        <?php
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_data);

        $sql = "SELECT * FROM user_types";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
          if ($row['ID'] == $_GET['type']) {
            $select = " selected";
          } else {
            $select = "";
          }

          echo "<option value='" . $row['ID'] . "'" . $select . ">" . $row['Name'] . "</option>";
        }

        mysqli_close($conn);
        ?>
      </select>
    </form>
    <table>
      <thead>
        <tr>
          <td>ID</td>
          <td>Nick</td>
          <td>Type</td>
          <td>Oceania</td>
          <td>Name</td>
        </tr>
      </thead>
      <?php
      $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_data);

      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT o.ID, o.Nick, t.Name AS Type, r.Name AS Region, o.F_Name, o.L_Name FROM operators o JOIN regions r ON o.Region = r.ID JOIN user_types t ON t.ID = o.Type";
      if (isset($_GET['type']) and $_GET['type'] != 0) {
         $sql .= " WHERE t.ID = '" . $_GET['type'] . "'";
       }
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
            <td>" . $row['ID'] . "</td>
            <td><a href='../operator?id=" . $row['ID'] . "'>" . $row['Nick'] . "</a></td>
            <td>" . $row['Type'] . "</td>
            <td>" . $row['Region'] . "</td>
            <td>" . $row['F_Name'] . " " . $row['L_Name'] . "</td>
          </tr>";
        }
        echo "</tbody>";
      } else {
        echo "<tbody>
        <tr>
        <td colspan='5' style='text-align: center;'>
        <h1>Uh Oh</h1>
        <p>We looked really hard but couldn't find any data. Luckily for you, Puff the Magic Dragon has been sent out to search for the data, to help him search click on this <a href='mailto:matthewladbrook@riccarton.school.nz?Subject=Level%20Two%20Digital%20Exam%20No%20Data%20Found%20Operators%20Table' target='_blank'>link</a></p>
        </td>
        </tr>
        </tbody>";
      }
      ?>
    </table>
  </body>
</html>
