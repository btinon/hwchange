<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<!-- mar 31 need to fix issue with dimms do the calculation from GB to GB -->
<title>Write HW Change</title>
</head>
<body bgcolor="lightgrey">

<?php
$procout=$_POST['procout'];
$dimm1out=$_POST['dimm1out'];
$dimm2out=$_POST['dimm2out'];
$dimm3out=$_POST['dimm3out'];
$dimm4out=$_POST['dimm4out'];
$hdd1out=$_POST['hdd1out'];
$hdd2out=$_POST['hdd2out'];
$raidout=$_POST['raidout'];
$fwallout=$_POST['fwallout'];
$procin=$_POST['procin'];
$dimm1in=$_POST['dimm1in'];
$dimm2in=$_POST['dimm2in'];
$dimm3in=$_POST['dimm3in'];
$dimm4in=$_POST['dimm4in'];
$hdd1in=$_POST['hdd1in'];
$hdd2in=$_POST['hdd2in'];
$raidin=$_POST['raidin'];
$fwallin=$_POST['fwallin'];
$serverid=$_POST['serverid'];
$initials=$_POST['initials'];
$servernotes=$_POST['servernotes'];
$engdate=date("m/d/y");
$dateupdatedunix=strtotime($engdate);
if ($procout<>"clear")
   $procchange="From ".$procout." To ".$procin;
if ($dimm1out<>"clear")
   $ramchange="RAM was changed.";
if ($dimm2out<>"clear")
   $ramchange="RAM was changed.";
if ($dimm2out<>"clear")
   $ramchange="RAM was changed.";
if ($dimm2out<>"clear")
   $ramchange="RAM was changed.";
if ($hdd1out<>"clear")
   $hdd1change="From ".$hdd1out." To ".$hdd1in;
if ($hdd2out<>"clear")
   $hdd2change="From ".$hdd2out." To ".$hdd2in;
if ($raidout<>"clear")
   $raidchange="From ".$raidout." To ".$raidin;
if ($fwallout<>"clear")
   $fwallchange="From ".$fwallout." To ".$fwallin;
// open connection
$hostname="bitbytebit.kodingen.com";
$username="k12584_M1";
$password="4d57a498c5394";
$dbname="k12584_M1";
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
$curraid1520=$row['RAID1520'];
$curraid1720=$row['RAID1720'];
$curfwall501=$row['Fwall501'];
$curfwall5505=$row['Fwall5505'];
//processors
//out

if ($procout=="cel775")
  $newcel775=$curcel775+1;
else $newcel775=$curcel775;

if ($procout=="p4775")
  $newp4775=$curp4775+1;
else $newp4775=$curp4775;

if ($procout=="p46600")
  $newp46600=$curp46600+1;
else $newp46600=$curp46600;

if ($procout=="c2d6400")
  $newc2d6400=$curc2d6400+1;
else $newc2d6400=$curc2d6400;

if ($procout=="c2d6600")
  $newc2d6600=$curc2d6600+1;
else $newc2d6600=$curc2d6600;

if ($procout=="c2d6700")
  $newc2d6700=$curc2d6700+1;
else $newc2d6700=$curc2d6700;

if ($procout=="c2d7500")
  $newc2d7500=$curc2d7500+1;
else $newc2d7500=$curc2d7500;

if ($procout=="c2q9300")
  $newc2q9300=$curc2q9300+1;
else $newc2q9300=$curc2q9300;

if ($procout=="c2q9400")
  $newc2q9400=$curc2q9400+1;
else $newc2q9400=$curc2q9400;

if ($procout=="c2q9550")
  $newc2q9550=$curc2q9550+1;
else $newc2q9550=$curc2q9550;

//processors
//in
if ($procin=="cel775")
  $newcel775=$curcel775-1;

if ($procin=="p4775")
  $newp4775=$curp4775-1;

if ($procin=="p46600")
  $newp46600=$curp46600-1;

if ($procin=="c2d6400")
  $newc2d6400=$curc2d6400-1;

if ($procin=="c2d6600")
  $newc2d6600=$curc2d6600-1;

if ($procin=="c2d6700")
  $newc2d6700=$curc2d6700-1;
  
