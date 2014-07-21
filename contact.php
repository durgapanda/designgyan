<?php
include'db_connection.php';
if(isset($_POST['submit'])){

            $name = stripslashes($_POST['name']);
			$name = mysql_real_escape_string($name);
			$email = stripslashes($_POST['email']);
			$email = mysql_real_escape_string($email);
			$mobileNum = stripslashes($_POST['mobileNum']);
			$mobileNum = mysql_real_escape_string($mobileNum);
			$message = stripslashes($_POST['message']);
			$message = mysql_real_escape_string($message);
			
			
			mysql_query("INSERT into inquiry(db_name,db_email,db_mobile,db_message)
			VALUES('$name','$email','$mobileNum','$message');") or die(mysql_error());
//=====================Section to send mail======================
$to= 'designgyan2014@gmail.com';
$from = $_POST["email"];
$subject_one ="Inquiry from DesignGyan.com";
$subject_from ="DesignGyan.com web inquiry auto response";

		//--------------------start mail fire-------------------------------------------//
		
		// this is the message to the client received from the contestant
		$message_one = "
<table width='612px' border='0' align='center' cellpadding='0' cellspacing='0' style='font-family:Verdana, Arial, Helvetica, sans-serif;font-size: 14px;background-repeat:no-repeat;color: #000000; border: 1px solid #333333; background-color:#fa726c; marging-left:10px;line-height:20px; '>

  <tr>
		<td height='5' align='left' style='padding-bottom:10px; color:#000000;'><BR><BR>
	
		<span style='color:#000000;padding-left:40px;'>Inquiry for contact</span>
<BR><BR>	
		    <span style='color:#000000;padding-left:60px;'>Name: ".$_POST['name']."</span><BR>
			<span style='color:#000000;padding-left:60px;'>Email Address: ".$_POST['email']."</span><BR>
			<span style='color:#000000;padding-left:60px;'>Mobile Number: ".$_POST['mobileNum']."</span><BR>
			<span style='color:#000000;padding-left:60px;'>Message: ".$_POST['message']."</span><BR>
			<BR>
			</td>
</table>
"; // end of message to the client 

// message from the clients server to the contestant
$message_from = "
<table width='540px' border='0' align='left' cellpadding='0' cellspacing='0' style='font-family:Verdana, Arial, Helvetica, sans-serif;font-size: 14px;background-repeat:no-repeat;color: #000000; marging-left:10px;line-height:20px; '>

  <tr>
		<td height='5' align='left' style='padding-bottom:10px; color:#000000;' ><BR><BR>
		Dear " .$_POST['name']."<BR><BR>
		Thank you for contacting DesignGyan.com. We will get back to you at the earliest possible.
		<BR><BR>
		Have a great day.
		
			</td>
</table>
";//end of message to the contestant
		
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From:info@designgyan.com" ;
			
if(isset($_POST['name']))
{
	$success  = mail($to, $subject_one, $message_one, $headers);
		if ($success) {
			//echo $messageDetails;
            header("Location:thankyou.html");
		} 
		else {
			echo "Mail not send";
		}
		$success_one  =  mail($from, $subject_from, $message_from, $headers);
		if ($success_one) {
			//echo $messageDetails;
            header("Location:thankyou.html");
		} 
		else {
			echo "Mail not send";
		}
}
			
}
?>
