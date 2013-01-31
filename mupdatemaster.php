<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Run Rate Report</title>
</head>
<body bgcolor="lightgrey">

<?php
  $initials=$_POST['Initials'];
$mcel775=$_POST['Cel775'];
$mp4775=$_POST['P4775'];
$mp46600=$_POST['P46600'];
$mc2d6400=$_POST['C2D6400'];
$mc2d6600=$_POST['C2D6600'];
$mc2d6700=$_POST['C2D6700'];
$mc2d7500=$_POST['C2D7500'];
$mc2q9300=$_POST['C2Q9300'];
$mc2q9400=$_POST['C2Q9400'];
$mc2q9550=$_POST['C2Q9550'];
$mddr21gb=$_POST['DDR21GB'];
$mddr22gb=$_POST['DDR22GB'];
$mddr24gb=$_POST['DDR24GB'];
$mddr32gb=$_POST['DDR32GB'];
$mddr34gb=$_POST['DDR34GB'];
$mddr11gb=$_POST['DDR11GB'];
$mhdd120gb=$_POST['HDD120GB'];
$mhdd160gb=$_POST['HDD160GB'];
$mhdd300gb=$_POST['HDD300GB'];
$mhdd1tb=$_POST['HDD1TB'];
$mssd64gb=$_POST['SSD64GB'];
$mfwall501=$_POST['FWALL501'];
$mfwall5505=$_POST['FWALL5505'];
$mraid1520=$_POST['RAID1520'];
$mraid1720=$_POST['RAID1720'];
  $engdate=date("m/d/y");
  $dateupdatedunix=strtotime($engdate);
  
  // open connection
$hostname="devtestdaily.db.5208975.hostedresource.com";
$username="devtestdaily";
$password="Gr33nH0us3";
$dbname="devtestdaily";
$connection = mysql_connect($hostname, $username, $password);
mysql_select_db($dbname, $connection);
// read in current inventory values
$query="SELECT * FROM MASTERINV ORDER BY RecordID DESC LIMIT 1";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
//assign values to vars
$curcel775=$row['Cel775'];
$curp4775=$row['P4775'];
$curp46600=$row['P46600'];
$curc2d6400=$row['C2D6400'];
$curc2d6600=$row['C2D6600'];
$curc2d6700=$row['C2D6700'];
$curc2d7500=$row['C2D7500'];
$curc2q9300=$row['C2Q9300'];
$curc2q9400=$row['C2Q9400'];
$curc2q9550=$row['C2Q9550'];
$curddr21gb=$row['DDR21GB'];
$curddr22gb=$row['DDR22GB'];
$curddr24gb=$row['DDR24GB'];
$curddr32gb=$row['DDR32GB'];
$curddr34gb=$row['DDR34GB'];
$curddr11gb=$row['DDR11GB'];
$curhdd120gb=$row['HDD120GB'];
$curhdd160gb=$row['HDD160GB'];
$curhdd300gb=$row['HDD300GB'];
$curhdd1tb=$row['HDD1TB'];
$curssd64gb=$row['SSD64GB'];
$curfwall501=$row['FWALL501'];
$curfwall5505=$row['FWALL5505'];
$curraid1520=$row['RAID1520'];
$curraid1720=$row['RAID1720'];

if ($mcel775<>"")
  $newcel775=$mcel775;
else $newcel775=$curcel775;

if ($mp4775<>"")
  $newp4775=$mp4775;
else $newp4775=$curp4775;

if ($mp46600<>"")
  $newp46600=$mp46600;
else $newp46600=$curp46600;
  
if ($mc2d6400<>"")
  $newc2d6400=$mc2d6400;
else $newc2d6400=$curc2d6400;

if ($mc2d6600<>"")
  $newc2d6600=$mc2d6600;
else $newc2d6600=$curc2d6600;

if ($mc2d6700<>"")
  $newc2d6700=$mc2d6700;
else $newc2d6700=$curc2d6700;
  
if ($mc2d7500<>"")
  $newc2d7500=$mc2d7500;
else $newc2d7500=$curc2d7500;

if ($mc2q9300<>"")
  $newc2q9300=$mc2q9300;
