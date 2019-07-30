<?php
/*
Title: Figure information
Post Type: figure
*/

piklist('field',array(
  'type'        => 'text',
  'label'       => __('Video on Music','sage'),
  'field'       => 'df_figure_youtube_music',
  'columns'     => 12,
));

piklist('field',array(
  'type'        => 'text',
  'label'       => __('Video on Counts','sage'),
  'field'       => 'df_figure_youtube_oncounts',
  'columns'     => 12,
));

piklist('field',array(
  'type'        => 'number',
  'label'       => __('Bars','sage'),
  'help'        => __('Bars (or measure), a musical notation that represents a segment of time corresponding to a specific number of beats. In salsa, 1 bar = 8 beats','sage'),
  'field'       => 'df_figure_bars',
  'columns'     => 2,
));

piklist('field', [
  'type' => 'checkbox',
  'label' => __('Figure type','sage'),
  'field' => 'df_figure_type',
  'choices' => array(
    'footwork' => 'Footwork',
    'partnerwork' => 'Partnerwork',
    'group' => 'Group choreography',
    'casino' => 'Rueda de Casino'
  )
  ]
);

piklist('field',array(
  'type'        => 'text',
  'label'       => __('Appbase ID','sage'),
  'field'       => 'df_figure_appbase_id',
  'attributes'  => ['readonly' => 'readonly'],
  'columns'     => 12,
));
?>
