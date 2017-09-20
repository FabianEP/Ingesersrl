<?php
require_once('../public_html/classes/EmailHelper.php');

class EmailService {
	/**
     * @var array collection of error messages
     */
    public  $errors                   = array();

	public function SendContactEmail($subject, $body) {
		$emailHelper = new EmailHelper();

		$result = $emailHelper->sendEmail(EMAIL_CONTACT_USERNAME, $subject, $body, null);

		$this->errors[] = $emailHelper->errors;
		
		return $result;
	}

	public function SendRRHHEmail($subject, $body, $file) {
		$emailHelper = new EmailHelper();

		$result = $emailHelper->sendEmail(EMAIL_RRHH_USERNAME, $subject, $body, $file);
		
		$this->errors = $emailHelper->errors;

		return $result;
	}

}
?>