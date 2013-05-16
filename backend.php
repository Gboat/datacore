<?php
/*
this file is used to connent auth service
such as mongo,seach eagine
 */
$mg = new Mongo("172.31.159.111:27017");
$db = $mg->track;

$a = $db->user->findOne();
echo $a['city'];
echo "OK";

$data = array(
    'pid' => 234, // 此字段为主键，必须指定
    'subject' => '测试文档的标题',
    'message' => '测试文档的内容部分',
    'chrono' => time()
);
/*
require '/home/gm/workspace/xs/sdk/php/lib/XS.php';
$xs = new XS('track'); // 建立 XS 对象，项目名称为：demo
$index = $xs->index; // 获取 索引对象
// 创建文档对象
$doc = new XSDocument;
$doc->setFields($data);
// 添加到索引数据库中
$index->setDb('default');
$index->add($doc);

// 在检索时同时搜索 db, db2 的作法，具体参考搜索的有关章节
//$search->addDb('db2')->setQuery("")->search();
 */
?>
