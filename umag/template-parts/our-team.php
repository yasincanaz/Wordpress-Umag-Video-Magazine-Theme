<article <?php post_class("single-team-member d-flex align-items-center") ?> id="team-<?php the_ID() ?>">
    <div class="team-member-thumbnail">
        <?php the_post_thumbnail("umag-team")?>
        <div class="social-btn">
            <?php
            $facebook=get_post_meta(get_the_ID(),"team-facebook",true);
            $twitter=get_post_meta(get_the_ID(),"team-twitter",true);
            $linkedin=get_post_meta(get_the_ID(),"team-linkedin",true);

            $team_jops=get_post_meta( get_the_ID() ,"team-jop" , true );
            ?>
            <?php if( ! empty($facebook)):?>
            <a href="<?php echo esc_url($facebook)?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
            <?php endif;?>
            <?php if( ! empty($twitter) ):?>
            <a href="<?php echo esc_url($twitter)?>"><i class="fab fa-twitter" aria-hidden="true"></i></a>
            <?php endif;?>
            <?php if( ! empty($linkedin)):?>
            <a href="<?php echo esc_url($linkedin) ?>"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
            <?php endif;?>
        </div>
    </div>
    <div class="team-member-content">
        <h6><?php the_title()?></h6>
        <span><?php echo esc_html($team_jops);?></span>
        <p><?php the_content();?></p>
    </div>
</article>