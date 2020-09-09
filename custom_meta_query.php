<?php

add_action('elementor/element/posts/section_query/before_section_end', 'iamntz\elementor_query_utils\meta_filters_controls');
add_action('elementor/element/woocommerce-products/section_query/before_section_end', 'iamntz\elementor_query_utils\meta_filters_controls');

add_filter('elementor/query/query_args', 'iamntz\elementor_query_utils\query' , 99, 2);