if ($procin=="c2d7500")
  $newc2d7500=$curc2d7500-1;
  
if ($procin=="c2q9300")
  $newc2q9300=$curc2q9300-1;

if ($procin=="c2q9400")
  $newc2q9400=$curc2q9400-1;

if ($procin=="c2q9550")
  $newc2q9550=$curc2q9550-1;

//ram
//out
if ($dimm1out=="ddr21gb")
  $newddr21gb=$curddr21gb+1;
else $newddr21gb=$curddr21gb;

if ($dimm2out=="ddr21gb")
  $newddr21gb=$curddr21gb+1;
else $newddr21gb=$curddr21gb;

if ($dimm3out=="ddr21gb")
  $newddr21gb=$curddr21gb+1;
else $newddr21gb=$curddr21gb;

if ($dimm4out=="ddr21gb")
  $newddr21gb=$curddr21gb+1;
else $newddr21gb=$curddr21gb;

if ($dimm1out=="ddr22gb")
  $newddr22gb=$curddr22gb+1;
else $newddr22gb=$curddr22gb;

if ($dimm2out=="ddr22gb")
  $newddr22gb=$curddr22gb+1;
else $newddr22gb=$curddr22gb;

if ($dimm3out=="ddr22gb")
  $newddr22gb=$curddr22gb+1;
else $newddr22gb=$curddr22gb;

if ($dimm4out=="ddr22gb")
  $newddr22gb=$curddr22gb+1;
else $newddr22gb=$curddr22gb;

if ($dimm1out=="ddr24gb")
  $newddr24gb=$curddr24gb+1;
else $newddr24gb=$curddr24gb;

if ($dimm2out=="ddr24gb")
  $newddr24gb=$curddr24gb+1;
else $newddr24gb=$curddr24gb;

if ($dimm3out=="ddr24gb")
  $newddr24gb=$curddr24gb+1;
else $newddr24gb=$curddr24gb;

if ($dimm4out=="ddr24gb")
  $newddr24gb=$curddr24gb+1;
else $newddr24gb=$curddr24gb;

if ($dimm1out=="ddr32gb")
  $newddr32gb=$curddr32gb+1;
else $newddr32gb=$curddr32gb;
  
if ($dimm2out=="ddr32gb")
  $newddr32gb=$curddr32gb+1;
else $newddr32gb=$curddr32gb;

if ($dimm3out=="ddr32gb")
  $newddr32gb=$curddr32gb+1;
else $newddr32gb=$curddr32gb;

if ($dimm4out=="ddr32gb")
  $newddr32gb=$curddr32gb+1;
else $newddr32gb=$curddr32gb;

if ($dimm1out=="ddr34gb")
  $newddr34gb=$curddr34gb+1;
else $newddr34gb=$curddr34gb;

if ($dimm2out=="ddr34gb")
  $newddr34gb=$curddr34gb+1;
else $newddr34gb=$curddr34gb;

if ($dimm3out=="ddr34gb")
  $newddr34gb=$curddr34gb+1;
else $newddr34gb=$curddr34gb;

if ($dimm4out=="ddr34gb")
  $newddr34gb=$curddr34gb+1;
else $newddr34gb=$curddr34gb;

if ($dimm1out=="ddr11gb")
  $newddr11gb=$curddr11gb+1;
else $newddr11gb=$curddr11gb;

if ($dimm2out=="ddr11gb")
  $newddr11gb=$curddr11gb+1;
else $newddr11gb=$curddr11gb;

if ($dimm3out=="ddr11gb")
  $newddr11gb=$curddr11gb+1;
else $newddr11gb=$curddr11gb;

if ($dimm4out=="ddr11gb")
  $newddr11gb=$curddr11gb+1;
else $newddr11gb=$curddr11gb;



//ram
//in
if ($dimm1in=="ddr21gb")
  $newddr21gb=$curddr21gb-1;
else $newddr21gb=$curddr21gb;

if ($dimm2in=="ddr21gb")
  $newddr21gb=$curddr21gb-1;
else $newddr21gb=$curddr21gb;

if ($dimm3in=="ddr21gb")
  $newddr21gb=$curddr21gb-1;
else $newddr21gb=$curddr21gb;

if ($dimm4in=="ddr21gb")
  $newddr21gb=$curddr21gb-1;
