<?php
header('Content-Type: text/html; charset=utf-8');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './phpmailer/vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    $strName = isset($_POST['name']) ? $_POST['name'] : '';
    $strEmail = isset($_POST['email']) ? $_POST['email'] : '';
    $strPhone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $strMessage = isset($_POST['message']) ? $_POST['message'] : '';


    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->CharSet = 'UTF-8';
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'eogksusa@gmail.com';                     //SMTP username
    $mail->Password   = 'sanghun@1';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($strEmail);
    //$mail->setTo('eogksusa@gmail.com');
    $mail->addAddress('eogksusa@gmail.com');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');    

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '문의합니다.';
    $mail->Body    = 
                    "<table style=\"width: 100%;\">
                    <tr>
                        <th>이름</th>
                        <td>{$strName}</td>
                        <th>이메일</th>
                        <td>{$strEmail}</td>
                    </tr>
                    <tr>
                        <th>연락처</th>
                        <td>{$strPhone}</td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td>{$strMessage}</td>
                    </tr>
                    </table>";

    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    $result['success'] = true;

} catch (Exception $e) {    
    $result['success'] = false;
    $result['msg'] = $mail->ErrorInfo;
}


    echo json_encode($result);
    exit;