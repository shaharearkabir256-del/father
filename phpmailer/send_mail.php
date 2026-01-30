<?php    
	require'PHPMailerAutoload.php';
	$mail=new PHPMailer;
	$mail->isSMTP();                          // Set mailer to use SMTP
	$mail->Host='mail.privateemail.com';           // Specify main and backup SMTP servers
	$mail->SMTPAuth=true;                   // Enable SMTP authentication
	$mail->Username='info@dailyincomebazar.com';         // SMTP username
	$mail->Password='Dd123456@#';     // SMTP password  
	$mail->SMTPSecure='ssl';                // Enable TLS encryption, `ssl` also accepted
	$mail->Port=465;                        // TCP port to connect to

	$mail->From='info@dailyincomebazar.com';
	$mail->FromName='Daily Income Bazar';
	$mail->addAddress("$email", "$ename");     // Add a recipient Name is optional
	$mail->addReplyTo('info@dailyincomebazar.com', 'Daily Income Bazar');
	$mail->WordWrap=50;        // Set word wrap to 50 characters
	$mail->isHTML(true);         // Set email format to HTML

	$mail->Subject="$subject";  //Subject for mail clients
	$mail->Body="$message";		//Body for HTML mail clients	
	$mail->AltBody="$message"; //Body for non-HTML mail clients

	if(!$mail->send()){
		$error=$mail->ErrorInfo;
	} else {
		$error=0;
	}
?>