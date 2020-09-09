<?php

namespace iamntz\elementor_query_utils;


class WooCommerceArchive
{
    protected $widget;

    public function __construct()
    {
        add_action('elementor/widget/before_render_content', [$this, '_beforeRender']);
    }

    function _beforeRender($instance)
    {
        if ($instance->get_name() !== 'woocommerce-products') {
            return;
        }

        $this->widget = $instance;
        add_filter('woocommerce_shortcode_products_query', [$this, '_wooQuery'], 99, 3);
    }

    public function _wooQuery($args, $attrs, $type)
    {
        remove_filter('woocommerce_shortcode_products_query', [$this, '_wooQuery'], 99, 3);

        $args = query($args, $this->widget);


        return $args;
    }
}