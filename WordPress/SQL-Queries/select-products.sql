-- Select all products with standard WooCommerce attributes
SELECT
    p.ID as product_id,
    p.post_title as product_name,
    p.post_content as product_description,
    p.post_excerpt as product_excerpt,
    p.post_status as product_status,
    p.post_date as date_created,
    p.post_modified as date_modified,
    MAX(CASE WHEN pm.meta_key = '_sku' THEN pm.meta_value END) as sku,
    MAX(CASE WHEN pm.meta_key = '_price' THEN pm.meta_value END) as price,
    MAX(CASE WHEN pm.meta_key = '_regular_price' THEN pm.meta_value END) as regular_price,
    MAX(CASE WHEN pm.meta_key = '_sale_price' THEN pm.meta_value END) as sale_price,
    MAX(CASE WHEN pm.meta_key = '_stock' THEN pm.meta_value END) as stock
FROM
    wp_posts p
LEFT JOIN
    wp_postmeta pm ON p.ID = pm.post_id
WHERE
    p.post_type = 'product'
GROUP BY
    p.ID
ORDER BY
    p.ID;
