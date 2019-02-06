<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Migration extends Controller
{
    private $wpdb = [];
    private $table = 'postmeta';
    private $prefix = '_';
    private $array = [
        'sub_title' => 'main_sub_title',
        'short_description' => 'main_short_description',
        'long_description' => 'main_long_description',
        'image' => 'main_image',
        'contact_link' => 'main_contact_link',
        'contact_link_text' => 'main_contact_link_text',
        'video_link' => 'main_video_link',
        'video_link_text' => 'main_video_link_text',
    ];


    public function __construct()
    {
        global $wpdb;

        $this->wpdb = $wpdb;
    }

    protected function select($table, $key)
    {
        $field = $this->wpdb->get_results(
            "SELECT * FROM $table WHERE meta_key = '" . $key . "'", OBJECT
        );

        return $field;
    }

    protected function update($fieldObj, $table, $newKey)
    {
        if (sizeof($fieldObj) >= 1) {
            foreach ($fieldObj as $item) {
                if (!empty($newKey)) {
                    $this->wpdb->update($table, array(
                        'meta_key' => $newKey
                    ), array('meta_id' => $item->meta_id));
                }
            }
        }
    }

    public function preparationToUpdate()
    {
        if (!empty($_POST)) {
            foreach ($this->array as $oldKey => $newKey) {
                if (!empty($oldKey)) {
                    $table = $this->wpdb->prefix . $this->table;

                    $fieldWithoutPrefix = $this->select($table, $oldKey);
                    $fieldWithPrefix = $this->select($table, $this->prefix . $oldKey);

                    $this->update($fieldWithoutPrefix, $table, $newKey);
                    $this->update($fieldWithPrefix, $table, $newKey);
                }
            }
        }
    }
}