
<?php

mysql_connect ('sql.njit.edu', 'ks492', 'SpqROrOBi');

mysql_select_db ('ks492');

if($_SERVER['REQUEST_METHOD'] != "POST")
{
	header($_SERVER['SERVER_PROTOCOL']. '405 Method Not Allowed');
	header('Allow: POST');
	die(json_encode(["error" => "Must Use POST"]));
}

$ucid=$_POST["ucid"];
$pass=$_POST["pass"];

$pw= mysql_query("SET @test=PASSWORD('$pass')");
$gpw=mysql_query("SELECT @test");
if($x=mysql_fetch_array($gpw)) {
do {
	$tmp=$x['@test'];
} while($x=mysql_fetch_array($gpw)); }

$result = mysql_query ("SELECT * FROM `ids` WHERE ucid ='$ucid' AND pass like '$tmp%'");
			
if ($row = mysql_fetch_array($result)) {
	do {
		$ex=["status" => 200, "response" => "login successful"];
		echo json_encode($ex);
		} while($row = mysql_fetch_array($result));}

else {
		$ex=["status" => 403, "response" => "login not succesful"];
		echo json_encode($ex);
		}
?>
