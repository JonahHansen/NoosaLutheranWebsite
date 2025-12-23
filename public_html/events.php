<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Events</title>
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
					<li><a href="childsafe.html">Child Safe Standards</a></li>
                  </ul>
                </li>
                <li class="current">
                  <a href="events.php">Events</a>
                  <ul>
                    <li><a href="events.php">Calendar</a></li>
					<li><a href="weddings.php">Weddings</a></li>
                    <li><a href="facilities.html">Hall Usage</a></li>

                  </ul>
                </li>
                <li><a href="contact.html">Contact Us</a></li>
							</ul>
						</nav>
				</div>

				<!-- Main -->
						<link href='assets/css/calendar.css' rel='stylesheet' />
		<script src='assets/js/calendar.js'></script>
		<script type='text/javascript' src='fullcalendar/gcal.js'></script>
		<script>

		  document.addEventListener('DOMContentLoaded', function() {
		    var calendarEl = document.getElementById('calendar');

		    var calendar = new FullCalendar.Calendar(calendarEl, {

		      headerToolbar: {
		        left: 'prev,next today',
		        center: 'title',
		        right: 'dayGridMonth,listYear'
		      },

              aspectRatio: 1.5,
		      displayEventTime: true, // don't show the time column in list view

		      // THIS KEY WON'T WORK IN PRODUCTION!!!
		      // To make your own Google API key, follow the directions here:
		      // http://fullcalendar.io/docs/google_calendar/
		      googleCalendarApiKey: 'AIzaSyBfyXo3kZhmCL7vXFyEdQoRNT1YNz-b9j4',

		      // US Holidays
		      events: 'gslcnoosa@gmail.com',

		      eventClick: function(arg) {

		          alert('Event: ' + arg.event.title + '\n' + 'Time: ' + arg.event.start.toString());

		        // opens events in a popup window
		        var r = confirm("Open in Google Calendar?");
                    if (r == true) {
                      window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600')
                    } else {
                    } ;


		        arg.jsEvent.preventDefault() // don't navigate in main tab
		      },

		      loading: function(bool) {
		        document.getElementById('loading').style.display =
		          bool ? 'block' : 'none';
		      }

		    });

		    calendar.render();
		  });

		</script>
		<style>


		  #loading {
		    display: none;
		    position: absolute;
		    top: 10px;
		    right: 10px;
		  }

		  #calendar {
		    max-width: 1300px;
		    margin: 0 auto;
		  }

		</style>
				<section class="wrapper style1">
					<div class="container">
						<header>
							<h2>What's On? - Church Shared Calendar and Newsletters</h2>
						</header>
						<div style="width:100%">
						  <div id='loading'>loading...</div>
						<div id='calendar'></div>
					</div><br>
						<!--<header>
							<h2 style="text-align:center;margin-bottom:1em">Connections: Our Church Newletter</h2>
						</header>

						<?php

						$files = glob('content/newsletter/*.pdf');
						usort($files, function($a, $b) {
    				return filemtime($a) < filemtime($b);
						});
						$file1 = $files[0];
						$file2 = $files[1];
						$file3 = $files[2];

						list($year1, $a, $issue, $issno1, $month1, $connect) = explode("_", $file1);
						list($year2, $a, $issue, $issno2, $month2, $connect) = explode("_", $file2);
						list($year3, $a, $issue, $issno3, $month3, $connect) = explode("_", $file3);

						$year1 = end(preg_split('/\//',$year1));
						$year2 = end(preg_split('/\//',$year2));
						$year3 = end(preg_split('/\//',$year3));

						?>

						<div class="row gtr-200" style="margin-left:10vw;margin-right:10vw">
							<div class="col-4 col-12-narrower imp-narrower" style="margin-top:0.5em;margin-bottom:-2em;padding: 60px 0 0 0">
								<footer style="text-align:center;margin-bottom:0em">
									<a href="<?php echo $file1;?>" class="button linkbutton"><?php echo ucfirst($month1)." ".$year1 ?></a>
								</footer>
							</div>
							<div class="col-4 col-12-narrower imp-narrower" style="margin-top:0.5em;margin-bottom:-2em;padding: 60px 0 0 0">
								<footer style="text-align:center;margin-bottom:0em">
									<a href="<?php echo $file2;?>" class="button linkbutton"><?php echo ucfirst($month2)." ".$year2 ?></a>
								</footer>
							</div>
							<div class="col-4 col-12-narrower imp-narrower" style="margin-top:0.5em;margin-bottom:0em;padding: 60px 0 0 0">
								<footer style="text-align:center">
									<a href="<?php echo $file3;?>" class="button linkbutton"><?php echo ucfirst($month3)." ".$year3 ?></a>
								</footer>
							</div>

			</div>-->
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
										<li><a href="ministry.html">Ministry Areas</a></li>
									</ul>
								</div>
								<div style="float: right; width: 50%;">
									<ul class="links">
										<li><a href="faithink.html">Faith Inkubators</a></li>
										<li><a href="childsafe.html">Child Safe Standards</a></li>
										<li><a href="events.php">Calendar</a></li>
										<li><a href="weddings.html">Weddings</a></li>
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
									<li><a href="mailto: goodshepherd.noosa.qld@lca.org.au" class="icon regular fa-envelope"><span class="label">Email</span></a></li>
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
