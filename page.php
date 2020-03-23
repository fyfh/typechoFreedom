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

                <div class="artcontent-detail article-content">
                    <?php $this->content(); ?>
                </div>
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