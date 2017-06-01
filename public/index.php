<?php

require realpath(__DIR__ . '/../') . '/src/Linio.php';

$values = [ 3 => 'Linio', 5 => 'IT' ];
$result = ( new Linio($values, 'Linianos') )->execute();

foreach ($result as $key => $number) {
    Linio::print($number);
}
