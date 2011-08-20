<?PHP
exit;
	require '/var/www/shine.clickontyler.com/includes/master.inc.php';
	
	if(isset($_GET['thanks'])) {
		die('Thanks! Your Nottingham license has been emailed to you.');
	}
	
	if(isset($_POST['btnSubmit']))
	{
		$Error->blank($_POST['email'], 'email');
		
		if($Error->ok())
		{
		    $app = new Application(11);
		    
			$o = new Order();
			$o->first_name  = 'Reg';
			$o->last_name   = 'Tester';
			$o->payer_email = $_POST['email'];
			$o->app_id      = $app->id;
			$o->type        = 'Manual';
			$o->dt          = dater();
			$o->item_name   = 'Nottingham 2.0 Beta';
			$o->insert();

			$o->generateLicense();
			$o->emailLicense();
			
			redirect('index.php?thanks');
		}
		else
		{
			$email = '';
		}
	}
	else
	{
		$email = '';
	}
?>

<p>Thanks for helping test Nottingham's registration system. Just fill in your email address below and we'll send you your license code.</p>

<form method="post" action="index.php">
	<p><label for="email">Email:</label> <input type="text" name="email" id="email" value="<?PHP echo $email;?>" class="text"></p>
	<p><input type="submit" name="btnSubmit" value="Send License" id="btnSubmit">
</form>