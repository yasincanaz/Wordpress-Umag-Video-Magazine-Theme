<?php

get_header();
?>

<main id="primary" class="site-main">
	<?php $id_cat=get_term_meta(get_queried_object_id(),"category_image",true)?>
	<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(<?php echo wp_get_attachment_image_url( $id_cat, "full" )?>);">
		<div class="container h-100">
			<div class="row h-100 align-items-center">
				<div class="col-12">
					<div class="breadcrumb-content">
						<h2><?php the_archive_title();?></h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php echo breadcrumb(); ?>

	<div class="archive-post-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-xl-8">
					<div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
					<?php
						
						if(have_posts()){
							while(have_posts()){
								the_post();
								get_template_part( "template-parts/feed", "content" );
							}
						}
						else{
							echo '<div class="alert alert-warning">'.esc_html__("Post not found.","umag").'</div>';
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
	</div>
</main><!-- #main -->

<?php
get_footer();
