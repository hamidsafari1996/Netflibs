<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div class="defult-form">
    <div class="container">
    <div id="comments" class="comments-area">
	<span class="comments-icon"><i class="fas fa-comments text-white ml-2"></i><?php comments_popup_link('بدون دیدگاه','1 دیدگاه','% دیدگاه'); ?></span>
	<div class="mb-3 mt-3">
		<h3 class="mb-3 text-light">نکاتی درباره ارسال نظر ؛</h3>
		<?php
		$subtitle_options = woolearn_get_option('coagex_lawe_group');
		?>
		<?php echo @$subtitle_options[0]['title']; ?>
    </div>
    </div>
        <?php
        $user = wp_get_current_user();
        $commenter = wp_get_current_commenter();
        $req = get_option('requier_name_email');
        $aria_req = ($req ? "aria-required='true'" : '');

        $fields = array(
			'author' => '<p class="comment-form-author d-inline"> ' .
				( $req ? '<span class="required">*</span>' : '' ) .
				'<input id="author" name="author" type="text" placeholder="*نام و نام خانوادگی" value="' . esc_attr( $commenter['comment_author'] ) .
				'" size="30"' . $aria_req . ' /></p>',
			'email' =>
				'<p class="comment-form-email d-inline">' .
				( $req ? '<span class="required">*</span>' : '' ) .
				'<input id="email" name="email" type="text" placeholder="*پست الکترونیک" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' /></p>',
		);

        $args = array(
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'class_form'           => 'comment-form',
        'class_submit'         => 'submit',
        'name_submit'          => 'submit',
        'title_reply'          => __( 'Leave a Reply' ),
        /* translators: %s: Author of the comment being replied to. */
        'title_reply_to'       => __( 'Leave a Reply to %s' ),
        'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title text-white">',
        'title_reply_after'    => '</h4>',
        'cancel_reply_before'  => ' <small>',
        'cancel_reply_after'   => '</small>',
        'cancel_reply_link'    => __( 'Cancel reply' ),
        'label_submit'         => __( 'ثبت نظر' ),
        //'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
        //'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
        'comment_field' => '<p class="comment-form-comment"><label for="comment"></label><textarea class="w-100" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="دیدگاه‌ خود را وارد کنید"></textarea></p>',
        'format'               => 'html5',
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        );
        
        comment_form($args);
        ?>
		<div class="new-comments">
        <div class="container">
            <div class="title-form">
            <?php if(get_comments_number()) { ?>
                <h3 class="text-white mb-5"> دیدگاه‌های <?php the_title(); ?></h3>
            <?php } else{
                echo '<div class="no-comment text-center"><i class="fas fa-comment-slash"></i><p>هنوز دیدگاهی ثبت نشده است</p></div>';
            } ?>
            </div>
        <ol class="comments" id="comments">
		<?php 
		wp_list_comments(
			array(
			'style' => 'ol',
			'max_depth' => '5',
			'callback' => 'welearn_comment',
			)
		);
        ?>
        </ol>
        </div>
		</div>
    </div>
</div>