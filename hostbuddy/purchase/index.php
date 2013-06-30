<?PHP
	$q = 1;
	if(isset($_GET['q']))
	{
		$q = intval($_GET['q']);
	}
	
    header('Location: https://sites.fastspring.com/clickontyler/instant/hostbuddy?quantity=' . $q);
