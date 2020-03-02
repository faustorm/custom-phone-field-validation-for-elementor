=== Custom Phone Field Validation For Elementor ===
Contributors: faustorm
Donate link: https://faus.to
Tags: wordpress, elementor, form validation
Requires at least: 5.1
Tested up to: 5.3
Requires PHP: 7.2
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 
Here is a short description of the plugin.  This should be no more than 150 characters.  No markup here.
 
== Description ==
 
This pluging is made to override the normal functionality of the "tel" field form validation for Elementor, it just changes the regex used to make this validation.

For now, you must change manually the regex for your desired one. This plugin comes whit this one: '/[6|7][0-9]{8}/', which is for the spanish mobile phones.

 
== Installation ==
 
This section describes how to install the plugin and get it working.
 
e.g.
 
1. Clone this repository into your `/wp-content/plugins/` directory
1. Customize the regex code into `custom-phone-field-validation-for-elementor.php`
1. Customize the langs into `custom-phone-field-validation-for-elementor.php`
1. Activate the plugin through the 'Plugins' menu in WordPress
 
== Changelog ==
 
= 0.1 =
* Minimal functionality