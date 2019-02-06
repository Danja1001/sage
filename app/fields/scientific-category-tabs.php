<?php


namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'wrapper' => ['width' => 50],

];

$tabs_settings = [ 'type' => 'accordion', 'placement' => 'top' ];


$tabs = new FieldsBuilder( 'scientific_category_tabs' );

$tabs
    ->setLocation('post_type', '==', 'page');


$tabs->addTab('Tab autoclave operation', $tabs_settings)
    ->addText('operation_title', ['label' => 'Title'])
    ->addTextarea('operation_description', ['label' => 'Description'])
    ->addImage('operation_main_image',
        [
            'label' => 'Main Image',
            'type' => 'image',
            'return_format' => 'id',
            'preview_size' => 'full',
            'library' => 'all',
        ])
    ->addWysiwyg('operation_content',
        [
            'label' => 'Content',
            'tabs'         => 'visual',
            'toolbar'      => 'full',
        ]);


$tabs->addTab('Tab Overview', $tabs_settings)
    ->addText('overview_title', ['label' => 'Title'])
    ->addTextarea('overview_description', ['label' => 'Description'])
    ->addRepeater('overview_items',
        [
            'label' => 'Items',
            'layout'      => 'block',
            'button_label' => __( 'Add Icon', 'ya' ),
        ])
    ->addImage('icon',
        [
            'return_format' => 'id',
            'preview_size'  => 'full',
            'library'       => 'all',
        ])
    ->addText('title')
    ->addTextarea('description');


$tabs->addTab('Planing and customization', $tabs_settings)
    ->addImage('planning_main_image',
        [
            'label' => 'Main Image',
            'return_format' => 'id',
            'preview_size' => 'full',
            'library' => 'all',
        ])
    ->addWysiwyg('planning_content',
        [
            'label' => 'Content',
            'tabs'         => 'visual',
            'toolbar'      => 'full',
        ]);





return $tabs;