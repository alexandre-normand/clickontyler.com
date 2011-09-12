<?PHP
	require '/var/www/shine.clickontyler.com/includes/master.inc.php';

	if(!isset($_GET['user']) || !isset($_GET['hash'])) {
		redirect('/virtualhostx/');
	}

	if($VHXAuth->APILogin($_GET['user'], $_GET['hash'])) {
		redirect('/virtualhostx/account/');
	} else {
		redirect('/virtualhostx/');
	}