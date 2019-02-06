<?php


namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$market = new FieldsBuilder('market_block');

$market
    ->setLocation('post_type', '==', 'page');


$market
    ->addText('market_title', ['label' => 'Title'])
    ->addTextarea('market_description', ['label' => 'Description'])
    ->addRepeater('market_items',
        [
            'type'         => 'repeater',
            'layout'      => 'block',
            'button_label' => __( 'Add', 'ya' ),
        ])
    ->addText('title')
    ->addTextarea('description')
    ->addImage('background_image',
        [
            'return_format' => 'url',
            'preview_size' => 'full',
            'library' => 'all',
        ])
    ->addPostObject('post_object',
        [
            'return_format' => 'object',
            'post_type' => 'page'
        ]);


return $market;