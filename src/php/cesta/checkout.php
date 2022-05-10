<?php
	/*session_start();
	//user needs to login to checkout
	$_SESSION['message'] = 'You need to login to checkout';
	header('location: view_cart.php');*/
?>

<div id="paymentSection">
    <form method="post" id="paymentForm">
        <h4>Payable amount: $10 USD</h4>
        <ul>
            <input type="hidden" name="card_type" id="card_type" value=""/>
            <li>
                <label for="card_number">Card number (<a href="javascript:void(0);" id="sample-numbers-trigger">try one of these</a>)</label>
                <div class="numbers" style="display: none;">
                    <p>Try some of these numbers:</p>
                    <ul class="list">
                        <li><a href="javascript:void(0);">4000 0000 0000 0002</a></li>
                        <li><a href="javascript:void(0);">5018 0000 0009</a></li>
                        <li><a href="javascript:void(0);">5100 0000 0000 0008</a></li>
                        <li><a href="javascript:void(0);">6011 0000 0000 0004</a></li>
                    </ul>
                </div>
                <input type="text" placeholder="1234 5678 9012 3456" id="card_number" name="card_number" class="">
                <small class="help">This demo supports Visa, American Express, Maestro, MasterCard and Discover.</small>
            </li>
            <li class="vertical">
                <ul>
                    <li>
                        <label for="expiry_month">Expiry month</label>
                        <input type="text" placeholder="MM" maxlength="5" id="expiry_month" name="expiry_month">
                    </li>
                    <li>
                        <label for="expiry_year">Expiry year</label>
                        <input type="text" placeholder="YYYY" maxlength="5" id="expiry_year" name="expiry_year">
                    </li>
                    <li>
                        <label for="cvv">CVV</label>
                        <input type="text" placeholder="123" maxlength="3" id="cvv" name="cvv">
                    </li>
                </ul>
            </li>
            <li>
                <label for="name_on_card">Name on card</label>
                <input type="text" placeholder="Codex World" id="name_on_card" name="name_on_card">
            </li>
            <li><input type="button" name="card_submit" id="cardSubmitBtn" value="Proceed" class="payment-btn" disabled="true" ></li>
            <p style="color:#EA0075;">Note that: This demo will working with PayPal sandbox accounts.</p>
        </ul>
    </form>
</div>
<div id="orderInfo" style="display: none;"></div>