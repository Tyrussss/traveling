<?php
	
    
	if(isset($_POST['emainsend']))
{
  //#1
  $to_id = $_POST['emainsend'];
  $message = $_POST['message'];
  $subject = $_POST['subject'];

  //#2
  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 465;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = 'thiendt1608@gmail.com';
  $mail->Password = 'whdqouegrpuqjkog';
  $mail->FromName = "Demo Send Mail";

  //#3
  $mail->addAddress($to_id);
  $mail->Subject = $subject;
  $mail->msgHTML($message);

//#4
  if (!$mail->send()) {
    $error = "Lỗi: " . $mail->ErrorInfo;
    echo 'Failed';
  }
  else {
    echo 'success';
  }
}
else{
  echo 'No data';
}
?>