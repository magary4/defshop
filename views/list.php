<?php require "head.php"; ?>

<body>

    <script src="/assets/js/pager.js"></script>
    <div class="container">
        <form class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Color</label>
                    <select id="color-filter" class="form-control" name="color" >
                        <option></option>
                        <?php foreach ($colors as $color) { ?>
                            <option <?= @$query["color"] == $color ? "selected" : ""?>><?= $color?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Page</label>
                    <select id="pager" class="form-control" name="page" >
                        <?php for ($i=1; $i<floor($totalCount/$limit); $i++) { ?>
                            <option <?= @$query["page"] == $i ? "selected" : ""?>><?= $i?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </form>

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
                    <a href="/basket/add?id=<?= $product->getId() ?>" class="btn btn-primary">Buy</a>
                </li>
                <hr/>
            <?php } ?>
        </ul>
    </div>
</body>
