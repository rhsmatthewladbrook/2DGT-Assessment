<!DOCTYPE html>
<html>
  <head>
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
        <option value='0'>All Operators</option>
        <?php
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_data);

        $sql = "SELECT * FROM user_types";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='" . $row['ID'] . "'>" . $row['Name'] . "</option>";
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
      <tbody>
        <tr>
          <td>1</td>
          <td>Java</td>
          <td>IRCop</td>
          <td>Oceania</td>
          <td>Matthew Ladbrook</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Phoenix</td>
          <td>ChanOp</td>
          <td>North America</td>
          <td>Stuart Rogers</td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
