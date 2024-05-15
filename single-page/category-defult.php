<div class="col-lg-4 col-12">
				<div class="grune-film text-right">
                    	<?php dynamic_sidebar('sidebar_cat'); ?>
                		</div>
			</div>
			<?php $pic = get_term_meta( get_queried_object()->term_id, 'cat-img', true ); ?>
			<div class="col-lg-8 col-12 by-order">
				<div class="side-right-blog">
					<figure class="rounded" style="background: url('<?php echo $pic; ?>');">
						<div class="content-ficaption text-center mr-5 ml-5" style="background: <?php $select_header = get_term_meta( get_queried_object()->term_id, 'color_cat', true ); echo $select_header; ?>;">
							<h1 class="text-white"><?php echo single_cat_title(); ?></h1>
							<?php echo category_description(); ?>
						</div>
					</figure>
					<div class="row pt-5 pb-5">
					<?php
					while(have_posts())  
					{
						the_post();
						$mycat=wp_get_post_categories(get_the_ID());
						$t2=wp_get_post_tags(get_the_ID());
						foreach($t2 as $junk)
						{
						$mytags[]=$junk->term_id;
						} 
						?>
						<div class="col-md-6">
							<article>
								<a href="<?php the_permalink(); ?>">
									<div class="post-img-wraper">
										<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-100 rounded">
									</div>
								</a>
								<?php 
                                    $time_booke = get_post_meta(get_the_ID(),'text-name',true);
                                ?>
								<div class="post-content text-right pt-3 pb-3">
									<span class="mb-3"><?php the_category(','); ?></span>
									<h2 class="mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<span class="year text-secondary">منتشر شده در <?php echo get_the_date('d F'); ?> - <?php echo $time_booke ?> دقیقه مطالعه</span>
								</div>
							</article>
						</div>
						<?php 
						}
						wp_reset_query();
						?>
					</div>
				</div>
			</div>