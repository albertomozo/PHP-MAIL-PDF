<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);




// variables configuacion smtp para mailer
$mailerDebug = SMTP::DEBUG_SERVER; // en desarrollo
// $mailerDebug = ''; // en produccion
$mailerServer = 'smtp.gmail.com';
$mailerUser = 'albertomozodesarrollador@gmail.com';

$mailerPassword =  '**********' ; // para github
$mailerSMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mailerPort = 465;

// recipientes / buzones




// VARIABLES DE PLANTILLA CORREO
$mailCabecera= '<!-- copiada de  https://webdesign.tutsplus.com/es/build-an-html-email-template-from-scratch--webdesign-12770a -->
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="x-apple-disable-message-reformatting">
	<title></title>
	<!--[if mso]>
	<noscript>
		<xml>
			<o:OfficeDocumentSettings>
				<o:PixelsPerInch>96</o:PixelsPerInch>
			</o:OfficeDocumentSettings>
		</xml>
	</noscript>
	<![endif]-->
	<style>
		table, td, div, h1, p {font-family: Arial, sans-serif;}
	</style>
</head>
<body style="margin:0;padding:0;">
	<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
		<tr>
			<td align="center" style="padding:0;">
				<table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
					<tr>
						<td align="center" style="padding:40px 0 30px 0;background:#70bbd9;">
							<img src="https://assets.codepen.io/210284/h1.png" alt="" width="300" style="height:auto;display:block;" />
						</td>
					</tr>';
$mailPie = '<tr>
<td style="padding:30px;background:#ee4c50;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
        <tr>
            <td style="padding:0;width:50%;" align="left">
                <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                    &reg; Someone, Somewhere 2024<br/><a href="http://www.example.com" style="color:#ffffff;text-decoration:underline;">Unsubscribe</a>
                </p>
            </td>
            <td style="padding:0;width:50%;" align="right">
                <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                    <tr>
                        <td style="padding:0 0 0 10px;width:38px;">
                            <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="padding:0 0 0 10px;width:38px;">
                            <a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>';

