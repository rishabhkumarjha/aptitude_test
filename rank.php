<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/foundation.css" />
<title>rank</title>

<?php 
$db=new MySQLi('localhost','root','hidden','csi');
$db->query("SET @rnk=0;");
$db->query("SET @rank=1;");
$db->query("SET @curscore=0;");
echo($db->error);
$db->query("drop view if exists rank1");
$db->query("create view rank1 as select * from ranks order by marks desc");
$res=$db->query("SELECT id,marks,name,rank FROM
     (
         SELECT AA.*,BB.id,BB.name,
         (@rnk:=@rnk+1) rnk,
         (@rank:=IF(@curscore=marks,@rank,@rnk)) rank,
         (@curscore:=marks) newscore
         FROM
         (
             SELECT * FROM
             (SELECT COUNT(1) scorecount,marks
             FROM rank1 GROUP BY marks
         ) AAA
         ORDER BY marks desc
     ) AA LEFT JOIN rank1 BB USING (marks)) A;");
	 echo($db->error);
?>

</head>

<body>
<table class="large-centered large-8 text-center" border="2"><thead><tr><th class="text-center">ID</th><th class="text-center">MARKS</th><th class="text-center">NAME</th><th class="text-center">RANK</th></tr></thead>
<tbody>
<?php 
$row=$res->fetch_row();
while($row)
{?>
	<tr>
    	<td><?php echo($row[0]);?></td>
        <td><?php echo($row[1]);?></td>
        <td><?php echo($row[2]);?></td>
        <td><?php echo($row[3]);?></td>
    </tr>
	<?php
	$row=$res->fetch_row();
	}
?>
</tbody>
</table>
</body>
</html>
