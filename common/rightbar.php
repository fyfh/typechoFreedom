<?php
/**
 * @Author: Kevin·Lu
 * @Date: 2020/3/22 2:01 上午
 * @Email: kevinlu98@qq.com
 * @Description:
 */
?>

<div class="tipBtn">
</div>
<div class="tipMenu" style="margin-right: -350px;z-index: 9999999">
    <div class="top">
        <div class="close">
            <img src="<?php $this->options->themeUrl('static/img/cross.png'); ?>">
        </div>
    </div>
    <div class="center">
        <div class="title">
            标签云
        </div>
        <div class="tipMenuTags">
            <div class="tagContainer">
                <?php Typecho_Widget::widget('Widget_Metas_Tag_Cloud')->to($tags); ?>
                <?php if ($tags->have()): ?>
                    <?php while ($tags->next()): ?>
                        <a href="<?php $tags->permalink(); ?>">
                            <?php $tags->name(); ?> </a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="wxtitle">
            打赏一下
        </div>
        <div class="tipMenuTags" style="margin-bottom: 20px;">
            <div class="wximg">
                <img src="<?php echo getSetting()['paycode']; ?>">
            </div>
        </div>

        <div class="title">
            友情链接
        </div>
        <div class="lw-friendly">
            <?php foreach (getSetting()['friendly'] as $item): ?>
                <a href="<?php echo $item['url'] ?>">
                    <img src="<?php echo $item['url'] ?>/favicon.ico" alt="<?php echo $item['name'] ?>">
                    <?php echo $item['name'] ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
