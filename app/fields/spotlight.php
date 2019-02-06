<?php


namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'wrapper' =>
    [
        'width' => 50
    ]
];


$spotlight = new FieldsBuilder('spotlight_block');

$spotlight
    ->setLocation('post_type', '==', 'page');


$spotlight
    ->addText('spotlight_title', ['label' => 'Title'])
    ->addTextarea('spotlight_description', ['label' => 'Description'])
    ->addRepeater('spotlight_items',
        [
            'layout'      => 'block',
            'button_label' => __( 'Add', 'ya' ),
        ])
    ->addText('title', ['wrapper' => $config->wrapper])
    ->addText('sub_title', ['wrapper' => $config->wrapper])
    ->addText('tag_line', ['wrapper' => $config->wrapper])
    ->addPageLink('page_link',
        [
            'return_format' => 'object',
            'post_type' => 'page',
            'wrapper' => $config->wrapper
        ])
    ->addTextarea('description')
    ->addImage('image',
        [
            'return_format' => 'id',
            'preview_size' => 'full',
            'library' => 'all',
        ]);



return $spotlight;