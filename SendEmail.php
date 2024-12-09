<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    //require_once("PHPMailer_5.2.4/class.phpmailer.php");
    //require ("PHPMailer_5.2.4/class.smtp.php");
    require("./PHPMailer-6.9.3/src/PHPMailer.php");
    require("./PHPMailer-6.9.3/src/Exception.php");
    require("./PHPMailer-6.9.3/src/SMTP.php");

function SendEmail($to, $pCode)
{
	$mail = new PHPMailer(true);
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	//$mail->From= "sadat.chowdhury@invia.com.au";
	$mail->From= "sadat.chowdhury@invia.com.au";
	$mail->FromName = "Web Rating";
	//$mail->Host = 'smtp.office365.com';
	//$mail->SMTPSecure = 'tls';
	//$mail->Port       = 587;
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPSecure = 'ssl';
	$mail->Port       = 465;
	$mail->SMTPAuth   = true;
	//$mail->Username = 'optusbusinessecontractssupport@invia.com.au';
	//$mail->Password = 'Qu@ck234';
	$mail->Username = 'sadat1072@gmail.com';
	$mail->Password = 'xppkyjzotmynwzkp';
	$mail->AddAddress($to, $to);
	//$mail->SMTPDebug  = 3;
	//$mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";}; //$mail->Debugoutput = 'echo';
	$mail->IsHTML(true);

	$mail->Subject = 'We Rating Verification Code';
	$mail->Body    = '<html><h1>'.$pCode.'</h1></html>';

    if(!$mail->send()) {
		return 1;
		//echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		return 0;
        //echo 'Email Sent ';
	}
}
?>