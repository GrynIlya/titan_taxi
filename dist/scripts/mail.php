<?php
header('Content-Type: application/json');

if(isset($_POST['tel'])) {
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "phones@yandex-tt.ru,grynilia@gmail.com,taron9119@mail.ru";
    $email_subject = "New phone from site"; 
    $tel = $_POST['tel']; // required
    $phone_exp = '/^[+]{0,1}[0-9]{11}$/';
	if(!preg_match($phone_exp,$tel)) {
		$myObj->error = "The phone format you entered does not appear to be valid.";
		$myObj->result = false;
	} else {
		$email_message = "На сайт добавлен новый номер телефона.\n\n";
		$email_message .= "Телефон: ".$tel."\n\n";
		$email_message .= "Хорошего дня.\n";
		$email_message .= "С уважением,\nавтоматизация yandex-tt.ru";
		// create email headers
		$headers = 'From: info@yandex-tt.ru'."\r\n".
		'X-Mailer: PHP/' . phpversion();
		mail($email_to, $email_subject, $email_message, $headers);  
		$myObj->message = "Message sended.";
		$myObj->result = true;
	}
} else {
	$myObj->error = "We are sorry, but there appears to be a problem with the form you submitted.";
	$myObj->result = false;
}
$myJSON = json_encode($myObj);
echo $myJSON;
die();
?>