<?php
$config['tag']['table_name'] = TABLE_PREFIX.'tag';
$config['tag']['my_tag_table_name'] = TABLE_PREFIX.'my_tag';
$config['tag']['page_title_default'] = "话题";
$config['tag']['per_page_num'] = 200;
$config['tag']['total_record'] = 1000;
$config['tag']['cache_time'] = 1800;
$config['tag']['list_similar_tag_count'] = 10;
$config['tag']['user_list_per_page_num'] = 100;
$config['tag']['item_list_per_page_num'] = 20;
$config['tag']['item_default'] = 'topic';
$config['tag']['item_list'] = array(
    'topic' => array(
        'table_name' => TABLE_PREFIX . 'topic',
        'table_pri' => 'tid',
        'name' => '微博',
        'value' => 'topic',
        'url' => 'index.php?mod=topic',
    ),
);
?>
