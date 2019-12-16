## What is this?
It's an [Elementor PRO][elementor] plugin that will add few extra useful options:

### For POSTS widget

Adds two extra options:

#### Order by Meta
You can order by meta_value/meta_value_num.

#### Meta Query
You can add one level of meta queries. While I could enable multi-level meta queries, I found out that this can have **serious** impact on performance.

You can, however, add multiple meta fields to query on. However, multiple fields can also have performance impact, so try to limit your query to MAX four key/value fields.

##### Customize
You can customize the query further on by using a filter:

```
add_filter('iamntz/elementor/query/meta-query', function($query) {
    $query['value'] = str_replace('%year%', date('Y'), $query['value']);
    $query['value'] = str_replace('%today%', date('j-m-Y'), $query['value']);
    return $query;
});
```

## Todo

- [ ] Add the same options for Archive widget
- [ ] Show relationship selector only when there are more than one meta fields
 
## Support me
[Buy me a beer][beer] or get yourself [some good, quality hosting][hosting].

## License
GPL2

[elementor]: https://elementor.com/?ref=1321
[beer]: https://www.paypal.me/iamntz/5
[hosting]: https://m.do.co/c/c95a44d0e992