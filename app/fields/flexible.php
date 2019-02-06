<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$flexible = new FieldsBuilder('flexible');

$hero = get_field_partial('hero');
$categories = get_field_partial('categories');

$layouts = array($hero, $categories);

$flexible
    ->setLocation('post_type', '==', 'page');

$flexible
    ->addGroup('group_components')
    ->addFlexibleContent('components',
        [
            'instructions' => '',
            'button_label' => 'Add Component',
            'min' => '',
            'max' => '',
        ])
    ->addLayout($hero, $categories)
    ->addText('title')
    ->addText('titleNext')
    ->addTextarea('descriptionFlexible')
    ->addTextarea('descriptionNext');

return $flexible;