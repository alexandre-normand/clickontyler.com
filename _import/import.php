<?PHP
	// https://twitter.com/#!/marcoarment/status/59089853433921537
	date_default_timezone_set('America/Los_Angeles');

    $db = mysql_connect('localhost', 'root', '');
    mysql_select_db('clickontyler', $db);

	// Export posts...
    $posts = array();
    $results = mysql_query("select * from wp_posts where post_type = 'post' and post_status = 'publish'")  or die(mysql_error());
    while($row = mysql_fetch_array($results, MYSQL_ASSOC))
	{
		$results2 = mysql_query("select meta_key, meta_value FROM wp_postmeta where post_id = " . $row['ID'], $db) or die(mysql_error());
		while($row2 = mysql_fetch_array($results2, MYSQL_ASSOC))
		{
			$row[$row2['meta_key']] = $row2['meta_value'];
		}
        $posts[] = $row;
	}

    foreach($posts as $p)
    {
        $slug = $p['post_name'];
        $dt   = $p['post_date_gmt'];
		$y    = date('Y', strtotime($dt));
		$m    = date('m', strtotime($dt));

		$out  = "---\n";
		$out .= "date: $dt\n";
		$out .= "title: {$p['post_title']}\n";
		$out .= "layout: post\n";
		$out .= "permalink: /blog/$y/$m/$slug/index.html\n";
		$out .= "slug: $slug\n";
		$out .= "---\n";
		$out .= $p['post_content'];
		
		$dt_slug = date('Y-m-d', strtotime($dt));

		echo "Exported Post: $slug\n";
		file_put_contents("./_posts/$dt_slug-$slug.markdown", $out);
	}

	// Export pages...
    $posts = array();
    $results = mysql_query("select * from wp_posts where post_type = 'page' and post_status = 'publish'", $db)  or die(mysql_error());
    while($row = mysql_fetch_array($results, MYSQL_ASSOC))
	{
		$results2 = mysql_query("select meta_key, meta_value FROM wp_postmeta where post_id = " . $row['ID'], $db) or die(mysql_error());
		while($row2 = mysql_fetch_array($results2, MYSQL_ASSOC))
		{
			$row[$row2['meta_key']] = $row2['meta_value'];
		}
        $posts[] = $row;
	}

    foreach($posts as $p)
    {
        $slug = $p['post_name'];

		$out  = "---\n";

		if($p['title_tag'] && strlen($p['title_tag']))
			$out .= "title: {$p['title_tag']}\n";
		else
			$out .= "title: {$p['post_title']}\n";

		if($p['meta-description'] && strlen($p['meta-description']))
			$out .= "description: {$p['meta-description']}\n";


		$out .= "layout: page\n";
		$out .= "permalink: /$slug/index.html\n";
		$out .= "slug: $slug\n";
		$out .= "---\n";
		$out .= $p['post_content'];

		echo "Exported Page: $slug\n";
		file_put_contents("./_pages/$slug.markdown", $out);
	}
