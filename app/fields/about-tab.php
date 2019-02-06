<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'wrapper' =>
        [
            'width' => 50
        ],
    'tabSettings' =>
    [
        'type' => 'accordion', 'placement' => 'top'
    ]
];


$aboutTabs = new FieldsBuilder('about');

$aboutTabs
    ->setLocation('post_type', '==', 'page');

$aboutTabs
    ->addTab('Mission and Values', $config->tabSettings)
    ->addText('mission_title', ['wrapper' => $config->wrapper])
    ->addTextarea('mission_description');




$aboutTabs->addTab('Global Presence', $config->tabSettings)
    ->addText('global_title', ['wrapper' => $config->wrapper])
    ->addTextarea('global_description')
    ->addImage('global_image',
        [
            'label' => 'Image',
            'type' => 'image',
            'return_format' => 'id',
            'preview_size' => 'full',
            'library' => 'all',
        ]);



$aboutTabs->addTab('Quality Assurance', $config->tabSettings)
    ->addText('quality_title', ['wrapper' => $config->wrapper])
    ->addTextarea('quality_description')
    ->addRepeater('quality_repeater',
        [
            'label' => 'Quality Assurance',
            'layout'      => 'block',
            'button_label' => __( 'Add Icon', 'ya' ),
        ])
    ->addText('quality_repeater_title', ['wrapper' => $config->wrapper])
    ->addTextarea('quality_repeater_description')
    ->endRepeater();

return $aboutTabs;

