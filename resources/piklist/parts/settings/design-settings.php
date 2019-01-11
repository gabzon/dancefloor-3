<?php

/*
Title: Design Settings
Setting: dancefloor_settings
Tab: Design
Flow: Dancefloor Workflow
*/

piklist('field', [
  'type'      => 'select',
  'field'     => 'df_display_news_title',
  'value'     => 'yes',
  'label'     => __('Display News title','sage'),
  'choices'   => [
    'yes' => 'yes',
    'non' => 'non',
  ]
]);

piklist('field',[
  'type'  => 'editor',
  'field' => 'df_schedule_message',
  'label' => __('Display a message in the Schedule page','sage'),
  'options' => array( // Pass any option that is accepted by wp_editor()
    'wpautop' => true,
    'media_buttons' => true,
    'shortcode_buttons' => true,
    'teeny' => false,
    'dfw' => false,
    'quicktags' => true,
    'drag_drop_upload' => true,
    'tinymce' => array(
      'resize' => false,
      'wp_autoresize_on' => true
    )
  )
]);

piklist('field', [
  'type'      => 'select',
  'field'     => 'df_display_schedule_color',
  'value'     => 'style',
  'label'     => __('Display color bar in schedule according to:','sage'),
  'choices'   => [
    'style' => 'style',
    'classroom' => 'classroom',
  ]
]);

piklist('field', [
  'type'      => 'select',
  'field'     => 'df_display_inscription_button',
  'value'     => 'yes',
  'label'     => __('Display inscription button in course page:','sage'),
  'choices'   => [
    'yes' => 'yes',
    'no' => 'no',
  ]
]);

piklist('field', [
  'type'      => 'select',
  'field'     => 'df_display_team_member_name',
  'value'     => 'nickname',
  'label'     => __('Display either nickname or fullname:','sage'),
  'choices'   => [
    'nickname' => 'Nickname',
    'fullname' => 'Fullname',
  ]
]);
