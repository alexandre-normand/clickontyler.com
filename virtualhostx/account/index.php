---
title: VirtualHostX - Your Account
layout: default
permalink: /index.php
---
<?PHP
	require '/var/www/shine.clickontyler.com/includes/master.inc.php';
	if(!$VHXAuth->loggedIn()) redirect('/virtualhostx/');
	
	// if(isset($_POST['btnPassword'])) {
	// 	$VHXAuth->changeCurrentPassword($_POST['password']);
	// 	redirect('/virtualhostx/account/');
	// }

	if($VHXAuth->user->subscription_active == 1) {
		$account_status = 'a monthly subscription';
	} else if($VHXAuth->user->total_tokens == 0) {
		$account_status = 'a trial account';
	} else if($VHXAuth->user->tokens == 1) {
		$account_status = 'one token remaining';
	} else {
		$account_status = $VHXAuth->user->tokens . ' tokens remaining';
	}

	$db      = Database::getDatabase();
	$_email  = $db->quote($VHXAuth->username);
	$orders  = DBObject::glob('Order', "SELECT * FROM shine_orders WHERE payer_email = $_email ORDER BY dt DESC");
	$tunnels = DBObject::glob('VHXTunnel', "SELECT * FROM vhx_tunnels WHERE user_id = '{$VHXAuth->id}' ORDER BY dt_created DESC LIMIT 10");
?>
<div id="bd" class="product">
	<div class="yui-gd band1"> 
	    <div class="yui-u first center"> 
			<img src="{{ site.cdn_url }}/images/virtualhostx-logo180.png" width="180" height="180"> 
	    </div> 
	    <div class="yui-u left">
			<h2>Your Account</h2> 
			<p><em>Manage your Lift Off account</em></p>
			<p>Thanks for using Lift Off. From this page you can purchase a subscription or pay-as-you-go credits and view recent transactions<!-- , and change your account password -->.</p>
			<p>If you have any questions or need further help, feel free to contact us at <a href="mailto:support@clickontyler.com">support@clickontyler.com</a></p>
	    </div> 
	</div> 
	<div class="yui-g band4">
		<h3>Account Info</h3>
		<form action="/virtualhostx/account" method="post">
			<p>You are logged in as <em><?PHP echo $VHXAuth->username; ?></em> and have <em><?PHP echo $account_status; ?></em>.</p><br>
			<!-- <p>New Password: <input type="text" name="password" value="" id="password"> <input type="submit" name="btnPassword" value="Change Password" id="btnPassword"></p> -->
		</form>
	</div> 
	<div class="yui-g band3">
		<h3>Purchase Credits</h3>
		<p><em><a href="https://sites.fastspring.com/clickontyler/instant/LiftOff">5 Credits</a></em></p>
		<p><em><a href="https://sites.fastspring.com/clickontyler/instant/LiftOff">10 Credits</a></em> - Save 10%</p>
		<p><em><a href="https://sites.fastspring.com/clickontyler/instant/LiftOff">25 Credits</a></em> - Save 20%</p>
		<p><em><a href="https://sites.fastspring.com/clickontyler/instant/LiftOff">Monthly Subscription</a></em> - a monthly subscription to Lift Off lets you use the service as often as you want.</p>
	</div> 
	<div class="yui-g band4">
		<div class="yui-u first">
			<h3>Purchase History</h3>
			<ul>
				<?PHP foreach($orders as $o) : ?>
				<li><?PHP echo dater($o->dt, 'F j, Y'); ?> - <?PHP echo $o->applicationName(); ?></li>
				<?PHP endforeach; ?>
			</ul>
		</div>

		<div class="yui-u">
			<h3>Recent Lift Off Usage</h3>
			<table style="width:100%;">
				<?PHP foreach($tunnels as $t) : ?>
				<tr>
					<td><?PHP echo dater($t->dt_created, 'Y-m-d g:ia'); ?></td>
					<td><?PHP echo $t->hostname; ?></td>
				</tr>
				<?PHP endforeach; ?>
			</table>
		</div>
    </div> 
	<div class="yui-g band5">
		
	</div>
</div>