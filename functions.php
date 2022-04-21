<?php

//require MySQL Connection
require('Database/DBController.php');

require('Database/Product.php');

require('Database/Cart.php');

$db = new DBController();
$product = new Product($db);
$product_shuffle = $product->getData();
$cart = new Cart($db);
