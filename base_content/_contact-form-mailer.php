
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

              echo !!footer!!;



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
