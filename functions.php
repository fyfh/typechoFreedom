<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

//function themeInit($archive)
//{
//    if ($archive->is('index')) {
//        $archive->parameter->pageSize = 9; // 自定义条数
//    }
//}

function themeConfig($form)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock',
        array('ShowRecentPosts' => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory' => _t('显示分类'),
            'ShowArchive' => _t('显示归档'),
            'ShowOther' => _t('显示其它杂项')),
        array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));

    $form->addInput($sidebarBlock->multiMode());
}

/**
 * 获取文章首图
 * @param $article
 * @return mixed
 */
function get_postthumb($article)
{
    preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $article->content, $matches);  //通过正则式获取图片地址
    if (isset($matches[1][0])) {
        $thumb = $matches[1][0];
    }
    return $thumb;
}

/**
 * 获取QQ头像
 * @param string $qq
 */
function getQQImage($mail)
{
    $qq = explode("@qq.com", $mail)[0];
    return 'http://q1.qlogo.cn/g?b=qq&nk=' . $qq . '&s=100&t=' . time();
}

function getName($url)
{
    $rule = "/>(.*?)</";
    preg_match($rule, $url, $res);
    return $res[1];
}

function isQQNumber($mail)
{
    $res = explode("@qq.com", $mail);
    if ($res[0] && is_numeric($res[0])) {
        return true;
    }
    return false;
}

/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/

function getGavatar($mail)
{
    $mail = md5($mail);

    $url = "http://www.gravatar.com/avatar/$mail?s=220&r=X&d=mm";

    return $url;
}

function prev_post($archive)
{
    $db = Typecho_Db::get();
    $content = $db->fetchRow($db->select()
        ->from('table.contents')
        ->where('table.contents.created < ?', $archive->created)
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.type = ?', $archive->type)
        ->where('table.contents.password IS NULL')
        ->order('table.contents.created', Typecho_Db::SORT_DESC)
        ->limit(1));
    if ($content) {
        $content = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($content);
        echo '<a href="' . $content['permalink'] . '" rel="prev"><span class="meta-nav">上一篇： </span> <span class="post-title">' . $content['title'] . '</span></a>';
    } else {
        echo '';
    }
}

function next_post($archive)
{
    $db = Typecho_Db::get();
    $content = $db->fetchRow($db->select()
        ->from('table.contents')
        ->where('table.contents.created > ? AND table.contents.created < ?', $archive->created, Helper::options()->gmtTime)
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.type = ?', $archive->type)
        ->where('table.contents.password IS NULL')
        ->order('table.contents.created', Typecho_Db::SORT_ASC)
        ->limit(1));
    if ($content) {
        $content = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($content);
        echo '<a href="' . $content['permalink'] . '" rel="next"><span class="meta-nav">下一篇： </span> <span class="post-title">' . $content['title'] . '</span></a>';
    } else {
        echo '';
    }
}

//获取QQ昵称
function get_qq_nick($qq = 321)
{
    $get_info = file_get_contents('https://api.unipay.qq.com/v1/r/1450000186/wechat_query?cmd=1&pf=mds_storeopen_qb-__mds_qqclub_tab_-html5&pfkey=pfkey&from_h5=1&from_https=1&openid=openid&openkey=openkey&session_id=hy_gameid&session_type=st_dummy&qq_appid=&offerId=1450000186&sandbox=&provide_uin=' . $qq);
    $name = json_decode($get_info, true);
    if (!isset($name['nick'])) return false;
    $name = urldecode($name['nick']);
    return $name;
}

function getSetting()
{
    $db = Typecho_Db::get();
    $query = $db->select('key')->from('typecho_setting');
    $result = $db->fetchAll($query);
    $keys = [];
    for ($i = 0; $i < count($result); $i++) {
        $keys[] = $result[$i]['key'];
    }
    $keys = array_unique($keys);
//    var_dump($keys);
    $info = [];
    foreach ($keys as $key) {
        if ($key == "webnav") {
            $query = $db->select('value1,value2,value3')->from('typecho_setting')->where('key = ?', $key);
            $result = $db->fetchAll($query);

            for ($i = 0; $i < count($result); $i++) {
                $info[$key][] = [
                    'name' => $result[$i]['value1'],
                    'url' => $result[$i]['value2'],
                    'icon' => $result[$i]['value3'],
                ];
            }

        } else if ($key == "friendly") {
            $query = $db->select('value1,value2')->from('typecho_setting')->where('key = ?', $key);
            $result = $db->fetchAll($query);
            for ($i = 0; $i < count($result); $i++) {
                $info[$key][] = [
                    'name' => $result[$i]['value1'],
                    'url' => $result[$i]['value2'],
                ];
            }
//            var_dump($result);
        } else {
            $query = $db->select('value1')->from('typecho_setting')->where('key = ?', $key);
            $result = $db->fetchAll($query);
            $info[$key] = $result[0]['value1'];
        }
    }
//    var_dump($info);

    return $info;
}

function formatTags($tags)
{
    return explode("/", $tags);
}