<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

    <meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php $this->options->themeUrl('static/css/style.css'); ?>" rel="stylesheet" type="text/css"
          media="all">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?php $this->options->themeUrl('static/js/hm.js'); ?>"></script>
    <script type="text/javascript" src="<?php $this->options->themeUrl('static/js/jquery-1.8.2.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php $this->options->themeUrl('static/js/jquery.masonry.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php $this->options->themeUrl('static/js/base.js'); ?>"></script>
    <!-- <script type="text/javascript" src="pages/skin/js/index.js"></script> -->

    <!-- 分页begin -->
    <script type="text/javascript" src="<?php $this->options->themeUrl('static/js/kkpager.js'); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('static/css/kkpager_orange.css'); ?>">
    <!-- 分页end -->

    <!--图片懒加载begin-->
    <script type="text/javascript"
            src="<?php $this->options->themeUrl('static/js/jquery.lazyload.min.js'); ?>"></script>
    <!--图片懒加载end-->
    <style>
        .leftblock {
            background: url(<?php echo getSetting()['webbg']; ?>) no-repeat;
            background-size: cover;
        }
    </style>

    <style>
        <?php echo getSetting()['csscode']; ?>
    </style>


<?php $this->header(); ?>