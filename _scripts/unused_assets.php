<?PHP
	// This script crawls a directory of files (recursively) and then searches
	// My Jekyll posts to see if they're still in use. The idea being to let me
	// cleanup a three year old S3 bucket. /RTH 2011-08-28

	function dir_tree($dir) {
	   $path = '';
	   $stack[] = $dir;
	   while ($stack) {
	       $thisdir = array_pop($stack);
	       if ($dircont = scandir($thisdir)) {
	           $i=0;
	           while (isset($dircont[$i])) {
	               if ($dircont[$i] !== '.' && $dircont[$i] !== '..') {
	                   $current_file = "{$thisdir}/{$dircont[$i]}";
	                   if (is_file($current_file)) {
	                       $path[] = "{$thisdir}/{$dircont[$i]}";
	                   } elseif (is_dir($current_file)) {
	                        $path[] = "{$thisdir}/{$dircont[$i]}";
	                       $stack[] = $current_file;
	                   }
	               }
	               $i++;
	           }
	       }
	   }
	   return $path;
	}

	$files = dir_tree('/Users/thall/Desktop/cdn.tyler.fm/blog/');
	foreach($files as $path)
	{
		$fn = array_pop(explode('/', $path));
		$results = shell_exec("find /Users/thall/Sites/Jekyll/ -exec grep '$fn' '{}' \; -print");
		$results = trim($results);
		if(strlen($results) == 0)
		{
			$path = str_replace('//', '/', $path);
			echo $path . "\n";
			unlink($path);
		}
	}