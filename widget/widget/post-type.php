<?php

class NETflibs extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct(
		'NFS_ID',
		'NFS- پست 2',
		array('description' => 'ابزارک پست تایپ ها-2')
		);
	}

	function widget( $args, $instance ) {

		echo $args['before_widget'];
        echo '<div class="web-movie-section">';
        echo '<div class="row">';
        echo '<div class="col-lg-12 col-md-12 col-12">';
        echo '<div class="row movie-carousel">';
		echo $args['before_title'].@$instance['title'].$args['after_title'];
		
		if(!empty($instance['terms_tax'])){
			@$tax_query = array(
				array(
					'taxonomy' => @$instance['taxonomy'],
					'field' => 'term_id',
					'terms' => @$instance['terms_tax'],
				)
			);
		}else{
			$tax_query = '';
		}
		
		$args2 = array(
			'post_type' => $instance['post_type'],
			'posts_per_page' => $instance['posts_per_page'],
			'post__not_in' => $instance['post__not_in'],
			'offset' => $instance['offset'],
			'tax_query' => @$tax_query,
			'orderby' => $instance['filter'],
			'order' => $instance['order'],
		);
		$query = new WP_Query($args2);
		
		if($query->have_posts()){
			if($instance['style'] == 'slider'){
				echo '<div class="web-movie-section">';
			}
			while($query->have_posts()){
				$query->the_post();
				
			$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
				if(empty($instance['style'])){
			?>
                <div class="card item-post">
                    <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
                    <div class="card-body">
                        <div class="movie-new-content mb-4 text-right">
                            <h2 data-toggle="tooltip" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                        <?php 
                        $text_years = get_post_meta(get_the_ID(),'text-years',true); 
                        $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true); 
                        ?>
                        <div class="movie-new-footer">
                            <span class="star ml-3"><i class="fas fa-star"></i><?php echo $text_imbd; ?></span>
                            <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
                            <span class="float-left"><?php echo $text_years; ?></span>
                        </div>
                    </div>
                </div>
			<?php
				}
				}
			}
		
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
		echo $args['after_widget'];
	}

	function form( $instance ) {
		$post_types = get_post_types(array('public' => true),'object');
		@$post_type = $instance['post_type'];
		@$posts_per_page = (empty( $instance['posts_per_page']))? 5 : $instance['posts_per_page'];
		@$post__not_in = '';
		if(!empty($instance['post__not_in'])){
			foreach($instance['post__not_in'] as $val){
			$post__not_in .= $val.',';
		}
		@$post__not_in = substr_replace($post__not_in,'',-1);
		}
		@$offset = $instance['offset'];
		@$taxonomy = $instance['taxonomy'];
		@$terms_tax = $instance['terms_tax'];
		@$order = $instance['order'];
		@$filter = $instance['filter'];
		@$style = $instance['style'];
	?>
	<p>
		<label for="<?php echo $this->get_field_id('post_type'); ?>">پست تایپ:</label>
		
		<select name="<?php echo $this->get_field_name('post_type'); ?>" id="<?php echo $this->get_field_id('post_type'); ?>" class="wl_post_type">
			<option value="" <?php if(empty(@$post_type)) echo 'selected' ?> > _ گزینش _</option>
			<?php foreach($post_types as $val){ ?>
				<option value="<?php echo $val->name; ?>" <?php if($post_type == $val->name) echo 'selected'; ?> ><?php echo $val->label; ?></option>
			<?php } ?>
		</select>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('posts_per_page'); ?>">تعداد نمایش:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('posts_per_page'); ?>" name="<?php echo $this->get_field_name('posts_per_page'); ?>" type="number" value="<?php echo @$posts_per_page; ?>">
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('post__not_in'); ?>">این پست ها را نمایش نده</label>
		<input class="widefat" id="<?php echo $this->get_field_id('post__not_in'); ?>" name="<?php echo $this->get_field_name('post__not_in'); ?>" type="text" value="<?php echo @$post__not_in; ?>">
	</p>
	<p>مثال: 1,45,187</p>
	<p>
		<label for="<?php echo $this->get_field_id('offset'); ?>">offset:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="number" value="<?php echo @$offset; ?>">
	</p>
	
	<?php
	$object_tax = get_object_taxonomies($post_type,'names');
	echo '<input type="hidden" value="'.$object_tax[0].'" name="'.$this->get_field_name('taxonomy').'">';
	?>
	<p>
		<label for="<?php echo $this->get_field_id('terms_tax'); ?>">دسته ها:</label>
		<?php
		if($object_tax){
		$terms = get_terms(
		array(
		'taxonomy' => $object_tax[0],
		'hide_empty' => false,
		)
		);
		$count = count($terms_tax);
		echo '<div class="terms_tax">';
		foreach($terms as $term){
		?>
		<input class="widefat" id="<?php echo $this->get_field_id('terms_tax'); ?>" name="<?php echo $this->get_field_name('terms_tax'); ?>[]" type="checkbox" value="<?php echo intval($term->term_id) ?>" <?php for($i=0;$count>$i;$i++) if(@$terms_tax[$i] == $term->term_id) echo 'checked' ?> ><?php echo $term->name  ?>
		<?php
		}
		echo '</div>';
		}
		?>
		
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('order'); ?>">ترتیب نمایش:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" type="radio" value="ASC" <?php if($order == 'ASC') echo 'checked' ?> > صعودی
		<input class="widefat" id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" type="radio" value="DESC" <?php if($order == 'DESC') echo 'checked' ?>> نزولی
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('filter'); ?>">فیلتر:</label>
		
		<select name="<?php echo $this->get_field_name('filter'); ?>" id="<?php echo $this->get_field_id('filter'); ?>">
				<option value="date" <?php if($filter == 'date') echo 'selected'; ?> >تاریخ</option>
				<option value="title" <?php if($filter == 'title') echo 'selected'; ?> >عنوان</option>
				<option value="rand" <?php if($filter == 'rand') echo 'selected'; ?> >تصادفی</option>
				<option value="count_comment" <?php if($filter == 'count_comment') echo 'selected'; ?> >تعداد نظرات</option>
				<option value="author" <?php if($filter == 'author') echo 'selected'; ?> >نویسنده</option>
				<option value="ID" <?php if($filter == 'ID') echo 'selected'; ?> >ID پست</option>
		</select>
		
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('style'); ?>">سبک:</label>
		
		<select name="<?php echo $this->get_field_name('style'); ?>" id="<?php echo $this->get_field_id('style'); ?>">
				<option value="" <?php if(@$style == '') echo 'selected'; ?> >پیشفرض</option>
		</select>
		
	</p>
	
	<script>
		jQuery(document).ready(function($){
			$('.wl_post_type').on('change',function(){
				var option = $(this).find('option:selected').val();
				$.ajax({
					type : 'POST',
					url : '../../../../../wp-admin/admin-ajax.php',
					data : {
						action : 'wl_ajax_widget_posts',
						post_type : option,
					},beforeSend:function(){
						$('.terms_tax').html('');
					},success:function(res){
					$('.terms_tax').html(res);
				}
				})
			})
		})
	</script>
	<?php
	}
	function update( $new_instance, $old_instance ) {
		$instance = array();
		
		$instance['post_type'] = (!empty($new_instance['post_type']))? $new_instance['post_type'] : '';
		$instance['posts_per_page'] = (!empty($new_instance['posts_per_page']))? $new_instance['posts_per_page'] : '';
		$instance['post__not_in'] = (!empty($new_instance['post__not_in']))? array_map('intval',explode(',',$new_instance['post__not_in'])) : '';
		$instance['offset'] = (!empty($new_instance['offset']))? intval($new_instance['offset']) : '';
		$instance['taxonomy'] = (!empty($new_instance['taxonomy']))? $new_instance['taxonomy'] : '';
		$instance['terms_tax'] = (!empty($new_instance['terms_tax']))? array_map('intval',$new_instance['terms_tax']) : '';
		$instance['order'] = (!empty($new_instance['order']))? $new_instance['order'] : '';
		$instance['filter'] = (!empty($new_instance['filter']))? $new_instance['filter'] : '';
		$instance['style'] = (!empty($new_instance['style']))? $new_instance['style'] : '';
		return $instance;
	}
}

function myplugin_NETFIl_widgets() {
	register_widget( 'NETflibs' );
}

add_action( 'widgets_init', 'myplugin_NETFIl_widgets' );




// Ajax wp
add_action('wp_ajax_wl_ajax_widget_posts_film','wl_ajax_widget_posts_film');

function wl_ajax_widget_posts_film(){
	
	$post_type = sanitize_text_field($_POST['post_type']);
	$object_tax = get_object_taxonomies($post_type,'names');
	if($object_tax){
		$terms = get_terms(
		array(
		'taxonomy' => $object_tax[0],
		'hide_empty' => false,
		)
		);
		foreach($terms as $term){
		?>
		<input class="widefat" id="widget-welearn_posts-2-terms_tax" name="widget-welearn_posts[2][terms_tax][]" type="checkbox" value="<?php echo intval($term->term_id) ?>" <?php for($i=0;$count>$i;$i++) if(@$terms_tax[$i] == $term->term_id) echo 'checked' ?> ><?php echo $term->name  ?>
		<?php
		}
	}
	wp_die();
}
?>