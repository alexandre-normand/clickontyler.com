---
layout: nil
---
<?PHP
	date_default_timezone_set('America/Los_Angeles');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<title>Alabama Traffic App for iPhone</title>
	<meta name="description" content="Alabama Traffic is the best way to stay informed about the latest road conditions throughout Alabama using your iPhone or iPod Touch." />
	<meta name="language" content="en" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="apple-itunes-app" content="app-id=448854508"/>
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="stylesheet" type="text/css" media="screen, projection" href="{{ site.cdn_url }}/alabama-traffic/css/screen3.css" />
	<link rel="stylesheet" type="text/css" media="screen, projection" href="{{ site.cdn_url }}/alabama-traffic/css/jquery.fancybox-1.3.4.css" />
</head>
	
<body id="iphone">
	<div id="intro">
		<div id="intro-inner" class="clearfix">
			<h1 id="logo">Alabama Traffic Advisor<small>State-wide Traffic Conditions on your iPhone</small></h1>
			
			<p>Alabama Traffic is the best way to stay informed about the latest Alabama traffic conditions using your iPhone or iPod Touch. Our always up-to-date traffic data comes directly from the <a href="http://www.dot.state.al.us/">Alabama Department of Transportation</a>. </p>
			
			<ul id="features">
				<li><img src="{{ site.cdn_url }}/alabama-traffic/img/camera.png" alt="" /> <strong>Live Traffic Cameras</strong> Every traffic camera in Alabama at your fingertips.</li>
				<li><img src="{{ site.cdn_url }}/alabama-traffic/img/accident.png" alt="" /> <strong>Accident Reports</strong> Up-to-the-minute alerts of every reported acccident and wreck.</li>
				<li><img src="{{ site.cdn_url }}/alabama-traffic/img/construction.png" alt="" /> <strong>Construction Zones</strong> Plan your commute to avoid the ever changing construction zones.</li>
				<li><img src="{{ site.cdn_url }}/alabama-traffic/img/message.png" alt="" /> <strong>Push Notifications</strong> Get notified immediately whenever an <a href="http://www.tbi.tn.gov/amber_alert_photos/alert_amber_alert.shtml">Amber Alert</a> happens.</li>
			</ul>
			
			<div id="phone">
				<!-- image in the phone screen -->
				<img src="{{ site.cdn_url }}/alabama-traffic/img/tt1-med.png" alt="" />
			</div>
		</div><!-- /intro-inner -->
	</div><!-- /intro -->

	<div id="wrapper" class="clearfix">
		<div id="content">
			<!-- navigation -->
			<ul id="navigation">
				<li><a href="#tab-1">Tour</a></li>
				<li><a href="#tab-2">Screenshots</a></li>
			</ul>

			<div id="tab-1">
				<ul class="tour">
					<li>
						<img style="border:1px solid #999;" src="{{ site.cdn_url }}/alabama-traffic/img/tour1.png" alt="" />
						
						<h2>Live Traffic Cameras</h2>
						
						<p>Alabama Traffic lets you view live images from every TDOT traffic camera in the state. It's the perfect way to peek at traffic and plan your route before you head home. You can even bookmark your favorite cameras for quick access.</p>
					</li>
					
					<li>
						<img style="border:1px solid #999;" src="{{ site.cdn_url }}/alabama-traffic/img/tour2.png" alt="" />

						<h2>Accident Reports</h2>
						
						<p>Accidents happen every day. Alabama Traffic keeps you informed with where they are, what happened, and when they're estimated to be cleared by. Is there an accident on your way home? Use our map to find the closest traffic camera and see just how bad traffic really is.</p>
					</li>
				</ul>
			</div><!-- /tab-1 -->
			
			<div id="tab-2">
				<ul class="screenshots">
					<li><a href="{{ site.cdn_url }}/alabama-traffic/img/tt1-med.png" class="fancybox" rel="group1" title=""><img style="border:1px solid #666;" src="{{ site.cdn_url }}/alabama-traffic/img/tt1-sm.png" alt="" /></a></li>
					<li><a href="{{ site.cdn_url }}/alabama-traffic/img/tt2-med.png" class="fancybox" rel="group1" title=""><img style="border:1px solid #666;" src="{{ site.cdn_url }}/alabama-traffic/img/tt2-sm.png" alt="" /></a></li>
					<li><a href="{{ site.cdn_url }}/alabama-traffic/img/tt3-med.png" class="fancybox" rel="group1" title=""><img style="border:1px solid #666;" src="{{ site.cdn_url }}/alabama-traffic/img/tt3-sm.png" alt="" /></a></li>
					<li><a href="{{ site.cdn_url }}/alabama-traffic/img/tt4-med.png" class="fancybox" rel="group1" title=""><img style="border:1px solid #666;" src="{{ site.cdn_url }}/alabama-traffic/img/tt4-sm.png" alt="" /></a></li>
					<li><a href="{{ site.cdn_url }}/alabama-traffic/img/tt5-med.png" class="fancybox" rel="group1" title=""><img style="border:1px solid #666;" src="{{ site.cdn_url }}/alabama-traffic/img/tt5-sm.png" alt="" /></a></li>
				</ul>
			</div><!-- /tab-2 -->
			
		</div><!-- /content -->
		
		<div id="sidebar">
			<a href="http://itunes.apple.com/us/app/alabama-traffic-advisor/id448854508?mt=8" id="buy">Buy Alabama Traffic!</a>
			
			<h3>Contact us</h3>
			
			<ul>
				<li><a href="mailto:support@clickontyler.com">support@clickontyler.com</a></li>
			</ul>

			<h3>Follow us</h3>
			
			<ul id="social">
				<li><a href="http://twitter.com/trafficadvisor" id="twitter">Follow us on Twitter</a></li>
				<li><a href="http://feeds.feedburner.com/clickontyler" id="rss">RSS feed</a></li>
			</ul>
			
			<p id="copyright">Copyright &copy; <?PHP echo date('Y'); ?> <a href="http://clickontyler.com">Click On Tyler</a></p>
		</div><!-- /sidebar -->
	</div><!-- /wrapper -->
	

	<!-- JavaScript -->
	<script type="text/javascript" src="http://mint.clickontyler.com/?js" ></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="{{ site.cdn_url }}/alabama-traffic/js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="{{ site.cdn_url }}/alabama-traffic/js/jquery.easing-1.3.pack.js"></script>
	<script type="text/javascript" src="{{ site.cdn_url }}/alabama-traffic/js/jquery.tabs.pack.js"></script>
	<script type="text/javascript" src="{{ site.cdn_url }}/alabama-traffic/js/jquery.validate.pack.js"></script>
	<script type="text/javascript" src="{{ site.cdn_url }}/alabama-traffic/js/jquery.tipsy.js"></script>
	<script type="text/javascript" src="{{ site.cdn_url }}/alabama-traffic/js/onload.js"></script>
</body>
</html>
