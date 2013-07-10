<?PHP
	require '/var/www/shine.clickontyler.com/includes/master.inc.php';
	$db = Database::getDatabase();
	
	if(isset($_GET['id']))
	{
		$o = new Order($_GET['id']);
		if($o->upgraded == '1')
		{
			redirect('http://clickontyler.com/virtualhostx/upgrade/');
		}
		else
		{
			$o->upgraded = '1';
			$o->update();
			$url = "http://sites.fastspring.com/clickontyler/product/virtualhostx?coupon=vhx3621pd&quantity=" . $o->quantity;
			redirect($url);
		}
	}
	
	if(isset($_GET['all']))
	{
		$email = $db->escape(isset($_GET['all']) ? $_GET['all'] : 'noemail');
		$orders = DBObject::glob('order', "SELECT * FROM shine_orders WHERE (app_id = '2' OR app_id = '3' OR app_id = '15')  AND payer_email = '$email' ORDER BY dt DESC");

		$total_q = 0;
		foreach($orders as $o)
		{
			if($o->upgraded != '1')
			{
				$o->upgraded = '1';
				$o->update();
				$total_q += $o->quantity;
			}
		}
		
		$url = "http://sites.fastspring.com/clickontyler/product/virtualhostx?coupon=vhx3621pd&quantity=" . $total_q;
		redirect($url);
	}