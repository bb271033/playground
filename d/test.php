<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Transactions</title>
	<link rel="icon" href="./favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="../assets/css/w3.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<!--<link href="../assets/css/jquery.mobile.flatui.css" rel="stylesheet" />-->
	<link rel="stylesheet" href="../css/themes/default/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="../assets/css/style.css" />
	<link rel="stylesheet" href="../assets/css/screen.css" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.5.min.js"></script>
	<script src="../js/index.js"></script>
		<script>
		$( document ).on( "pagecreate", "#demo-page", function() {

			$( ".cars" ).on( "click", function() {
				var target = $( this ),
					brand = target.find( "h2" ).html(),
					model = target.find( "p" ).html(),
					short = target.attr( "id" ),
					closebtn = '<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>',
					header = '<div data-role="header"><h2>' + brand + ' ' + model + '</h2></div>',
					img = '<img src="../photos/' + short + '.png" alt="' + brand + '" class="photo">',
					popup = '<div data-role="popup" id="popup-' + short + '" data-short="' + short +'" data-theme="none" data-overlay-theme="a" data-corners="false" data-tolerance="15"></div>';

				// Create the popup.
				$( header )
					.appendTo( $( popup )
						.appendTo( $.mobile.activePage )
						.popup() )
					.toolbar()
					.before( closebtn )
					.after( img );

				// Wait with opening the popup until the popup image has been loaded in the DOM.
				// This ensures the popup gets the correct size and position
				$( ".photo", "#popup-" + short ).load(function() {
					// Open the popup
					$( "#popup-" + short ).popup( "open" );

					// Clear the fallback
					clearTimeout( fallback );
				});

				// Fallback in case the browser doesn't fire a load event
				var fallback = setTimeout(function() {
					$( "#popup-" + short ).popup( "open" );
				}, 2000);
			});

			// Set a max-height to make large images shrink to fit the screen.
			$( document ).on( "popupbeforeposition", ".ui-popup", function() {
				var image = $( this ).children( "img" ),
					height = image.height(),
					width = image.width();

				// Set height and width attribute of the image
				$( this ).attr({ "height": height, "width": width });

				// 68px: 2 * 15px for top/bottom tolerance, 38px for the header.
				var maxHeight = $( window ).height() - 68 + "px";

				$( "img.photo", this ).css( "max-height", maxHeight );
			});

			// Remove the popup after it has been closed to manage DOM size
			$( document ).on( "popupafterclose", ".ui-popup", function() {
				$( this ).remove();
			});
		});
	</script>
	<style>
	/* Reduce the height of the header on smaller screens. */
	@media all and (max-width: 48em){
		.ui-popup .ui-title {
			font-size: .75em;
		}
	}
	</style>
</head>
<body>
<div data-role="page" id="demo-page" data-title="Nisakorn">
	<div data-role="header" data-position="fixed" data-theme="b">
		<a href="#demo-intro" data-rel="back" data-icon="arrow-l" data-iconpos="notext" data-shadow="false" data-icon-shadow="false">Back</a>
		<h2>Nisakorn</h2>
	</div><!-- /header -->
	
	<div role="main" class="ui-content">
		<ul data-role="listview">
		<?php
		include('../load.php');
		include(__DIR__.'/settings/conn.php');
		$database = new Database();
		$conn = $database->getConnection();
		?>
			<li>
				<a href="#" class="cars" id="mon1">
					<img src="../photos/mon1.png" alt="BMW" />
					<h2>ยืม 1,000 บาท</h2>
					<p>17 ม.ค. 2018</p>
				</a>
			</li>
			<!--<li>
				<a href="#" class="cars" id="landrover">
					<img src="../_assets/img/landrover-thumb.jpg" alt="Land Rover" />
				</a>
				<h2>Land Rover</h2>
				<p>Discovery 4</p>
			</li>-->
		</ul>
	</div><!-- /content -->

</div><!-- /page -->
</body>
</html>









