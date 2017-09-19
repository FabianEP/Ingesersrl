<?php

	define("EMAIL_USE_SMTP", true);
	define("EMAIL_SMTP_HOST", "smtp.gmail.com");
	define("EMAIL_SMTP_USERNAME", "contactocajasar@gmail.com");
	define("EMAIL_SMTP_PASSWORD", "readytotest");
	define("EMAIL_SMTP_AUTH", true);
	define("EMAIL_SMTP_PORT", 587);
	define("EMAIL_SMTP_ENCRYPTION", "tls");

	define("EMAIL_CONTACT_USERNAME", "contactocajasar@gmail.com");
	define("EMAIL_RRHH_USERNAME", "contactocajasar@gmail.com");

	/**
	 * Configuration for: email contact
	 */
	define("EMAIL_NO_REPLY", "no-reply@example.com");
	define("EMAIL_NO_REPLY_NAME", "Ingeser SRL");
	define("EMAIL_CONTACT_SUBJECT", "Contacto");
	define("EMAIL_WORK_SUBJECT", "Contacto de trabajo de:");

	require_once('\classes\EmailService.php');

	$result = false;

	$emailService = new EmailService();

	$subject = EMAIL_CONTACT_SUBJECT;

	$body = 'Mensaje de Test (test@example.com), <br> Hola! :) ';

	$result = $emailService->SendContactEmail($subject, $body);

	if (isset($result) && !$result){
		foreach ($emailService->errors as $message) {
			$err_msg = "Email contact error: " . $message;
			echo $err_msg;
		}
	}
	else
	{
		echo "Mail Sent <br>";
	}

	echo "end";
?>