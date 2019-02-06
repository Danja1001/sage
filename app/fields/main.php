<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'preview_size' => 'full',
    'ui' => 1,
    'wrapper' => ['width' => 50],
];

$page = new FieldsBuilder('Main block');

$page
    ->setLocation('post_type', '==', 'page');

$page
    ->addGroup('Sub')
    ->addText('Sub title')
    ->addTextarea('Short Description', ['wrapper' => $config->wrapper])
    ->addTextarea('Long Description', ['wrapper' => $config->wrapper])
    ->addImage('Image', ['preview_size' => $config->preview_size])
    ->addText('Contact link', ['wrapper' => $config->wrapper])
    ->addText('Contact link text', ['wrapper' => $config->wrapper])
    ->addText('Video link', ['wrapper' => $config->wrapper])
    ->addText('Video link text', ['wrapper' => $config->wrapper])
    ->endGroup();

//    ->addGroup('Sub2')
//    ->addText('Sub tit2le')
//    ->endGroup()
//
//    ->addGroup('Sub3')
//    ->addText('Sub tit3le')
//    ->endGroup()
//
//    ->addUrl('url', ['label' => 'URL', 'wrapper' => $config->wrapper])
//    ->setInstructions('URL for the button to link to')
//
//    ->addSelect('size', ['ui' => $config->ui, 'allow_null' => 1, 'placeholder' => 'Default', 'wrapper' => $config->wrapper])
//    ->addChoices(['small' => 'Small'], ['medium' => 'Medium'], ['large' => 'Large'])
//    ->setInstructions('The size of the button.')
//
//    ->addSelect('color', ['ui' => $config->ui, 'allow_null' => 1, 'placeholder' => 'None', 'wrapper' => $config->wrapper])
//    ->addChoices(['blue' => 'Blue'], ['red' => 'Red'], ['green' => 'Green'])
//    ->setInstructions('The background color of the button.')
//
//    ->addTrueFalse('rounded', ['ui' => $config->ui])
//    ->setInstructions('Make the button round.')
//
//    ->addTrueFalse('centered', ['ui' => $config->ui])
//    ->setInstructions('Center the button horizontally.');


return $page;