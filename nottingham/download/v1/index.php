<?PHP
	require '../../../../shine.clickontyler.com/includes/master.inc.php';
	// LIMIT 2 = Ignore the 2.0.1 version that redirects users via sparkle. We want the old 0.98 version which is next...
	$v = DBObject::glob('Version', 'SELECT * FROM shine_versions WHERE app_id = 4 ORDER BY dt DESC LIMIT 2');
	$v = array_pop($v);
	$v->downloads++;
	$v->update();
	Download::track('', $v->app_id);
	file_get_contents('http://mint.clickontyler.com/pepper/tillkruess/downloads/tracker.php?remote&url=' . $v->url);
	header('Location: ' . $v->url);
