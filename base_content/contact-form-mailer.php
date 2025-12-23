<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Contact Form Response</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Logo -->
						<h1><a href="/" id="logo"><img src="content/static/images/good-shepherd.png" width="40%" alt="" /></a></h1>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="/">Home</a></li>
								<li>
									<a href="congregation.php">About Us</a>
									<ul>
										<li><a href="congregation.php">Our Congregation</a></li>
										<li><a href="lutheran.html">What's a Lutheran?</a></li>
										<li><a href="purpose.html">Our Purpose</a></li>
									</ul>
								</li>
								<li><a href="worship.php">Worship</a></li>
                <li>
                    <a href="ministry.html">Our Ministries</a>
                  <ul>
                    <li><a href="ministry.html">Ministry Areas</a></li>
                    <li><a href="faithink.html">Faith Inkubators</a></li>
                  </ul>
                </li>
                <li>
                  <a href="whats_on.php">What's On</a>
                  <ul>
                    <li><a href="whats_on.php">Calendar</a></li>
                    <li><a href="facilities.html">Hall Usage</a></li>

                  </ul>
                </li>
                <li class="current"><a href="contact.html">Contact Us</a></li>
							</ul>
						</nav>
				</div>

				<!-- Main -->
				
      <!-- Main -->
      <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';

      if (isset($_POST['Email'])) {
        $path = realpath('../smtp_config.ini');
        $config = parse_ini_file($path, true);
          function problem($error)
          {
              echo "<section class='wrapper style1'>
                <div class='container'>
                  <div id='content'>";
              echo "We are very sorry, but there were error(s) found with the form you submitted. ";
              echo "These errors appear below:<br><br>";
              echo $error . "<br>";
              echo "Please go back and fix these errors.<br><br>";
              echo"        </div>
                    </div>
                  </section>";

              echo '

					<div id="footer">
					<div class="container" style="color:#eee">
						<div class="row">
							<section class="col-4 col-6-narrower col-12-mobilep">
								<h3>Quick Links</h3>
								<div style="float: left; width: 50%;">
									<ul class="links">
										<li><a href="/">Home</a></li>
										<li><a href="congregation.php">Our Congregation</a></li>
										<li><a href="lutheran.html">What\'s a Lutheran?</a></li>
										<li><a href="purpose.html">Our Purpose</a></li>
										<li><a href="worship.php">Worship</a></li>

									</ul>
								</div>
								<div style="float: right; width: 50%;">
									<ul class="links">
										<li><a href="ministry.html">Ministry Areas</a></li>
										<li><a href="faithink.html">Faith Inkubators</a></li>
										<li><a href="whats_on.php">Calendar</a></li>
										<li><a href="facilities.html">Hall Usage</a></li>
										<li><a href="contact.html">Contact Us</a></li>
									</ul>
								</div>
							</section>
							<section class="col-3 col-6-narrower col-12-mobilep">
								<h3>Contact Us:</h3>
								<p>115 Eumundi Road, <br> Noosaville, 4566</p>
								<p>07 5455 8645 <br> <a href="mailto: goodshepherd.noosa.qld@lca.org.au">goodshepherd.noosa.qld@lca.org.au</a></p>
								<ul class="icons">
									<li><a href="https://www.facebook.com/GoodShepherdLutheranChurchNoosa/" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="mailto: goodshepherd.noosa.qld@lca.org.au" class="icon regular fa-envelope"><span class="label">GitHub</span></a></li>
								</ul>
							</section>
							<section class="col-5 col-12-narrower">
								<h2 style="text-align:center; margin-top:2em"><a href="https://www.lca.org.au"><img src="content/static/images/lca_logo.png" width="250 vw" alt="" /></a></h2>
							</section>
						</div>
					</div>

					<!-- Copyright -->
						<div class="copyright">
							<ul class="menu">
								<li>&copy; Good Shepherd Lutheran Church Noosa. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>

				</div>
    </div>

    <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.dropotron.min.js"></script>
      <script src="assets/js/browser.min.js"></script>
      <script src="assets/js/breakpoints.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>

  </body>
</html>
';



              die();
          }

          // validation expected data exists
          if (
              empty($_POST['Name']) ||
              empty($_POST['Email']) ||
              empty($_POST['Message'])
          ) {
              problem('We are sorry, but one of the entries appears to be blank.');
          }


          $name = $_POST['Name']; // required
          $email = $_POST['Email']; // required
          $message = $_POST['Message']; // required


          $error_message = "";
          $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';


            // build the request url
            $verify_url = 'https://www.google.com/recaptcha/api/siteverify';
            $args = array('secret' => $config['smtp']['recaptcha_key'],
                          'response' => $_POST['g-recaptcha-response'],
                          'remoteip' => $_SERVER['REMOTE_ADDR']);
            $request_url = $verify_url.'?'.http_build_query($args);

            // a JSON object is returned
            $response = file_get_contents($request_url);

            // decode the information
            $json = json_decode($response, true); // true decodes it to an array instead of a PHP object

            // handle the response
            if($json['success'] != 1) {
            	$error_message .= 'reCAPTCHA Failed to Authenticate.<br>';
            }

          if (!preg_match($email_exp, $email)) {
              $error_message .= 'The Email address you entered does not appear to be valid.<br>';
          }

          $string_exp = "/^[A-Za-z .'-]+$/";

          if (!preg_match($string_exp, $name)) {
              $error_message .= 'The Name you entered does not appear to be valid.<br>';
          }

          if (strlen($message) < 2) {
              $error_message .= 'The Message you entered does not appear to be valid.<br>';
          }

          if ( preg_match( "/[\r\n]/", $name ) || preg_match( "/[\r\n]/", $email ) ) {
             $error_message .= 'There is an email sanitisation error<br>';

          }

          if (strlen($error_message) > 0) {
              problem($error_message);
          }

          $email_message = "<b>Website contact form details below:</b><br><br>";

          function clean_string($string)
          {
              $bad = array("content-type", "bcc:", "to:", "cc:", "href", "\r\n");
              return str_replace($bad, "", $string);
          }

          $email_message .= "<b>Name:</b> " . clean_string($name) . "<br>";
          $email_message .= "<b>Email:</b> " . clean_string($email) . "<br>";
          if (
            !empty($_POST['Phone'])
          ){
            $email_message .= "<b>Phone:</b> " . clean_string($_POST['Phone']) . "<br>";
          }
          $email_message .= "<br><b>Message:</b> " . clean_string($message) . "<br>";




        $email_to = "goodshepherd.noosa.qld@lca.org.au";

        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;

        $mail->Username = $config['smtp']['un'];
        $mail->Password = $config['smtp']['pw'];
        $mail->setFrom($config['smtp']['un'], 'Contact Form Mailer');

        $mail->addReplyTo($email, clean_string($name));
        $mail->addAddress($email_to, 'Good Shepherd Lutheran Church');
        $mail->Subject = "New Website Contact Form Message";
        $mail->msgHTML(file_get_contents('message.html'), __DIR__);
        $mail->Body = $email_message;

        if (!$mail->send()) {
            problem($mail->ErrorInfo);
        } else {
        }
        }
      ?>

          <!-- include your success message below -->
          <section class="wrapper style1">
            <div class="container">
              <div id="content">
          <h3 style="text-align:center"> Thank you for contacting us. We'll get in touch with you soon.</h3>
        </div>
      </div>
    </section>


					<div id="footer">
					<div class="container" style="color:#eee">
						<div class="row">
							<section class="col-4 col-6-narrower col-12-mobilep">
								<h3>Quick Links</h3>
								<div style="float: left; width: 50%;">
									<ul class="links">
										<li><a href="/">Home</a></li>
										<li><a href="congregation.php">Our Congregation</a></li>
										<li><a href="lutheran.html">What's a Lutheran?</a></li>
										<li><a href="purpose.html">Our Purpose</a></li>
										<li><a href="worship.php">Worship</a></li>

									</ul>
								</div>
								<div style="float: right; width: 50%;">
									<ul class="links">
										<li><a href="ministry.html">Ministry Areas</a></li>
										<li><a href="faithink.html">Faith Inkubators</a></li>
										<li><a href="whats_on.php">Calendar</a></li>
										<li><a href="facilities.html">Hall Usage</a></li>
										<li><a href="contact.html">Contact Us</a></li>
									</ul>
								</div>
							</section>
							<section class="col-3 col-6-narrower col-12-mobilep">
								<h3>Contact Us:</h3>
								<p>115 Eumundi Road, <br> Noosaville, 4566</p>
								<p>07 5455 8645 <br> <a href="mailto: goodshepherd.noosa.qld@lca.org.au">goodshepherd.noosa.qld@lca.org.au</a></p>
								<ul class="icons">
									<li><a href="https://www.facebook.com/GoodShepherdLutheranChurchNoosa/" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="mailto: goodshepherd.noosa.qld@lca.org.au" class="icon regular fa-envelope"><span class="label">GitHub</span></a></li>
								</ul>
							</section>
							<section class="col-5 col-12-narrower">
								<h2 style="text-align:center; margin-top:2em"><a href="https://www.lca.org.au"><img src="content/static/images/lca_logo.png" width="250 vw" alt="" /></a></h2>
							</section>
						</div>
					</div>

					<!-- Copyright -->
						<div class="copyright">
							<ul class="menu">
								<li>&copy; Good Shepherd Lutheran Church Noosa. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>

				</div>
    </div>

    <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.dropotron.min.js"></script>
      <script src="assets/js/browser.min.js"></script>
      <script src="assets/js/breakpoints.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>

  </body>
</html>
