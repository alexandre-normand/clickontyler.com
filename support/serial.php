---
title: Click On Tyler Support
layout: default
permalink: /serial.php
---
<?PHP
	require '/var/www/shine.clickontyler.com/includes/master.inc.php';

	$out = '';
	
	$ls = new LostSerial();
	$ls->email = $_POST['email'];
	$ls->dt = dater();
	$ls->ip = $_SERVER['REMOTE_ADDR'];

	$db = Database::getDatabase();
	$email = $db->escape($_POST['email']);
	$orders = DBObject::glob('Order', "SELECT * FROM shine_orders WHERE payer_email = '$email'");
	if(count($orders) == 0) {
		$out .= "<h2>Oops!</h2>";
		$out .= "<p>We searched all of our records but couldn't find an order with that email address? Are you sure you entered the correct address? ";
		$out .= "Feel free to email <a href='mailto:support@clickontyler.com'>support@clickontyler.com</a> and we'll be happy to help find your order manually.</p>";
		$ls->was_found = 0;
	} else {
		$out .= "<h2>Yay!</h2>";
		$out .= "<p>We found your orders listed below and have re-sent your registration email. If you don't see it in the next few minutes, please check your spam folder &mdash; ";
		$out .= "it will be coming from <a href='mailto:support@clickontyler.com'>support@clickontyler.com</a>. If you no longer have access to that address or have any other questions ";
		$out .= "please let us know and we'll be happy to help.</p>";
		$out .= "<ul>";
		
		$ls->was_found = 1;

		foreach($orders as $o) {
			$o->emailLicense();
			$a = new Application($o->app_id);
			$out .= "<li>" . $a->name . "</li>";
		}

		$out .= "</ul>";
	}
	
	$ls->insert();
?>
<div class='contact' id='bd'> 
	<div class='yui-gd band1'> 
		<div class='yui-u first'> 
			<img src='{{ site.cdn_url }}/images/hats.jpg' /> 
		</div> 
		<div class='yui-u'> 
			<?PHP echo $out; ?>
		</div> 
	</div> 
</div>