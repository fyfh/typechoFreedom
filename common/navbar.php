<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php
/**
 * @Author: Kevin·Lu
 * @Date: 2020/3/23 12:55 下午
 * @Email: kevinlu98@qq.com
 * @Description:
 */
?>
<nav style="text-align: center">
    <a href="<?php $this->options->siteUrl(); ?>" class="lw-navbar-home"
       style="color: #848484;height: 40px;
       line-height: 40px;font-size: 14px;font-weight: 900;"
    ><i class="fa fa-home" style="margin-right: 10px;"></i>冷文博客</a>
    <button class="lw-menu-btn" style="float: right;
    font-size:14px;
    outline: none;margin: 0;
    padding: 4px 8px;
    border-radius: 3px;
    position:absolute;
    right: 5px;
    top: 8px;
    background-color:#d1d1d1;color: #fff"
    >
        <i class="fa fa-th-list"></i>
    </button>

    <div class="lw-user-opt" style="float: right;margin-right: 50px;height: 40px">
        <?php if ($this->user->hasLogin()): ?>
            <a href="<?php $this->options->adminUrl(); ?>"><?php _e('个人中心'); ?> (<?php $this->user->screenName(); ?>
                )</a>
            <a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a>
        <?php else: ?>
            <a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a>
        <?php endif; ?>
        <?php if ($this->user->hasLogin() && $this->user->group == "administrator"): ?>
            <a class="lw-manager" href="<?php $this->options->siteUrl(); ?>index.php/author/<?php echo $this->user->uid ?>/">管理中心</a>
        <?php endif; ?>
    </div>


</nav>