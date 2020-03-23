<?php
/**
 * @Author: Kevin·Lu
 * @Date: 2020/3/22 11:04 下午
 * @Email: kevinlu98@qq.com
 * @Description:
 */
$db = Typecho_Db::get();
?>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include_once "setting.php";
    return;
}
?>

<?php
if ($this->user->hasLogin() && $this->user->group == "administrator" && $this->user->uid == $this->author->uid) {

} else {
    header('location:' . $this->options->siteUrl);
}
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
    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
        }

        .tabbox {
            margin: 10px;
            min-width: 560px;
        }

        .tabbox ul {
            list-style: none;
            display: table;
        }

        .tabbox ul li {
            float: left;
            width: 100px;
            line-height: 30px;
            padding-left: 8px;
            margin-right: -1px;
            cursor: pointer;
            text-align: center;
        }

        .tabbox ul li.active {
            background-color: #FF7257;
            color: white;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
        }

        .tabbox .lw-content {
            border: 1px solid #aaccff;
            padding: 10px;
            border-top: 3px solid #FF7257;
            position: relative;
        }

        .tabbox .lw-content > div {
            display: none;
        }

        .tabbox .lw-content > div.active {
            display: block;
        }

        .tabbox .lw-content .lw-tip {
            font-weight: 900;
            font-size: 12px;
            padding-left: 10px;
        }

        .tabbox .lw-content .lw-tip a {
            color: #FF7257;
            margin: 0 5px;
        }

        .tabbox .lw-content .lw-tip:before {
            content: "*";
            left: 2px;
        }

        .tabbox .lw-content .lw-add, .lw-reduce {
            display: inline-block;
            width: 20px;
            height: 20px;
            line-height: 20px;
            text-align: center;
            border-radius: 50%;
            font-weight: 900;
            background-color: #FF7257;
            color: #fff;
            cursor: pointer;
        }

        .tabbox .lw-content input {
            background: none;
            outline: none;
            border: 1px solid #CCCCCC;
            padding: 3px 10px;
            width: 200px;
        }

        .tabbox .lw-content textarea {
            margin: 10px 0;
            display: block;
            outline: none;
            border: 1px solid #CCCCCC;
            padding: 3px 10px;
            width: 200px;
            width: 80%;
            height: 200px;
        }

        .tabbox .lw-content .lw-sitting-row {
            padding: 20px 0;
            border-bottom: 1px solid #ddd;
        }

        .tabbox .lw-content textarea:hover {
            border: 2px solid #FF7257;
        }

        .tabbox .lw-content input:hover {
            border: 2px solid #FF7257;
        }

        .tabbox .lw-content .lw-submit {

            border: none;
            outline: none;
            background-color: #FF7257;
            color: white;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
            width: 100px;
            line-height: 30px;
            padding-left: 8px;
            margin-right: -1px;
            cursor: pointer;
            text-align: center;
            position: absolute;
            top: 0;
            right: 0;
            transform: translateY(-100%);
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

        <div class="tabbox">
            　　
            <ul>　　　　
                <li class="active">基本信息设置</li>
                　　　　
                <li>导航设置</li>
                　
                <li>友情链接设置</li>
                <li>公共设置</li>
                　　　　 　　
            </ul>
            <form method="post">
                <div class="lw-content">
                    <button class="lw-submit" type="submit">保存设置</button>
                    <div class="tabcontent active">
                        <div class="lw-sitting-row">
                            <span>你的名字</span>
                            <input type="text" name="webname" value="<?php echo getSetting()['webname']; ?>" required>
                            <span class="lw-tip">左侧你的名字显示</span>
                        </div>
                        <div class="lw-sitting-row">
                            <span>左侧头像</span>
                            <input type="url" name="webimg" value="<?php echo getSetting()['webimg']; ?>" required>
                            <span class="lw-tip">左侧头像显示URL,可将图片上传至第三方图床，然后复制外链即可(如<a
                                        href="http://image.kevinlu98.cn/" target="_blank">图床工具</a>)</span>
                        </div>
                        <div class="lw-sitting-row">
                            <span>个人标签</span>
                            <input type="text" name="webtag" value="<?php echo getSetting()['webtag']; ?>" required>
                            <span class="lw-tip">左侧名字下方显示的标签,用"/"隔开</span>
                        </div>
                        <div class="lw-sitting-row">
                            <span>QQ</span>
                            <input type="number" name="webqq" value="<?php echo getSetting()['webqq']; ?>" required>
                            <span class="lw-tip">左侧显示的QQ</span>
                        </div>
                        <div class="lw-sitting-row">
                            <span>邮箱</span>
                            <input type="email" name="webmail" value="<?php echo getSetting()['webmail']; ?>" required>
                            <span class="lw-tip">左侧显示的个人邮箱</span>
                        </div>
                        <div class="lw-sitting-row">
                            <span>背景</span>
                            <input type="url" name="webbg" value="<?php echo getSetting()['webbg']; ?>" required>
                            <span class="lw-tip">左侧背景图</span>
                        </div>
                        <div class="lw-sitting-row">
                            <span>支付码</span>
                            <input type="url" name="paycode" value="<?php echo getSetting()['paycode']; ?>" required>
                            <span class="lw-tip">右侧打赏支付码</span>
                        </div>
                    </div>
                    <div class="tabcontent">　　
                        <div class="lw-sitting-row">
                            <span class="lw-tip">格式: 导航名称=>URL地址=>图标 (图标参考 <a target="_blank" href="http://www.fontawesome.com.cn/faicons/">Font Awesome</a>)</span>
                        </div>
                        <div class="lw-sitting-row" id="nav-clone" style="display: none">
                            <input type="text" name="navname[]">
                            <span>=></span>
                            <input type="text" name="navurl[]">
                            <span>=></span>
                            <input type="text" name="navivon[]">
                            <span class="lw-add" data-target="nav">+</span>
                            <span class="lw-reduce" style="display: none" data-target="nav">-</span>
                        </div>
                        <?php foreach (getSetting()['webnav'] as $item): ?>
                            <div class="lw-sitting-row">
                                <input type="text" name="navname[]" value="<?php echo $item['name']; ?>">
                                <span>=></span>
                                <input type="text" name="navurl[]" value="<?php echo $item['url']; ?>">
                                <span>=></span>
                                <input type="text" name="navivon[]" value="<?php echo $item['icon']; ?>">
                                <?php if ($item == end(getSetting()['webnav'])): ?>
                                    <span class="lw-add" data-target="nav">+</span>
                                    <span class="lw-reduce" style="display: none" data-target="nav">-</span>
                                <?php else: ?>
                                    <span class="lw-add" style="display: none" data-target="nav">+</span>
                                    <span class="lw-reduce" data-target="nav">-</span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    　　
                    <div class="tabcontent">
                        <div class="lw-sitting-row">
                            <span class="lw-tip">格式: 站点名称=>URL地址</span>
                        </div>
                        <div class="lw-sitting-row" id="friend-clone" style="display: none">
                            <input type="text" name="friname[]">
                            <span>=></span>
                            <input type="text" name="friurl[]">
                            <span class="lw-add" data-target="friend">+</span>
                            <span class="lw-reduce" style="display: none" data-target="friend">-</span>
                        </div>
                        <?php foreach (getSetting()['friendly'] as $item): ?>
                            <div class="lw-sitting-row">
                                <input type="text" name="friname[]" value="<?php echo $item['name']; ?>">
                                <span>=></span>
                                <input type="text" name="friurl[]" value="<?php echo $item['url']; ?>">
                                <?php if ($item == end(getSetting()['friendly'])): ?>
                                    <span class="lw-add" data-target="friend">+</span>
                                    <span class="lw-reduce" style="display: none" data-target="friend">-</span>
                                <?php else: ?>
                                    <span class="lw-add" style="display: none" data-target="friend">+</span>
                                    <span class="lw-reduce" data-target="friend">-</span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="tabcontent">
                        <div class="lw-sitting-row">
                            <span>公共js</span><span class="lw-tip">站点公共js代码 (如统计代码)</span>
                            <textarea name="jscode"><?php echo getSetting()['jscode']; ?></textarea>
                        </div>
                        <div class="lw-sitting-row">
                            <span>公共css</span><span class="lw-tip">站点公共css样式</span>
                            <textarea name="csscode"><?php echo getSetting()['csscode']; ?></textarea>
                        </div>
                        <div class="lw-sitting-row">
                            <span>footer</span><span class="lw-tip">底部信息，如备案号版权等，支持HTML</span>
                            <textarea name="footcode"><?php echo getSetting()['footcode']; ?></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <?php
        if (!defined('__TYPECHO_ROOT_DIR__')) exit;
        $this->need('common/rightbar.php');
        ?>
    </div>
    <script type="text/javascript">
        $(function () {

            $(".tabbox li").click(function () {
                //获取点击的元素给其添加样式，讲其兄弟元素的样式移除
                $(this).addClass("active").siblings().removeClass("active");
                //获取选中元素的下标
                var index = $(this).index();

                $(".tabcontent").eq(index).addClass("active")
                    .siblings().removeClass("active");
            });

            $(document).on('click', '.lw-add', function () {
                let parent = $(this).parent().parent()
                let target = $(this).data("target")

                let clone = $("#" + `${target}-clone`).clone().appendTo(parent);
                clone.css("display", "block");

                $(this).css("display", "none");
                $(this).next().css("display", "inline-block")
            })

            $(document).on('click', '.lw-reduce', function () {
                let parent = $(this).parent()
                parent.remove()
            })
        });

    </script>
</div>

<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('common/script.php');
?>

</body>
</html>