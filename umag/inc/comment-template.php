<?php
if(! defined("ABSPATH")){
    die();
}
function umag_comment_template($comment,$args, $depth){
    ?>
                       <li <?php comment_class( "single_comment_area")?> id="comment-<?php comment_ID();?>">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                      <?php echo get_avatar($comment->comment_author_email,$args["avatar_size"])?>
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <a href="<?php echo get_comment_link($comment->comment_ID )?>" class="comment-date"><?php printf(/* translators: %1$S: writing the comment in day month year format %2$S: writing the comment in hours and minutes */esc_html__(' %1$s - %2$s ' ,"umag"), get_comment_date(),get_comment_time());?></a>
                                        <h6><?php echo get_comment_author_link( )?></h6>
                                        <p><?php comment_text( );?></p>
                                        <?php if($comment->comment_approved === "0"):?>
                                            <div class="alert alert-warning">
                                                <?php esc_html_e("Your comment is awaiting moderation!!")?>
                                            </div>
                                        <?php endif;?>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2"><?php echo umag_comment_button();?></span>
                                            <?php
                                            comment_reply_link(
                                                array_merge( $args,array(
                                                    "depth" => $depth,
                                                    "max_depth" => $args["max_depth"]
                                                    ))
                                                );
                                            
                                            ?>
                                        </div>
                                    </div>
                                </div>
    <?php
}
function umag_replay_link_class($html){
    $html=str_replace("class='comment-reply-link","class='comment-reply-link reply",$html);
    return $html;
}
add_filter( "comment_reply_link","umag_replay_link_class");