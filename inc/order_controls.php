<?php

namespace iamntz\elementor_query_utils;

function order_controls($instance)
{
    $controls = $instance->get_controls();

    $controls['posts_orderby']['options']['meta_value'] = __('Meta Value');
    $controls['posts_orderby']['options']['meta_value_num'] = __('Meta Value (numeric)');

    $instance->update_control('posts_orderby', $controls['posts_orderby']);

    $instance->start_injection(['of' => 'posts_orderby']);

    $instance->add_control('posts_orderby_meta_key', [
            'label' => __('Meta Key'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'condition' => [
                'posts_orderby' => 'meta_value',
            ],
        ]
    );

    $instance->end_injection();
}