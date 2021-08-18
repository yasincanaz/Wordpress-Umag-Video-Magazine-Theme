<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mag
 */

get_header();
?>

<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1><?php esc_html_e( "404", "umag" );?></h1>
			</div>
			<h2><?php esc_html_e("Oops, The Page you are looking for can't be found!","umag")?></h2>
			<form class="notfound-search" action="<?php echo home_url("/") ?>" method="GET">
				<input type="text" placeholder="<?php esc_attr_e( "Search...","umag")?>" name="s">
				<button type="button"><?php esc_html_e("Search","umag")?></button>
			</form>
			<a href="<?php echo home_url("/")?>"><span class="arrow"></span><?php esc_html_e("Return To Homepage")?></a>
		</div>
	</div>

<?php
get_footer();
