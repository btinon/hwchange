<html>
<head>
<title>Runrate report</title>
</head>
<body>
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
  if ($runratelength<>"manual") //preset runrates
  {
    $fromdateunix=$todayunix-$runratelength;
    $todateunix=$todayunix;
    $fromunix=$todayunix-$runratelength;
    $numdays=$todayunix-$fromunix;
    echo "From: ".date('m/d/y', $fromunix)."<br>";
    echo "To: ".date ('m/d/y', $todayunix);
    //echo "num of days: ".($numdays/86400);
  }
  else
  {
    $fromunix=strtotime($fromdate);
    $fromdateunix=strtotime($fromdate);
    $todateunix=strtotime($todate);
    //echo "<h1>".$fromdateunix."           ".$todateunix."</h1>";
    $numdays=$todateunix-$fromdateunix;
    echo "From: ".$fromdate."<br>";
    echo "To: ".$todate."<br>";
    echo "number of days to calc is: ".($numdays/86400)."<br>";
  }
?>

<hr><hr>
<table border='1'>
<thead>
<tr>
<th>Date</th>
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
$connect = mysql_connect($hostname, $username, $password);
  if (!$connect) {
    die('Could not connect: '.mysql_error());
  }
  mysql_select_db($dbname, $connect);
  /*  $bound = 86400;
$backBound = $fromdateunix - $bound;
$frontBound = $todateunix + $bound;
$pastinvquery = "SELECT * FROM TESTINV WHERE DateUpdated >= $backBound AND DateUpdated <= $frontBound";
  */
  $pastinvquery="SELECT * FROM MASTERINV WHERE DateUpdated = '$fromdateunix'";
  // $curinvquery = "SELECT * FROM TESTINV WHERE DateUpdated >= $backBound AND DateUpdated <= $frontBound";
 $curinvquery ="SELECT * FROM MASTERINV WHERE DateUpdated = '$todateunix'";
  $pastinvresult=mysql_query($pastinvquery);
  if (mysql_num_rows($pastinvresult)==0)
  {
    echo "DATE NOT FOUND PLEASE SELECT ANOTHER<br>";
    exit;
  }
  else
         if($pastinvresult)
               {
                 while($row = mysql_fetch_array($pastinvresult))
                   {
                            $pastrecordid=$row['RecordID'];
                            $pastdateupdated=$row['DateUpdated'];
                            $pastengdate=$row['ENGDate'];
                            $pastcel775=$row['Cel775'];
                            $pastp4775=$row['P4775'];
                            $pastp46600=$row['P46600'];
                            $pastc2d6400=$row['C2D6400'];
                            $pastc2d6600=$row['C2D6600'];
                            $pastc2d6700=$row['C2D6700'];
                            $pastc2d7500=$row['C2D7500'];
                            $pastc2q9300=$row['C2Q9300'];
                            $pastc2q9400=$row['C2Q9400'];
                            $pastc2q9550=$row['C2Q9550'];
                            $pastddr21gb=$row['DDR21GB'];
                            $pastddr22gb=$row['DDR21GB'];
                            $pastddr24gb=$row['DDR22GB'];
                            $pastddr32gb=$row['DDR24GB'];
                            $pastddr34gb=$row['DDR32GB'];
                            $pastddr11gb=$row['DDR34GB'];
                            $pasthdd120gb=$row['HDD120GB'];
                            $pasthdd160gb=$row['HDD160GB'];
                            $pasthdd300gb=$row['HDD300GB'];
                            $pasthdd1tb=$row['HDD1TB'];
                            $pastssd64gb=$row['SSD64GB'];
                            $pastfwall501=$row['Fwall501'];
                            $pastfwall5505=$row['Fwall5505'];
                            $pastraid1520=$row['RAID1520'];
                            $pastraid1720=$row['RAID1720'];
                            }
}
  
  //  or die("erro..error..error.... ".mysql_error()))
  $curinvresult = mysql_query($curinvquery) or die("erro..error..error.... ".mysql_error());
  //echo "<h1>".mysql_num_rows($curinvresult)."</h1>";
    if (mysql_num_rows($curinvresult)==0)
  {
    echo "DATE NOT FOUND PLEASE SELECT ANOTHER<br>";
    exit;
  }
  else
       if($curinvresult)
               {
                 while($row1 = mysql_fetch_array($curinvresult))
                 {
                            $currecordid=$row1['RecordID'];
                            $curdateupdated=$row1['DateUpdated'];
                            $curengdate=$row1['ENGDate'];
                            $curcel775=$row1['Cel775'];
                            $curp4775=$row1['P4775'];
                            $curp46600=$row1['P46600'];
                            $curc2d6400=$row1['C2D6400'];
                            $curc2d6600=$row1['C2D6600'];
                            $curc2d6700=$row1['C2D6700'];
                            $curc2d7500=$row1['C2D7500'];
                            $curc2q9300=$row1['C2Q9300'];
                            $curc2q9400=$row1['C2Q9400'];
                            $curc2q9550=$row1['C2Q9550'];
                            $curddr21gb=$row1['DDR21GB'];
                            $curddr22gb=$row1['DDR21GB'];
                            $curddr24gb=$row1['DDR22GB'];
                            $curddr32gb=$row1['DDR24GB'];
                            $curddr34gb=$row1['DDR32GB'];
                            $curddr11gb=$row1['DDR34GB'];
                            $curhdd120gb=$row1['HDD120GB'];
                            $curhdd160gb=$row1['HDD160GB'];
                            $curhdd300gb=$row1['HDD300GB'];
                            $curhdd1tb=$row1['HDD1TB'];
                            $curssd64gb=$row1['SSD64GB'];
                            $curfwall501=$row1['Fwall501'];
                            $curfwall5505=$row1['Fwall5505'];
                            $curraid1520=$row1['RAID1520'];
                            $curraid1720=$row1['RAID1720'];
                 }
               
  echo "<tr>";
  echo "<td>".$pastengdate."</td>";
  echo "<td>".$pastcel775."</td>";
  echo "<td>".$pastp4775."</td>";
  echo "<td>".$pastp46600."</td>";
  echo "<td>".$pastc2d6400."</td>";
  echo "<td>".$pastc2d6600."</td>";
  echo "<td>".$pastc2d6700."</td>";
  echo "<td>".$pastc2d7500."</td>";               
  echo "<td>".$pastc2q9300."</td>";
  echo "<td>".$pastc2q9400."</td>";
  echo "<td>".$pastc2q9550."</td>";
  echo "<td>".$pastddr21gb."</td>";               
  echo "<td>".$pastddr22gb."</td>";
  echo "<td>".$pastddr24gb."</td>";
  echo "<td>".$pastddr32gb."</td>";
  echo "<td>".$pastddr34gb."</td>";               
  echo "<td>".$pastddr11gb."</td>";
  echo "<td>".$pasthdd120gb."</td>";
  echo "<td>".$pasthdd160gb."</td>";
  echo "<td>".$pasthdd300gb."</td>";               
  echo "<td>".$pasthdd1tb."</td>";
  echo "<td>".$pastssd64gb."</td>";
  echo "<td>".$pastfwall501."</td>";
  echo "<td>".$pastfwall5505."</td>";
  echo "<td>".$pastraid1520."</td>";                 
  echo "<td>".$pastraid1720."</td>";               
  echo "</tr>";
  echo "<tr>";
  echo "<td>".$curengdate."</td>";
  echo "<td>".$curcel775."</td>";
  echo "<td>".$curp4775."</td>";
  echo "<td>".$curp46600."</td>";
  echo "<td>".$curc2d6400."</td>";
  echo "<td>".$curc2d6600."</td>";
  echo "<td>".$curc2d6700."</td>";
  echo "<td>".$curc2d7500."</td>";               
  echo "<td>".$curc2q9300."</td>";
  echo "<td>".$curc2q9400."</td>";
  echo "<td>".$curc2q9550."</td>";
  echo "<td>".$curddr21gb."</td>";               
  echo "<td>".$curddr22gb."</td>";
  echo "<td>".$curddr24gb."</td>";
  echo "<td>".$curddr32gb."</td>";
  echo "<td>".$curddr34gb."</td>";               
  echo "<td>".$curddr11gb."</td>";
  echo "<td>".$curhdd120gb."</td>";
  echo "<td>".$curhdd160gb."</td>";
  echo "<td>".$curhdd300gb."</td>";               
  echo "<td>".$curhdd1tb."</td>";
  echo "<td>".$curssd64gb."</td>";
  echo "<td>".$curfwall501."</td>";
  echo "<td>".$curfwall5505."</td>";
  echo "<td>".$curraid1520."</td>";                 
  echo "<td>".$curraid1720."</td>";
  echo "</tr>";
                 echo "<tr><td>.</td></tr>";
  echo "<tr>";
  echo "<td>Run Rate</td>";
  $rrrcel775=($pastcel775-$curcel775)/($numdays/86400);
  echo "<td>".round ($rrrcel775,1)."</td>";
  $rrrp4775=($pastp4775-$curp4775)/($numdays/86400);
  echo "<td>".round ($rrrp4775,1)."</td>";
  $rrrp46600=($pastp46600-$curp46600)/($numdays/86400);
  echo "<td>".round ($rrrp46600,1)."</td>";
  $rrrc2d6400=($pastc2d6400-$curc2d6400)/($numdays/86400);
  echo "<td>".round ($rrrc2d6400,1)."</td>";
  $rrrc2d6600=($pastc2d6600-$curc2d6600)/($numdays/86400);
  echo "<td>".round ($rrrc2d6600,1)."</td>";
  $rrrc2d6700=($pastc2d6700-$curc2d6700)/($numdays/86400);
  echo "<td>".round ($rrrc2d6700,1)."</td>";
  $rrrc2d7500=($pastc2d7500-$curc2d7500)/($numdays/86400);
  echo "<td>".round ($rrrc2d7500,1)."</td>";
  $rrrc2q9300=($pastc2q9300-$curc2q9300)/($numdays/86400);
  echo "<td>".round ($rrrc2q9300,1)."</td>";
  $rrrc2q9400=($pastc2q9400-$curc2q9400)/($numdays/86400);
  echo "<td>".round ($rrrc2q9400,1)."</td>";
  $rrrc2q9550=($pastc2q9550-$curc2q9550)/($numdays/86400);
  echo "<td>".round ($rrrc2q9550,1)."</td>";
  $rrrddr21gb=($pastddr21gb-$curddr21gb)/($numdays/86400);
  echo "<td>".round ($rrrddr21gb,1)."</td>";
  $rrrddr22gb=($pastddr22gb-$curddr22gb)/($numdays/86400);
  echo "<td>".round ($rrrddr22gb,1)."</td>";               
  $rrrddr24gb=($pastddr24gb-$curddr24gb)/($numdays/86400);
  echo "<td>".round ($rrrddr24gb,1)."</td>";
  $rrrddr32gb=($pastddr32gb-$curddr32gb)/($numdays/86400);
  echo "<td>".round ($rrrddr32gb,1)."</td>";
  $rrrddr34gb=($pastddr34gb-$curddr34gb)/($numdays/86400);
  echo "<td>".round ($rrrddr34gb,1)."</td>";               
  $rrrddr11gb=($pastddr11gb-$curddr11gb)/($numdays/86400);
  echo "<td>".round ($rrrddr11gb,1)."</td>";
  $rrrhdd120gb=($pasthdd120gb-$curhdd120gb)/($numdays/86400);
  echo "<td>".round ($rrrhdd120gb,1)."</td>";
  $rrrhdd160gb=($pasthdd160gb-$curhdd160gb)/($numdays/86400);
  echo "<td>".round ($rrrhdd160gb,1)."</td>";               
  $rrrhdd300gb=($pasthdd300gb-$curhdd300gb)/($numdays/86400);
  echo "<td>".round ($rrrhdd300gb,1)."</td>";
  $rrrhdd1tb=($pasthdd1tb-$curhdd1tb)/($numdays/86400);
  echo "<td>".round ($rrrhdd1tb,1)."</td>";
  $rrrssd64gb=($pastssd64gb-$curssd64gb)/($numdays/86400);
  echo "<td>".round ($rrrssd64gb,1)."</td>";               
  $rrrfwall501=($pastfwall501-$curfwall501)/($numdays/86400);
  echo "<td>".round ($rrrfwall501,1)."</td>";
  $rrrfwall5505=($pastfwall5505-$curfwall5505)/($numdays/86400);
  echo "<td>".round ($rrrfwall5505,1)."</td>";
  $rrrraid1520=($pastraid1520-$curraid1520)/($numdays/86400);
  echo "<td>".round ($rrrraid1520,1)."</td>";
  $rrrraid1720=($pastraid1720-$curraid1720)/($numdays/86400);
  echo "<td>".round ($rrrraid1720,1)."</td>";               
  echo "</tr>";
               }    
?>
</tbody>
</table>
<hr>
<a href="reports.html">Back to Reports</a><br>
<a href="hwchange.html">Back to HW MOD form</a>
</body>
</html>