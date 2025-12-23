<!DOCTYPE html>
<!--
	Arcana by HTML5 UP	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)-->
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <title>COVID Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="assets/css/main.css">
  </head>
  <body class="is-preload">
    <div id="page-wrapper">
      <!-- Header -->
      <div id="header">
        <!-- Logo -->
        <h1><a href="/" id="logo"><img src="content/static/images/good-shepherd.png"

              alt="" width="40%"></a></h1>
        <!-- Nav -->
        <nav id="nav">
          <ul>
            <li><a href="/">Home</a></li>
            <li> <a href="congregation.php">About Us</a>
              <ul>
                <li><a href="congregation.php">Our Congregation</a></li>
                <li><a href="lutheran.html">What's a Lutheran?</a></li>
                <li><a href="purpose.html">Our Purpose</a></li>
              </ul>
            </li>
            <li><a href="worship.php">Worship</a></li>
            <li> <a href="ministry.html">Our Ministries</a>
              <ul>
                <li><a href="ministry.html">Ministry Areas</a></li>
                <li><a href="faithink.html">Faith Inkubators</a></li>
              </ul>
            </li>
            <li class="current"> <a href="whats_on.php">Useful Links</a>
              <ul>
                <li><a href="whats_on.php">What's On?</a></li>
                <li><a href="facilities.html">Facilities Hire</a></li>

              </ul>
            </li>
            <li><a href="contact.html">Contact Us</a></li>
          </ul>
        </nav>
      </div>

      <!-- Main -->
      <?php

      if (isset($_POST['Email'])) {

          // EDIT THE 2 LINES BELOW AS REQUIRED
          $email_to = "goodshepherd.noosa.qld@lca.org.au";
          $email_subject = "New Contact Form Message";

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

              echo '<div id="footer">
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
                              <li><a href="whats_on.php">What\'s On?</a></li>
                              <li><a href="facilities.html">Facility Hire</a></li>
                              <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                          </div>
                        </section>
                        <section class="col-3 col-6-narrower col-12-mobilep">
                          <h3>Contact Us:</h3>
                          <p>115 Eumundi Road, <br>
                            Noosaville, 4566</p>
                          <p>07 5455 8645 <br>
                            <a href="mailto: goodshepherd.noosa.qld@lca.org.au">goodshepherd.noosa.qld@lca.org.au</a></p>
                          <ul class="icons">
                            <li><a href="https://www.facebook.com/GoodShepherdLutheranChurchNoosa/"

                                class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                            <li><a href="mailto: goodshepherd.noosa.qld@lca.org.au" class="icon regular fa-envelope"><span

                                  class="label">GitHub</span></a></li>
                          </ul>
                        </section>
                        <section class="col-5 col-12-narrower">
                          <h2 style="text-align:center; margin-top:2em"><a href="https://www.lca.org.au"><img

                                src="content/static/images/lca_logo.png" alt="" width="250 vw"></a></h2>
                        </section>
                      </div>
                    </div>
                    <!-- Copyright -->
                    <div class="copyright">
                      <ul class="menu">
                        <li>© Good Shepherd Lutheran Church Noosa. All rights reserved</li>
                        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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
            </html>';



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

          $email_message = "Contact form details below:\n\n";

          function clean_string($string)
          {
              $bad = array("content-type", "bcc:", "to:", "cc:", "href", "\r\n");
              return str_replace($bad, "", $string);
          }

          $email_message .= "Name: " . clean_string($name) . "\n";
          $email_message .= "Email: " . clean_string($email) . "\n";
          if (
            !empty($_POST['Message'])
          ){
            $email_message .= "Phone: " . clean_string($_POST['Phone']) . "\n";
          }
          $email_message .= "Message: " . clean_string($message) . "\n";



          // create email headers
          $headers = 'From: ' . $email . "\r\n" .
              'Reply-To: ' . $email . "\r\n" .
              'X-Mailer: PHP/' . phpversion();
          @mail($email_to, $email_subject, $email_message, $headers);
      ?>

          <!-- include your success message below -->
          <section class="wrapper style1">
            <div class="container">
              <div id="content">
          <h3 style="text-align:center"> Thank you for contacting us. We'll get in touch with you soon.</h3>
        </div>
      </div>
    </section>
      <?php
      }
      ?>


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
                  <li><a href="whats_on.php">What's On?</a></li>
                  <li><a href="facilities.html">Facility Hire</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                </ul>
              </div>
            </section>
            <section class="col-3 col-6-narrower col-12-mobilep">
              <h3>Contact Us:</h3>
              <p>115 Eumundi Road, <br>
                Noosaville, 4566</p>
              <p>07 5455 8645 <br>
                <a href="mailto: goodshepherd.noosa.qld@lca.org.au">goodshepherd.noosa.qld@lca.org.au</a></p>
              <ul class="icons">
                <li><a href="https://www.facebook.com/GoodShepherdLutheranChurchNoosa/"

                    class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="mailto: goodshepherd.noosa.qld@lca.org.au" class="icon regular fa-envelope"><span

                      class="label">GitHub</span></a></li>
              </ul>
            </section>
            <section class="col-5 col-12-narrower">
              <h2 style="text-align:center; margin-top:2em"><a href="https://www.lca.org.au"><img

                    src="content/static/images/lca_logo.png" alt="" width="250 vw"></a></h2>
            </section>
          </div>
        </div>
        <!-- Copyright -->
        <div class="copyright">
          <ul class="menu">
            <li>© Good Shepherd Lutheran Church Noosa. All rights reserved</li>
            <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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
