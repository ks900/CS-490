<html>
<body>
<?php

mysql_connect ('sql.njit.edu', 'ks492', 'SpqROrOBi');

mysql_select_db ('ks492');
//$found=string("User found");
//$error=string("User not found");
//echo "Hello";
//if ($ucid == "")
//{
//$ucid = '%';
//}
//$ucid=$_POST["ucid"];

//if ($passwd == "")
//{$passwd = '%';}
if($_SERVER['REQUEST_METHOD'] != "POST")
{
	header($_SERVER['SERVER_PROTOCOL']. '405 Method Not Allowed');
	header('Allow: POST');
	die(json_encode(["error" => "Must Use POST"]));
}

$ucid=$_POST["ucid"];
$pass=$_POST["pass"];

//$found=array("User found");
//$error=array("User not found");
$pw= mysql_query("SET @test=PASSWORD('$pass')");
$gpw=mysql_query("SELECT @test");
if($x=mysql_fetch_array($gpw)) {
do {
//	print $x['@test'];
	$tmp=$x['@test'];
} while($x=mysql_fetch_array($gpw)); }
//print ' ';
//print $tmp;
$result = mysql_query ("SELECT * FROM `ids` WHERE ucid ='$ucid' AND pass like '$tmp%'
			");
			//$aa=mysql_num_rows($result);
			//echo $aa;
			if ($row = mysql_fetch_array($result)) {
			//if($aa == "1")
			do {
				//echo $row;
				$ex=["status" => 200, "response" => "login successful"];
				echo json_encode($ex);
			//	print("<p>");
			//	print $row["ucid"];
			//		print (" ");
			//			print $row["passwd"];
			//				print("<p>");
							//echo "";
							} 
							while($row =
							mysql_fetch_array($result));
							} else 
							
							{
							$ex=["status" => 403,
							"response" => "login not succesful"];
							echo json_encode($ex);
							}

							?>

							</html>
							</body>

