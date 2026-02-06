<?php

declare(strict_types=1);

namespace Builder\SolutionV1;

require_once __DIR__.'/../../vendor/autoload.php';
use Builder\SolutionV1\Order\OrderFacade;


$data = [
    [
    'customer_name' => 'Cristiano Souza',
    'customer_type' => 'NP',
    'items' => [
            ['name' => 'Notebook', 'price' => 250],
            ['name' => 'Mouse', 'price' => 250],
        ]
    ],
    ['customer_name' => 'Cristiano Souza',
        'customer_type' => 'CO',
        'items' => [
            ['name' => 'Notebook', 'price' => 3500],
            ['name' => 'Mouse', 'price' => 150],
        ]
    ]
];

foreach ($data as $item) {
    (new OrderFacade)->processOrder($item);
    echo '<br>';
    echo '<br>';
}


