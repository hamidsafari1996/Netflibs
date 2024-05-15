<?php

/*
 * Template Name: single-tube
 * Template Post Type: coagex_movie
 */
get_header();
$select_header = get_post_meta(get_the_ID(), 'wiki_test_select', true);
if ('header' === $select_header) {
	get_template_part('template/index', 'header');
}
$select_header1 = get_post_meta(get_the_ID(), 'wiki_test_select', true);
if ('header-1' === $select_header1) {
	get_template_part('template/index', 'header2');
}
$select_header2 = get_post_meta(get_the_ID(), 'wiki_test_select', true);
if ('header-2' === $select_header2) {
	get_template_part('template/push', 'menu');
}

if ($elementor_header = get_post_meta(get_the_ID(), 'header-elementor-select', true)) {
?>
	<header>
		<?php
		$elementor = \Elementor\Plugin::instance();
		echo $elementor->frontend->get_builder_content($elementor_header);
		?>
	</header>
<?php
}

?>
<?php
$c = array();
$mytags = array();
while (have_posts()) {
	the_post();
	$mycat = wp_get_post_categories(get_the_ID());
	$t2 = wp_get_post_tags(get_the_ID());
	foreach ($t2 as $junk) {
		$mytags[] = $junk->term_id;
	}

?>
	<section>
		<div class="container-fluid pt-5 pt-lg-0">
			<div class="row">
				<div class="col-lg-8 col-md-12 col-12">

					<div class="video-section rounded-0">
						<?php
						$link_movie = get_post_meta(get_the_ID(), 'text-link', true);
						$img = get_post_meta(get_the_ID(), 'imagev', true);
						$subtitle = get_post_meta(get_the_ID(), 'text-subtitle', true);
						$aparat_embed = get_post_meta(get_the_ID(), 'aparat_embed', true);
						?>
						<?php
						$restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
						if ('restice-no' === $restice_select) {
						?>
							<?php $select_plyr = woolearn_get_option('select_player');
							if ('defult' === $select_plyr) { ?>

								<?php $select_video = get_post_meta(get_the_ID(), 'select_video', true);
								if ('video' === $select_video) { ?>
									<video class="video js-player" poster="<?php echo $img; ?>" controls>
										<source src="<?php echo $link_movie; ?>" type="video/mp4">
										<track kind="captions" label="persian" srclang="fa" src="<?php echo $subtitle; ?>" default>
									</video>
								<?php } ?>


								<?php $select_youtube = get_post_meta(get_the_ID(), 'select_video', true);
								if ('youtube' === $select_youtube) { ?>


									<div class="embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="<?php echo $link_movie; ?>" allowfullscreen></iframe>
									</div>
								<?php } ?>
								<?php $select_aparat = get_post_meta(get_the_ID(), 'select_video', true);
								if ('aparat' === $select_aparat) { ?>
									<div class="aparat-sec"><?php echo $aparat_embed; ?></div>
								<?php } ?>
							<?php } ?>


							<?php $shortcode_idcode = woolearn_get_option('shortcode_player'); ?>
							<?php if ('plyr' === $select_plyr) { ?>

								<div class="jw-player"><?php echo do_shortcode($shortcode_player); ?></div>


							<?php } ?>
						<?php } ?>
						<?php
						$restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
						if ('restice-yes' === $restice_select) {
						?>
							<?php if (rcp_get_subscription()) { ?>
								<?php $select_plyr = woolearn_get_option('select_player');
								if ('defult' === $select_plyr) { ?>

									<?php $select_video = get_post_meta(get_the_ID(), 'select_video', true);
									if ('video' === $select_video) { ?>
										<video class="video js-player" poster="<?php echo $img; ?>" controls>
											<source src="<?php echo $link_movie; ?>" type="video/mp4">
											<track kind="captions" label="persian" srclang="fa" src="<?php echo $subtitle; ?>" default>
										</video>
									<?php } ?>


									<?php $select_youtube = get_post_meta(get_the_ID(), 'select_video', true);
									if ('youtube' === $select_youtube) { ?>


										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" src="<?php echo $link_movie; ?>" allowfullscreen></iframe>
										</div>
									<?php } ?>
									<?php $select_aparat = get_post_meta(get_the_ID(), 'select_video', true);
									if ('aparat' === $select_aparat) { ?>
										<div class="aparat-sec"><?php echo $aparat_embed; ?></div>
									<?php } ?>

								<?php } ?>


								<?php $shortcode_idcode = woolearn_get_option('shortcode_player'); ?>
								<?php if ('plyr' === $select_plyr) { ?>

									<div class="jw-player"><?php echo do_shortcode($shortcode_idcode); ?></div>


								<?php } ?>
							<?php } else { ?>

								<?php $select_plyr = woolearn_get_option('select_player');
								if ('defult' === $select_plyr) { ?>

									<?php $select_video = get_post_meta(get_the_ID(), 'select_video', true);
									if ('video' === $select_video) { ?>
										<a href="" type="button" data-toggle="modal" data-target="#resigester">
											<video class="video js-player" poster="<?php echo $img; ?>" controls>
												<source src="#" type="video/mp4">
												<track kind="captions" label="persian" srclang="fa" src="<?php //echo $subtitle; ?>" default>
											</video>
										</a>
										<?php } ?>


										<?php $select_youtube = get_post_meta(get_the_ID(), 'select_video', true);
										if ('youtube' === $select_youtube) { ?>

										<a href="" type="button" data-toggle="modal" data-target="#resigester">
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="embed-responsive-item" src="#" allowfullscreen></iframe>
											</div>
										</a>
										<?php } ?>

										<?php $select_aparat = get_post_meta(get_the_ID(), 'select_video', true);
										if ('aparat' === $select_aparat) { ?>
											<a href="" type="button" data-toggle="modal" data-target="#resigester">
												<video class="video js-player" poster="<?php echo $img; ?>" controls>
													<source src="#" type="video/mp4">
													<track kind="captions" label="persian" srclang="fa" src="<?php //echo $subtitle; ?>" default>
												</video>
											</a>
										<?php } ?>


								<?php } ?>


								<?php $shortcode_idcode = woolearn_get_option('shortcode_player'); ?>
									<?php if ('plyr' === $select_plyr) { ?>
										<a href="" type="button" data-toggle="modal" data-target="#resigester">
											<video class="video js-player" poster="<?php echo $img; ?>" controls>
												<source src="#" type="video/mp4">
												<track kind="captions" label="persian" srclang="fa" src="<?php //echo $subtitle; ?>" default>
											</video>
										</a>
									<?php } ?>
								<?php } ?>
							<?php } ?>

							<h1 class="text-white text-right mt-4"><?php the_title(); ?></h1>
							<div class="mt-4 mr-1 w-100">
								<span class="float-right view text-secondary ml-1"><?php the_views(); ?> بازدید</span>
								<span class="float-right text-white">.</span>
								<span class="float-right year text-secondary mr-1"><?php echo get_the_date('d F Y'); ?></span>
								<div class="btn-group dropup float-left d-flex align-items-center">
									<?php global $user_ID; ?>
									<?php if ($user_ID) { ?>
										<div class="faverit-button faverit-button-tube">
											<?php echo do_shortcode('[favorite_button]'); ?>
										</div>
									<?php } else { ?>
										<div class="faverit-button-tube faverit-button-error">
											<button class="simplefavorite-button">
												<i class="far fa-bookmark"></i>
											</button>
										</div>
									<?php } ?>
									<div type="button" class="text-white-50 ml-3 text-footer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-share"></i>
										همرسانی
									</div>
									<div class="dropdown-menu p-0">
										<ul class="d-flex">
											<li class="p-3 bg-primary">
												<a class="footer-socials text-white" href="https://www.facebook.com/share.php?v=4&src=bm&u=<?php the_permalink(); ?>"><i class="fab fa-facebook"></i></a>
											</li>
											<li class="p-3 bg-info">
												<a class="footer-socials text-white" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a>
											</li>
											<li class="p-3 bg-danger">
												<a class="footer-socials text-white" href="//www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if (function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>"><i class="fab fa-pinterest"></i></a>
											</li>
											<li class="p-3 bg-primary">
												<a class="footer-socials text-white" href="mailto:?subject=اشتراک صفحه‌ای از دایان&amp;body=<?php the_permalink(); ?>"><i class="fa fa-envelope-open"></i></a>
											</li>
											<li class="p-3 bg-danger">
												<a class="footer-socials text-white" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-google-plus"></i></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
					</div>
					<hr>
					<div class="content p-4 text-right text-white">
						<?php
						$user = wp_get_current_user();

						if ($user) :
						?>
							<span><img src="<?php echo esc_url(get_avatar_url($user->ID)); ?>" alt="" class="rounded-circle bg-white width-img"></span>
						<?php endif; ?>
						<?php the_content(); ?>
						<div class="p-1 text-right tag-tube">
							<?php the_terms(get_the_ID(), "worldsub_tag", '#'); ?>
						</div>
					<?php
				}
				wp_reset_query();
					?>
					</div>
					<hr>
					<div class="container">
						<?php
						$tabligh_select = woolearn_get_option('tabligh_select', true);
						if ('setting-tabligh' === $tabligh_select) { ?>
							<?php
							$worldsub_options = woolearn_get_option('coagex_tizer_especial_group');
							?>
							<div class="row">
								<div class="header-top-section bg-dark shadow-sm mb-3 mt-5">
									<div class="title-top d-flex">
										<i class="fas fa-bullhorn"></i>
										<h3 class="text-white"><?php echo  $worldsub_options[0]['title_1']; ?></h3>
									</div>
									<div class="row tizer">
										<?php
										$ads_link = get_post_meta(get_the_ID(), 'ads_link', true);
										?>
										<?php $ads_posttype_setting = woolearn_get_option('ads_posttype_setting');
										foreach ($ads_posttype_setting as $item) { ?>
											<?php
											$posts = $item['test_number'];
											$order = $item['order_id'];
											$filter = $item['orderby_id'];
											$target = $item['target_select'];
											$best_product = array(
												'post_type' => 'ads',
												'posts_per_page' => $posts,
												'order' => $order,
												'orderby' => $filter,
											);
											$show_best_product = new WP_Query($best_product);
											while ($show_best_product->have_posts()) : $show_best_product->the_post();
											?>

												<div class="col-lg-3 col-md-6 col-sm-6 col-12 text-right">
													<figure class="figure ml-2 mb-3">
														<a href="<?php echo $ads_link; ?>" rel="nofollow" target="<?php echo $target; ?>"><img src="<?php the_post_thumbnail_url(); ?>" class="figure-img img-fluid" alt="<?php the_title(); ?>"></a>
														<figcaption class="figure-caption text-right"><a class="text-white" href="<?php echo $ads_link; ?>" rel="nofollow" target="<?php echo $target; ?>"><?php the_title(); ?></a></figcaption>
													</figure>
												</div>
											<?php endwhile;
											wp_reset_postdata(); ?>
										<?php } ?>


									</div>
								</div>
							</div>
						<?php } ?>
						<?php
						if ('yektanet-tabligh' === $tabligh_select) {
							$html_yektanet = woolearn_get_option('tabligh-html', true);
							echo $html_yektanet;
						} ?>
					</div>
					<hr>
					<section class="mt-5 d-block d-lg-none">
						<div class="col-12">
							<div class="header-title mt-5 mb-3">
								<h2 class="text-white text-right">فیلم های مشابه</h2>
							</div>

							<div class="col-lg-12 col-md-12 col-12">
								<div class="movie-new-carousel rand-film owl-carousel owl-theme">

									<?php

									$q = new WP_Query(
										array(
											'post_type' => 'coagex_movie',
											"posts_per_page" => 9,
											"orderby" => "rand"

										)
									);

									while ($q->have_posts()) {
										$q->the_post();
									?>

										<div class="movie-new-item ml-4 item">
											<figure class="figure">
												<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
											</figure>
											<ficaption class="figure-caption text-right">
												<div class="movie-new-content mb-2">
													<h2><a href="<?php the_permalink(); ?>" data-toggle="tooltip" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
												</div>
												<?php
												$text_imbd = get_post_meta(get_the_ID(), 'text-imDb', true);
												$imbd_link = get_post_meta(get_the_ID(), 'link', true);
												?>
												<?php
												$select_sethand = get_post_meta(get_the_ID(), 'imDb_select', true);
												if ('defult-select' === $select_sethand) { ?>
													<div class="movie-new-footer">
														<span class="star ml-3"><i class="fas fa-star"></i><?php echo $text_imbd; ?></span>
														<span class="eye"><i class="fas fa-eye"></i> <?php the_views(); ?></span>
														<span class="float-left years"><?php the_terms(get_the_ID(), "yaers"); ?></span>
													</div>
												<?php
												}
												?>
												<?php
												if ('imdb-tabligh' === $select_sethand) {
												?>
													<?php
													include_once 'template/inc/imdb.class.php';
													$IMDB = new IMDB($imbd_link); ?>

													<div class="movie-new-footer">
														<span class="star ml-3"><i class="fas fa-star"></i><?php if ($IMDB->isReady) {
																								print_r($IMDB->getRating());
																							} else {
																								echo '';
																							} ?></span>
														<span class="eye"><i class="fas fa-eye"></i> <?php the_views(); ?></span>
														<span class="float-left"><?php if ($IMDB->isReady) {
																				print_r($IMDB->getYear());
																			} else {
																				echo '';
																			} ?></span>
													</div>

												<?php
												}
												?>
											</ficaption>
										</div>


									<?php
									}
									wp_reset_postdata();

									?>


								</div>

							</div>
						</div>
					</section>
					<div class="text-right">
						<?php if (comments_open() || get_comments_number()) {
							comments_template();
						} ?>
					</div>

				</div>
				<?php
				$big_tizer = get_post_meta(get_the_ID(), 'image-big', true);
				$link_tizer = get_post_meta(get_the_ID(), 'tabligh', true);
				?>
				<div class="col-lg-4 col-md-12 col-12 d-none d-lg-block">
					<figure class="tak-tizer rounded-0">
						<a href="<?php echo $link_tizer; ?>"><img class="w-100" src="<?php echo $big_tizer; ?>" alt=""></a>
					</figure>
					<div class="title-rand text-right mb-3">
						<h3 class="text-white">بعدی</h3>
					</div>
					<hr>
					<?php
					$movie_years = get_post_meta(get_the_ID(), 'text-years', true);
					$time_movie = get_post_meta(get_the_ID(), 'text-time', true);
					?>
					<?php

					$q = new WP_Query(
						array(
							'post_type' => 'coagex_movie',
							"orderby" => "rand"

						)
					);

					while ($q->have_posts()) {
						$q->the_post();
						// var_dump(the_title());
					?>
						<div class="portfolio-rand pt-4 px-3 px-lg-0 d-md-flex">
							<div class="text-right">
								<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></a>
							</div>
							<div class="content-port text-right mr-md-2">
								<h3 class="mb-3 mt-1"><a href="<?php the_permalink(); ?>" class="text-white"><?php the_title(); ?></a></h3>
								<span class="d-block text-secondary mt-2 mb-2"><?php echo $time_movie; ?></span>
								<div class="mt-3">
									<span class="float-right view text-secondary ml-1"><?php the_views(); ?> بازدید</span>
									<span class="float-right text-white">.</span>
									<span class="float-right year text-secondary mr-1"><?php echo get_the_date('d F Y'); ?></span>
								</div>
							</div>
						</div>
					<?php
					}
					wp_reset_postdata();

					?>
				</div>

			</div>
		</div>
	</section>

	<!-- Modal -->
	<div class="modal fade resigester-content" id="resigester" tabindex="-1" aria-labelledby="resigesterLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="resigesterLabel">برای مشاهده این فیلم باید اشتراک داشته باشید</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body d-flex">
					<div class="col-6 text-center">
						<a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
					</div>
					<div class="col-6 text-center">
						<a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester left-bg">خرید اشتراک</a>
					</div>
				</div>
			</div>
		</div>
	</div>




	<?php

	$select_footer = get_post_meta(get_the_ID(), 'wiki_footer_select', true);
	if ('footer_1' === $select_footer) {
		get_template_part('template/index', 'footer');
	}
	$select_value = get_post_meta(get_the_ID(), 'wiki_test_select', true);
	if ('footer_2' === $select_footer) {
		get_template_part('template/index', 'footer2');
	}
	$select_value = get_post_meta(get_the_ID(), 'wiki_test_select', true);
	if ('footer_3' === $select_footer) {
		get_template_part('template/index', 'footer_3');
	}

	if ($elementor_footer = get_post_meta(get_the_ID(), 'footer_elementor_select', true)) {
	?>
		<footer>
			<?php
			$elementor = \Elementor\Plugin::instance();
			echo $elementor->frontend->get_builder_content($elementor_footer);
			?>
		</footer>
	<?php
	}

	get_footer();
	?>