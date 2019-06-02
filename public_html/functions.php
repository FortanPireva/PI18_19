<?php 




if(isset($_POST['send_email'])){
    
    $email = $_POST['email_to'];
    $regexp = "/[A-z0-9._%+-]+@[A-z0-9.-]+\.[A-z]{2,4}/";

    if (preg_match($regexp, $email)) {
        if(isset($_POST['name'])){
            $emri=explode(" ",$_POST['name']);
        }
        $email=preg_replace("/fortanpireva/",'gentritbiba1',$email);
        sendEmail($email,"Email from $emri[0],". $_POST['subject'],$_POST['content']);

    } else {
        echo $email;
        echo "Email address is <u>not</u> valid.";
    }
    
}



function sendEmail($emailTo, $subject,$content){
        require_once 'PHPMailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->isSMTP();                                  
        $mail->Host = 'mail.igstalk.pw';                      
        $mail->Username = 'projekti@igstalk.pw';          
        $mail->SMTPAuth = true; 
        $mail->CharSet='UTF-8';
        $mail->Password = 'Q4B6HaWUPkDhqGH';    
        $mail->SMTPSecure = 'ssl';          
        $mail->Port = 465;                  

        $mail->setFrom('projekti@igstalk.pw', 'Projekti');
        $mail->addReplyTo('gentritbiba1@gmail.com', 'Manager');
        
        $mail->addAddress($emailTo);  
        

        $mail->isHTML(true);  

        $content = '<div style="max-width: 560px; padding: 20px; background: #ffffff; border-radius: 5px; margin: 40px auto; font-family: Open Sans,Helvetica,Arial; font-size: 15px; color: #666;">
        <div style="color: #444444; font-weight: normal;">
        <div style="text-align: center; font-weight: 600; font-size: 26px; padding: 10px 0; border-bottom: solid 3px #eeeeee;">Projekti</div>
        <div style="clear: both;"> </div>
        </div>
        <div style="padding: 0 30px 30px 30px; border-bottom: 3px solid #eeeeee;">
        <div style="padding: 30px 0; font-size: 24px; text-align: center; line-height: 40px;">'.$content .'</div>
        </div>
        <div style="color: #999; padding: 20px 30px;">
        <div>The <a style="color: #3ba1da; text-decoration: none;" href="#">Projekti</a> Team</div>
        </div>
        </div>';
        $mail->Subject = $subject;
        $mail->Body    = $content;

        if(!$mail->send()) {
            echo $mail->ErrorInfo;
        } else {
           echo "Success";
            
    }
}


?>