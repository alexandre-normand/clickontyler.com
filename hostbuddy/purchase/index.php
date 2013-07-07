<?PHP
	$q = 1;
	if(isset($_GET['q']))
	{
		$q = intval($_GET['q']);
	}
	
    header('Location: http://sites.fastspring.com/clickontyler/product/hostbuddy?quantity=' . $q);
