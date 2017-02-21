<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="author">
  <link href="" rel="shortcut icon">
 
  <title>Pagination</title><!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.css" rel="stylesheet">
</head>
 
<body>
  <div class="container">
    <div class="well">
      <h2>YourInstrument Navigation</h2>
    </div>
 
    <div class="well">
      <table class="table table-condensed">
      <!--we create here table heading-->
        <thead>
          <tr>
            <th>Identificacion</th>
            <th>Titulo</th>
            <th>Banda</th>
            <th>Descripcion</th>
            <th>Id User</th>
          </tr>
        </thead>
 
        <tbody>
          <?php
          //set up mysql connection
          $dbhost    = 'localhost';
          $dbuser    = 'root';
          $dbpass    = 'Yy123456';
          //number of results to show per page
          $rec_limit = 6;
 
          $conn = mysql_connect($dbhost, $dbuser, $dbpass);
          if (!$conn) {
            die('Could not connect: ' . mysql_error());
          }
          //select database
          mysql_select_db('yourinstrument');
          /* Get total number of records */
          $sql    = "SELECT count(can_id) FROM tbl_cancion ";
          $retval = mysql_query($sql, $conn);
          if (!$retval) {
            die('Could not get data: ' . mysql_error());
          }
 
          $row       = mysql_fetch_array($retval, MYSQL_NUM);
          $rec_count = $row[0];
 
          if (isset($_GET{'page'})) { //get the current page
            $page   = $_GET{'page'} ;
            $offset = $rec_limit * $page;
          } else {
          // show first set of results
            $page   = 0;
            $offset = 0;
          }
          $left_rec = $rec_count - ($page * $rec_limit);
          //we set the specific query to display in the table
          $sql = "SELECT CAN_ID, CAN_TITULO, CAN_ARTISTA, CAN_DESCRIPCION, CAN_USU_ID " . "FROM tbl_cancion " . "LIMIT $offset, $rec_limit";
 
          $retval = mysql_query($sql, $conn);
          if (!$retval) {
            die('Could not get data: ' . mysql_error());
          }
          //we loop through each records
          while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
 
            //populate and display results data in each row
            echo '<tr>';
            echo '<td>' . $row['CAN_ID'] . '</td>';
            echo '<td>' . $row['CAN_TITULO'] . '</td>';
            echo '<td>' . $row['CAN_ARTISTA'] . '</td>';
            echo '<td>' . $row['CAN_DESCRIPCION'] . '</td>';
            echo '<td>' . $row['CAN_USU_ID'] . '</td>';
          }
 
          echo '</tr>';
          echo '</tbody>';
          echo '</table>';
          //we display here the pagination
          echo '<ul class="pager">';
          if ($left_rec == $rec_limit) 
          {
            $last = $page - 1;
            echo @"<li><a href=\"$_PHP_SELF?page=$last\">Anterior</a></li>";
          } 
          else if ($page == 0) 
          {
            $page = $page + 1;

            echo @"<li><a href=\"$_PHP_SELF?page=$page\">Siguiente</a></li>";
          } 
          else if ($page > 0) 
          {
            $last = $page - 1;
            $page= $page + 1;
            echo @"<li><a href=\"$_PHP_SELF?page=$last\">Anterior</a></li> ";
            echo @"<li><a href=\"$_PHP_SELF?page=$page\">Siguiente</a></li>";
          }
          echo '</ul>';
          mysql_close($conn);
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>