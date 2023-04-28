<?php
$data = json_decode(file_get_contents('php://input'));
$name = htmlspecialchars(trim($data->name));
$phone = htmlspecialchars(trim($data->phone));
$time = htmlspecialchars(trim($data->time));
$from = htmlspecialchars(trim($data->from));
$what = htmlspecialchars(trim($data->what));
$token = "5767878164:AAFihRUMyiX3EuQVXdpU3ewZJSmrD0THWXM";
$chat_id = "-1001699762143";

if(empty($what)) {
	$txt = "<b>" . $from . "</b>\r\n\r\n" . "<b>Имя:</b> " . $name . "\r\n" . "<b>Телефон:</b> " . $phone . "\r\n"  . "<b>Время:</b> " . $time;
} else {
	$txt = "<b>" . $from . "</b>\r\n\r\n" . "<b>Имя:</b> " . $name . "\r\n" . "<b>Телефон:</b> " . $phone . "\r\n"  . "<b>Время:</b> " . $time . "\r\n" . "<b>Что интерисует?:</b> " . $what;
}

$send = urlencode($txt);

try {
	$sendToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$send}");

	if($sendToTelegram){
		echo true;
	} else {
		echo false;
	}
} catch(Exception $e) {
	echo false;
}
?>
