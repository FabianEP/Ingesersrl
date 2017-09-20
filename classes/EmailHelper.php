<?php
require_once('../public_html/libraries/PHPMailer.php');

class EmailHelper {
    /**
     * @var array collection of error messages
     */
    public  $errors                   = array();

    /*
     * sends an email to the provided email address
     * @return boolean gives back true if mail has been sent, gives back false if no mail could been sent
     */
    public function sendEmail($address, $subject, $message, $file)
    {
        $mail = new PHPMailer;

        // please look into the config/config.php for much more info on how to use this!
        // use SMTP or use mail()
        if (EMAIL_USE_SMTP) {
            // Set mailer to use SMTP
            $mail->IsSMTP();
            //useful for debugging, shows full SMTP errors
            //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            // Enable SMTP authentication
            $mail->SMTPAuth = EMAIL_SMTP_AUTH;
            // Enable encryption, usually SSL/TLS
            if (defined(EMAIL_SMTP_ENCRYPTION)) {
                $mail->SMTPSecure = EMAIL_SMTP_ENCRYPTION;
            }
            // Specify host server
            $mail->Host = EMAIL_SMTP_HOST;
            $mail->Username = EMAIL_SMTP_USERNAME;
            $mail->Password = EMAIL_SMTP_PASSWORD;
            $mail->Port = EMAIL_SMTP_PORT;
        } else {
            $mail->IsMail();
        }

        $mail->From = EMAIL_NO_REPLY;
        $mail->FromName = EMAIL_NO_REPLY_NAME;
        $mail->AddAddress($address);
        $mail->Subject = $subject;
        $mail->IsHTML(true);

        $mail->Body = $message;

        if (isset($file) && $file['error'] == UPLOAD_ERR_OK) {
                $mail->AddAttachment($file['tmp_name'], $file['name']);
        }

        if(!$mail->Send()) {
            $this->errors[] = 'El mensaje no fue enviado. Error:' . $mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    }
}
?>