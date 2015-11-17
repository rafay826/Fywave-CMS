<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$pic = $_POST["pic"];
$subject = trim($_POST["subject"]);
$message = trim($_POST["message"]);

    if ($name == "" or $email == "" or $message == "") {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <style>
                    body
                    {
                        background: #6C7A89;
                    }

                    #error-msg h1
                    {
                        color:white;
                        text-align:center;
                        margin-top:10%;
                        font-family:'arial';
                        font-size:24px;
                    }
                </style>
            </head>
                <body>
                <section id="error-msg">
                    <h1>Please enter the required information!</h1>
                </section>
                </body>
        </html>
<?php
        exit;
    }
    
    foreach( $_POST as $value ){
        if( stripos($value, 'Content-Type:') !== FALSE ){
            ?>
        <!DOCTYPE html>
        <html>
            <head>
                <style>
                    body
                    {
                        background: #6C7A89;
                    }

                    #error-msg h1
                    {
                        color:white;
                        text-align:center;
                        margin-top:10%;
                        font-family:'arial';
                        font-size:24px;
                    }
                </style>
            </head>
                <body>
                <section id="error-msg">
                    <h1>There was a problem with the information you entered!</h1>
                </section>
                </body>
        </html>
<?php
            exit();
        }
    }
    
    if ($_POST["address"]){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <style>
                    body
                    {
                        background: #6C7A89;
                    }

                    #error-msg h1
                    {
                        color:white;
                        text-align:center;
                        margin-top:10%;
                        font-family:'arial';
                        font-size:24px;
                    }
                </style>
            </head>
                <body>
                <section id="error-msg">
                    <h1>You got a problem son!</h1>
                </section>
                </body>
        </html>
<?php
        exit();
    }
    
    require_once("phpmailer/PHPMailerAutoload.php");
    $mail = new PHPMailer;
    
    if(!$mail->ValidateAddress($email)){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <style>
                    body
                    {
                        background: #6C7A89;
                    }

                    #error-msg h1
                    {
                        color:white;
                        text-align:center;
                        margin-top:10%;
                        font-family:'arial';
                        font-size:24px;
                    }
                </style>
            </head>
                <body>
                <section id="error-msg">
                    <h1>Real email address required!</h1>
                </section>
                </body>
        </html>
<?php
    }
    
$email_body = "";
$email_body = $email_body . "Name:" . "&nbsp;" . $name . "<br>";
$email_body = $email_body . "Email:" . "&nbsp;" . $email . "<br><br>";
$email_body = $email_body . "Pic:" . "&nbsp;" . $pic . "<br><br>";
$email_body = $email_body . "Subject:" . "&nbsp;" . $subject . "<br>";
$email_body = $email_body . "Message:" . "&nbsp;" . $message . "<br>";

    
    //Set who the message is to be sent from
$mail->setFrom($email, $name);
//Set who the message is to be sent to
$mail->addAddress('info@fywave.com', 'Rafay Choudhury');
//Set the subject line
$mail->Subject = $name . '&nbsp;' . 'sent you a message!';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($email_body);
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "There was a problem sending your email" . $mail->ErrorInfo;
    exit;
}   
    header('Location: page-contact.php?status=thanks');
    exit();
}
?>
<?php if(isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
        <!DOCTYPE html>
        <html>
            <head>
                <style>
                    body
                    {
                        background: #6C7A89;
                    }

                    #error-msg h1
                    {
                        color:white;
                        text-align:center;
                        margin-top:10%;
                        font-family:'arial';
                        font-size:24px;
                    }
                </style>
            </head>
                <body>
                <section id="error-msg">
                    <h1>Email sent successfully!</h1>
                </section>
                </body>
        </html>
<?php } else { ?>

<!--CLOSE SERVER SUBMISSION-->
<!--BEGIN CLIENT-->

<?php
/*
Template Name: Contact Template
*/
?>

<?php get_header(); ?>
    
    <section id="contact-form-section">
        
        <div class="contact-title"><?php the_title(); ?></div>
    
        <form id="contact-form" method="post" action="<?php echo get_template_directory_uri(); ?>/page-contact.php" enctype="multipart/form-data">
            <table>
                <tbody>
                    <tr>
                        <td><label for="name">Full Name</label><input type="text" name="name"></td>
                        <td><label for="email">Email</label><input type="text" name="email"></td>
                    </tr>
                    <tr class="contact-file">
                        <td><label for="development">Upload Pic!</label><input type="file" name="pic" accept="image/*"></td>
                    </tr>
                    <tr>
                        <td><label for="subject">Subject</label><input type="text" name="subject"></td>
                    </tr>
                    <tr>
                        <td><label for="message">Message</label><textarea name="message"></textarea></td>
                    </tr>
                    <tr style="display:none;">
                        <td>
                            <label for="address">Address</label><input type="text" name="address">
                            <h1>Humans and monkey's should leave this field alone! If you're an alien, welcome! All other species should vacate my digital realm of awesomeness.</h1>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <input class="contact-submit" type="submit" value="send">
            
        </form>
</section>
<?php get_footer(); ?>

<?php } ?>



