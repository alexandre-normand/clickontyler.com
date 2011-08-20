<?PHP
	require '/var/www/shine.clickontyler.com/includes/master.inc.php';
	$v = DBObject::glob('Version', 'SELECT * FROM shine_versions WHERE app_id = 10 ORDER BY dt DESC LIMIT 1');
	$v = array_pop($v);
	$v->downloads++;
	$v->update();
	Download::track();
	file_get_contents('http://mint.clickontyler.com/pepper/tillkruess/downloads/tracker.php?remote&url=' . $v->url);
	header('Location: ' . $v->url);
