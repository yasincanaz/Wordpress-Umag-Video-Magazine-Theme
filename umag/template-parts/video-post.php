<!-- Single YouTube Channel -->
<div class="single-youtube-channel d-flex">
                    <div class="youtube-channel-thumbnail">
                       <?php the_post_thumbnail( "umag_widget_posts" );?>
                    </div>
                    <div class="youtube-channel-content">
                        <a href="<?php the_permalink();?>" class="channel-title"><?php the_title();?></a>
                        <a href="<?php the_permalink();?>" class="btn subscribe-btn"><i class="fa fa-play-circle" aria-hidden="true"></i><?php esc_html_e("WATCH","umag")?></a>
                    </div>
                </div>