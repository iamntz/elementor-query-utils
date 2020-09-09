<?php

/*
Plugin Name: Elementor Query Utils
Description: Various utils for Elementor Pro post queries: adds meta query fields and order by meta
Author: Ionuț Staicu
Version: 1.0.1
Author URI: http://ionutstaicu.com
*/

use iamntz\elementor_query_utils\WooCommerceArchive;

require_once 'inc/meta_filters_controls.php';
require_once 'inc/order_controls.php';
require_once 'inc/query.php';
require_once 'inc/WooCommerceArchive.php';


add_action('elementor/element/posts/section_query/before_section_end', 'iamntz\elementor_query_utils\order_controls', 99);

add_action('elementor/element/posts/section_query/before_section_end', 'iamntz\elementor_query_utils\meta_filters_controls');
add_action('elementor/element/woocommerce-products/section_query/before_section_end', 'iamntz\elementor_query_utils\meta_filters_controls');

add_filter('elementor/query/query_args', 'iamntz\elementor_query_utils\query', 99, 2);


new WooCommerceArchive;