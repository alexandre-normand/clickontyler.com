---
title: VirtualHostX 3.0 Upgrade
layout: default
permalink: /do-upgrade.php
---
<?PHP
	require '/var/www/shine.clickontyler.com/includes/master.inc.php';

	$db = Database::getDatabase();
	$email = $db->escape($_POST['email']);
	$row = $db->getRow("SELECT * FROM shine_orders WHERE app_id = '3' AND payer_email = '$email' ORDER BY dt DESC");
	
	$out = '';
	
	if($row === false)
	{
		$out .= "<p>We're sorry, but we couldn't find an order with that email address. Feel free to contact us at <a href='mailto:support@clickontyler.com'>support@clickontyler.com</a> and we'll be happy to help find your order.</p>";
	}
	else
	{
		if($row['dt'] > '2011-06-01 00:00:00')
		{
			if($row['upgrade_coupon'] == '')
			{
				$out .= "<p>Our records show that you qualify for a free upgrade to VirtualHostX 3.0, however it looks like you've already claimed your new license. If you think this is a mistake, or just need help looking up a lost license, feel free to contact us at <a href='mailto:support@clickontyler.com'>support@clickontyler.com</a>.</p>";
			}
			else
			{
			    $app = new Application(15);

				$o = new Order();
				$o->first_name  = $row['first_name'];
				$o->last_name   = $row['last_name'];
				$o->payer_email = $row['payer_email'];
				$o->app_id      = $app->id;
				$o->type        = 'Upgrade';
				$o->dt          = dater();
				$o->item_name   = 'VirtualHostX 3.0';
				$o->notes       = 'Automated VirtualHostX 3.0 upgrade';
				$o->insert();

				$o->generateLicense();
				$o->emailLicense();

				$out .= "<p>Yay! You qualified for a free upgrade to VirtualHostX 3.0. We have emailed an upgraded license key to you at " . $row['payer_email'] . ". Enjoy!</p>";

				$db->query("UPDATE shine_orders SET upgrade_coupon = '' WHERE app_id = '3' AND payer_email = '$email'");
			}
		}

		if(strlen($row['upgrade_coupon']) > 0)
		{
			$url = "https://sites.fastspring.com/clickontyler/instant/virtualhostx?coupon=" . $row['upgrade_coupon'];
			redirect($url);
		}
		else
		{
			$out .= "<p>Our records show that you have already upgraded to VirtualHostX 3.0. If you think this is a mistake, or just need help <a href='/support/'>looking up a lost license</a>, feel free to contact us at <a href='mailto:support@clickontyler.com'>support@clickontyler.com</a>.</p>";
		}
	}
?>
<div class='contact' id='bd'> 
	<div class='yui-gd band1'> 
		<div class='yui-u first'> 
			<img src='{{ site.cdn_url }}/images/hats.jpg' /> 
		</div> 
		<div class='yui-u'>
			<h2>Nottingham 3.0 Upgrade</h2>
			<?PHP echo $out; ?>
		</div> 
	</div> 
</div>