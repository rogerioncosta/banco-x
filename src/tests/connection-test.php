<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use BancoX\shared\ConnectionDb;

$instanceDb = ConnectionDb::get();

$sql = 'SELECT * FROM user';

$result= $instanceDb->query($sql)->fetchAll();

print_r($result);
