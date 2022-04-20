<?php

//require MySQL Connection
require('Database/DBController.php');

require('Database/Product.php');

$db = new DBController();
$product = new Product($db);
