<?php
	require_once('config.php');
	require_once(__DIR__.'\classes\EmailService.php');
	require_once(__DIR__.'\libraries\LogManager.php');

	$logManager = new LogManager();
	$result = false;

	if (!empty($_POST)){

		$emailService = new EmailService();

		if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['telefono']))
		{
			$user_name = $_POST['apellido'] .", " .$_POST['nombre'];
			$subject = EMAIL_WORK_SUBJECT . $user_name;

			$body = 'Formulario de '. $user_name .' ('. $_POST['email'] .'), <br> <br>';
			$body = $body . "<b>Nombre:</b> " . $_POST['nombre'] . " <br>";
			$body = $body . "<b>Apellido:</b> " . $_POST['apellido'] . " <br>";
			$body = $body . "<b>Fecha de nacimiento:</b> " . $_POST['nacimiento'] . " <br>";
			$body = $body . "<b>Domicilio:</b> " . $_POST['domicilio'] . " <br>";
			$body = $body . "<b>DNI:</b> " . $_POST['dni'] . " <br>";
			$body = $body . "<b>Area:</b> " . $_POST['area'] . " <br>";
			$body = $body . "<b>Oficio:</b> " . $_POST['oficio'] . " <br>";
			$body = $body . "<b>Domicilio:</b> " . $_POST['domicilio'] . " <br>";
			$body = $body . "<b>Email:</b> " . $_POST['email'] . " <br>";
			$body = $body . "<b>Teléfono:</b> " . $_POST['telefono'] . " <br>";
			$body = $body . "<b>Antecedentes:</b> " . $_POST['antecedentes'] . " <br>";
			$body = $body . "<b>Observaciones:</b> " . $_POST['observaciones'] . " <br>";

			$result = $emailService->SendRRHHEmail($subject, $body, $_FILES['adjunto']);
		}

		if (isset($result) && !$result){
			foreach ($emailService->errors as $message) {
				$err_msg = "Email RRHH contact error: " . $message;
				echo $err_msg;
				$logManager->appendfileV2("RRHHEmailContact", $err_msg);
			}
		}
	}
?>