else $newc2q9300=$curc2q9300;

if ($mc2q9400<>"")
  $newc2q9400=$mc2q9400;
else $newc2q9400=$curc2q9400;

if ($mc2q9550<>"")
  $newc2q9550=$mc2q9550;
else $newc2q9550=$curc2q9550;

if ($mddr21gb<>"")
  $newddr21gb=$mddr21gb;
else $newddr21gb=$curddr21gb;

if ($mddr22gb<>"")
  $newddr22gb=$mddr22gb;
else $newddr22gb=$curddr22gb;

if ($mddr24gb<>"")
  $newddr24gb=$mddr24gb;
else $newddr24gb=$curddr24gb;

if ($mddr32gb<>"")
  $newddr32gb=$mddr32gb;
else $newddr32gb=$curddr32gb;

if ($mddr34gb<>"")
  $newddr34gb=$mddr34gb;
else $newddr34gb=$curddr34gb;

if ($mddr11gb<>"")
  $newddr11gb=$mddr11gb;
else $newddr11gb=$curddr11gb;

if ($mhdd120gb<>"")
   $newhdd120gb=$mhdd120gb;
else $newhdd120gb=$curhdd120gb;

if ($mhdd160gb<>"")
   $newhdd160gb=$mhdd160gb;
else $newhdd160gb=$curhdd160gb;

if ($mhdd300gb<>"")
   $newhdd300gb=$mhdd300gb;
else $newhdd300gb=$curhdd300gb;

if ($mhdd1tb<>"")
   $newhdd1tb=$mhdd1tb;
else $newhdd1tb=$curhdd1tb;

if ($mssd64gb<>"")
   $newssd64gb=$mssd64gb;
else $newssd64gb=$curssd64gb;

if ($mfwall501<>"")
   $newfwall501=$mfwall501;
else $newfwall501=$curfwall501;

if ($mfwall5505<>"")
  $newfwall5505=$mfwall5505;
else $newfwall5505=$curfwall5505;

if ($mraid1520<>"")
   $newraid1520=$mraid1520;
else $newraid1520=$curraid1520;

if ($mraid1720<>"")
   $newraid1720=$mraid1720;
else $newraid1720=$curraid1720;
echo "<br>";
echo "<hr>";
echo "writing ...<br>";

// open connection
$connection = mysql_connect($hostname, $username, $password);
mysql_select_db($dbname, $connection);
echo "connect successful ...<br>";


// write to all databases

mysql_query("INSERT INTO MASTERINV (`DateUpdated`, `ENGDate`, `Cel775`, `P4775`, `P46600`, `C2D6400`, `C2D6600`, `C2D6700`, `C2D7500`, `C2Q9300`, `C2Q9400`, `C2Q9550`, `DDR21GB`, `DDR22GB`, `DDR24GB`, `DDR32GB`, `DDR34GB`, `DDR11GB`, `HDD120GB`, `HDD160GB`, `HDD300GB`, `HDD1TB`, `SSD64GB`, `FWALL501`, `FWALL5505`, `RAID1520`, `RAID1720`)  VALUES ('$dateupdatedunix', '$engdate', '$newcel775', '$newp4775', '$newp46600', '$newc2d6400', '$newc2d6600', '$newc2d6700', '$newc2d7500', '$newc2q9300', '$newc2q9400', '$newc2q9550', '$newddr21gb', '$newddr22gb', '$newddr24gb', '$newddr32gb', '$newddr34gb', '$newddr11gb', '$newhdd120gb', '$newhdd160gb', '$newhdd300gb', '$newhdd1tb', '$newssd64gb', '$newfwall501', '$newfwall5505', '$newraid1520', '$newraid1720')") or die (mysql_error());
echo "MASTERINV manually updated ...<br>";
mysql_query("INSERT INTO MCHANGELOG (`DateUpdated`, `ENGDate`, `Initials`) VALUES ('$dateupdatedunix', '$engdate', '$initials')");
?>
<hr>
<a href="reports.html">Reports</a><br>
<a href="hwchange.html">Back to HW MOD form</a>
</body>
</html>