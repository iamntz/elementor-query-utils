<?php

namespace iamntz\elementor_query_utils;


class WooCommerceArchive
{
    protected $widget;
    protected $filterPriority = 99;

    public function __construct()
    {
        add_action('elementor/widget/before_render_content', [$this, '_beforeRender']);
    }

    public function _beforeRender($widget)
    {
        if ($widget->get_name() !== 'woocommerce-products') {
            return;
        }

        $this->widget = $widget;

        add_filter('woocommerce_shortcode_products_query', [$this, '_wooQuery'], $this->filterPriority, 3);
    }

    public function _wooQuery($args, $attrs, $type)
    {
        remove_filter('woocommerce_shortcode_products_query', [$this, '_wooQuery'], $this->filterPriority);

        $args = query($args, $this->widget);

        $args = apply_filters('iamntz/elementor/query/woo-query-arguments', $args, $attrs, $type, $this->widget);

        return $args;
    }
}