<?php
/**
 * @Author: Kevin·Lu
 * @Date: 2020/3/22 2:00 上午
 * @Email: kevinlu98@qq.com
 * @Description:
 */
?>
<script>
    <?php echo getSetting()['jscode']; ?>
</script>
<script>
    function showInfo() {
        console.log("%c 冷文博客%c         冷文博客",
            "color:#fff;background-color: #000;padding:10px;height:40px;font-weight:900;font-size:18px;",
            "color:#7DD9E6;margin-left:20px;font-size:16px;font-weight:900;"
        )
        console.log("%c 网站地址%c         http://www.kevinlu98.cn/",
            "color:#fff;background-color: #000;padding:10px;height:40px;font-weight:900;font-size:18px;",
            "color:#7DD9E6;margin-left:20px;font-size:16px;font-weight:900;"
        )
        console.log("%c 企鹅号码%c         1628048198",
            "color:#fff;background-color: #000;padding:10px;height:40px;font-weight:900;font-size:18px;",
            "color:#7DD9E6;margin-left:20px;font-size:16px;font-weight:900;"
        )
    }
    $(function () {

        var windowWidth = $(window).width();
        if (windowWidth < 640) {
            // do something
        }
        if (windowWidth >= 640) {
            // do something
        }

        // //::::::::::::tipMenu begin:::::::::::::::::
        $(".close").on("click", function () {
            $(".tipMenu").animate({marginRight: "-350px"});
        });
        $(".tipBtn").on("click", function () {
            $(".tipMenu").animate({marginRight: "0px"});
        });


        //初始化图片懒加载
        $("img.pic").lazyload({
            effect: "fadeIn",
            failurelimit: 40,
            // load: f_masonry,
        });

        dealImage()

        function dealImage() {
            let images = $(".rightblock .item .pimg img");
            let height = parseFloat(images.css("width")) * 0.6;
            images.css("height", height);
        }

        $(".rightblock .item .pimg img").on('click', function () {
            location.href = $(this).data('url')
        })

        jQuery(".item").on("mouseover", function () {
            jQuery(this).css("box-shadow", "0 0 5px rgba(0,0,0,0.3)");
        });

        jQuery(".item").on("mouseout", function () {
            jQuery(this).css("box-shadow", "0 0 2px rgba(0,0,0,0.1)");
        });

        $(".lw-menu-btn").on('click', function () {
            let pos = $('.leftblock').css("transform");
            let v = parseInt(pos.split(",")[4]);
            if (v < 0) {
                $('.leftblock').css("transform", "none")
                $(".crumbs_patch").css("display", "none")
            } else {
                $('.leftblock').css("transform", "translateX(-100%)")
                $(".crumbs_patch").css("display", "inline-block")
            }
        })
    });
</script>
