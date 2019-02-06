<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'wrapper' => ['width' => 50],
    'wrapperAdditional' => ['width' => 25],
    'wrapperSelect' => ['width' => 33.33],
    'choices' => ['top' => 'Top'],
    'choicesAdditional' =>
        [
        'yes' => 'Yes',
        'no' => 'No',
        ]
];

$product_settings = new FieldsBuilder( 'product_settings' );

$product_settings
    ->setLocation('post_type', '==', 'page');

$product_settings
    ->addText('chamber_size', ['wrapper' => $config->wrapper])
    ->addText('overall_dimensions', ['wrapper' => $config->wrapper])
    ->addText('weight_capacity', ['wrapper' => $config->wrapperAdditional])
    ->addText('chamber_volume', ['wrapper' => $config->wrapperAdditional])
    ->addText('number_of_trays', ['wrapper' => $config->wrapperAdditional])
    ->addText('voltage', ['wrapper' => $config->wrapperAdditional])
    ->addText('shipping_weight')
    ->addSelect('water_fill_access',
        [
            'choices' => $config->choices,
            'wrapper' => $config->wrapperSelect
        ])
    ->addSelect('optional_printer',
        [
            'choices' => $config->choicesAdditional,
            'wrapper' => $config->wrapperSelect
        ])
    ->addSelect('closed_door_drying',
        [
            'choices' => $config->choicesAdditional,
            'wrapper' => $config->wrapperSelect
        ])
    ->addTextarea('warrenty', ['wrapper' => $config->wrapper])
    ->addTextarea('custom_cycles', ['wrapper' => $config->wrapper])
    ->addText('preset_cycles', ['wrapper' => $config->wrapperSelect])
    ->addSelect('rpcr_software',
        [
            'choices' => $config->choicesAdditional,
            'wrapper' => $config->wrapperSelect
        ])
    ->addSelect('usb_port',
        [
            'choices' => $config->choicesAdditional,
            'wrapper' => $config->wrapperSelect
        ]);

return $product_settings;