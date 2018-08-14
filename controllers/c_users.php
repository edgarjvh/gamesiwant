<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	$action = $_POST['action'];
	
	if ($action == "createAccount"){
		$username = $_POST['username'];
		$useremail = $_POST['useremail'];
		$userpass = $_POST['userpass'];
		$phonenumber = $_POST['phonenumber'];
		$whatsappnumber = $_POST['whatsappnumber'];
		$companyname = $_POST['companyname'];
		$ownername = $_POST['ownername'];
		$companyemail = $_POST['companyemail'];
		$how = $_POST['how'];
		$billingaddress = $_POST['billingaddress'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zipcode'];
		$typebusiness = $_POST['typebusiness'];
		$inbusiness = $_POST['inbusiness'];
		$shippingname = $_POST['shippingname'];
		
		include_once ('connection.php');
		include_once ('encryption.php');
		
		$conn = new connection();
		$conn->connect();
		$enc = new encryption();
		
		$userpass = $enc->encode($userpass);
		$registrationdate = date('Y-m-d h:i:s');
		
		$query1 = "select * from users where useremail = '$useremail'";
		$query2 = "insert into users
					(username,
					useremail,
					userpass,
					phonenumber,
					whatsappnumber,
					companyname,
					ownername,
					companyemail,
					how,
					billingaddress,
					city,
					state,
					zipcode,
					typebusiness,
					inbusiness,
					shippingname,
					registrationdate)
					values
					('$username',
					'$useremail',
					'$userpass',
					'$phonenumber',
					'$whatsappnumber',
					'$companyname',
					'$ownername',
					'$companyemail',
					'$how',
					'$billingaddress',
					'$city',
					'$state',
					'$zipcode',
					'$typebusiness',
					'$inbusiness',
					'$shippingname',
					'$registrationdate');";
		
		$result = $conn->command->query($query1);
		
		if ($result){
			$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
			
			if (count($rows) == 0){
				$result = $conn->command->query($query2);
				if ($result){
					
					$subject = "New user registered for approval";
					$message = file_get_contents("../templates/mail_approval.html");
					$message = str_replace("[username]", $username, $message);
					$message = str_replace("[useremail]", $useremail, $message);
					$message = str_replace("[phonenumber]", $phonenumber, $message);
					$message = str_replace("[registrationdate]", $registrationdate, $message);
					
					require_once '../phpmailer/PHPMailerAutoload.php';
					
					$mail = new PHPMailer;
					$mail->isSMTP();
					$mail->Host = 'mail.gamesiwant.com';
					$mail->SMTPAuth = true;
					$mail->Username = 'accounts@gamesiwant.com';
					$mail->Password = '_gElNrYRfMYJ';
					$mail->SMTPSecure = 'ssl';
					$mail->Port = 465;
					
					try {
						$mail->setFrom('accounts@gamesiwant.com', 'Games I Want | Accounts');
					} catch (phpmailerException $e) {
					}
					$mail->addAddress($useremail, $username);
					$mail->addBCC('edgarjvh@gmail.com');
					//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
					$mail->isHTML(true);
					
					$mail->Subject = $subject;
					$mail->Body    = $message;
					$mail->AltBody = 'plain text';
					
					try {
						if (!$mail->send()) {
							die('ERROR: ' . $mail->ErrorInfo);
						} else {
							die("REGISTERED");
						}
					} catch (phpmailerException $e) {
					}
				}else{
					die("ERROR REGISTERING");
				}
			}else{
				if ($rows[0]{"approved"} == "0"){
					die("FOR APPROVAL");
				}else{
					die("DUPLICATED");
				}
			}
		}else{
			die("ERROR CONSULTING");
		}
	}
	
	if ($action == "sendMessage"){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$usersubject = $_POST['subject'];
		$contentMessage = $_POST['contentMessage'];
		$adminemail = "edgarjvh@gmail.com";
		
		include_once ('connection.php');
		
		$conn = new connection();
		$conn->connect();
		
		$messagedate = date('Y-m-d h:i:s');
		
		$query = "insert into messages
					(username,useremail,subject,contentmessage,messagedate)
					values
					('$name','$email','$subject','$contentMessage','$messagedate')";
		
		$result = $conn->command->query($query);
		
		if ($result){
			$subject = "New user message";
			$message = file_get_contents("../templates/user_message.html");
			$message = str_replace("[username]", $name, $message);
			$message = str_replace("[useremail]", $email, $message);
			$message = str_replace("[subject]", $usersubject, $message);
			$message = str_replace("[message]", $contentMessage, $message);
			$message = str_replace("[datetime]", $messagedate, $message);
			
			require_once '../phpmailer/PHPMailerAutoload.php';
			
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->Host = 'mail.gamesiwant.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'accounts@gamesiwant.com';
			$mail->Password = '_gElNrYRfMYJ';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
			
			try {
				$mail->setFrom('accounts@gamesiwant.com', 'Games I Want | Accounts');
			} catch (phpmailerException $e) {
			}
			$mail->addAddress($adminemail, "ADMIN");
			//$mail->addBCC('edgarjvh@gmail.com');
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
			$mail->isHTML(true);
			
			$mail->Subject = $subject;
			$mail->Body    = $message;
			$mail->AltBody = 'plain text';
			
			try {
				if (!$mail->send()) {
					die('ERROR: ' . $mail->ErrorInfo);
				} else {
					die("SENT");
				}
			} catch (phpmailerException $e) {
				die("ERROR");
			}
		}else{
			die("ERROR");
		}
	}
?>