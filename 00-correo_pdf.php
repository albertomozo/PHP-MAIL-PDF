<?php
include 'inc/config.php';
// datos del curso
/* $data = file_get_contents('datos/cursos.json');
//print_r ($data);

$datos = json_decode($data, true);
//print_r ($datos);
recorrer($datos);
function recorrer($datos) {  
    foreach ($datos as $key => $value) {
        if (is_array($value)) {
            echo "<p>$key</p>";
            recorrer($value);
        } else {
            echo $key. ': '. $value. '<br>';
        }
    }
}

$alumnos = $datos['alumnos'];
print_r ($alumnos); */

include('inc/pdf_00.php');// genera la variable $data leyendo el json







    try {
        //Server settings
    
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
        $mail->SMTPDebug =   $mailerDebug ;              //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $mailerUser;                     //SMTP username
        $mail->Password   = $mailerPassword;                               //SMTP password
        $mail->SMTPSecure = $mailerSMTPSecure;
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('albertomozodesarrollador@gmail.com', 'albertomozodesarrollador@gmail.com');
        $mail->addAddress('albertomozodesarrollador@gmail.com');     //Add a recipient
        for ($i = 0; $i < count($data['alumnos']); $i++)
        {
            $mail->addBCC($data['alumnos'][$i]['email']);
        }
       
        //Attachments
       
       
        $contenido = $mailCabecera;
        $contenido .= '<tr>
        <td style="padding:36px 30px 42px 30px;">
            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                    <td style="padding:0 0 36px 0;color:#153643;">
                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Notificacion</h1>
                        <p>Bienvenid@ a nuestra  web</p>
                        <p>Les enviamos el documento pdf adjunto</p>
                    </td>
                </tr>
            </table>
        </tr>';
        $contenido .= $mailPie;
        $asunto = 'Aviso Importante';  

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $adjunto = $_SERVER['DOCUMENT_ROOT'] . "/PHP-MAIL-PDF/pdf/$nombrearchivo";
        $mail->addAttachment($adjunto);  
        $mail->Body    = $contenido;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

