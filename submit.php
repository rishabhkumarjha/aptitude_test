<?php

require_once("recaptchalib.php");
$secret="6Lerzw8UAAAAAGbRr7YUDxT4h_gaRlcAAYlDqBW8";
$response=null;
$reCaptcha=new ReCaptcha($secret);

if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if($response!=null && $response->success )
{
	echo("Captcha varified");
	}

$db=new MySQLi('localhost','root','86number86','csi');
$name=$_POST["name"];
$year=$_POST["year"];
$div=$_POST["div"];
$dept=$_POST["dept"];
$membership=$_POST["member"];
$mob=$_POST["mob"];
$email=$_POST["email"];
$mem=1;
if($membership=="FALSE")
	{
		$mem=0;
	}
$amount=20;
if($membership=="TRUE")
{
	$amount=10;
		}
$pass=123;
$query="INSERT INTO reg(NAME,YEAR,DIVISION,DEPARTMENT,MEMBER,MOBILE,AMOUNT,EMAIL,PASSWD) VALUES(?,?,?,?,?,?,?,?,?)";
$stmt=$db->prepare($query);
$var1=$stmt->bind_param("ssisiiisi",$name,$year,$div,$dept,$mem,$mob,$amount,$email,$pass);
$stmt->execute();
$msg= "Dear $name we have recieved your interest for participating in MOCK INTERVIEW organized by CSI-MIT-PUNE, Please Pay required amount of Rupees $amount in order to proceed with the event. Contact : xxxxxxxxxx for further details";
echo($db->error);
/*$retval=mail($email,"MOCK APTITUDE AND INTERVIEW REGISTRATION",$msg);

if(!$db->error && $retval==true)
{	
	echo("<center>Registration Successful subject to payment of applicable fees \n");
	echo("<br><b>Amount Payable :</b> ");
	echo($amount);
	echo("<br>An email regarding your registration has been sent to your email id<center>");
	}
else
{
	echo("<center>Your email id could not be verified but your response have been recorded contact xxxxxxxxxx for any further assistance<center>");
}*/
?>