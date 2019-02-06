<?php

if (class_exists('Kirki')) {

	Kirki::add_config( 'df_theme_config', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );

	/* Panels *******************************************************************/
	Kirki::add_panel( 'df_design_panel', array(
		'priority'    => 30,
		'title'       => esc_html__( 'Design', 'sage' ),
		'description' => esc_html__( 'Default colors, fonts, styles', 'sage' ),
	) );

	Kirki::add_panel( 'df_templates_panel', array(
		'priority'    => 35,
		'title'       => esc_html__( 'Page templates', 'sage' ),
		'description' => esc_html__( 'Default style for page templates', 'sage' ),
	) );

	/* Sections *****************************************************************/
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

	Kirki::add_section( 'df_default_template_section', array(
		'title'          => esc_html__( 'Default template', 'sage' ),
		'description'    => esc_html__( 'Define view for default', 'sage' ),
		'panel'          => 'df_templates_panel',
		'priority'       => 160,
	) );

	/* Controls *****************************************************************/

	include_once('kirki/fonts.php');
	include_once('kirki/colors.php');

	Kirki::add_field( 'df_theme_config', array(
		'type'        => 'select',
		'settings'    => 'my_setting',
		'label'       => __( 'This is the label', 'textdomain' ),
		'section'     => 'df_default_template_section',
		'default'     => 'option-1',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => array(
			'option-1' => esc_html__( 'Option 1', 'textdomain' ),
			'option-2' => esc_html__( 'Option 2', 'textdomain' ),
			'option-3' => esc_html__( 'Option 3', 'textdomain' ),
			'option-4' => esc_html__( 'Option 4', 'textdomain' ),
		),
	) );

}
