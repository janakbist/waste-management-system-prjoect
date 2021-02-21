<?php
include('database.inc');
$msg ="";
if(isset($_POST['submit'])){
    $fname = mysqli_real_escape_string($con,$_POST['fname']);
    $lname = mysqli_real_escape_string($con,$_POST['lname']);
    $contactEmail = mysqli_real_escape_string($con,$_POST['contactEmail']);
    $contactPhone = mysqli_real_escape_string($con,$_POST['contactPhone']);
    $comment = mysqli_real_escape_string($con,$_POST['comment']);
    mysqli_query($con,"insert into contact(fname,lname,contactEmail,contactPhone,comment)values('$fname','$lname','$contactEmail','$contactPhone','$comment')");
    $msg = "Thank you $fname $lname for your feedback!";

     $html = "<table><tr><td>$fname</td></tr><tr><td>$lname</td></tr><tr><td>$contactEmail</td></tr><tr><td>$contactPhone</td></tr><tr><td>$comment</td></tr></table>";
   //   include('PHPMailerAutoload.php');
   // require_once('PHPMailerAutoload.php');
   //   $mail = new PHPMailer(true);
   //   $mail->isSMTP();
   //   $mail->SMTPAuth = true;
   //   $mail->SMTPSecure='tls';
   //   $mail->Host='smtp.gmail.com';
   //   $mail->Port= '587';
   //   $mail->isHTML(true);
   //   $mail->Username='bistajanak303@gmail.com';
   //   $mail->Password='jacksonbist2612';
   //   $mail->SetFrom('no-reply@howcode.org');     
   //   $mail->Subject='Hello world';
   //   $mail->Body=$html;     
   //   $mail->AddAddress('francis@howcode.org');
   //   $mail->SMTPOptions=array('ssl'=>array(
   //       'verify_peer'=>false,
   //       'verify_peer_name'=>false,
   //       'allow_self_signed'=>false
   //   ));
   //   if($mail->send()){
   //       echo "Mail send";
   //   }else{
   //       echo "Error occur";
   //   }
   $error ="";
   if($error != ''){
      require_once('PHPMailerAutoload.php');
      require'phpGmailSMTP/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host ='smtp.gmail.com';
        $mail->Port = '587';
        $mail->SMTPAuth = true;
        $mail->Username='bistajanak303@gmail.com';
        $mail->Password='';
        $mail->SMTPSecure = 'TLS';
        $mail->From = $_POST["contactEmail"];
        $mail->FromName = $_POST["fname"];
        $mail->SetFrom('bistajanak303@gmail.com','janak'); 
        $mail->AddAddress('mbist6208@gmail.com','janaki');
        $mail->AddCC($_POST["contactEmail"],$_POST["fname"]);
        $mail->WordWrap = 50;     
        $mail->IsHTML(true);
        $mail->Subject='Hello world';
        $mail->Body = $html; 
        $mail->SMTPOptions = array('ssl'=>array(
               'verify_peer'=>false,
               'verify_peer_name'=>false,
               'allow_self_signed'=>false
            ));
        
        
        if($mail->send()){
            // echo "Mail send";
            $error = '<label> mail send</label>';
        }else{
            // echo "Error occur";
            $error = '<label> Error occured!</label>';
        }


   }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>contact us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type ="text/css" href ="contact.css">
    <link rel="stylesheet" type="text/css" href="/React-App/my-app/public/style.css">
</head>
<body>
      <!-- Home tab references start -->
      <div class="navbar">
         <a class="active" href="/React-App/my-app/public/index.html"><i class="fa fa-fw fa-home"></i> Back to Home</a> 
        </div>
         <!-- Home tab references ends -->

<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="contact-form.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
<div class="contact-section">
<h2 class="ct-section-head">
   CONTACT US
</h2>
<div class="row contact-fields">
<div class="col-md-8 left-form">
   <?php 
   $error ='';   
   echo $error; 
   ?>
   <form method="post" action="">
      <div class="form-group">
         <label class="sr-only" for="fname">First Name *</label>
         <input class="required form-control" id="fname" name="fname" placeholder="First Name&nbsp;*" type="text"required>
      </div>
      <div class="form-group">
         <label class="sr-only" for="lname">Last Name *</label>
         <input class="required form-control" id="lname" name="lname" placeholder="Last Name&nbsp;*" type="text"required>
      </div>
      <div class="form-group">
         <label class="sr-only" for="contactEmail">Email *</label>
         <input class="required form-control h5-email" id="contactEmail" name="contactEmail" placeholder="Email&nbsp;*" type="email">
      </div>
      <div class="form-group">
         <label class="sr-only" for="contactPhone">Phone *</label>
         <input class="required form-control h5-phone" id="contactPhone" name="contactPhone" placeholder="Phone&nbsp;*" type="number">
      </div>
      <div class="form-group">
         <label class="sr-only" for="comment">Type your message here</label>
         <textarea class="required form-control" id="comment" name="comment" placeholder="Type your message here&nbsp;*" rows="6"></textarea>
      </div>
      <button class="btn btn-accent" type="submit"name="submit">Submit</button> 
      <span style="color: red;"><b><?php echo $msg;?></b></span>
   </form>
</div>
<div class="col-md-4 contact-info">
<div class="phone">
   <h2>Call</h2>
   <a href="tel:+977">16609952111</a>
</div>
<div class="email">
   <h2>Email</h2>
   <a href="mailto:info@bheemdattamun.gov.np bmuncipality@gmail.com">info@bheemdattamun.gov.np bmuncipality@gmail.com</a>
</div>
<div class="location">
   <h2>Visit</h2>
   <p>  Bheemdatt Municipality,</br>
       Mahendranagar, </br>
      kanchanpur , </br>
      Sudurpacchhim state ,Nepal
   </p>
</div>
</body>
</html>