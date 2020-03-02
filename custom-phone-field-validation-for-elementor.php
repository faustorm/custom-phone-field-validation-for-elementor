<?php
/*
Plugin Name: Custom Phone Field Validation for Elementor
Plugin URI: https://faus.to/wordpress-plugins/
Description: Customize the "tel" form validation for Elementor
Version: 0.0.1
Author: Fausto Ruiz Madrid
Author URI: https://faus.to
Text Domain: custom-phone-field-validation-for-elementor
Domain Path: /languages
*/

add_action( 'elementor_pro/forms/validation/tel', function( $field, $record, $ajax_handler ) {
	//remove native validation
	/**
	 * @var \ElementorPro\Modules\Forms\Module $forms_module
	 */
	$forms_module = \ElementorPro\Plugin::instance()->modules_manager->get_modules( 'forms' );
	remove_action( 'elementor_pro/forms/validation/tel', [ $forms_module->field_types['tel'], 'validation' ] );

	// run your own validation, ex:
	if ( empty( $field['value'] ) ) {
		return;
	}
	// Match this format XXX-XXX-XXXX, 123-456-7890
	if ( preg_match( '/[0-9]{3}(-?)[0-9]{3}(-?)[0-9]{4}/', $field['value'] ) !== 1 ) {
		$ajax_handler->add_error( $field['id'], 'Please make sure the phone number is in XXX-XXX-XXXX format, eg: 123-456-7890' );
	}
}, 9, 3 );

add_action( 'elementor_pro/forms/render_field/tel', function( $item, $item_index, $form ) {
	//remove native render
	/**
	 * @var \ElementorPro\Modules\Forms\Module $forms_module
	 */
	$forms_module = \ElementorPro\Plugin::instance()->modules_manager->get_modules( 'forms' );
	remove_action( 'elementor_pro/forms/render_field/tel', [$forms_module->field_types['tel'] , 'field_render' ], 10, 3 );

	// add your custom render ex:
	$form->add_render_attribute( 'input' . $item_index, 'class', 'elementor-field-textual' );
	$form->add_render_attribute( 'input' . $item_index, 'pattern', '[0-9]{3}(-?)[0-9]{3}(-?)[0-9]{4}' );
	$form->add_render_attribute( 'input' . $item_index, 'title', __( 'Number should be in this format xxx-xxx-xxxx.', 'plugin-name' ) );
	echo '<input size="1" ' . $form->get_render_attribute_string( 'input' . $item_index ) . '>';
}, 9, 3 );