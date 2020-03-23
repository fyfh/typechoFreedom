<?php
/**
 * @Author: Kevin·Lu
 * @Date: 2020/3/23 5:00 下午
 * @Email: kevinlu98@qq.com
 * @Description:
 */
$db = Typecho_Db::get();
$result = $db->query("select database();");
$dbname = $db->fetchAll($result)[0]['database()'];

$result = $db->query("select TABLE_NAME from INFORMATION_SCHEMA.TABLES where TABLE_SCHEMA='$dbname' and TABLE_NAME='typecho_setting';");
$result = $db->fetchAll($result);

//表不存在  则创建
if (count($result) == 0) {
    echo '正在创建数据库...' . '<br>';
    $create_sql = "CREATE TABLE `typecho_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `value1` text COLLATE utf8_bin,
  `value2` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `value3` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
    $result = $db->query($create_sql);

    echo '正在添加站点默认值...' . '<br>';

    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'webname', 'value1' => '冷文'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'webimg', 'value1' => 'https://gitee.com/kevinlu98/imgbed/raw/master/20200323/419cdbbb-4bbd-4d8c-8cf3-931a5c9b4be9.jpeg'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'webtag', 'value1' => 'Java/PHP/前端/程序猿'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'webqq', 'value1' => '1628048198'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'webmail', 'value1' => 'kevinlu98@qq.com'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'webbg', 'value1' => 'https://gitee.com/kevinlu98/imgbed/raw/master/20200322/dbd82c0c-ad98-477a-9d2b-cdc133cbc897.jpeg'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'paycode', 'value1' => 'https://gitee.com/kevinlu98/imgbed/raw/master/20200322/b8dca622-1a24-4022-b031-07fdc66b796a.png'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'jscode', 'value1' => '123'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'csscode', 'value1' => '123'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'footcode', 'value1' => '<p>© 2019-2020</p>'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'webnav', 'value1' => '首页', 'value3' => 'home'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'webnav', 'value1' => '关于我', 'value3' => 'info-circle'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'webnav', 'value1' => '留言板', 'value3' => 'pencil-square-o'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'friendly', 'value1' => '冷文图床', 'value2' => 'http://image.kevinlu98.cn/'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'friendly', 'value1' => '冷文博客', 'value2' => 'http://www.kevinlu98.cn/'));
    $db->query($insert);
    $insert = $db->insert('typecho_setting')
        ->rows(array('key' => 'friendly', 'value1' => 'typecho官网', 'value2' => 'http://typecho.org/'));
    $db->query($insert);
    echo '站点默认值添加成功...' . '<br>';
    echo '<script>alert("站点初始化设置完成...");location.href="/"</script>';
}
