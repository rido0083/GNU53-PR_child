<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>



  <div class="row mt-3">
    <div class="col-md-8 mt-3 mx-auto">

      <div class="latest_wr">
      <!-- 최신글 시작 { -->

          <?php
          //  최신글
          $sql = " select bo_table
                      from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)
                      where a.bo_device <> 'mobile' ";
          if(!$is_admin)
              $sql .= " and a.bo_use_cert = '' ";
          $sql .= " and a.bo_table not in ('notice', 'gallery') ";     //공지사항과 갤러리 게시판은 제외
          $sql .= " order by b.gr_order, a.bo_order ";
          $result = sql_query($sql);
          for ($i=0; $row=sql_fetch_array($result); $i++) {
              if ($i%2==1) $lt_style = "margin-left:2%";
              else $lt_style = "";
          ?>
          <div  >
              <?php
              // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
              // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
              // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
              echo latest('theme/basic', $row['bo_table'], 6, 24);
              ?>
          </div>
          <?php
          }
          ?>
          <!-- } 최신글 끝 -->

      </div>
    </div>



    <div class="col-md-4">

      <div class="container bg-light border">
          <?php
          //공지사항
          // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
          // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
          // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
          echo latest('theme/notice', 'notice', 4, 13);
          ?>
          <?php echo outlogin('theme/basic'); // 외부 로그인, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
          <?php echo poll('theme/basic'); // 설문조사, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
          <?php echo visit('theme/basic'); // 접속자집계, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
      </div>

    </div>


  </div>



<div class="mt-3">
    <!--  사진 최신글2 { -->
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    echo latest('theme/new_skin', 'gallery', 10, 23);
    ?>
    <!-- } 사진 최신글2 끝 -->
</div>




<h2 class="sound_only">최신글</h2>


<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
