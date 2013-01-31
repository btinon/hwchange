<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<!-- SECTION TO TEST FORM VARS -->

<?php
  
  $a=1;
  $b=2;
  echo "first way".($a+$b)*0.5;
  echo "second way".($a+$b)/2;
  $unixtime="1296190800";
  echo "<br><hr><h1> new test here";
  $testvar1=40;
  $testvar2=6;
  $resvar=$testvar1-$testvar2/14;
  echo round($resvar);
  
$formvar1=$_POST['PUT FORM NAME VAR HERE'];
$formvar2=$_POST['PUT FORM NAME VAR HERE'];
$formvar3=$_POST['PUT FORM NAME VAR HERE'];
?>
<html>
<head>
<title>TEST SANDBOX</title>
</head>
<body>
<h2><center>Data Entered</center></h2>
<p>
<!-- FORM TESTING
<?php
echo "form var 1: ".$formvar1."<br>";
echo "form var 2: ".$formvar2."<br>";
echo "form var 3: ".$formvar3."<br>";
?> -->
<hr>
<h2><center>TEST SANDBOX</center></h2>
<p>

<!-- SECTION FOR CODE TESTS -->
<?php
  $from="01/10/11";
  $today=date("m/d/y");
  $adjustfrom=strtotime($from);
  echo "<h1><hr>".$adjustfrom."<hr></h1>";
  $adjusttoday=strtotime($today);
  $range=$adjusttoday-$adjustfrom;
  echo ($range/86400)." days since ".$from;
  echo "<p>";
  $v = 'foo';
  $foo = 42;
  echo "m is {$$var}\n";
 ?>


<!-- FOR DBASE TESTS
<?php
$hostname="devtestdaily.db.5208975.hostedresource.com";
$username="devtestdaily";
$password="Gr33nH0us3";
$dbname="devtestdaily";
$usertable="MPDB";
$MPDBfield1 = "ServerID";
$MPDBfield2="ChassisType";
$connection = mysql_connect($hostname, $username, $password);
mysql_select_db($dbname, $connection);

# Check If Record Exists

$query = "SELECT * FROM $usertable";
$result = mysql_query($query);
if($result)
{
 while($row = mysql_fetch_array($result))
 {
   $c1 = $row["$MPDBfield1"];
  echo "Server ID: ".$c1;
  
  $c2=$row["$MPDBfield2"];
  echo "<br>Chassis: ".$c2;
  }
}
?>
-->
<?php
$hostname="devtestdaily.db.5208975.hostedresource.com";
$username="devtestdaily";
$password="Gr33nH0us3";
$dbname="devtestdaily";
$usertable="MPDB";
$colname="DDR2-1GB";
$connection = mysql_connect($hostname, $username, $password);
mysql_select_db($dbname, $connection);
$qquery = "SELECT * FROM $usertable WHERE $colname = '2'";
  //echo $qquery;
/*$result = mysql_query($query);
if($result)
{
 while($row = mysql_fetch_array($result))
 {
   $c1 = $row["$MPDBfield1"];
  echo "Server ID: ".$c1;
  */
?>
</body>
</html>