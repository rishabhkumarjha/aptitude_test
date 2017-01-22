<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<?php 
$username="root";
$password="86number86";
echo("Initializing databases ...");
$conn = new MySQLi("localhost",$username,$password);
$conn->query("create database cs");
if(!$conn->error)
echo("database csi created successfully");
else echo("error creating database csi");
$conn->select_db("cs");
$conn->query("create table ranks(id int,name varchar(60),marks int)");
?>

</head>

<body>
</body>
</html>