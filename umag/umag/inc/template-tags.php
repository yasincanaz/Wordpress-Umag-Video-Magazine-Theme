<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mag
 */

if (!function_exists('umag_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function umag_posted_on()
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		$posted_on = '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>';

		echo $posted_on;

	}
endif;

if (!function_exists('umag_posted_by')) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function umag_posted_by()
	{
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x('by %s', 'post author', 'umag'),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('umag_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function umag_entry_footer()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'umag'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'umag') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'umag'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'umag') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'umag'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Edit <span class="screen-reader-text">%s</span>', 'umag'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
if (!function_exists("umag_views_count")) {
	function umag_views_count()
	{
		if (function_exists("the_views")) {
			return apply_filters("umag_post_views_filter", the_views(false));
		}
		return apply_filters("umag_post_views_filter", false);
	}
}
if (!function_exists("umag_like_count")) {
	function umag_like_count()
	{
		if (function_exists("wp_ulike")) {
			return apply_filters("umag_post_like_filter", wp_ulike_get_post_likes(get_the_ID()));
		}
		return apply_filters("umag_post_like_filter", false);
	}
}
if(! function_exists("umag_like_count_button")){
	function umag_like_count_button(){
		if(function_exists("wp_ulike")){
			return apply_filters( "umag_post_count_button", wp_ulike("put") );
		}
		else{
			return apply_filters( "umag_post_like_button", false );
		}
	}
}
if(! function_exists("umag_comment_button")){
	function umag_comment_button(){
		if(function_exists("wp_ulike_comments")){
			return apply_filters( "umag_comment_button", wp_ulike_comments("put") );
		}
		return apply_filters( "umag_comment_button", false );
	}
}



if (!function_exists('wp_body_open')) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
endif;
if (!function_exists("umag_search_content")) {
	function umag_search_content()
	{
		?>
		<div class="top-search-area">
			<form action="<?php home_url("/") ?>" method="get">
				<input type="search" name="s" id="topSearch" placeholder="<?php esc_attr_e("Search and hit enter...", "umag"); ?>" value="<?php echo get_search_query(); ?>">
				<button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
			</form>
		</div>
	<?php
	}
}
if (!function_exists("umag_sharer_button")) {
	function umag_sharer_button()
	{
		ob_start();
	?>
		</a>
		<a href="#" data-sharer="facebook" data-url="<?php the_permalink(); ?>" class="facebook"><i class="fab fa-facebook" aria-hidden="true"></i></a>
		<a href="#" data-sharer="twitter" data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" class="twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
		<a href="#" data-sharer="whatsapp" data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" class="whatsapp"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
	<?php
		return ob_get_clean();
	}
}
function breadcrumb()
{
	?>
	<div class="mag-breadcrumb py-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php
					/* === OPTIONS === */
					$text['home']     = '<i class="fa fa-home" aria-hidden="true"></i> '.esc_html__('Home','umag');
					$text['category'] = esc_html__('Archive by Category "%s"','umag');
					$text['search']   = esc_html__('Search Results for "%s" Query','umag'); // text for a search results page
					$text['tag']      = esc_html__('Posts Tagged "%s"','umag'); // text for a tag page
					$text['author']   = esc_html__('Articles Posted by %s','umag'); // text for an author page
					$text['404']      = esc_html__('Error 404','umag'); // text for the 404 page
					$text['page']     = esc_html__('Page %s','umag'); // text 'Page N'
					$text['cpage']    = esc_html__('Comment Page %s','umag'); // text 'Comment Page N'

					$wrap_before    = '<div aria-label="breadcrumb" class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList"><ol class="breadcrumb">'; // the opening wrapper tag
					$wrap_after     = '</div><!-- .breadcrumbs --></ol>'; // the closing wrapper tag
					$sep            = '';
					$before         = '<li class="breadcrumb-item"><span class="breadcrumbs__current">'; // tag before the current crumb
					$after          = '</span></li>'; // tag after the current crumb

					$show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
					$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
					$show_current   = 1; // 1 - show current page title, 0 - don't show
					$show_last_sep  = 1; // 1 - show last separator, when current page title is not displayed, 0 - don't show
					/* === END OF OPTIONS === */

					global $post;
					$home_url       = home_url('/');
					$link           = '<li class="breadcrumb-item"><span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
					$link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
					$link          .= '<meta itemprop="position" content="%3$s" />';
					$link          .= '</span></li>';
					$parent_id      = ($post) ? $post->post_parent : '';
					$home_link      = sprintf($link, $home_url, $text['home'], 1);

					if (is_home() || is_front_page()) {

						if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;
					} else {

						$position = 0;

						echo $wrap_before;

						if ($show_home_link) {
							$position += 1;
							echo $home_link;
						}

						if (is_category()) {
							$parents = get_ancestors(get_query_var('cat'), 'category');
							foreach (array_reverse($parents) as $cat) {
								$position += 1;
								if ($position > 1) echo $sep;
								echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
							}
							if (get_query_var('paged')) {
								$position += 1;
								$cat = get_query_var('cat');
								echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
								echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
							} else {
								if ($show_current) {
									if ($position >= 1) echo $sep;
									echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
								} elseif ($show_last_sep) echo $sep;
							}
						} elseif (is_search()) {
							if (get_query_var('paged')) {
								$position += 1;
								if ($show_home_link) echo $sep;
								echo sprintf($link, $home_url . '?s=' . get_search_query(), sprintf($text['search'], get_search_query()), $position);
								echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
							} else {
								if ($show_current) {
									if ($position >= 1) echo $sep;
									echo $before . sprintf($text['search'], get_search_query()) . $after;
								} elseif ($show_last_sep) echo $sep;
							}
						} elseif (is_year()) {
							if ($show_home_link && $show_current) echo $sep;
							if ($show_current) echo $before . get_the_time('Y') . $after;
							elseif ($show_home_link && $show_last_sep) echo $sep;
						} elseif (is_month()) {
							if ($show_home_link) echo $sep;
							$position += 1;
							echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'), $position);
							if ($show_current) echo $sep . $before . get_the_time('F') . $after;
							elseif ($show_last_sep) echo $sep;
						} elseif (is_day()) {
							if ($show_home_link) echo $sep;
							$position += 1;
							echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'), $position) . $sep;
							$position += 1;
							echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'), $position);
							if ($show_current) echo $sep . $before . get_the_time('d') . $after;
							elseif ($show_last_sep) echo $sep;
						} elseif (is_single() && !is_attachment()) {
							if (get_post_type() != 'post') {
								$position += 1;
								$post_type = get_post_type_object(get_post_type());
								if ($position > 1) echo $sep;
								echo sprintf($link, get_post_type_archive_link($post_type->name), $post_type->labels->name, $position);
								if ($show_current) echo $sep . $before . get_the_title() . $after;
								elseif ($show_last_sep) echo $sep;
							} else {
								$cat = get_the_category();
								$catID = $cat[0]->cat_ID;
								$parents = get_ancestors($catID, 'category');
								$parents = array_reverse($parents);
								$parents[] = $catID;
								foreach ($parents as $cat) {
									$position += 1;
									if ($position > 1) echo $sep;
									echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
								}
								if (get_query_var('cpage')) {
									$position += 1;
									echo $sep . sprintf($link, get_permalink(), get_the_title(), $position);
									echo $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
								} else {
									if ($show_current) echo $sep . $before . get_the_title() . $after;
									elseif ($show_last_sep) echo $sep;
								}
							}
						} elseif (is_post_type_archive()) {
							$post_type = get_post_type_object(get_post_type());
							if (get_query_var('paged')) {
								$position += 1;
								if ($position > 1) echo $sep;
								echo sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label, $position);
								echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
							} else {
								if ($show_home_link && $show_current) echo $sep;
								if ($show_current) echo $before . $post_type->label . $after;
								elseif ($show_home_link && $show_last_sep) echo $sep;
							}
						} elseif (is_attachment()) {
							$parent = get_post($parent_id);
							$cat = get_the_category($parent->ID);
							$catID = $cat[0]->cat_ID;
							$parents = get_ancestors($catID, 'category');
							$parents = array_reverse($parents);
							$parents[] = $catID;
							foreach ($parents as $cat) {
								$position += 1;
								if ($position > 1) echo $sep;
								echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
							}
							$position += 1;
							echo $sep . sprintf($link, get_permalink($parent), $parent->post_title, $position);
							if ($show_current) echo $sep . $before . get_the_title() . $after;
							elseif ($show_last_sep) echo $sep;
						} elseif (is_page() && !$parent_id) {
							if ($show_home_link && $show_current) echo $sep;
							if ($show_current) echo $before . get_the_title() . $after;
							elseif ($show_home_link && $show_last_sep) echo $sep;
						} elseif (is_page() && $parent_id) {
							$parents = get_post_ancestors(get_the_ID());
							foreach (array_reverse($parents) as $pageID) {
								$position += 1;
								if ($position > 1) echo $sep;
								echo sprintf($link, get_page_link($pageID), get_the_title($pageID), $position);
							}
							if ($show_current) echo $sep . $before . get_the_title() . $after;
							elseif ($show_last_sep) echo $sep;
						} elseif (is_tag()) {
							if (get_query_var('paged')) {
								$position += 1;
								$tagID = get_query_var('tag_id');
								echo $sep . sprintf($link, get_tag_link($tagID), single_tag_title('', false), $position);
								echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
							} else {
								if ($show_home_link && $show_current) echo $sep;
								if ($show_current) echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
								elseif ($show_home_link && $show_last_sep) echo $sep;
							}
						} elseif (is_author()) {
							$author = get_userdata(get_query_var('author'));
							if (get_query_var('paged')) {
								$position += 1;
								echo $sep . sprintf($link, get_author_posts_url($author->ID), sprintf($text['author'], $author->display_name), $position);
								echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
							} else {
								if ($show_home_link && $show_current) echo $sep;
								if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
								elseif ($show_home_link && $show_last_sep) echo $sep;
							}
						} elseif (is_404()) {
							if ($show_home_link && $show_current) echo $sep;
							if ($show_current) echo $before . $text['404'] . $after;
							elseif ($show_last_sep) echo $sep;
						} elseif (has_post_format() && !is_singular()) {
							if ($show_home_link && $show_current) echo $sep;
							echo get_post_format_string(get_post_format());
						}

						echo $wrap_after;
					}
					?>
				</div>
			</div>
		</div>
	</div>
<?php
}
if(! function_exists("umag_comment_pagination")){
	function umag_comment_pagination($class=""){
		$args=array(
			"type" => "list",
			"echo" => false
		);
		$links=paginate_comments_links($args);
		$find=array("class='page-numbers","<li>","page-numbers");
		$replaces=array("class='pagination ".$class,"<li class='page-item'>","page-numbers page-link");	
		$links= str_replace($find,$replaces,$links);	
		echo $links;
	}
};

if(! function_exists("umag_page_pagination")){
	function umag_page_pagination($class=""){
		$args=array(
			"type" => "list",
			"next_text" => '<i class="fas fa-arrow-right"></i>',
			"prev_text" => '<i class="fas fa-arrow-left"></i>',
		);
		$links=paginate_links($args);
		$find=array("class='page-numbers","<li>","page-numbers");
		$replaces=array("class='pagination ".$class,"<li class='page-item'>","page-numbers page-link");	
		$links= str_replace($find,$replaces,$links);	
		echo $links;
	}
};
