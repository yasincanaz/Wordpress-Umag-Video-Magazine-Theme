<article <?php post_class("single-trending-post")?> >
    <?php the_post_thumbnail("umag-liddle-slider"); ?>
    <div class="post-content">
        <?php
        $cats= get_the_category();
        foreach($cats as $cat){
            echo  '<a href="'.get_category_link( $cat->term_id ). '" class="post-cata">'.$cat->name.'</a>';
        }
        ?>
        <a href="<?php the_permalink();?>" class="post-title"><?php the_title(); ?></a>
    </div>
</article>