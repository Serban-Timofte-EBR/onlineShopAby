<?php

    $this->title = 'Payment';
?>

<link rel="stylesheet" href="<?= Yii::$app->Url->path ?>frontend/web/css/stripe.css">
<script src="https://js.stripe.com/v3/"></script>

 <!-- Display a payment form -->
 <form id="payment-form">
    <div id="card-element"></div>
    <button id="submit">
        <div class="spinner hidden" id="spinner"></div>
        <span id="button-text">Pay</span>
    </button>

    <p id="card-error" role="alert"></p>
    <p class="result-message hidden">
        Payment succeeded.
    </p>
</form>

<script type="text/javascript" src="<?= Yii::$app->Url->path ?>frontend/web/js/stripe.js"></script>