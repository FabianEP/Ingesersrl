<?php
	require_once('config.php');
	require_once(__DIR__.'\classes\EmailHelper.php');
	require_once(__DIR__.'\libraries\LogManager.php');


	$logManager = new LogManager();
	$result = false;

	if (!empty($_POST)){

		$emailHelper = new EmailHelper();

		if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['telefono']))
		{
			$subject = EMAIL_WORK_SUBJECT . $user_name;
			$user_name = $_POST['apellido'] .", " .$_POST['nombre'];

			$body = 'Formulario de '. $user_name .' ('. $_POST['email'] .'), <br> ';
			$body = $body . "Nombre: " . $_POST['nombre'] . " <br>";
			$body = $body . "Apellido: " . $_POST['apellido'] . " <br>";
			$body = $body . "Fecha de nacimiento: " . $_POST['nacimiento'] . " <br>";
			$body = $body . "Domicilio: " . $_POST['domicilio'] . " <br>";
			$body = $body . "DNI: " . $_POST['dni'] . " <br>";
			$body = $body . "Area: " . $_POST['area'] . " <br>";
			$body = $body . "Oficio: " . $_POST['oficio'] . " <br>";
			$body = $body . "Domicilio: " . $_POST['domicilio'] . " <br>";
			$body = $body . "Email: " . $_POST['email'] . " <br>";
			$body = $body . "Teléfono: " . $_POST['telefono'] . " <br>";
			$body = $body . "Antecedentes: " . $_POST['antecedentes'] . " <br>";
			$body = $body . "Observaciones: " . $_POST['observaciones'] . " <br>";

			$logManager->appendfileV2("WwuEmailContact2", "Hola! v2");

			$result = $emailHelper->sendGlobalEmail($subject, $body, $_FILES['adjunto']);
		}

		if (isset($result) && !$result){
			$err_msg = "Email contact error: " . var_dump($emailHelper->errors);

			$logManager->appendfileV2("WwuEmailContact", $err_msg);
		}


	}
?>