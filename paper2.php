<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>paper2</title>
<?php 
$id=(string)$_POST["uid"];
$id+="s";
echo($id);
$result=Array();
$result=$_POST;
print_r($result);
$usr='root';
$pass='hidden';
$p1=new MySQLi('localhost',$usr,$pass,'csi');
$p1->query("create table s$id (id int,res char(1))") or die("Cannot record ur response ur entries already exists <b>contact admin</b>");
echo($p1->error);
$query="insert into s$id values (?,?)";
$stm=$p1->prepare($query);
for($i=1;$i<=45;$i++)
{
if(array_key_exists($i,$result))
	{
	$stm->bind_param("is",$i,$result["$i"]);
	$stm->execute();
	}
}

//calc marks
$marks=0;
echo("<br>");

for($i=1;$i<=45;$i++){
$res=$p1->query("select ANSWER from paper1 where id = $i");
echo($p1->error);
$r=$res->fetch_row();


if(array_key_exists($i,$result) && $r[0]==$result["$i"])
{
	$marks=$marks+3;
	echo($i);
	echo(" correct <br>");
	}
	else
		if(array_key_exists($i,$result)){
		$marks=$marks-1;}
		
}

$p1->query("insert into ranks values($id,(select NAME from reg where id=$id),$marks)");
echo($p1->error);
?>
</head>

<body>
<h1>Total Marks <?php echo($marks)?></h1>
</body>
</html>
