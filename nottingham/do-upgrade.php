<?PHP
	require '/var/www/shine.clickontyler.com/includes/master.inc.php';

	$db = Database::getDatabase();
	$email = $db->escape($_POST['email']);
	$row = $db->getRow("SELECT * FROM shine_orders WHERE app_id = '4' AND payer_email = '$email' ORDER BY dt DESC");
	
	if($row === false)
	{
		echo "We're sorry, but we couldn't find an order with that email address. Feel free to contact us at support@clickontyler.com and we'll be happy to help find your order.";
		exit;
	}

	if($row['dt'] > '2011-01-02 00:00:00')
	{
		if($row['upgrade_coupon'] == '')
		{
			echo "Our records show that you qualify for a free upgrade to Nottingham 2.0, however it looks like you've already claimed your new license. If you think this is a mistake, or just need help looking up a lost license, feel free to contact us at support@clickontyler.com.";
			exit;
		}
		
	    $app = new Application(11);

		$o = new Order();
		$o->first_name  = $row['first_name'];
		$o->last_name   = $row['last_name'];
		$o->payer_email = $row['payer_email'];
		$o->app_id      = $app->id;
		$o->type        = 'Upgrade';
		$o->dt          = dater();
		$o->item_name   = 'Nottingham 2.0';
		$o->notes       = 'Automated Nottingham 2.0 upgrade';
		$o->insert();

		$o->generateLicense();
		$o->emailLicense();

		echo "Yay! You qualified for a free upgrade to Nottingham 2.0. We have emailed an upgraded license key to you at " . $row['payer_email'] . ". Enjoy!";

		$db->query("UPDATE shine_orders SET upgrade_coupon = '' WHERE app_id = '4' AND payer_email = '$email'");

		exit;
	}

	if(strlen($row['upgrade_coupon']) > 0)
	{
		$url = "https://sites.fastspring.com/clickontyler/instant/nottingham?coupon=" . $row['upgrade_coupon'];
		redirect($url);
	}
