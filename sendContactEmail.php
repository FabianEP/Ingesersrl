<?php
	try
	{
		require_once('config.php');
		require_once(__DIR__.'\classes\EmailService.php');
		require_once(__DIR__.'\libraries\LogManager.php');

		$logManager = new LogManager();
		$result = false;

		if (!empty($_POST)){

			$emailService = new EmailService();

			if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
			{
				$subject = EMAIL_CONTACT_SUBJECT;

				$body = 'Mensaje de '. $_POST['name'] .' ('. $_POST['email'] .'), <br> '. $_POST['message'];

				$result = $emailService->SendContactEmail($subject, $body);
			}

			if (isset($result) && !$result){
				foreach ($emailService->errors as $message) {
					$err_msg = "Email contact error: " . $message;
					$logManager->appendfileV2("EmailContact", $err_msg);
				}
			}
		}
	}
	catch(Exception $e)
	{
		$logManager->appendfileV2("EmailContact", $e->getMessage());
	}
?>