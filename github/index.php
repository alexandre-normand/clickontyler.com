<?PHP
	function geturl($url, $username = null, $password = null)
	{
	    if(function_exists('curl_init'))
	    {
	        $ch = curl_init();
	        if(!is_null($username) && !is_null($password))
	            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic ' .  base64_encode("$username:$password")));
	        curl_setopt($ch, CURLOPT_URL, $url);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	        $html = curl_exec($ch);
	        curl_close($ch);
	        return $html;
	    }
	    elseif(ini_get('allow_url_fopen') == true)
	    {
	        if(!is_null($username) && !is_null($password))
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

	$username = 'tylerhall';
	$username = preg_replace('/[^a-zA-Z0-9_-]/', '', $username);
	$url = "http://github.com/api/v2/xml/repos/show/$username";
	$xmlstr = geturl($url);
	$xml = simplexml_load_string($xmlstr);
?>
<h1>GitHub Summary</h1>
<table>
	<tr>
		<th>Repository</th>
		<th>Watchers</th>
		<th>Forks</th>
	</tr>
	<?PHP foreach($xml->repository as $repo) : ?>
	<tr>
		<td><a href="http://github.com/<?PHP echo $username; ?>/<?PHP echo (string)$repo->name; ?>/"><?PHP echo (string)$repo->name; ?></a></td>
		<td><a href="http://github.com/<?PHP echo $username; ?>/<?PHP echo (string)$repo->name; ?>/watchers"><?PHP echo (string)$repo->watchers; ?></a></td>
		<td><a href="http://github.com/<?PHP echo $username; ?>/<?PHP echo (string)$repo->name; ?>/network"><?PHP echo (string)$repo->forks; ?></a></td>
	</tr>
	<?PHP endforeach; ?>
</table>