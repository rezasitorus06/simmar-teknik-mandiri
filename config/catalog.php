<?php

return [
    'categories' => [
        'Aksesoris' => [
            'Strainer (saringan)',
            'Valve',
        ],
        'Flow Meter' => [
            'Flow meter digital',
            'Flow meter Tokico',
            'Flow meter LC',
            'Fill Rite dan Fuel Rite',
            'Macnaught flow meter',
        ],
        'Meteran Air' => array_merge([
            'Water meter air limbah / sewage',
            'Meteran air vertikal',
            'Meteran air digital',
        ], array_map(fn (int $size): string => 'Water meter '.$size.'"', range(1, 20))),
        'Service Flow Meter' => [
            'Service water meter dan flow meter',
        ],
    ],
];
