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
