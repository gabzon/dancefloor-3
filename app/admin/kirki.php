<?php


Kirki::add_config( 'df_kirki_theme_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

Kirki::add_panel( 'df_design_panel', array(
    'priority'    => 30,
    'title'       => esc_html__( 'Design', 'sage' ),
    'description' => esc_html__( 'Default colors, fonts, styles', 'sage' ),
) );


Kirki::add_section( 'df_color_section', array(
    'title'          => esc_html__( 'Colors', 'sage' ),
    'description'    => esc_html__( 'Define default theme colors', 'sage' ),
    'panel'          => 'df_design_panel',
    'priority'       => 160,
) );

Kirki::add_section( 'df_fonts_section', array(
    'title'          => esc_html__( 'Fonts', 'sage' ),
    'description'    => esc_html__( 'Define default theme fonts', 'sage' ),
    'panel'          => 'df_design_panel',
    'priority'       => 160,
) );


Kirki::add_field( 'df_default_colors', array(
  'type'        => 'color',
	'settings'    => 'color_setting_hex',
	'label'       => __( 'Color Control (hex-only)', 'textdomain' ),
	'description' => esc_html__( 'This is a color control - without alpha channel.', 'sage' ),
	'section'     => 'df_color_section',
	'default'     => '#0088CC',
) );

Kirki::add_field( 'df_default_fonts', array(
	'type'     => 'text',
	'settings' => 'my_setting',
	'label'    => __( 'Text Control', 'textdomain' ),
	'section'  => 'df_fonts_section',
	'default'  => esc_html__( 'This is a default value', 'textdomain' ),
	'priority' => 10,
) );
