<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>


<?php function threadedComments($comments, $options)
{
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    ?>

    <li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
    if ($comments->levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
    ?>">
        <div id="<?php $comments->theId(); ?>"
             style="padding-bottom: 10px;margin-bottom: 5px;border-bottom: 1px solid #DDDDDD">
            <div class="comment-author">
                <div style="display: inline-block;vertical-align: top">
                    <?php
                    if (isQQNumber($comments->mail)) {
                        $str = '<img class="avatar"
                                 src="' . getQQImage($comments->mail) . '">';
                        echo $str;
                    } else {
                        $comments->gravatar('40', '');
                    }
                    ?>
                </div>
                <div style="display: inline-block">
                    <cite class="fn">
                        <?php
                        $comments->author();
                        ?>
                    </cite>
                    <span><?php $comments->date('Y-m-d H:i'); ?></span>
                    <span class="comment-reply"><?php $comments->reply(); ?></span>
                    <div style="font-size: 14px;margin-left: 10px;"><?php $comments->text(); ?></div>
                </div>
            </div>
        </div>
        <?php if ($comments->children) { ?>
            <div class="comment-children">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php } ?>
    </li>
<?php } ?>
<div id="comments" style="margin: 0 40px">
    <?php $this->comments()->to($comments); ?>
    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>

            <h2 id="response"
                style="font-weight: 100;border-bottom: 1px solid #666;padding-bottom: 10px;"><?php _e('添加新言论'); ?></h2>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">

                <div class="lw-comment-content">
                    <div class="lw-left">

                        <?php if ($this->user->hasLogin()): ?>
                            <img id="lw-header"
                                 src="<?php echo getGavatar($this->user->mail) ?>"
                                 alt="">
                            <p><?php echo $this->user->screenName; ?></p>
                            <!--                            <p>--><?php //echo $this->user->group; ?><!--</p>-->
                        <?php else: ?>
                            <img id="lw-header"
                                 src="https://gitee.com/kevinlu98/imgbed/raw/master/20200322/d38d680d-a675-411e-aaea-e064493f505e.png"
                                 alt="">
                            <p id="lw-name">游客</p>

                        <?php endif; ?>
                    </div>
                    <div class="lw-right" style="position: relative">
                        <div id="editor"></div>
                        <textarea name="text" style="position:absolute;top: 0;opacity: 0" id="textarea"
                                  required></textarea>

                        <div class="lw-comment-form" style="position:relative;box-sizing: border-box;min-height: 32px">
                            <?php if (!$this->user->hasLogin()): ?>
                                <div>
                                    <span><i class="fa fa-qq" aria-hidden="true"></i></span>
                                    <input type="text" name="qq" id="lw-qq" class="text" required/>
                                </div>
                                <div>
                                    <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="text" name="author" id="author" class="text" required/>
                                </div>
                                <div>
                                    <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    <input type="email" name="mail" id="mail" class="text" required/>
                                </div>
                                <div>
                                    <span><i class="fa fa-link" aria-hidden="true"></i></span>
                                    <input type="url" name="url" id="url" class="text" required/>
                                </div>
                            <?php endif; ?>
                            <button type="submit">提交</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
    <?php if ($comments->have()): ?>
        <h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>

        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo;', '&raquo;', 10, '', array('wrapTag' => 'ul', 'wrapClass' => 'lw-page', 'itemTag' => 'li', 'currentClass' => 'lw-page-active',)); ?>


    <?php endif; ?>


</div>
<script>
    $(function () {
        var E = window.wangEditor
        var editor = new E('#editor')
        var $text = $('#textarea')
        editor.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
            $text.val(html)
        }
        editor.customConfig.menus = [
            'foreColor',  // 文字颜色
            'link',  // 插入链接
            'emoticon',  // 表情
            'image',  // 插入图片
        ]

        editor.customConfig.emotions = [
            {
                // tab 的标题
                title: '默认',
                // type -> 'emoji' / 'image'
                type: 'image',
                // content -> 数组
                content: textface
            }
        ]
        editor.create()

        $("#lw-qq").blur(function () {
            $.ajax({
                url: location.href,
                type: 'post',
                data: {qq: $("#lw-qq").val()},
                success: res => {
                    if (res != "") {
                        $("#url").val("http://user.qzone.qq.com/" + $("#lw-qq").val())
                        $("#author").val(res)
                        $("#mail").val($("#lw-qq").val() + "@qq.com")
                        $("#lw-header").attr("src", `http://q1.qlogo.cn/g?b=qq&nk=${$("#lw-qq").val()}&s=100&t=${(new Date()).valueOf()}`)
                    } else {
                        $("#url").val("")
                        $("#author").val("res")
                        $("#mail").val("")
                        $("#lw-header").attr("src", `https://gitee.com/kevinlu98/imgbed/raw/master/20200322/d38d680d-a675-411e-aaea-e064493f505e.png`)
                    }
                }
            })
        })
    })
</script>