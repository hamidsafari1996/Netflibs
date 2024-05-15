<?php
function welearn_comment($comment,$args,$depth){
//var_dump($comment,$args,$depth);
?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID() ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar($comment->comment_author_email); ?>
            <cite class="fn d-inline"><?php echo get_comment_author_link() ?></cite>
            <div class="comment-meta commentmetadata d-md-inline d-block">
                <a class="comment-date" href="<?php echo get_comment_link($comment->comment_ID) ?>"><?php echo get_comment_date(); ?></a>
                <?php edit_comment_link('ویرایش') ?>
            </div>
		</div>
		<div class="rating mt-3 mb-3">
			<?php
				$rating = get_comment_meta(get_comment_ID(),'rating',true);
				for($i=0;5>$i;$i++){
				?>
				<i class="<?php if($rating>$i) echo 'fas fa-star'; else echo 'far fa-star'; ?> text-warning"></i>
				<?php
				}
			?>
		</div>
		<div class="comment-text mt-3 mb-3">
			<?php comment_text(); ?>
        </div>
        <?php if($comment->comment_approved == 0){ ?>
            <div class="mt-5 mb-5">
            <em class="alert alert-warning">دیدگاه شما به صف بررسی افزوده شد</em>
            </div>
        <?php } ?>
		<div class="reply">
			<?php comment_reply_link(array('depth'=>$depth,'max_depth'=>$args['max_depth'])) ?><i class="fas fa-share mr-2"></i>
		</div>
	</div>
</li>
<hr>
<?php
}
function save_comment_meta_phone($comment_id){
	if(!empty($_POST['rating']))
		$rating = sanitize_text_field($_POST['rating']);
		add_comment_meta($comment_id,'rating',$rating);
}
add_action('comment_post','save_comment_meta_phone');
add_action('comment_form_logged_in_after','additional_fields');
add_action('comment_form_after_fields','additional_fields');
function additional_fields(){
?>
<p class="comment-form-rating">
	<label for="rating" class="">امتیاز</label>
	<span class="starRting">
	<?php
		for($i=5;$i>=1;$i--)
			echo '<input id="rating'.$i.'" type="radio" name="rating" value="'.$i.'"><label for="rating'.$i.'"></label>';
	?>
	</span>
</p>
<?php
}

add_action('edit_comment','wl_edit_comment');
function wl_edit_comment($comment_id){
	if(isset($_POST['rating'])){
		$rating = sanitize_text_field($_POST['rating']);
		update_comment_meta($comment_id,'rating',$rating);
		}
}

function weleran_comment_columns($columns){
	$columns['wl_rating'] = __('Rating');
	return $columns;
}
add_filter('manage_edit-comments_columns','weleran_comment_columns');

function welearn_comment_column($column,$comment_ID){
	
	if($column == 'wl_rating'){
		$rating = (get_comment_meta($comment_ID,'rating',true) != '')? get_comment_meta($comment_ID,'rating',true) : 0;
		echo $rating.'/5';
	}
	
}
add_filter('manage_comments_custom_column','welearn_comment_column',10,2);
?>