<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'wrapper' => ['width' => 50],
    'choicesType' =>
        [
            'automatic' => 'Automatic',
            'manual' => 'Manual',
        ],
    'choicesVolume' =>
    [
        '5Gal/18.9L' => '5Gal/18.9L',
        '5.2Gal/19.6L'  => '5.2Gal/19.6L',
        '6Gal/22.7L' => '6Gal/22.7L',
        '7.5Gal/28.4L' => '7.5Gal/28.4L',
    ],
    'choicesTrays' =>
    [
        '2/15full' => '2 trays/15full',
        '3/2full, 2half' => '3 trays/2full, 2half',
        '4/3full, 3half' => '4 trays/3full, 3half',
        '5/4full, 4half' => '5 trays/4full, 4half',
    ]

];

$product_filter = new FieldsBuilder( 'Settings for compare filter' );

$product_filter
    ->setLocation('post_type', '==', 'page');

$product_filter
    ->addSelect('filter_autoclave_type',
        [
            'label' => 'Autoclave Type',
            'choices' => $config->choicesType
        ])
    ->addSelect('filter_chamber_volume',
        [
            'label'   => 'Chamber Volume (Gal / Liters)',
            'choices' => $config->choicesVolume
        ])
    ->addSelect('filter_number_of_trays',
        [
            'label'   => 'No. of Trays / Cassettes',
            'choices' => $config->choicesTrays
        ]);


return $product_filter;