<?php

/*
Title: API Settings
Setting: dancefloor_settings
Tab: API
Flow: Dancefloor Workflow
*/


piklist('field', [
  'type'      => 'text',
  'field'     => 'df_api_youtube_channel',
  'label'     => __('Youtube Key','sage'),
  'columns'   => 12
]);

piklist('field', [
  'type'      => 'text',
  'field'     => 'df_api_appbase_admin_key',
  'label'     => __('Appbase admin Credentials','sage'),
  'columns'   => 12,
]);

piklist('field', [
  'type'        => 'text',
  'field'       => 'df_api_appbase_admin_64encode',
  'description' => __('Please refer to this website <a href="https://www.base64encode.org" target="_blank">base64encode</a>'),
  'label'       => __('Appbase 64encode key','sage'),
  'columns'     => 12,
]);
