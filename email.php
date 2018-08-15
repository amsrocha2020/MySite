<?php

	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$comment = $_POST['comment'];

	//Validate first
	if(isset($name)||isset($visitor_email))
	{ ?>
	<script language="javascript" type="text/javascript">
		alert(<?php echo teste; ?> 'Name and email are mandatory!');
		window.location = 'contactos.html';
	</script>
	<?php
	exit;
}

	//if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
		?>
	<!--<script language="javascript" type="text/javascript">
		alert('Bad email!');
		window.location = 'contactos.html';
	</script>-->
	<?php
	//exit;
	//}

	//if(IsInjected($visitor_email))
	//{?>
	<!--<script language="javascript" type="text/javascript">
		alert('Bad email value!');
		window.location = 'contactos.html';
	</script>-->
	<?php
	//exit;
	//}

	$email_subject = "Message from My Web Site.";
	$email_body = "You have received a new message from the user ".$name."\r\n\r\n email: ".$visitor_email."\r\n";


    $mail_status = mail('amsrocha@outlook.com',$email_subject, $email_body);

if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		alert('Thank you for the message. We will contact you shortly.');
		window.location = 'contactos.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Message failed. Please, send an email to amsrocha@outlook.com');
		window.location = 'contactos.html';
	</script>
<?php
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
