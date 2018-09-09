<?php require "head.php"; ?>

<body>
    <div class="container">
        <h1>Basket</h1>
        <?php if (!count($products)) { ?>
            <div class="alert alert-danger" role="alert">
                No results found
            </div>
        <?php } ?>

        <ul class="list-unstyled">
            <?php foreach ($products as $product) { ?>
                <li class="media">
                    <img class="mr-3" src="<?= $product->getImage()?>" alt="<?= $product->getName()?>">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1"><?= $product->getName()?></h5>
                        <h4 class="card-title pricing-card-title">Color: <small class="text-muted"><?= $product->getColor()?></small></h4>
                        <h2 class="card-title pricing-card-title">$ <?= money_format('%i', $product->getPrice()/100)?> <small class="text-muted">/ gross $<?= money_format('%i', $product->getPriceGross()/100)?></small></h2>

                    </div>
                    <a href="/basket/remove?id=<?= $product->getId() ?>" class="btn btn-primary">Remove</a>
                </li>
                <hr/>
            <?php } ?>
        </ul>

        <?php if (count($products)) { ?>
            <a href="/checkout" class="btn btn-primary">Checkout</a>
        <?php } ?>
    </div>
</body>
