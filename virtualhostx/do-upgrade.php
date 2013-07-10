---
title: VirtualHostX 4.0 Upgrade
layout: page
permalink: /do-upgrade.php
---
<h2 class="title">VirtualHostX 4.0 Upgrade</h2>
<?PHP
	require '/var/www/shine.clickontyler.com/includes/master.inc.php';
	$db = Database::getDatabase();
	$email = $db->escape(isset($_POST['email']) ? $_POST['email'] : 'noemail');
	$orders = DBObject::glob('order', "SELECT * FROM shine_orders WHERE (app_id = '2' OR app_id = '3' OR app_id = '15')  AND payer_email = '$email' ORDER BY dt DESC");
?>

<?PHP 	if(count($orders) == 0) : ?>

	<p>We're sorry, but we couldn't find an order with that email address. Feel free to contact us at <a href='mailto:support@clickontyler.com'>support@clickontyler.com</a> and we'll be happy to help find your order.</p>

<?PHP else : ?>

<h4>Here's a list of your previous orders. Please choose which one(s) you'd like to upgrade.</h4>

<table>
<?PHP foreach($orders as $o) : ?>
<tr>
	<td><?PHP echo dater($o->dt, 'n/j/Y'); ?></td>
	<td><?PHP echo $o->applicationName(); ?></td>
	<td><?PHP echo $o->quantity; ?> license<?PHP echo ($o->quantity == 1) ? '' : 's';?></td>
	<td>
		<?PHP if($o->upgraded == '1') : ?>
		<a href="#">Already upgraded</a>
		<?PHP else : ?>
		<a href="do-upgrade2.php?id=<?PHP echo $o->id; ?>">Upgrade</a>
		<?PHP endif; ?>
	</td>
</tr>
<?PHP endforeach; ?>

<?PHP if(count($orders) > 1) : ?>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><a href="do-upgrade2.php?all=<?PHP echo $o->payer_email; ?>">Upgrade All Orders</a></td>
	</tr>
<?PHP endif; ?>

</table>

<p>If you have any questions about the upgrade process, feel free to contact us at <a href='mailto:support@clickontyler.com'>support@clickontyler.com</a> and we'll be happy to help.</p>

<?PHP endif; ?>
