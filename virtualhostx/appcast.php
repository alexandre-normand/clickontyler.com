<?PHP
	// include("../admin/includes/master.inc.php");
	// 
	// $a = new App(2);
	// if($a->id == "") die("Application not found.");
	// 
	// $ip = $_SERVER['REMOTE_ADDR'];
	// $dt = date("Y-m-d H:i:s");
	// 
	// if(count($_GET) == 0)
	// 	$db->query("INSERT INTO sparkle (ip, dt, is_blank) VALUES ('$ip', '$dt', 1)");
	// else
	// {
	// 	$os      = $_GET['osVersion'];
	// 	$cpu     = $_GET['cputype'];
	// 	$cpusub  = $_GET['cpusubtype'];
	// 	$model   = $_GET['model'];
	// 	$ncpu    = $_GET['ncpu'];
	// 	$lang    = $_GET['lang'];
	// 	$app     = $_GET['appName'];
	// 	$version = $_GET['appVersion'];
	// 	$freq    = $_GET['cpuFreqMHz'];
	// 	$ram     = $_GET['ramMB'];
	// 	$db->query("INSERT INTO sparkle (osVersion, cpuType, cpusubtype, model, ncpu, lang, appName, appVersion, cpuFreqMHz, ramMB, ip, dt, is_blank) VALUES ('$os', '$cpu', '$cpusub', '$model', '$ncpu', '$lang', '$app', '$version', '$freq', '$ram', '$ip', '$dt', 0)");
	// }
	// 
	// header("Content-type: application/xml");
	// echo $a->feed();
?>
<<?PHP echo '?'; ?>xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:sparkle="http://www.andymatuschak.org/xml-namespaces/sparkle" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title>VirtualHostX</title>
<link>http://clickontyler.com/virtualhostx/</link>
<description>GUI for managing Apache virtual hosts on Mac OS X.</description>
<language>en-us</language>
<pubDate>Tue, 28 Jul 2009 15:46:07 -0500</pubDate>
<atom:link href="http://clickontyler.com/virtualhostx/appcast.php" rel="self" type="application/rss+xml" />
<item>
<title>VirtualHostX 2.0.4</title>
<link>http://amz.clickontyler.com/virtualhostx/virtualhostx_2.0.4.zip</link>
<description><![CDATA[ <h2>VirtualHostX 2.0</h2><ul>
<li>This is a <strong>paid</strong> upgrade.</li>
<li>Existing customers can upgrade for $10.00. Just send an email to support@clickontyler.com for details.</li>
</ul>]]></description>
<pubDate>Tue, 28 Jul 2009 22:55:29 -0500</pubDate>
<guid>http://amz.clickontyler.com/virtualhostx/virtualhostx_2.0.4.zip</guid>
<enclosure url='http://amz.clickontyler.com/virtualhostx/virtualhostx_2.0.4.zip' length='1258599' type='application/octet-stream' />
</item>
<item>
<title>VirtualHostX 1.1.1</title>
<link>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.1.1.zip</link>
<description><![CDATA[ <ul>
<li>Added ability to specify an alternate port number.</li>
<li>Fixed cut and paste in custom directives text box.</li>
</ul>]]></description>
<pubDate>Tue, 05 Aug 2008 22:55:29 -0500</pubDate>
<guid>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.1.1.zip</guid>
<enclosure url='http://amz.clickontyler.com/virtualhostx/virtualhostx_1.1.1.zip' length='1076074' type='application/octet-stream' />
</item>
<item>
<title>VirtualHostX 1.1.0</title>
<link>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.1.0.zip</link>
<description><![CDATA[ <ul>
<li>You can now add custom Apache directives to each virtual host.</li>
<li>Fixed a bug where the "Choose..." button might not be enabled.</li>
<li>Minor UI improvements.</li>
</ul>]]></description>
<pubDate>Wed, 30 Jul 2008 04:35:06 -0500</pubDate>

