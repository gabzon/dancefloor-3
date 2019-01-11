<?php
/*
Title: User extra info
Capability: manage_options
*/

piklist('field',[
    'type' => 'file',
    'field' => 'photo',
    'label' => __('Add File(s)','piklist'),
    'description' => __('This is the uploader seen in the admin by default.','piklist'),
    'options' => [
        'basic' => true,
        'modal_title' => __('Add File(s)','piklist'),
        'button' => __('Add','piklist'),
    ],
]);

// Let's create a text box field
piklist('field', array(
    'type'      => 'text',
    'field'     => 'phone',
    'label'     => __('Phone number','sage'),
    'columns'   => 4
));

piklist('field', array(
    'type'      => 'text',
    'field'     => 'faceboox',
    'label'     => __('facebook','sage'),
    'columns'   => 8
));

piklist('field', array(
    'type'      => 'text',
    'field'     => 'title',
    'label'     => __('Title','sage'),
    'columns'   => 8
));

piklist('field', array(
    'type'      => 'text',
    'field'     => 'skills',
    'label'     => __('Styles & Talents','sage'),
    'add_more'  => true,
    'columns'   => 12
));

piklist('field', array(
    'type'      => 'editor',
    'field'     => 'accomplishments',
    'label'     => __('Accomplishments','sage'),
    'columns'   => 12
    ,'options' => array (
          'wpautop' => true
          ,'media_buttons' => true
          ,'tabindex' => ''
          ,'editor_css' => ''
          ,'editor_class' => ''
          ,'teeny' => false
          ,'dfw' => false
          ,'tinymce' => true
          ,'quicktags' => true
        )
));
