<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mag
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	if (have_posts()) :

		if (is_home() && !is_front_page()) :
	?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
		<?php
		endif;
		?>
		<div class="archive-post-area mt-50">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-xl-8">
						<div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
							<?php

							if (have_posts()) {
								while (have_posts()) {
									the_post();
									get_template_part("template-parts/feed", "content");
								}
							} else {
								echo '<div class="alert alert-warning">' . esc_html__("Post not found.", "umag") . '</div>';
							}
							wp_reset_postdata();
							?>

							<nav>
								<?php
								echo umag_page_pagination();
								?>
							</nav>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-5 col-xl-4">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>

		</div>
	<?php
	else :

		get_template_part('template-parts/content', 'none');

	endif;
	?>

</main><!-- #main -->

<?php

get_footer();
