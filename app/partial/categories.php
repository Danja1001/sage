<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'wrapper' => ['width' => '50']
];

$categories = new FieldsBuilder( 'categories' );

$categories
    ->addFlexibleContent('hub_category')
    ->addImage('main_image',
        [
            'return_format' => 'array',
            'preview_size' => 'full',
            'library' => 'all',
        ])
    ->addText('descriptionTitle', ['label' => 'Title'])
    ->addText('sub_title', ['wrapper' => $config->wrapper])
    ->addTextarea('descriptionText')
    ->addText('main_link', ['wrapper' => $config->wrapper])
    ->addText('main_link_text', ['wrapper' => $config->wrapper])
    ->addRepeater('categories',
        [
            'button_label' => __( 'Add Link', 'ya' ),
            'layout' => 'block',
        ])
    ->addImage('background',
        [
            'return_format' => 'array',
            'preview_size' => 'full',
            'library' => 'all',
        ])
    ->addText('title', ['wrapper' => $config->wrapper])
    ->addPageLink('page_link', ['wrapper' => $config->wrapper]);



return $categories;