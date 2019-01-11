<?php

/*
Title: General Settings
Setting: dancefloor_settings
Tab: General
Flow: Dancefloor Workflow
*/

piklist('field', [
  'type'      => 'file',
  'field'     => 'df_logo',
  'label'     => __('Logo','sage'),
]);

piklist('field', [
  'type'      => 'text',
  'field'     => 'df_email',
  'label'     => __('Email','sage'),
  'help'      => 'Please enter the official email address',
  'columns'   => 6
]);

piklist('field', [
  'type'      => 'text',
  'field'     => 'df_phone',
  'label'     => __('Phone number','sage'),
  'help'      => 'Please enter the official phone number',
  'columns'   => 6
]);

piklist('field', [
  'type'      => 'text',
  'field'     => 'bank_details',
  'label'     => __('Bank Details','sage'),
  'help'      => 'Please copy the URL of the file',
  'columns'   => 12
]);

piklist('field', [
  'type'      => 'text',
  'field'     => 'schedule',
  'label'     => __('Schedule','sage'),
  'help'      => 'Please copy the URL of the file',
  'columns'   => 12
]);


?>
