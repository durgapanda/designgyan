<?php
include'db_connection.php';
if(isset($_POST['submit'])){

			$email = stripslashes($_POST['email']);
			$email = mysql_real_escape_string($email);
			
			
			mysql_query("INSERT into Subscribers(email) VALUES('$email');") or die(mysql_error());

		header("Location: thankyou.php");  	
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Coming Soon to a Browser Near You</title>		
		<link rel="stylesheet" type="text/css" href="style.css" />
		
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js'></script>
		<script type='text/javascript' src='javascripts/jquery.tipsy.js'></script>
		<script type='text/javascript'>
		$(function() {
			$('#tipsy').tipsy({fade: true, gravity: 's'});
		});
		</script>
		<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
	</head>
    
	<body>
		<div class="wrapper">
			<br>
<br>

			<div class="hr"></div>
			<h1>Coming Soon to a Browser Near You</h1>
			<p>Unfortunately, we’re not quite ready yet. <strong> But, you can see our progress below:</strong></p>
						
			<section class="progress">
				<div class="progress-bar-container" id="tipsy" title="87% Complete"> <!-- Edit this title for the tooltip pop up -->
					<article class="progress-bar" style="width:87%"  ></article> <!-- Edit the width percentage value to indicate progress -->
				</div>
				<article class="txt-launch-day-hat"></article>
			</section>
			
			<div class="hr"></div>
			<section class="mailing-list">
				<h2>Want to be the first to know when we're ready?</h2>

				<form id="f1" name="f1" method="post">
					<input name="email" type="text" value="your@email.com" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
					<input name="submit" onclick="javascript:return verify();" type="submit" value="Subscribe">	
				</form>
			</section><div class="clear"></div>
			<div class="hr"></div>
		</div>
	</body>
</html>