<?php

namespace iamntz\elementor_query_utils;

function query($query, $widget)
{
    $metaQuery = [];

    foreach ($widget->get_settings('custom_meta_query') as $meta) {
        if (empty($meta['key'])) {
            continue;
        }

        if ($meta['value_is_array'] === 'is_array') {
            $value = array_map('trim', explode(",", $meta['value']));
            if (in_array($meta['type'], ['DECIMAL'])) {
                $value = array_map('absint', $value);
            }
        } else {
            $value = $meta['value'];
        }


        $metaQuery[] = apply_filters('iamntz/elementor/query/meta-query', [
            'key' => $meta['key'],
            'value' => $value,
            'compare' => $meta['compare'],
            'type' => $meta['type'],
        ], $meta, $query, $widget);
    }

    if (!empty($metaQuery)) {
        $metaQuery['relation'] = $widget->get_settings('meta_query_relation');
        $query['meta_query'][] = apply_filters('iamntz/elementor/query/all-meta-query', $metaQuery, $query, $widget);
    }

    return $query;
}