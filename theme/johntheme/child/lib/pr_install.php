<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
//기본 테이블이 없다면 생성합니다.
$is_exp_db = pr_exist_table ($pr['pr_table_exp']);

if ($is_exp_db == 'false') {

	//디비를 생성함
  /*
  rd_exp 테이블은 project RD 에서 사용하는 모든 확장프로그램에 대응합니다.
  너무많은 row가 생성될 수 있을거 같지만 요즘 디비의 성능을 믿어봅니다 ^^

    `exp_id`            자동생성 번호 입니다.
    `mb_id`             회원아이디 여러가지 회원관련해서 사용합니다.
    `bo_id`             게시판 아이디 입니다.
    `wr_id`             게시판번호와 연동합니다.
    `wr_comment`        댓글번호와 연동합니다.
    `exp_type`          게시판 이외의 타입을 지정합니다.
    `exp_key`           검색어로 사용합니다 (json 타입으로 저장됩니다.)
    `exp_value`         사용할 데이터로 사용합니다 (json 타입으로 저장됩니다.)
    `wdate`             작성일
    `udate`             수정일
  */
	$is_add_exp = "
		CREATE TABLE IF NOT EXISTS `{$pr['pr_table_exp']}` (
			`exp_id` int(11) NOT NULL auto_increment,
      `mb_id` varchar(100) NOT NULL default '',
      `bo_id` varchar(100) NOT NULL default '',
      `wr_id` int(11) NOT NULL default '0',
      `wr_comment` int(11) NOT NULL default '0',
      `exp_type` varchar(100) NOT NULL default '',
			`exp_key` varchar(255) NOT NULL default '',
			`exp_value` text NOT NULL default '',
      `wdate` datetime NOT NULL default '0000-00-00 00:00:00',
      `udate` datetime NOT NULL default '0000-00-00 00:00:00',
			PRIMARY KEY  (`exp_id`,`mb_id`,`bo_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8
	";
	//echo $is_add_exp;
	@sql_query($is_add_exp);
}

?>
