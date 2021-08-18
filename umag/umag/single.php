<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mag
 */

get_header();
?>
	<main id="primary" class="site-main">
	<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(<?php the_post_thumbnail_url( "full" )?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2><?php the_title()?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php breadcrumb();?>
	<section class="post-details-area">
        <div class="container">
			<?php if(get_post_format() === "video"):?>
				<?php get_template_part( "template-parts/video-single", "page" )?>
			<?php endif?>
            <div class="row justify-content-center">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<div class="col-12 col-xl-8">
				<?php 	get_template_part( 'template-parts/content', get_post_type() );?>
			</div>
			<?php
			?>
				<div class="col-12 col-md-6 col-lg-5 col-xl-4">
					<?php get_sidebar();?>
				</div>
			<?php
			// If comments are open or we have at least one comment, load up the comment template.

		endwhile; // End of the loop.
		?>
			</div>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
