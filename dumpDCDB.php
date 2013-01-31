<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php

?>
<html>
<head>
<title>View DCDB</title>
</head>
<body>

<?php

// mssql field names translator
$DCDBfield1="ServerID";
$DCDBfield2="DateofHWMOD";
$DCDBfield3="Initials";
$DCDBfield4="ChassisChange";
$DCDBfield5="ProcChange";
$DCDBfield6="RAMChange";
$DCDBfield7="HDD1Change";
$DCDBfield8="HDD2Change";
$DCDBfield9="RaidChange";
$DCDBfield10="FwallChange";

$SNDBfield1="ServerID";
$SNDBfield2="EnteredDate";
$SNDBfield3="Initials";
$SNDBfield4="ServerNotes";

$MPDBfield1 = "ServerID";
$MPDBfield2="ChassisType";
$MPDBfield3="Proc";
$MPDBfield4="RAM";
$MPDBfield5="HDD1";
$MPDBfield6="HDD2";
$MPDBfield7 = "RaidYesNo";
$MPDBfield8="FwallYesNo";
$MPDBfield9="LastHWMODDate";
$MPDBfield10="Initials";


$hostname="bitbytebit.kodingen.com";
$username="k12584_M1";
$password="4d57a498c5394";
$dbname="k12584_M1";

?>

<h3><center>Daily Change table</center></h3>
<hr>
<table border='1'>
<thead>
<tr><th>Server ID</th>
<th>Record Date</th>
<th>Initials</th>
<th>Processor change</th>
<th>RAM change</th>
<th>HDD1 change</th>
<th>HDD2 change</th>
<th>RAID change</th>
<th>Firewall change</th>
</tr></thead>
<tbody>
<?php
// open connection
       $connection = mysql_connect($hostname, $username, $password);
       mysql_select_db($dbname, $connection);
      $query = "SELECT * FROM DCDB ORDER BY RecordID";
       $result = mysql_query($query);
       if($result)
               {
                   while($row = mysql_fetch_array($result))
                            {
                             echo "<tr>";
                            echo "<td>".$row['ServerID']."</td>";
                            echo "<td>".$row['ENGDate']."</td>";
                            echo "<td>".$row['Initials']."</td>";
                            echo "<td>".$row['ProcChange']."</td>";
                            echo "<td>".$row['RAMChange']."</td>";
                            echo "<td>".$row['HDD1Change']."</td>";
                            echo "<td>".$row['HDD2Change']."</td>";
                            echo "<td>".$row['RaidChange']."</td>";
                            echo "<td>".$row['FwallChange']."</td>";
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