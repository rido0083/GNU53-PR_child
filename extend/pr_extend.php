<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

##############################################################
#
# 그누보드5.3을 위한 확장 빌드 BUILD SRD
#
##############################################################

/**
 * PR_THEME Ver 0.1 testver
 * 제작자 : Rido
 * 제작자 메일 : rido0083@gmail.com
 * GITHUB :
 *
 *
 *	본테마는 그누보드의 확장성과 기타 SRD 프로젝트의 플러그인들을 사용하기 위해 제작되었습니다.
 *일단 기본족인 child의 개념의 워드프레스의 그것과 비슷한 개념을 가지고 있습니다.
 *자세한 사항은 theme폴더의 README.txt에 기재하겠습니다.
 *
 */

//기본설정
$pr['theme_ch'] = 'true';   //해당 테마기능을 사용할 것인지 false일 경우 기능사용을 중지
define('PR_THEME_CHILD', G5_THEME_PATH.'/child');

//srd theme의 기본이 되는 common파일
if ($pr['theme_ch'] == 'true') {
  include_once(PR_THEME_CHILD . '/lib/pr_common.php');
}
 ?>