else $newddr21gb=$curddr21gb;

if ($dimm1in=="ddr22gb")
  $newddr22gb=$curddr22gb-1;
else $newddr22gb=$curddr22gb;

if ($dimm2in=="ddr22gb")
  $newddr22gb=$curddr22gb-1;
else $newddr22gb=$curddr22gb;

if ($dimm3in=="ddr22gb")
  $newddr22gb=$curddr22gb-1;
else $newddr22gb=$curddr22gb;

if ($dimm4in=="ddr22gb")
  $newddr22gb=$curddr22gb-1;
else $newddr22gb=$curddr22gb;

if ($dimm1in=="ddr24gb")
  $newddr24gb=$curddr24gb-1;
else $newddr24gb=$curddr24gb;

if ($dimm2in=="ddr24gb")
  $newddr24gb=$curddr24gb-1;
else $newddr24gb=$curddr24gb;

if ($dimm3in=="ddr24gb")
  $newddr24gb=$curddr24gb-1;
else $newddr24gb=$curddr24gb;

if ($dimm4in=="ddr24gb")
  $newddr24gb=$curddr24gb-1;
else $newddr24gb=$curddr24gb;

if ($dimm1in=="ddr32gb")
  $newddr32gb=$curddr32gb-1;
else $newddr32gb=$curddr32gb;

if ($dimm2in=="ddr32gb")
  $newddr32gb=$curddr32gb-1;
else $newddr32gb=$curddr32gb;

if ($dimm3in=="ddr32gb")
  $newddr32gb=$curddr32gb-1;
else $newddr32gb=$curddr32gb;

if ($dimm4in=="ddr32gb")
  $newddr32gb=$curddr32gb-1;
else $newddr32gb=$curddr32gb;

if ($dimm1in=="ddr34gb")
  $newddr34gb=$curddr34gb-1;
else $newddr34gb=$curddr34gb;

if ($dimm2in=="ddr34gb")
  $newddr34gb=$curddr34gb-1;
else $newddr34gb=$curddr34gb;

if ($dimm3in=="ddr34gb")
  $newddr34gb=$curddr34gb-1;
else $newddr34gb=$curddr34gb;

if ($dimm4in=="ddr34gb")
  $newddr34gb=$curddr34gb-1;
else $newddr34gb=$curddr34gb;

if ($dimm1in=="ddr11gb")
  $newddr11gb=$curddr11gb-1;
else $newddr11gb=$curddr11gb;

if ($dimm2in=="ddr11gb")
  $newddr11gb=$curddr11gb-1;
else $newddr11gb=$curddr11gb;

if ($dimm3in=="ddr11gb")
  $newddr11gb=$curddr11gb-1;
else $newddr11gb=$curddr11gb;

if ($dimm4in=="ddr11gb")
  $newddr11gb=$curddr11gb-1;
else $newddr11gb=$curddr11gb;


//hdd1
//out

if ($hdd1out=="120gb")
   $newhdd120gb=$curhdd120gb+1;
else $newhdd120gb=$curhdd120gb;

if ($hdd1out=="160gb")
   $newhdd160gb=$curhdd160gb+1;
else $newhdd160gb=$curhdd160gb;

if ($hdd1out=="300gb")
   $newhdd300gb=$curhdd300gb+1;
else $newhdd300gb=$curhdd300gb;

if ($hdd1out=="1tb")
   $newhdd1tb=$curhdd1tb+1;
else $newhdd1tb=$curhdd1tb;

if ($hdd1out=="64gb")
   $newssd64gb=$curssd64gb+1;
else $newssd64gb=$curssd64gb;

//hdd1
//in

if ($hdd1in=="120gb")
   $newhdd120gb=$curhdd120gb-1;

if ($hdd1in=="160gb")
   $newhdd160gb=$curhdd160gb-1;

if ($hdd1in=="300gb")
   $newhdd300gb=$curhdd300gb-1;

if ($hdd1in=="1tb")
   $newhdd1tb=$curhdd1tb-1;

if ($hdd1in=="64gb")
   $newssd64gb=$curssd64gb-1;

//hdd2
//out
if ($hdd2out=="120gb")
   $newhdd120gb=$newhdd120gb+1;

