<?php
/*
Title: Classroom information
Taxonomy: classroom
*/

piklist('field',array(
    'type'      => 'text',
    'label'     => __('N°, Address','sage'),
    'field'     => 'classroom_address',
    'columns'   => 12
));

$npa = array(
    'type'      => 'text',
    'label'     => __('ZIP Code','sage'),
    'field'     => 'classroom_postal_code',
    'columns'   => 2
);

$city = array(
    'type'      => 'text',
    'label'     => __('City','sage'),
    'field'     => 'classroom_ville',
    'columns'   => 5
);

$neiborhood = array(
    'type'      => 'text',
    'label'     => __('Neighborhood','sage'),
    'field'     => 'classroom_quartier',
    'columns'   => 5
);

piklist('field',array(
    'type'      => 'group',
    'label'     => __('Place','sage'),
    'fields'    => array(
        $npa,
        $city,
        $neiborhood
    )
));

piklist('field',array(
    'type'      => 'text',
    'label'     => __('Entry code','sage'),
    'field'     => 'classroom_entry_code',
    'help'      => 'Some buildings require an entry code in the front door',
    'columns'   => 3
));

piklist('field',array(
    'type'      => 'text',
    'label'     => __('Google Maps Short Link','sage'),
    'field'     => 'classroom_google_map_link',
    'description' => __('Opens google maps on a new tab','sage'),
    'columns'   => 12
));

piklist('field',array(
    'type'      => 'textarea',
    'label'     => __('Google Map','sage'),
    'field'     => 'classroom_google_map',
    'description' => __('Embed google map on the website','sage'),
    'columns'   => 12
));

piklist('field', array(
    'type'      => 'colorpicker',
    'field'     => 'classroom_color',
    'label'     => __('Classroom color','sage'),
));


piklist('field', array(
    'type' => 'checkbox',
    'field' => 'classroom_require_shoes',
    'value' => 'FALSE',
    'label' => 'Shoes',
    'description' => __('This classroom requires special shoes on the dancefloor','sage'),
    'choices' => array(
        'TRUE' => 'Require shoes'
    )
));

piklist('field', array(
    'type' => 'select',
    'field' => 'classroom_type',
    'value' => 'classroom',
    'label' => 'Classroom Type',
    'description' => __('Define if this is a main studio or a classroom','sage'),
    'choices' => [
      'classroom' => 'Classroom',
      'studio'    => 'Studio'
      ]
));



piklist('field', array(
    'type' => 'file',
    'field' => 'classroom_photos',
    'label' => __('Add Photo(s)','piklist'),
));
