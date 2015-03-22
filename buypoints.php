<?php require_once 'engine/init.php';
protect_page();
include 'layout/overall/header.php'; 

// Import from config:
$paypal = $config['paypal'];
$prices = $config['paypal_prices'];

if ($paypal['enabled']) {
?>

<h3>Donate for Premium Points using PayPal:</h3>
<div class="well">
<table id="buypointsTable" class="table table-striped table-hover">
	<tr class="yellow">
		<th>Price:</th>
		<th>Premium Points:</th>
		<?php if ($paypal['showBonus']) { ?>
			<th>Bonus:</th>
		<?php } ?>
		<th>Action:</th>
	</tr>
		<?php
		foreach ($prices as $price => $points) {
		echo '<tr class="special">';
		echo '<td>'. $price .'('. $paypal['currency'] .')</td>';
		echo '<td>'. $points .'</td>';
		if ($paypal['showBonus']) echo '<td>'. calculate_discount(($paypal['points_per_currency'] * $price), $points) .' bonus</td>';
		?>
		<td>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="POST">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="<?php echo $paypal['email']; ?>">
				<input type="hidden" name="item_name" value="<?php echo $price .' EUR Donation for '. $points .' Points on '. $config['site_title']; ?>">
				<input type="hidden" name="item_number" value="1">
				<input type="hidden" name="amount" value="<?php echo $price; ?>">
				<input type="hidden" name="no_shipping" value="1">
				<input type="hidden" name="no_note" value="1">
				<input type="hidden" name="currency_code" value="<?php echo $paypal['currency']; ?>">
				<input type="hidden" name="lc" value="GB">
				<input type="hidden" name="bn" value="PP-BuyNowBF">
				<input type="hidden" name="return" value="<?php echo $paypal['success']; ?>">
				<input type="hidden" name="cancel_return" value="<?php echo $paypal['failed']; ?>">
				<input type="hidden" name="rm" value="2">
				<input type="hidden" name="notify_url" value="<?php echo $paypal['ipn']; ?>" />
				<input type="hidden" name="custom" value="<?php echo (int)$_SESSION['user_id']; ?>">
				<input type="submit" class="button btn-success" value="  PURCHASE  ">
			</form>
		</td>
		<?php
		echo '</tr>';
		}
		?>
</table>
</div>

<div class="well">
<h3>By donating to the server, you agree to our Terms &amp; Agreements below:</h3><p> 
<br><textarea rows="38" wrap="physical" cols="75" readonly="true" font-family="verdana">
* By donating you are helping us improve the server, and agree that for no reason you will take back/refund your donation.

* Shop points are a virtual currency that can only be traded in for the virtual offers listed on the "Shop Offer" page on our website.

* The payment gateways are not run by us. If you were charged for a transaction and didn't receive your shop points, the problem is usually between you and the payment gateway. You are therefore more likely to solve such issues by contacting the payment gateway. For PayPal issues, mail us at email us.

* We will not be held responsible for any issue that appears during your payment, or if you for any reason lose your shop points or any item you have obtained in the shop.

* You must be authorized to make the payment from the phone or PayPal account you are using.

* We may ask you to provide proof of identity if we suspect that your payment is fraudulent, refusing to provide information that we ask you for will lead to a lockdown of your account until we complete our investigation.
Due to the nature of virtual goods, there is no refund policy.

* Fraudulent payments (e.g. using someone elses phone or PayPal account to purchase shop points) are a violation of our terms and a crime. If you make a fraudulent payment, all your accounts will be permanently locked without further notice and we will supply authorities with any information that they may find necessary about you.

* It's important to highlight the server was made by an independent society, with free use license.

* The collected purchases towards the game server will be put toward improvements of the game/content, plus the monthly fee of the dedicated server.
</textarea><br> 
            </div>
<?php } ?>

<?php
if ($config['paygol']['enabled'] == true) {
?>
<!-- PayGol Form using Post method -->
<h2>Buy points using Paygol:</h2>
<?php $paygol = $config['paygol']; ?>
<p><?php echo $paygol['price'] ." ". $paygol['currency'] ."~ for ". $paygol['points'] ." points:"; ?></p>
<form name="pg_frm" method="post" action="http://www.paygol.com/micropayment/paynow" >
	<input type="hidden" name="pg_serviceid" value="<?php echo $paygol['serviceID']; ?>">
	<input type="hidden" name="pg_currency" value="<?php echo $paygol['currency']; ?>">
	<input type="hidden" name="pg_name" value="<?php echo $paygol['name']; ?>">
	<input type="hidden" name="pg_custom" value="<?php echo $session_user_id; ?>">
	<input type="hidden" name="pg_price" value="<?php echo $paygol['price']; ?>">
	<input type="hidden" name="pg_return_url" value="<?php echo $paygol['returnURL']; ?>">
	<input type="hidden" name="pg_cancel_url" value="<?php echo $paygol['cancelURL']; ?>">
	<input type="image" name="pg_button" src="http://www.paygol.com/micropayment/img/buttons/150/black_en_pbm.png" border="0" alt="Make payments with PayGol: the easiest way!" title="Make payments with PayGol: the easiest way!">
</form>
<?php }

if (!$config['paypal']['enabled'] && !$config['paygol']['enabled']) echo '<h1>Buy Points system disabled.</h1><p>Sorry, this functionality is disabled.</p>';
include 'layout/overall/footer.php'; ?>