if ($hdd2out=="160gb")
   $newhdd160gb=$newhdd160gb+1;

if ($hdd2out=="300gb")
   $newhdd300gb=$newhdd300gb+1;

if ($hdd2out=="1tb")
   $newhdd1tb=$newhdd1tb+1;

if ($hdd2out=="64gb")
   $newssd64gb=$newssd64gb+1;

//hdd2
//in
if ($hdd2in=="120gb")
   $newhdd120gb=$newhdd120gb-1;

if ($hdd2in=="160gb")
   $newhdd160gb=$newhdd160gb-1;

if ($hdd2in=="300gb")
   $newhdd300gb=$newhdd300gb-1;

if ($hdd2in=="1tb")
   $newhdd1tb=$newhdd1tb-1;

if ($hdd2in=="64gb")
   $newssd64gb=$newssd64gb-1;

//raid
//out
if ($raidout=="raid1520outyn")
   $newraid1520=$curraid1520+1;
else $newraid1520=$curraid1520;

if ($raidout=="raid1720outyn")
   $newraid1720=$curraid1720+1;
else $newraid1720=$curraid1720;

//raid
//in

if ($raidin=="raid1520inyn")
   $newraid1520=$curraid1520-1;

if ($raidin=="raid1720inyn")
   $newraid1720=$curraid1720-1;

//fwall
//out
if ($fwallout=="fwall501outyn")
   $newfwall501=$curfwall501+1;
else $newfwall501=$curfwall501;

if ($fwallout=="fwall5505outyn")
   $newfwall5505=$curfwall5505+1;
else $newfwall5505=$curfwall5505;


//fwall
//in

if ($fwallin=="fwall501inyn")
   $newfwall501=$curfwall501-1;

if ($fwallin=="fwall5505inyn")
   $newfwall5505=$curfwall5505-1;

// open connection
$connection = mysql_connect($hostname, $username, $password);
mysql_select_db($dbname, $connection);
echo "connect successful ...<br>";


// write to all databases

mysql_query("INSERT INTO MASTERINV (DateUpdated, ENGDate, `Cel775`, `P4775`, `P46600`, `C2D6400`, `C2D6600`, `C2D6700`, `C2D7500`, `C2Q9300`, `C2Q9400`, `C2Q9550`, `DDR21GB`, `DDR22GB`, `DDR24GB`, `DDR32GB`, `DDR34GB`, `DDR11GB`, `HDD120GB`, `HDD160GB`, `HDD300GB`, `HDD1TB`, `SSD64GB`, `Fwall501`, `Fwall5505`, `RAID1520`, `RAID1720`) VALUES ('$dateupdatedunix', '$engdate', '$newcel775', '$newp4775', '$newp46600', '$newc2d6400', '$newc2d6600', '$newc2d6700', '$newc2d7500', '$newc2q9300', '$newc2q9400', '$newc2q9550', '$newddr21gb', '$newddr22gb', '$newddr24gb', '$newddr32gb', '$newddr34gb', '$newddr11gb', '$newhdd120gb', '$newhdd160gb', '$newhdd300gb', '$newhdd1tb', '$newssd64gb', '$newfwall501', '$newfwall5505', '$newraid1520', '$newraid1720')") or die (mysql_error());
echo "writing to MASTERINV done ...<br>";
mysql_query("INSERT INTO DCDB (DateUpdated, ENGDate, ServerID, Initials, ProcChange, RAMChange, HDD1Change, HDD2Change, RaidChange, FwallChange) VALUES ('$dateupdatedunix', '$engdate', '$serverid', '$initials', '$procchange', '$ramchange', '$hdd1change', '$hdd2change', '$raidchange', '$fwallchange')") or die (mysql_error());
echo "writing to DCDB done ...<br>";
mysql_query("INSERT INTO SNDB (DateUpdated, ENGDate, ServerID, Initials, ServerNotes) VALUES ('$dateupdatedunix', '$engdate', '$serverid', '$initials', '$servernotes')") or die (mysql_error());
echo "writing to SNDB done ...<br>";

?>
<hr>
<a href="reports.html">Reports</a><br>
<a href="hwchange.html">Back to HW MOD form</a>
</body>
</html>