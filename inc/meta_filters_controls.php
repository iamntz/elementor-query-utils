<?php

namespace iamntz\elementor_query_utils;

function meta_filters_controls($instance)
{
    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
        'key',
        [
            'label' => __('Key'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]
    );

    $repeater->add_control(
        'compare',
        [
            'label' => __('Compare'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '=',
            'options' => [
                '=' => '=',
                '!=' => '!=',
                '>' => '>',
                '>=' => '>=',
                '<' => '<',
                '<=' => '<=',
                'LIKE' => 'LIKE',
                'NOT LIKE' => 'NOT LIKE',
                'IN' => 'IN',
                'NOT IN' => 'NOT IN',
                'BETWEEN' => 'BETWEEN',
                'NOT BETWEEN' => 'NOT BETWEEN',
                'NOT EXISTS' => 'NOT EXISTS',
                'REGEXP' => 'REGEXP',
                'NOT REGEXP' => 'NOT REGEXP',
                'RLIKE' => 'RLIKE',
            ],
        ]
    );

    $repeater->add_control(
        'value',
        [
            'label' => __('Value'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]
    );

    $repeater->add_control(
        'value_is_array',
        [
            'label' => __('Treat values as Array?'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'return_value' => 'is_array',
            'description' => __("If set to true, the string will be splitted at each comma."),
            'condition' => [
                'compare' => [
                    'IN',
                    'NOT IN',
                    'BETWEEN',
                    'NOT BETWEEN',
                ],
            ],
        ]
    );

    $repeater->add_control(
        'type',
        [
            'label' => __('Type'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'CHAR',
            'options' => [
                'CHAR' => 'CHAR',
                'NUMERIC' => 'NUMERIC',
                'BINARY' => 'BINARY',
                'DATE' => 'DATE',
                'DATETIME' => 'DATETIME',
                'DECIMAL' => 'DECIMAL',
                'SIGNED' => 'SIGNED',
                'TIME' => 'TIME',
                'UNSIGNED' => 'UNSIGNED',
            ],
        ]
    );

    // For performance reasons, you can't nest meta queries. If you really _need_ this,
    // you can use a hook and adjust the query individually.
    $instance->add_control(
        'custom_meta_query',
        [
            'label' => __('Custom Meta Query'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'prevent_empty' => false,
            'description' => __("For performance reasons, you should limit meta fields at minimum!"),
            'item_actions' => [
                'duplicate' => false,
                'sort' => false,
            ],
            'fields' => $repeater->get_controls(),
        ]
    );

    $instance->add_control(
        'meta_query_relation',
        [
            //todo: add conditional to show this button only if there are more than one items in custom meta query repeater
            'label' => __('Meta Query Relation'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'OR',
            'options' => [
                'AND' => 'AND',
                'OR' => 'OR',
            ],
        ]
    );
}