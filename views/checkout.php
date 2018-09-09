<?php require "head.php"; ?>

<body>
    <div class="container">

        <h1>Checkout</h1>

        <?php if (isset($submitted)) { // I consider that form is valid. TODO: hande form errors after form-component integration ?>
        <div class="alert alert-success" role="alert">
            Order successfully submitted
        </div>
        <?php } else { ?>
        <form method="post" >
            <?php foreach ( $paymentMethods as $method ) { ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payload[paymentMethod]" id="radio_<?= $method ?>" value="<?= $method ?>" checked>
                <label class="form-check-label" for="radio_<?= $method ?>">
                    <?= $method ?>
                </label>
            </div>
            <?php } ?>
            <br/>
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
        <?php } ?>
    </div>
</body>