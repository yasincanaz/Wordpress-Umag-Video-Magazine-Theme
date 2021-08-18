<article <?php post_class(); ?> id="post<?php the_ID(); ?>">

    <div class="post-details-content bg-white mb-30 p-30 box-shadow">
        <div class="blog-content">
             <?php the_title("<div class='section-heading'><h5>", "</h5></div>"); ?>
                    <!-- Post Meta -->
                    <div class="post-meta-2 clearfix">
                    <?php the_content(); ?>
        </div>
    </div>
        <?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
        
        ?>
        </article>