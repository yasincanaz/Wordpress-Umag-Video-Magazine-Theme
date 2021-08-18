<div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                       <?php the_post_thumbnail("umag_widget_posts")?>
                    </div>
                    <div class="post-content">
                        <a href="<?php the_permalink();?>" class="post-title"><?php the_title();?></a>
                        <div class="post-meta d-flex justify-content-between">
                            <?php if(umag_views_count()>=0):?>
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo umag_views_count();?></a>
                            <?php endif;?>
                            <?php if(umag_like_count()>=0):?>
                            <a href="#"><i class="far fa-thumbs-up" aria-hidden="true"></i><?php echo umag_like_count();?></a>
                            <?php endif;?>
                            <a href="<?php echo get_the_permalink()."#respond"?>"><i class="fas fa-comments" aria-hidden="true"></i><?php echo get_comments_number( get_the_ID() )?></a>
                        </div>
                </div>
        </div>