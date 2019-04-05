<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">', 0);

$thumb_width = 210;
$thumb_height = 150;
?>






<div class="pic_lt">
    <h2 class="lat_title"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><?php echo $bo_subject ?></a></h2>
    <div class="container" style="margin:20px;">


      <div class="owl-carousel owl-theme" >

    <?php
    for ($i=0; $i<count($list); $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['src'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" width="'.$thumb_width.'" height="'.$thumb_height.'" style="margin-bottom: 5px; height: 90%;">';


    ?>


            <div class="item"><a href="<?php echo $list[$i]['href'] ?>" class="lt_img"><?php echo $img_content; ?></a>


            <?php
            //if ($list[$i]['icon_secret']) echo "<i class=\"fa fa-lock\" aria-hidden=\"true\" style='display: inline-block;line-height: 14px;width: 16px;font-size: 0.833em;color: #4f818c;background: #cbe3e8;text-align: center;border-radius: 2px;font-size: 12px;border:1px solid #a2c6ce'></i><span class=\"sound_only\">비밀글</span> ";

            //if ($list[$i]['icon_new']) echo "<span class=\"new_icon\" style='display:inline-block;width: 16px;line-height:16px ;font-size:0.833em;color:#ffff00;background:#6db142;text-align:center;border-radius: 2px;'>N<span class=\"sound_only\">새글</span></span>  ";

            //if ($list[$i]['icon_hot']) echo "<span class=\"hot_icon\" style='display:inline-block;width: 16px;line-height:16px ;font-size:0.833em;color:#fff;background:#e52955;text-align:center;border-radius: 2px;'>H<span class=\"sound_only\">인기글</span></span>";

            if ($list[$i]['icon_secret']) echo "<i class=\"fa fa-lock\" aria-hidden=\"true\"></i><span class=\"sound_only\">비밀글</span> ";

            if ($list[$i]['icon_new']) echo "<span class=\"new_icon\" >N<span class=\"sound_only\">새글</span></span>  ";

            if ($list[$i]['icon_hot']) echo "<span class=\"hot_icon\" >H<span class=\"sound_only\">인기글</span></span>";

            echo "<a href=\"".$list[$i]['href']."\"> ";
            if ($list[$i]['is_notice'])
                echo "<strong>".$list[$i]['subject']."</strong>";
            else
                echo $list[$i]['subject'];



            echo "</a>";

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

             //echo $list[$i]['icon_reply']." ";
           // if ($list[$i]['icon_file']) echo " <i class=\"fa fa-download\" aria-hidden=\"true\"></i>" ;
            //if ($list[$i]['icon_link']) echo " <i class=\"fa fa-link\" aria-hidden=\"true\"></i>" ;

            if ($list[$i]['comment_cnt'])  echo "
            <span class=\"lt_cmt\">+ ".$list[$i]['wr_comment']."</span>";

            ?>

            <span class="lt_date"><?php echo $list[$i]['datetime2'] ?></span>



           </div>

    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>

      </div>
      </div>
    <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>" class="lt_more"><span class="sound_only"><?php echo $bo_subject ?></span><i class="fa fa-plus" aria-hidden="true"></i><span class="sound_only"> 더보기</span></a>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script>
var owl = $('.owl-carousel');

console.log( owl );

owl.owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout:3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});
owl.on('mousewheel', '.owl-stage', function (e) {
    if (e.deltaY>0) {
        owl.trigger('next.owl');
    } else {
        owl.trigger('prev.owl');
    }
    e.preventDefault();
});
</script>
