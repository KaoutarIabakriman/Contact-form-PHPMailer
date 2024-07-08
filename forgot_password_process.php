<?php
    if(isset($_POST['reset'])) {
        $email = $_POST['email'];
    }
    else {
        exit();
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'mail/Exception.php';
    require 'mail/PHPMailer.php';
    require 'mail/SMTP.php';
    
   
    $mail = new PHPMailer(true);
    
    try {
     
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'helloitsmekoki@gmail.com';                     
        $mail->Password   = 'keio icno qnrj ryhy';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
        $mail->Port       = 587;                                
       
        $mail->setFrom('helloitsmekoki@gmail.com', 'Admin');
        $mail->addAddress($email);     // Add a recipient

        $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);
    
   
        $mail->isHTML(true);                                 
        $mail->Subject = 'Password Reset';
        $mail->Body    = 'To reset your password click <a href="http://localhost/my_projet/change_password.php?code='.$code.'">here</a>. Reset your password in a day.';


        $conn = new mySqli('localhost', 'root', '', 'register');

        if($conn->connect_error) {
            die('Could not connect to the database.');
        }

        $verifyQuery = $conn->query("SELECT * FROM users WHERE email = '$email'");

        if($verifyQuery->num_rows) {
            $codeQuery = $conn->query("UPDATE users SET code = '$code' WHERE email = '$email'");
                
            $mail->send();

            echo '
           
             <script>
       alert("Message has been sent, check your email");
       
</script>
';
        
        }
        $conn->close();
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }    
?>
