<!DOCTYPE html>
<html>
<head>
    <title>DefShop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<div class="container text-right">
    <a href="/">Home</a>&nbsp&nbsp;|&nbsp;&nbsp;
    <?php if ($count = @count($_SESSION[DefShop\Adapter\App\Basket\Basket::BASKET_KEY])) { ?>
    <a href="/basket" class="pull-right"><?= $count ?> item(s) in cart</a>
    <?php } ?>
    <br/><br/>
</div>
