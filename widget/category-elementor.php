<?php
function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'first-category',
		[
			'title' => __( 'المان‌های پایه نتفلیبس', 'plugin-name' ),
			'icon' => 'fa fa-plug',
		],
		1
	);
	$elements_manager->add_category(
		'secend-category',
		[
			'title' => __( 'المان‌های هدر ساز نتفلیبس', 'plugin-name' ),
			'icon' => 'fa fa-plug',
		],
		2
	);
	$elements_manager->add_category(
		'tree-category',
		[
			'title' => __( 'المان‌های اختصاصی قالب ساز نتفلیبس', 'plugin-name' ),
			'icon' => 'fa fa-plug',
		],
		3
	);
	$elements_manager->add_category(
		'four-category',
		[
			'title' => __( 'المان‌های فوترساز نتفلیبس', 'plugin-name' ),
			'icon' => 'fa fa-plug',
		],
		4
	);
	$elements_manager->add_category(
		'five-category',
		[
			'title' => __( 'المان‌های سینگل ساز نتفلیبس', 'plugin-name' ),
			'icon' => 'fa fa-plug',
		],
		5
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );
?>