<?php
/**
 * ecofood Helper Functions
 *
 * Define here all your functions that will not be hooked to WordPress
 *
 * @package  WordPress
 * @subpackage ecofood
 * @since 1.0
 * @author Mystro Ken <mystroken@gmail.com>
 */

/**
 * Returns the full path to the main template file.
 *
 * @package ecofood
 * @since 1.0
 * @return string
 */
function ecofood_template_path() {
	return ecofood_Wrapping::$main_template;
}



/**
 * Returns the full path to an asset of the theme.
 *
 * @param string $file The asset name to load.
 */
function ecofood_asset( $file ) {
	return get_template_directory() . '/resources/assets/' . $file;
}
