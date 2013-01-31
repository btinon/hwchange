<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>View Database</title>
</head>
<body bgcolor="#lightgrey">
<form id="daterange" method="POST">
  <table>
    <th>Run Rates</th>
    <tr>
      <td><input type="radio" name="runratelength" value="1296000">15 days</td>
    </tr>
    <tr>
      <td><input type="radio" name="runratelength" value="2592000">30 days</td>
    </tr>
    <tr>
      <td><input type="radio" name="runratelength" value="3888000">45 days</td>
    </tr>
    <tr>
      <td><input type="radio" name="runratelength" value="5184000">60 days</td>
    </tr>
    <tr>
      <td><input type="radio" name="runratelength" value="manual">custom</td>
      <td>From date (mm/dd/yy): <input type="text" name="fromdate" size="8" maxlength="8"></td>
      <td>To date (mm/dd/yy): <input type="text" name="todate" size="8" maxlength="8"></td>
    </tr>
  </table>
<input type="submit" value="Submit">
</form>
<?php
// mssql field names translator
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$hostname="bitbytebit.kodingen.com";
$username="k12584_M1";
$password="4d57a498c5394";
$dbname="k12584_M1";
$runratelength=$_POST['runratelength'];
$today=date("m/d/y");
$todayunix=strtotime($today);
  if ($runratelength<>"manual") {
    $rrfrom=$todayunix-$runratelength;
    $numdays=$todayunix-$rrfrom;
    echo "From: ".$rrfrom." and really ".date('m/d/y', $rrfrom)."<br>";
    echo "To: ".$todayunix." and really ".date ('m/d/y', $todayunix)."<br>";
    echo "num of days: ".($numdays/86400);
    // date('Y-m-d H:i:s', $timestamp);
  }
  else {
    echo "From: ".$fromdate."<br>";
    echo "To: ".$todate."<br>";
    $adjustfromdate=strtotime($fromdate);
    $adjusttodate=strtotime($todate);
    $numdays=$adjusttodate-$adjustfromdate;
  echo "number of days to calc is: ".($numdays/86400)."<br>";
  }
?>


<table border='1'>
<thead>
<tr>
<!-- <th>Record ID</th>
<th>Last Updated</th>
<th>Initials</th> -->
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
  /*      $connection = mysql_connect($hostname, $username, $password);
       mysql_select_db($dbname, $connection);
      $result = mysql_query ("SELECT DATE,$component FROM MASTERINV WHERE (DATE > '$fromdate' AND DATE < '$todate')");
      if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if($result)
               {
                   while($row = mysql_fetch_array($result))
                            {
                                                        
                            echo "<tr>";
                            echo "<td>".$row[0]."</td>";
                            echo "<td>".$row[1]."</td>";
                            
                            echo "</tr>";
                          }
}
  */
  echo "this is the fromdate with presets ".$fromdate."<br>";
  $connect = mysql_connect($hostname, $username, $password);
  if (!$connect) {
    die('Could not connect: '.mysql_error());
  }
  mysql_select_db($dbname, $connect);
  $pastinvquery="SELECT * FROM LOOPBREAK WHERE DateUpdated = '$fromdate'";
  $curinvquery ="SELECT * FROM LOOPBREAK ORDER BY DateUpdated DESC LIMIT 1";
  
  $pastinvresult = mysql_query($pastinvquery);
       if($pastinvresult)
               {
                   while($row = mysql_fetch_array($pastinvresult))
                            {
                            $pastdateupdated=$row['DateUpdated'];
                            $pasttestdata1=$row['TestData1'];
                            $pasttestdata2=$row['TestData2'];
                            }
}
  echo "<hr><br>FROM VALUES<br>";
  echo $pastdateupdated;
  echo $pasttestdata1;
  echo $pasttestdata2;
  
                              
                              
                              
       $curinvresult = mysql_query($curinvquery);
       if($curinvresult)
               {
                   while($row = mysql_fetch_array($curinvresult))
                            {              
                            $curdateupdated=$row['DateUpdated'];
                            $curtestdata1=$row['TestData1'];
                            $curtestdata2=$row['TestData2'];
                            }
}
  echo "CURRENT VALUES";
  echo $curdateupdated;
  echo $curtestdata1;
  echo $curtestdata2;
?>
</tbody>
</table>
<hr>
<a href="reports.html">Back to Reports</a><br>
<a href="hwchange.html">Back to HW MOD form</a>
</body>
</html>

