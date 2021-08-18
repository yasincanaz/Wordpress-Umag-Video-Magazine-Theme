<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mag
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area comment_area clearfix bg-white mb-30 p-30 box-shadow">

	<?php
	// You can start editing here -- including this comment!
	if (have_comments()) :
	?>
		<div class="section-heading">
			<h5 class="comments-title ">
				<?php
				$umag_comment_count = get_comments_number();
				if ('1' === $umag_comment_count) {
					printf(
						/* translators: 1: title. */
						esc_html__('1 comment', 'umag'),
						'<span>' . wp_kses_post(get_the_title()) . '</span>'
					);
				} else {
					printf(
						/* translators: 1: comment count number, 2: title. */
						esc_html(_nx('%1$s comment', '%1$s comments', $umag_comment_count, 'comments title', 'umag')),
						number_format_i18n($umag_comment_count),
					);
				}
				?>
			</h5><!-- .comments-title -->
		</div>
		<?php umag_comment_pagination( "mb-4"); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					"callback" => "umag_comment_template",
					"avatar_size" => 70,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		umag_comment_pagination();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()) :
		?>
			<div class="alert alert-danger"><?php esc_html_e('Comments are closed.', 'umag'); ?></div>
	<?php
		endif;
	endif;
	if (empty(have_comments())){
		echo '<div class="alert alert-danger">'.esc_html__("No comments yet, be the first to comment","umag").'</div>';
	}
	?>
	</div>
	<div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">
	<div class="contact-form-area">

	<?php
	$req = get_option("require_name_email") ? " required" : "";

	$commenter = wp_get_current_commenter();

	$conset = !empty($commenter['comment_author_email']) ? 'checked="checked"' : ' ';

	$cookies =  ' <div class="form-check">';
	$cookies .= ' <input class="form-check-input" type="checkbox" value="yes" name="wp-comment-cookies-conset" id="wp-comment-cookies-conset" ' . $conset . '>';
	$cookies .= ' <label class="form-check-label" for="wp-comment-cookies-conset">' . esc_html__("Save my name, email, and website in this browser for the next time I comment.") . '</label></div>';

	$comment_args = array(
		"fields" => array(
			'author' => '<div class="row"><div class="col-12 col-lg-6"><input type="text" name="author" class="form-control" id="author" value="' . $commenter["comment_author"] . '"  placeholder="' . esc_attr__("Your Name*", "umag") . '"' . $req . '></div>',
			'email' => '<div class="col-12 col-lg-6"><input type="email" name="email" class="form-control" id="email" placeholder="' . esc_attr__("Your Email*", "umag") . '".' . $req . '></div></div>',
			'url'  => ' <input type="text" name="url" class="form-control" id="url" placeholder="' . esc_attr__("Your Website Address", "umag") . '">',
			'cookies' => $cookies
		),
		'comment_field' => '<textarea name="comment" class="form-control" id="comment" cols="30" rows="10" placeholder="' . esc_attr__('Message*', 'umag') . '" required></textarea>',
		'class_submit'  =>'btn mag-btn mt-30',
		'title_reply_before' => '<div class="section-heading"><h5>',
		'title_reply_after' => "</h5></div>",
		'label_submit' => esc_html__("Submit Comment","umag")
	);
	comment_form($comment_args);
	?>
	</div>
</div>
