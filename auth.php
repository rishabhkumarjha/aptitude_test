<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php 
$usr='root';
$pass='hidden';
$db='csi';
$conn=new MySQLi('localhost',$usr,$pass,$db); 

?>
</head>

<body>
<?php 
$email=$conn->real_escape_string($_POST["email"]);
$pass=$conn->real_escape_string($_POST["pass"]);

$q="select * from reg where EMAIL=?";
$state=$conn->prepare($q);
$state->bind_param("s",$email);
$state->execute();
$result=Array();  //to store array object result
$state->bind_result($result["name"],$result["year"],$result["div"],$result["dep"],$result["mem"],$result["mob"],$result["fee"],$result["status"],$result["id"],$result["email"],$result["pass"]);
$state->fetch();
if($result["pass"]==$pass)
{
	echo("Authentication Successful");
	}  
else
 die("Incorrect Password");
	
?>
<br>
<form action="paper1.php" method="post">
ID<input type="text" name="uid" hidden="true" value="<?php echo($result["id"]);?>" />
UserName<input type="text" disabled="disabled" name="email" value="<?php echo($email); ?>" />
<br>Name<input type="text" disabled="disabled" name="name" value="<?php echo($result["name"]); ?>" />
<br><input type="submit">
</form>
</body>
</html>
