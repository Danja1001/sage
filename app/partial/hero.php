<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'wrapper' => ['width' => '50']
];

$hero = new FieldsBuilder( 'hero' );

$hero
    ->addFlexibleContent('slider')
    ->addRepeater('herro_slider',
        [
            'button_label' => __( 'Add Slide', 'ya' ),
            'layout' => 'block',
        ])
    ->addText('title')
    ->addTextarea('descriptionHero')
    ->addImage('background',
        [
            'return_format' => 'array',
            'preview_size' => 'full',
            'library' => 'all',
        ])
    ->addText('contact_link', ['wrapper' => $config->wrapper])
    ->addText('contact_link_text', ['wrapper' => $config->wrapper])
    ->addText('video_link', ['wrapper' => $config->wrapper])
    ->addText('video_link_text', ['wrapper' => $config->wrapper]);


return $hero;