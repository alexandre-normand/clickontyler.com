<?PHP
	$pre = array();
	$html = geturl("http://show.websudoku.com/?");
	if(($html === false) || (strlen($html) < 10000))
	{
		die("Oh crap. Something went wrong while generating your puzzle. Please try again.");
	}

	$html = match('/<table cellspacing.*?<\/table/msi', $html);
	preg_match_all('/<td.*?<\/td/msi', $html, $matches);
	for($i = 0; $i < count($matches[0]); $i++)
		$pre[$i] = match('/value=.([0-9])/msi', $matches[0][$i], 1);

	function match($regex, $str, $i = 0)
	{
		if(preg_match($regex, $str, $match) == 1)
			return $match[$i];
		else
			return false;
	}

	function geturl($url, $username = "", $password = "")
	{
		if(function_exists("curl_init"))
		{
			$ch = curl_init();
			if(!empty($username) && !empty($password))
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic ' .  base64_encode("$username:$password")));
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$html = curl_exec($ch);
			curl_close($ch);
			return $html;
		}
		elseif(ini_get("allow_url_fopen") == true)
		{
			if(!empty($username) && !empty($password))
				$url = str_replace("://", "://$username:$password@", $url);
			$html = file_get_contents($url);
			return $html;
		}
		else
		{
			// Cannot open url. Either install curl-php or set allow_url_fopen = true in php.ini
			return false;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=320"/>
	<meta name="description" content="Play sudoku on your Apple iPhone."/>
	<title>iPhone Sudoku</title>
	<link rel="stylesheet" href="screen.css" type="text/css" media="screen" title="stylesheet" charset="utf-8"/>
	<script src="sudoku.js" type="text/javascript"></script>
	<script src="/mint/?js" type="text/javascript"></script>
</head>

<body>
<table id="grid"><?PHP for($y = 0; $y < 9; $y++) : ?><tr>
<?PHP for($x = 0; $x < 9; $x++) : ?>
<?PHP
$class = "";
if($x == 3 || $x == 6) $class .= "h ";
if($y == 2 || $y == 5) $class .= "v ";
if($pre[$y * 9 + $x] != "") $class .= "p ";
?><td id="<?PHP echo "c$x$y";?>" class="<?PHP echo $class;?>"><?PHP echo $pre[$y * 9 + $x];?></td><?PHP endfor; ?></tr><?PHP endfor; ?></table>
<table id="pad">
<tr><td id="p1">1</td><td id="p2">2</td><td id="p3">3</td></tr>
<tr><td id="p4">4</td><td id="p5">5</td><td id="p6">6</td></tr>
<tr><td id="p7">7</td><td id="p8">8</td><td id="p9">9</td></tr>
<tr><td colspan="3" class="i"><table><tr><td id="clear">Clear</td><td id="cancel">Cancel</td></tr></table></td></tr>
</table>
<p><input type="checkbox" name="help" value="1" id="help" /> <label for="help">Check for mistakes?</label></p>
<p><a href='/sudoku/'>New Puzzle?</a></p>
<p>iPhone Sudoku by <a href='http://clickontyler.com'>Tyler Hall</a></p>
</body>
</html>