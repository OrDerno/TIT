<?php
//index.php

$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["subject"]))
 {
  $error .= '<p><label class="text-danger">Subject is required</label></p>';
 }
 else
 {
  $subject = clean_text($_POST["subject"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }
 if($error == '')
 {
  require 'class/class.phpmailer.php';
  $mail = new PHPMailer;
  $mail->IsSMTP();        //Sets Mailer to send message using SMTP
  $mail->Host = 'smtpout.secureserver.net';  //Sets the SMTP hosts
  $mail->Port = '80';        //Sets the default SMTP server port
  $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
  $mail->Username = 'xxxxxxxxxx';     //Sets SMTP username
  $mail->Password = 'xxxxxxxxxx';     //Sets SMTP password
  $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = $_POST["email"];     //Sets the From email address for the message
  $mail->FromName = $_POST["name"];    //Sets the From name of the message
  $mail->AddAddress('ibadr365@gmail.com', 'Name');//Adds a "To" address
  $mail->AddCC($_POST["email"], $_POST["name"]); //Adds a "Cc" address
  $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);       //Sets message type to HTML    
  $mail->Subject = $_POST["subject"];    //Sets the Subject of the message
  $mail->Body = $_POST["message"];    //An HTML or plain text message body
  if($mail->Send())        //Send an Email. Return true on success or false on error
  {
   $error = '<label class="text-success">Thank you for contacting us</label>';
  }
  else
  {
   $error = '<label class="text-danger">There is an Error</label>';
  }
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
 }
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Badr &mdash; بَـــــدر </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="https://badrcv.netlify.app/" />
  <meta name="keywords" content="https://badrcv.netlify.app/" />
  <meta name="author" content="https://badrcv.netlify.app/" />

    <!-- 
  //////////////////////////////////////////////////////
    
  Website:    http://https://badrcv.netlify.app/
  Email:      ibadr365@gmail.com

  //////////////////////////////////////////////////////
  -->
  <!-- To run web application in full-screen -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <!-- Microsoft Tiles -->
  <meta name="msapplication-config" content="browserconfig.xml" />
  <link rel="alternate" hreflang="es">
  <link rel="alternate" hreflang="x-default" />
    <!-- Facebook and Twitter integration -->
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <!-- Favicons -->
  <link href="images/favicon.png" rel="icon">
  <link href="images/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
  
  <!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="css/icomoon.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Flexslider  -->
  <link rel="stylesheet" href="css/flexslider.css">
  <!-- Theme style  -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Modernizr JS -->
  <script src="js/modernizr-2.6.2.min.js"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->

  </head>
  <body>
  <div id="fh5co-page">
    
    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
    <aside id="fh5co-aside" role="complementary" class="border js-fullheight">

      <h1 id="fh5co-logo"><a href="https://https://badrcv.netlify.app//">badr</a></h1>
      <nav id="fh5co-main-menu" role="navigation">
        <ul>
          <li><a href="https://https://badrcv.netlify.app/">Home</a></li>
          <li><a href="about">About</a></li>
          <li><a href="portfolio">Portfolio</a></li>
          <li><a href="skills">Skills</a></li>
          <li class="fh5co-active"><a href="contact">Contact</a></li>
        </ul>
      </nav>

      <div class="fh5co-footer">
        <p><small>&copy; 2020 badr. All Rights Reserved.</span> <span>Designed by <a href="mailto:ibadr365@gmail.com">Islam</a> </span> <span>Freelancer: <a>Front-end</a></span></small></p>
        <ul>
          <li><a href="https://www.facebook.com/eslam.badr.3726">
            <i class="icon-facebook2"></i></a></li>
          <li><a href="mailto:ibadr365@gmail.com">
            <i class="icon-google"></i></a></li>
          <li><a href="https://github.com/OrDerno">
            <i class="icon-github"></i></a></li>
          <li><a href="https://www.behance.net/islammohamed26">
            <i class="icon-behance"></i></a></li> 
        </ul>
      </div>

    </aside>

    <div id="fh5co-main">
      <div class="fh5co-more-contact">
        <div class="fh5co-narrow-content">
          <div class="row">
            <div class="col-md-4">
              <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                <div class="fh5co-icon">
                  <i class="icon-globe"></i>
                </div>
                <div class="fh5co-text">
                  <p><a href="https://https://badrcv.netlify.app/" target="blank">https://badrcv.netlify.app</a><br>
                <a href="mailto:ibadr365@gmail.com">ibadr465@gmail.com</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                <div class="fh5co-icon">
                  <i class="icon-map"></i>
                </div>
                <div class="fh5co-text">
                  <p>Mansourah, <br> Ad Daqahliyah, Egypt</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                <div class="fh5co-icon">
                  <i class="icon-phone"></i>
                </div>
                <div class="fh5co-text">
                  <p><a href="tel://">+2012 2856 739</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
        
        <div class="row">
          <div class="col-lg-12 col-md-12" style="text-align: center; top: 10px">
            <h2 style="font-family: Andale Mono,monospace;font-size: 30px;">CONTACT ME</h2>
            <div class="line" style="bottom: 15px"></div>
          </div>
        </div>
        <form action="">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" required="">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email" required="">
                  </div>
                  <div class="form-group">
                    <input type="tel" class="form-control" placeholder="Phone" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea name="" id="message" cols="30" rows="7" class="form-control" placeholder="Message" required=""></textarea>
                  </div>
                  <div class="form-group" style="text-align: center; ">
                    <input type="submit" class="btn btn-primary btn-md" value="Send">
                  </div>
                </div>
                
              </div>
            </div>
            
          </div>
        </form>
      </div>
      <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54695.30826974327!2d31.41785923629166!3d31.0413814216747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f79db7a9053547%3A0xf8dab3bbed766c97!2z2KfZhNmF2YbYtdmI2LHYqdiMINin2YTZhdmG2LXZiNix2KkgKNmC2LPZhSAyKdiMINin2YTZhdmG2LXZiNix2KnYjCDYp9mE2K_ZgtmH2YTZitip!5e0!3m2!1sar!2seg!4v1607083304632!5m2!1sar!2seg" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>  
    </div>
  </div>

  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <!-- jQuery Easing -->
  <script src="js/jquery.easing.1.3.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Waypoints -->
  <script src="js/jquery.waypoints.min.js"></script>
  <!-- Flexslider -->
  <script src="js/jquery.flexslider-min.js"></script>
  <!-- Google Map --
  <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyBK-SUMLuZ0IauSS2mi9Zjimn4eGKtT2IY"></script>
  <script src="js/google_map.js"></script>
  
  
   MAIN JS -->
  <script src="js/main.js"></script>

  </body>
</html>