<guid>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.1.0.zip</guid>
<enclosure url='http://amz.clickontyler.com/virtualhostx/virtualhostx_1.1.0.zip' length='1071286' type='application/octet-stream' />
</item>
<item>
<title>VirtualHostX 1.0.11</title>
<link>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.11.zip</link>
<description><![CDATA[ <ul>
<li>Added OpenFeedback to VHX. You can now send bug reports, feature requests, and ask for support from directly within VirtualHostX. Choose "Send Feedback" from the main menu.</li>
<li>Fixed a bug where changes to DocumentRoot were not saved. (Thanks, Brian!)</li>
</ul>]]></description>
<pubDate>Thu, 03 Jul 2008 15:07:04 -0500</pubDate>
<guid>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.11.zip</guid>
<enclosure url='http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.11.zip' length='1067907' type='application/octet-stream' />
</item>
<item>

<title>VirtualHostX 1.0.10</title>
<link>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.10.zip</link>
<description><![CDATA[ <ul>
<li>Fixed issue with setting up MAMP on Leopard.</li>
</ul>]]></description>
<pubDate>Mon, 05 May 2008 14:12:22 -0500</pubDate>
<guid>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.10.zip</guid>
<enclosure url='http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.10.zip' length='1094709' type='application/octet-stream' />
</item>
<item>
<title>VirtualHostX 1.0.9</title>
<link>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.9.zip</link>
<description><![CDATA[ <ul>
<li>Improved Leopard compatibility.</li>
<li>Better MAMP support.</li>
<li>UI tweaks.</li>
<li>Thanks to all the users who sent in feedback regarding Leopard!</li>
</ul>]]></description>

<pubDate>Wed, 19 Dec 2007 22:16:53 -0600</pubDate>
<guid>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.9.zip</guid>
<enclosure url='http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.9.zip' length='1034397' type='application/octet-stream' />
</item>
<item>
<title>VirtualHostX 1.0.8</title>
<link>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.8.zip</link>
<description><![CDATA[ <ul>
<li>Mac OS X 10.5 Leopard support. (Thanks for the testing, Thomas!)</li>
<li>Added "Enabled" switch for each virtual host.</li>
</ul>]]></description>
<pubDate>Thu, 01 Nov 2007 02:51:18 -0500</pubDate>
<guid>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.8.zip</guid>
<enclosure url='http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.8.zip' length='1033898' type='application/octet-stream' />

</item>
<item>
<title>VirtualHostX 1.0.6</title>
<link>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.6.zip</link>
<description><![CDATA[ <ul>
<li>Non-destructive /etc/hosts editing. i.e. you can now add custom entries to your hosts file and VHX won't overwrite them when saving changes.</li>
</ul>]]></description>
<pubDate>Thu, 04 Oct 2007 23:30:34 -0500</pubDate>
<guid>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.6.zip</guid>
<enclosure url='http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.6.zip' length='1027186' type='application/octet-stream' />
</item>
<item>
<title>VirtualHostX 1.0.5</title>
<link>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.5.zip</link>

<description><![CDATA[ <ul>
<li>Can now reorder host list via drag and drop.</li>
<li>Bug fixed with hostnames that contained spaces. (Thanks, <a href="http://reliant-technology.com/">Manning</a>!)</li>
<li>Registering VirtualHostX using drag and drop performs better.</li>
<li>Purchase toolbar button disappears when program is registered. (Previously it required a restart to go away.)</li>
</ul>]]></description>
<pubDate>Thu, 06 Sep 2007 21:35:00 -0500</pubDate>
<guid>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.5.zip</guid>
<enclosure url='http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.5.zip' length='1026696' type='application/octet-stream' />
</item>
<item>
<title>VirtualHostX 1.0.4</title>
<link>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.4.zip</link>
<description><![CDATA[ <ul>
<li>Preliminary MAMP support. Re-run the Setup Wizard to enable it. (Bug reports are very much welcome!)</li>
</ul>]]></description>
<pubDate>Sun, 02 Sep 2007 00:55:43 -0500</pubDate>
<guid>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.4.zip</guid>

<enclosure url='http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.4.zip' length='1026665' type='application/octet-stream' />
</item>
<item>
<title>VirtualHostX 1.0.3</title>
<link>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.3.zip</link>
<description><![CDATA[ <ul><li>New toolbar added</li></ul>]]></description>
<pubDate>Sat, 01 Sep 2007 00:28:17 -0500</pubDate>
<guid>http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.3.zip</guid>
<enclosure url='http://amz.clickontyler.com/virtualhostx/virtualhostx_1.0.3.zip' length='1077071' type='application/octet-stream' />
</item>
</channel>
</rss>