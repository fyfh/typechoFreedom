<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $qq = $_POST['qq'];
    echo get_qq_nick($qq);
    return;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<!-- saved from url=(0022)http://www.youtiy.com/ -->
<html>
<head>
    <title><?php $this->options->title() ?>-<?php $this->title() ?></title>
    <link href="<?php $this->options->themeUrl('static/css/main.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php $this->options->themeUrl('static/plugin/prism/prism.css'); ?>" rel="stylesheet" type="text/css">
    <script src="https://cdn.bootcss.com/wangEditor/3.1.1/wangEditor.min.js"></script>
    <script src="<?php $this->options->themeUrl('static/plugin/prism/prism.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('static/js/face.js'); ?>"></script>
    <?php
    if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('common/header.php');
    ?>
    <style type="text/css">

        .w-e-text-container {
            height: 200px !important;
        }

    </style>
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


        <div class="container-detail" style="margin-bottom: 20px;">

            <div class="content-detail">
                <div class="title-detail"><?php $this->title() ?></div>
                <div class="lw-info">
                            <span><i class="fa fa-user-o" aria-hidden="true"></i>
        <?php $this->author(); ?></span>
                    <span><i class="fa fa-calendar" aria-hidden="true"></i>
        <?php $this->date('Y-m-d H:i:s'); ?></span>
                </div>
                <div class="tags">
                    <div>标签: <?php $this->tags(' ', true, 'none'); ?></a></div>
                </div>
                <div class="artcontent-detail article-content">
                    <?php $this->content(); ?>
                </div>
            </div>
            <p class="iblue" style="color: #D92E2F;font-weight: 700;">
                免责声明:
                本站资源来自网络收集或本人原创，仅供学习参考，不得用作商业用途。若本站资源侵犯了您的版权，请您立即联系我们，我们会在24小时之内删除
            </p>
            <div class="lw-pager-detail">
                <?php prev_post($this); ?>
                <?php next_post($this); ?>
            </div>

            <?php
            if (!defined('__TYPECHO_ROOT_DIR__')) exit;
            $this->need('common/comments.php');
            ?>

            <div
                    style="margin-top:150px;margin-left:40px;font-size:18px;margin-bottom:20px;color:#E3E3E3;display:block;height:50px;"
            ></div>
        </div>

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