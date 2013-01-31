<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>View MASTERINV latest record</title>
</head>
<body>
<!-- mar 31 need to add date selection and only show those dates -->
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


<h3><center>Master Inventory table</center></h3>
<hr>
<table border='1'>
<thead>
<tr>
<th>Last Updated</th>
<th>Cel-775</th>
<th>P4-775</th>
<th>P4-6600</th>
<th>C2D-6400</th>
<th>C2D-6600</th>
<th>C2D-6700</th>
<th>C2D-7500</th>
<th>C2Q-9300</th>
<th>C2Q-9400</th>
<th>C2Q-9550</th>
<th>DDR2-1GB</th>
<th>DDR2-2GB</th>
<th>DDR2-4GB</th>
<th>DDR3-2GB</th>
<th>DDR3-4GB</th>
<th>DDR1-1GB</th>
<th>HDD-120GB</th>
<th>HDD-160GB</th>
<th>HDD-300GB</th>
<th>HDD-1TB</th>
<th>SSD-64GB</th>
<th>FWALL-501</th>
<th>FWALL-5505</th>
<th>RAID-1520</th>
<th>RAID-1720</th>
</tr></thead>
<tbody>
<?php
// open connection

$connect = mysql_connect($hostname, $username, $password);
  if (!$connect) {
    die('Could not connect: '.mysql_error());
  }
       mysql_select_db($dbname, $connect);
  $query ="SELECT * FROM MASTERINV ORDER BY RecordID DESC LIMIT 1";
  //$query = "SELECT * FROM MASTERINV ORDER BY RecordID";
       $result = mysql_query($query);
       if($result)
               {
                   while($row = mysql_fetch_array($result))
                            {
                            echo "<tr>";
                            echo "<td>".$row['ENGDate']."</td>";
                            echo "<td>".$row['Cel775']."</td>";
                            echo "<td>".$row['P4775']."</td>";
                            echo "<td>".$row['P46600']."</td>";
                            echo "<td>".$row['C2D6400']."</td>";
                            echo "<td>".$row['C2D6600']."</td>";
                            echo "<td>".$row['C2D6700']."</td>";
                            echo "<td>".$row['C2D7500']."</td>";
                            echo "<td>".$row['C2Q9300']."</td>";
                            echo "<td>".$row['C2Q9400']."</td>";
                            echo "<td>".$row['C2Q9550']."</td>";
                            echo "<td>".$row['DDR21GB']."</td>";
                            echo "<td>".$row['DDR22GB']."</td>";
                            echo "<td>".$row['DDR24GB']."</td>";
                            echo "<td>".$row['DDR32GB']."</td>";
                            echo "<td>".$row['DDR34GB']."</td>";
                            echo "<td>".$row['DDR11GB']."</td>";
                            echo "<td>".$row['HDD120GB']."</td>";
                            echo "<td>".$row['HDD160GB']."</td>";
                            echo "<td>".$row['HDD300GB']."</td>";
                            echo "<td>".$row['HDD1TB']."</td>";
                            echo "<td>".$row['SSD64GB']."</td>";
                            echo "<td>".$row['Fwall501']."</td>";
                            echo "<td>".$row['Fwall5505']."</td>";
                            echo "<td>".$row['RAID1520']."</td>";
                            echo "<td>".$row['RAID1720']."</td>";
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