<?php 
$pid = 1;
//$conn =  @mysqli_connect(ini_get("mysqli.defualt_host"), "root", "", "phumuza_Web") or die ("Sorry unable to connect"); 
$usr = "root"; $pwd = "";
$dbh = new PDO("mysql:host=localhost;dbname=phumuza_web", $usr, $pwd);
foreach($dbh->query("SELECT * FROM PACKAGES WHERE PID=" .$pid) as $row){
	print_r($row[0]."\t".$row[1]."\t".$row[2]."\t".$row[3]);
}

?>