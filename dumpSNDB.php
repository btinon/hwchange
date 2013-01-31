<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>View SNDB</title>
</head>
<body>
<!-- mar 31 need to ADD SERVER ID SELECTION and only show those records -->
<?php

// mssql field names translator

$SNDBfield1="ServerID";
$SNDBfield2="EnteredDate";
$SNDBfield3="Initials";
$SNDBfield4="ServerNotes";
$hostname="bitbytebit.kodingen.com";
$username="k12584_M1";
$password="4d57a498c5394";
$dbname="k12584_M1";
?>

<h3><center>Server Notes table</center></h3>
<hr>
<table border='1'>
<thead>
<tr><th>Server ID</th>
<th>Record Date</th>
<th>Initials</th>
<th>Server Notes</th>
</tr></thead>
<tbody>
<?php
// open connection
       $connection = mysql_connect($hostname, $username, $password);
       mysql_select_db($dbname, $connection);
      $query = "SELECT * FROM SNDB ORDER BY RecordID";
       $result = mysql_query($query);
       if($result)
               {
                   while($row = mysql_fetch_array($result))
                            {
                             echo "<tr>";
                            echo "<td>".$row['ServerID']."</td>";
                            echo "<td>".$row['ENGDate']."</td>";
                            echo "<td>".$row['Initials']."</td>";
                            echo "<td>".$row['ServerNotes']."</td>";
                            echo "</tr>";
                          }
}
?>

</tbody>
</table>
<hr>
<a href="reports.html">Reports</a><br>
<a href="hwchange.html">Back to HW MOD form</a>
</body>
</html>