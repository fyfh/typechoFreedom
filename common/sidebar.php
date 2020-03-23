<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>


<div class="leftblock" style="z-index: 999">
    <div class="crumbs_patch">
        <a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo;</li>
        <?php if ($this->is('index')): ?><!-- 页面为首页时 -->

        <?php elseif ($this->is('post')): ?><!-- 页面为文章单页时 -->
        <?php $this->category(); ?> &raquo; <?php $this->title() ?>
        <?php else: ?><!-- 页面为其他页时 -->
    <?php $this->archiveTitle(array(
        'category' => _t('分类 %s 下的文章'),
        'search' => _t('包含关键字 %s 的文章'),
        'tag' => _t('标签 %s 下的文章'),
        'author' => _t('前台站点设置')
    ), '', ''); ?>
    <?php endif; ?>
    </div>
    <div class="topdiv">
        <div class="main">
            <div class="headimg">
                <img src="<?php echo getSetting()['webimg']; ?>"
                     class="xwcms">
            </div>
            <div class="caption">
                <a href="<?php $this->options->siteUrl(); ?>" style="color:white;"><?php $this->options->title(); ?>
                    °</a>
            </div>
            <div class="des">
                <span>我的名字：“<?php echo getSetting()['webname']; ?>丶”</span>
                <p class="lw-mytags">
                    <?php $tags = formatTags(getSetting()['webtag']) ?>
                    <?php foreach ($tags as $tag): ?>
                        <span><? echo $tag ?></span>
                    <?php endforeach; ?>
                </p>
                <span><i class="fa fa-qq" aria-hidden="true"></i> <?php echo getSetting()['webqq']; ?></span>
                <span><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo getSetting()['webmail']; ?></span>
                <form action="" method="post">
                    <div class="search">
                        <input type="text" name="s">
                        <button type="submit">搜索</button>
                    </div>
                </form>
                <br>
                <div class="menu" style="margin-top: 40px;">
                    <?php foreach (getSetting()['webnav'] as $item): ?>
                        <a href="<?php echo $item['url'] ?>" style="display: inline-block;margin-right: 5px;">
                            <i class="fa fa-<?php echo $item['icon'] ?>"></i>
                            <?php echo $item['name'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="menu" style="margin-top: 40px;">
                    <?php $this->widget('Widget_Metas_Category_List')
                        ->parse('<a href="{permalink}" style="display: inline-block;margin-right: 5px;">{name} <span>{count}</span></a>'); ?>
                </div>

            </div>
        </div>
        <?php
        if (!defined('__TYPECHO_ROOT_DIR__')) exit;
        $this->need('common/footer.php');
        ?>
    </div>
    <div class="backdiv">
    </div>
</div>

<script>
    $(function () {
        showInfo();
    })
</script>