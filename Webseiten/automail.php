<?php 
ini_set('SMTP','localhost.com');
ini_set('smtp_port',25);
ini_set('sendmail_from','test@test.de');
$to = $_POST['email'];
$subject = "Hallo";
if(isset($to)){
    mail($to,$subject,"Hallo");
    echo 'Diese Mail wurde versendet';
}

?>
