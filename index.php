<?php
/**
 * 一款符合现代人审美的左右分栏式主题，前台内置了管理员管理中心，可以轻松设置为有自己特色的主题，无需三方插件，即可快速使用
 *
 * @package Freedom-冷文
 * @author 冷文博客
 * @version 1.0
 * @link http://www.kevinlu98.cn/
 */

include_once("common/init.php")
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<!-- saved from url=(0022)http://www.youtiy.com/ -->
<html>
<head>
    <title><?php $this->options->title() ?></title>
    <?php
    if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('common/header.php');
    ?>
</head>
<body>
<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('common/navbar.php');
?>
<div style="height: 60px"></div>
<div class="container">
    <?php
    if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('common/sidebar.php');
    ?>

    <div class="rightblock" style="padding-bottom: 20px;text-align: left">


        <div class="content masonry" id="content" style="position: relative; height: 1571px;">

            <?php while ($this->next()): ?>
                <div class="item masonry-brick" style="display: inline-block">
                    <div class="title">
                        <a href="<?php $this->permalink() ?>"
                           target="_blank"><?php $this->title() ?>
                        </a>
                    </div>
                    <div class="pimg">
                        <img src="<?php echo get_postthumb($this); ?>"
                             data-original="<?php echo get_postthumb($this); ?>"
                             data-url="<?php $this->permalink() ?>"
                             class="pic"
                             style="display: inline;border-radius: 5px;border: 1px solid #AAAAAA">

                    </div>
                    <div class="des"><p><?php $this->excerpt(50, '...'); ?></p></div>
                    <div class="info">
                        <div>作者：<?php $this->author(); ?></div>
                        <div><?php $this->date('Y-m-d H:i:s'); ?></div>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
        <?php $this->pageNav('&laquo;', '&raquo;', 10, '', array('wrapTag' => 'ul', 'wrapClass' => 'lw-page', 'itemTag' => 'li', 'currentClass' => 'lw-page-active',)); ?>
        <?php
        if (!defined('__TYPECHO_ROOT_DIR__')) exit;
        $this->need('common/rightbar.php');
        ?>
    </div>

</div>

<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('common/script.php');
?>

</body>
</html>
