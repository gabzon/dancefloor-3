<?php

// Default (body and p)
Kirki::add_field( 'df_default_fonts', array(
  'type'     => 'text',
  'settings' => 'df_fonts',
  'label'    => __( 'Text Control', 'sage' ),
  'section'  => 'df_fonts_section',
  'default'  => esc_html__( 'This is a default value', 'sage' ),
  'priority' => 10,
) );


// links

//h1,h2,h3,h4,h5,h6
