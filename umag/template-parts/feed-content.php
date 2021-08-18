<!-- Single Catagory Post -->
<div class="single-catagory-post d-flex flex-wrap">
    <!-- Thumbnail -->
    <div class="post-thumbnail bg-img" style="background-image: url(<?php the_post_thumbnail_url( "umag_archive_page" )?>);">
    <?php if(get_post_format() === "video"):?>
        <a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a>
        <?php endif;?>
    </div>

    <!-- Post Contetnt -->
    <div class="post-content">
        <div class="post-meta">
            <a href="<?php the_permalink();?>"><?php the_date();?></a>
            <a href="<?php the_permalink();?>"><?php the_category(" ");?></a>
        </div>
        <a href="<?php the_permalink();?>" class="post-title"><?php the_title();?></a>
        <!-- Post Meta -->
        <div class="post-meta-2">
            <?php if(umag_views_count()>=0):?>
            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i><?php echo umag_views_count();?></a>
            <?php endif;?>
            <?php if(umag_like_count()>=0):?>
            <a href="#"><i class="far fa-thumbs-up" aria-hidden="true"></i><?php echo umag_like_count();?></a>
            <?php endif;?>
            <a href="#"><i class="fas fa-comments" aria-hidden="true"></i><?php echo get_comments_number( get_the_ID() )?></a>
        </div>
        <?php if(has_excerpt()):?>
        <p> <?php echo wp_trim_words( get_the_content(), 15 , "..");?> </p>
        <?php endif;?>
    </div>
</div>