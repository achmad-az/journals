<?php
/**
 * journals Helper Functions
 *
 * Define here all your functions that will not be hooked to WordPress
 *
 * @package  WordPress
 * @subpackage journals
 * @since 1.0
 * @author Mystro Ken <mystroken@gmail.com>
 */

/**
 * Returns the full path to the main template file.
 *
 * @package journals
 * @since 1.0
 * @return string
 */
function journals_template_path() {
	return journals_Wrapping::$main_template;
}



/**
 * Returns the full path to an asset of the theme.
 *
 * @param string $file The asset name to load.
 */
function journals_asset( $file ) {
	return get_template_directory() . '/resources/assets/' . $file;
}
