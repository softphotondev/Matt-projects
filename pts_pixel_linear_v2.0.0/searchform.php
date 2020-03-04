<?php
/**
 * Search Form Template
 *
 *
 * @file           searchform.php
 * @package        Pixel-Linear 
 * @author        Scepter Marketing 
 * @copyright      2014 - 2019 Scepter Marketing Themes
 * @license        license.txt
 * @version        Release: 1.0.0
 * @link           http://codex.wordpress.org/Function_Reference/get_search_form
 * @since          available since Release 1.0
 */
?>
	<form method="get" class="form-inline" action="<?php echo home_url( '/' ); ?>">
		<div class="form-group">
		    <label class="sr-only" for="exampleInputEmail2">Email address</label>
		    <input type="text" class="form-control search-query" name="s" id="search" placeholder="<?php esc_attr_e('search here &hellip;', 'azkaban_options'); ?>">
		  </div>
		<button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'azkaban_options'); ?>">Search</button>
	</form>