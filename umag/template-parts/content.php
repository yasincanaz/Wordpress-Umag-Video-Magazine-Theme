<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="post-details-content bg-white mb-30 p-30 box-shadow">
        <div class="blog-thumb mb-30">
            <?php if(get_post_format() != "video"):?>
            <img src="<?php the_post_thumbnail_url("umag_single_posts"); ?>" alt="">
            <?php endif;?>
        </div>
        <div class="blog-content">
            <div class="post-meta">
                <a href="#"><?php echo umag_posted_on(); ?></a>
                <a href="<?php the_permalink(); ?>"><?php the_category(" ") ?></a>
            </div>
             <?php the_title("<h4 class='post-title'>", "</h4>"); ?>
                    <!-- Post Meta -->
                    <div class="post-meta-2 clearfix">
                    <?php if(get_post_format() != "video"):?>
                        <?php if (umag_views_count() >= 0) : ?>
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i><?php echo umag_views_count();    ?></a>
                        <?php endif; ?>
                        <a href="#"><i class="fas fa-comments" aria-hidden="true"></i><?php echo get_comments_number(); ?></a>
                        <div class="post_like_button float-right"><?php echo umag_like_count_button(); ?></div>
                        <?php endif;?>
                    </div>
                    <?php the_content(); ?>
                    <!-- Like Dislike Share -->
                    <?php if (!empty(get_theme_mod("umag_post_page_short_code"))) : ?>
                        <div class="my-5">
                            <?php echo do_shortcode(get_theme_mod("umag_post_page_short_code")); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Post Author -->
                    <div class="post-author d-flex align-items-center">
                        <div class="post-author-thumb">
                            <?php echo get_avatar(get_the_author_meta("ID"), 80) ?>
                        </div>
                        <div class="post-author-desc pl-4">
                            <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>" class="author-name"><?php echo get_the_author_meta("display_name")  ?></a>
                            <p><?php echo get_the_author_meta("description") ?></p>
                        </div>
                    </div>
        </div>
    </div>
        <div class="related-post-area bg-white mb-30 px-30 pt-30 box-shadow">
        <div class="row">
                            <?php
                            $related_post_args=array(
                                "order" => "DESC",
                                "category__in" => wp_get_post_categories( get_the_ID()),
                                "post__not_in" =>array(get_the_ID()),
                                "orderby" => "rand",
                                "posts_per_page" => 3
                            );
                            $related_post=new WP_Query($related_post_args);
                            if($related_post->have_posts()){
                                while($related_post->have_posts()){
                                    $related_post->the_post();
                                    get_template_part( "template-parts/related", "post" );
                                }
                            }
                            wp_reset_postdata(  );
                            ?>
                            
        </div>
        </div>
        <?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
        
        ?>
        </article>