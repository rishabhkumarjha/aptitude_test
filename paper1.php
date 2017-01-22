<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/foundation.css" />
<link rel="stylesheet" href="css/app.css" />
<title>paper1</title>

<script type="application/javascript">
function resetit(id1){
	if(document.getElementById(id1).checked==true)
		document.getElementById(id1).checked=false;
	}
</script>

<?php 

$uid=$_POST["uid"];

$usr="root";
$pass="86number86";
$qdb = new MySQLi('localhost',$usr,$pass,'csi');

$random=range(1,45);

$quesQuery="Select * from paper1 where id in (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$exec=$qdb->prepare($quesQuery);
$exec->bind_param("iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii",$random[0],$random[1],$random[2],$random[3],$random[4],$random[5],$random[6],$random[7],$random[8],$random[9],$random[10],$random[11],$random[12],$random[13],$random[14],$random[15],$random[16],$random[17],$random[18],$random[19],$random[20],$random[21],$random[22],$random[23],$random[24],$random[25],$random[26],$random[27],$random[28],$random[29],$random[30],$random[31],$random[32],$random[33],$random[34],$random[35],$random[36],$random[37],$random[38],$random[39],$random[40],$random[41],$random[42],$random[43],$random[44]);
$exec->execute();
$exec->bind_result($id,$q,$a,$b,$c,$d,$ans);
echo($qdb->error);

?>

</head>

<body style="height:100%; overflow:auto;">
<div id="time" style="overflow:auto; height:10%; position:fixed; background:#99F; border:outset; box-shadow:#333; width:125px; font-size:36px" class="large-offset-11 text-center">START</div>

<form action="paper2.php" method="post" id="qp" >
<input type="hidden" name="uid" value="<?php echo($uid);?>"
<?php $x=100;echo("Question 1->");
	for($i=1;$i<=45;$i++)
		{$exec->fetch();?>
			<div class="large-center large-8 row column" style="border:double">
			<?php echo("Question $i ->$q");
			?><br>
            	
				<input type="radio" ondblclick="resetit(<?php echo($id*$x);?>)" value="A" id="<?php echo($id*$x);?>" name="<?php echo($i);?>"><?php echo($a); ?>
            	<input type="radio" ondblclick="resetit(<?php echo($id*$x+1);?>)" id="<?php echo($id*$x+1);?>" value="B" name="<?php echo($i);?>"><?php echo($b); ?>
                <input type="radio" ondblclick="resetit(<?php echo($id*$x+2);?>)" id="<?php echo($id*$x+2);?>" value="C" name="<?php echo($i);?>"><?php echo($c); ?>
            	<input type="radio" ondblclick="resetit(<?php echo($id*$x+3);?>)" id="<?php echo($id*$x+3);?>" value="D" name="<?php echo($i);?>"><?php echo($d); ?>
                </div><br>
			<?php  }
	
?>
<div class="large-6 large-center row column">
<input type="submit" class="button expanded"/></div>
</form>


<script>
var tim=3600;
var myVar = setInterval(myTimer, 1000);

function myTimer() {
	if(tim>=0){
    document.getElementById("time").innerHTML = parseInt(tim/60) + ":" + tim%60;
	tim--;
	}
	else{
		clearInterval(myVar);
		document.getElementById("qp").submit();
		}
}
</script>
</body>
</html>