DROP TABLE IF EXISTS `jishigou_app`;
CREATE TABLE `jishigou_app` (
`id` int(10) unsigned NOT NULL auto_increment,
`uid` mediumint(8) unsigned NOT NULL default '0',
`username` char(15) NOT NULL default '',
`app_name` char(100) NOT NULL default '',
`source_url` char(255) NOT NULL default '',
`show_from` tinyint(1) NOT NULL default '0',
`app_desc` text NOT NULL default '',
`app_key` int(10) unsigned NOT NULL default '0',
`app_secret` char(32) NOT NULL default '',
`allows_ip` text NOT NULL default '',
`status` tinyint(1) NOT NULL default '0',
`request_times` bigint(20) unsigned NOT NULL default '0',
`request_times_day` int(10) unsigned NOT NULL default '0',
`request_times_last_day` int(10) unsigned NOT NULL default '0',
`request_times_week` int(10) unsigned NOT NULL default '0',
`request_times_last_week` int(10) unsigned NOT NULL default '0',
`request_times_month` int(10) unsigned NOT NULL default '0',
`request_times_last_month` int(10) unsigned NOT NULL default '0',
`request_times_year` bigint(20) unsigned NOT NULL default '0',
`request_times_last_year` bigint(20) unsigned NOT NULL default '0',
`last_request_time` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`id`),
UNIQUE KEY `app_key_secret` (`app_key`,`app_secret`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_buddys`;
CREATE TABLE `jishigou_buddys` (
`id` int(10) NOT NULL auto_increment,
`uid` mediumint(8) unsigned NOT NULL default '0',
`buddyid` mediumint(8) unsigned NOT NULL default '0',
`grade` tinyint(1) unsigned NOT NULL default '1',
`remark` char(30) NOT NULL default '',
`dateline` int(10) unsigned NOT NULL default '0',
`description` char(255) NOT NULL default '',
`buddy_lastuptime` int(10) unsigned NOT NULL,
PRIMARY KEY  (`id`),
KEY `uid_buddyid` (`uid`, `buddyid`),
KEY `buddyid` (`buddyid`),
KEY `dateline` (`dateline`),
KEY `buddy_lastuptime` (`buddy_lastuptime`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_failedlogins`;
CREATE TABLE `jishigou_failedlogins` (
`ip` char(15) NOT NULL default '',
`count` tinyint(1) unsigned NOT NULL default '0',
`lastupdate` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`ip`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_invite`;
CREATE TABLE `jishigou_invite` (
`id` int(10) unsigned NOT NULL auto_increment,
`uid` mediumint(8) unsigned NOT NULL default '0',
`code` char(16) NOT NULL default '',
`dateline` int(10) unsigned NOT NULL default '0',
`fuid` mediumint(8) unsigned NOT NULL default '0',
`fusername` char(15) NOT NULL default '',
`femail` char(50) NOT NULL default '',
PRIMARY KEY  (`id`),
KEY `uidcode` (`uid`,`code`),
KEY `femail` (`femail`),
KEY `fuid` (`fuid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_ip_banned`;
CREATE TABLE `jishigou_ip_banned` (
`id` smallint(4) unsigned NOT NULL auto_increment,
`ip_start` int(10) unsigned NOT NULL default '0',
`ip_end` int(10) unsigned NOT NULL default '0',
`reason` char(255) NOT NULL default '',
`dateline` int(10) unsigned NOT NULL default '0',
`expire` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`id`),
UNIQUE KEY `ip_start` (`ip_start`,`ip_end`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_member_validate`;
CREATE TABLE `jishigou_member_validate` (
`uid` mediumint(8) unsigned NOT NULL default '0',
`email` char(50) NOT NULL default '',
`role_id` smallint(5) unsigned NOT NULL default '0',
`key` char(16) NOT NULL default '',
`status` tinyint(1) unsigned NOT NULL default '0',
`verify_time` int(10) unsigned NOT NULL default '0',
`regdate` int(10) unsigned NOT NULL default '0',
`type` enum('email','admin') NOT NULL default 'email',
UNIQUE KEY `key` (`key`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_memberfields`;
CREATE TABLE `jishigou_memberfields` (
`uid` mediumint(8) unsigned NOT NULL default '0',
`site` varchar(75) NOT NULL default '',
`location` varchar(30) NOT NULL default '',
`authstr` varchar(20) NOT NULL default '',
`question` varchar(255) NOT NULL default '',
`answer` varchar(255) NOT NULL default '',
`address` varchar(40) NOT NULL default '',
`validate_true_name` varchar(50) NOT NULL default '',
`validate_card_type` varchar(10) NOT NULL default '',
`validate_card_id` varchar(50) NOT NULL default '',
`validate_remark` varchar(100) NOT NULL default '',
`validate_card_pic` char(100) NOT NULL,
`validate_extra` char(200) NOT NULL COMMENT '认证用户额外权限-专题设置',
`account_bind_info` text NOT NULL,
PRIMARY KEY  (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_manage_detail`;
CREATE TABLE `jishigou_manage_detail` (
`id` int(10) unsigned NOT NULL auto_increment,
`tid` int(10) unsigned NOT NULL default '0',
`type` char(8) NOT NULL default '',
`tuid` mediumint(8) unsigned NOT NULL default '0',
`tusername` char(15) NOT NULL default '',
`uid` mediumint(8) unsigned NOT NULL default '0',
`username` char(15) NOT NULL default '',
`dateline` int(10) unsigned NOT NULL default '0',
`postip` char(15) NOT NULL default '',
PRIMARY KEY  (`id`),
KEY `uid` (`uid`),
KEY `dateline` (`dateline`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_members`;
CREATE TABLE `jishigou_members` (
`uid` mediumint(8) unsigned NOT NULL auto_increment,
`username` char(15) NOT NULL default '',
`nickname` char(15) NOT NULL default '',
`password` char(32) NOT NULL default '',
`medal_id` char(20) NOT NULL default '',
`media_id` int(11) NOT NULL default '0',
`gender` tinyint(1) NOT NULL default '0',
`regip` char(15) NOT NULL default '',
`regdate` int(10) unsigned NOT NULL default '0',
`lastip` char(15) NOT NULL default '',
`lastactivity` int(10) unsigned NOT NULL default '0',
`lastpost` int(10) unsigned NOT NULL default '0',
`credits` int(10) NOT NULL default '0',
`extcredits1` int(10) NOT NULL default '0',
`extcredits2` int(10) NOT NULL default '0',
`extcredits3` int(10) NOT NULL default '0',
`extcredits4` int(10) NOT NULL default '0',
`extcredits5` int(10) NOT NULL default '0',
`extcredits6` int(10) NOT NULL default '0',
`extcredits7` int(10) NOT NULL default '0',
`extcredits8` int(10) NOT NULL default '0',
`email` char(50) NOT NULL default '',
`bday` date NOT NULL default '0000-00-00',
`newpm` tinyint(1) NOT NULL default '0',
`face_url` char(60) NOT NULL default '',
`face` char(60) NOT NULL default '',
`tag_count` mediumint(6) default '0',
`role_id` tinyint(1) NOT NULL default '0',
`role_type` enum('admin','normal') NOT NULL default 'normal',
`tag` char(255) NOT NULL default '',
`phone` char(15) NOT NULL default '',
`use_tag_count` mediumint(8) unsigned NOT NULL default '0',
`create_tag_count` smallint(4) unsigned NOT NULL default '0',
`image_count` int(10) unsigned NOT NULL default '0',
`ucuid` mediumint(8) default '0',
`invite_uid` mediumint(8) unsigned NOT NULL,
`invite_count` smallint(4) unsigned default '0',
`invitecode` char(16) default '0',
`topic_count` mediumint(6) unsigned default '0',
`at_count` mediumint(6) unsigned default '0',
`follow_count` mediumint(6) unsigned default '0',
`fans_count` mediumint(6) unsigned default '0',
`email2` char(50) NOT NULL default '',
`qq` char(10) NOT NULL default '',
`msn` char(50) NOT NULL default '',
`aboutme` char(255) NOT NULL default '',
`aboutmetime` int(10) default '0',
`signature` char(30) NOT NULL default '',
`signtime` int(10) default '0',
`at_new` smallint(4) default '0',
`comment_new` smallint(4) unsigned NOT NULL default '0',
`event_new` smallint(4) unsigned NOT NULL default '0',
`fans_new` smallint(4) unsigned NOT NULL default '0',
`vote_new` smallint(4) unsigned NOT NULL default '0',
`qun_new` smallint(4) NOT NULL default '0',
`topic_new` smallint(4) NOT NULL default '0',
`topic_favorite_count` smallint(4) unsigned NOT NULL default '0',
`tag_favorite_count` smallint(4) unsigned NOT NULL default '0',
`disallow_beiguanzhu` tinyint(1) NOT NULL default '0',
`validate` tinyint(1) NOT NULL default '0',
`validate_category` tinyint(1) NOT NULL DEFAULT '0',
`favoritemy_new` smallint(4) unsigned default '0',
`notice_at` tinyint(2) NOT NULL default '0',
`notice_pm` tinyint(2) NOT NULL default '0',
`notice_reply` tinyint(2) NOT NULL default '0',
`user_notice_time` int(10) NOT NULL default '0',
`last_notice_time` int(10) NOT NULL default '0',
`theme_id` char(6) NOT NULL default '',
`theme_bg_image` char(60) NOT NULL default '',
`theme_bg_color` char(7) NOT NULL default '',
`theme_text_color` char(7) NOT NULL default '',
`theme_link_color` char(7) NOT NULL default '',
`theme_bg_image_type` enum('repeat','center','left','right','bottom') NOT NULL default 'repeat',
`theme_bg_repeat` tinyint(1) NOT NULL,
`theme_bg_fixed` tinyint(1) NOT NULL,
`last_topic_content_id` int(10) NOT NULL default '0',
`level` int(10) NOT NULL,
`style_three_tol` tinyint(3) NOT NULL DEFAULT '0',
`province` char(16) NOT NULL DEFAULT '',
`city` char(16) NOT NULL DEFAULT '',
`area` char(16) NOT NULL DEFAULT '',
`street` char(16) NOT NULL DEFAULT '',
`qmd_url` char(60) NOT NULL DEFAULT '',
`event_post_new` smallint(4) unsigned NOT NULL default '0',
`fenlei_post_new` smallint(4) unsigned NOT NULL default '0',
`qmd_img` char(30) NOT NULL,
`open_extra` tinyint(1) NOT NULL DEFAULT '0' COMMENT '认证用户的专题设置状态',
PRIMARY KEY  (`uid`),
UNIQUE KEY `username` (`username`),
KEY `nickname` (`nickname`),
KEY `email` (`email`),
KEY `role_id` (`role_id`),
KEY `ucuid` (`ucuid`),
KEY `phone` (`phone`),
KEY `lastactivity` (`lastactivity`),
KEY `invite_uid` (`invite_uid`),
KEY `province_city` (`province`,`city`),
KEY `credits` (`credits`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_members_verify`;
CREATE TABLE `jishigou_members_verify` (
`id` mediumint(8) unsigned NOT NULL auto_increment,
`uid` mediumint(8) unsigned NOT NULL,
`nickname` char(15) NOT NULL default '',
`face_url` char(60) NOT NULL default '',
`face` char(60) NOT NULL default '',
`signature` char(30) NOT NULL default '',
`is_sign` tinyint(1) NOT NULL default 0,
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_my_tag`;
CREATE TABLE `jishigou_my_tag` (
`user_id` mediumint(8) unsigned NOT NULL default '0',
`tag_id` mediumint(8) unsigned NOT NULL default '0',
`total_count` mediumint(8) unsigned NOT NULL default '0',
`topic_count` smallint(6) unsigned NOT NULL default '0',
PRIMARY KEY  (`user_id`,`tag_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_my_topic_tag`;
CREATE TABLE `jishigou_my_topic_tag` (
`user_id` mediumint(8) unsigned NOT NULL default '0',
`item_id` mediumint(8) unsigned NOT NULL default '0',
`tag_id` mediumint(8) unsigned NOT NULL default '0',
`count` smallint(4) unsigned NOT NULL default '1',
PRIMARY KEY  (`user_id`,`item_id`,`tag_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_onlinetime`;
CREATE TABLE `jishigou_onlinetime` (
`uid` mediumint(8) unsigned NOT NULL default '0',
`thismonth` smallint(4) unsigned NOT NULL default '0',
`total` mediumint(8) unsigned NOT NULL default '0',
`lastupdate` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_pms`;
CREATE TABLE `jishigou_pms` (
`pmid` int(10) unsigned NOT NULL auto_increment,
`msgfrom` char(15) NOT NULL default '',
`msgnickname` char(15) NOT NULL default '',
`msgfromid` mediumint(8) unsigned NOT NULL default '0',
`msgto` char(15) NOT NULL default '',
`tonickname` char(15) NOT NULL default '',
`msgtoid` mediumint(8) unsigned NOT NULL default '0',
`folder` enum('inbox','outbox') NOT NULL default 'inbox',
`new` tinyint(1) NOT NULL default '0',
`subject` varchar(75) NOT NULL default '',
`dateline` int(10) unsigned NOT NULL default '0',
`message` text NOT NULL,
`delstatus` tinyint(1) unsigned NOT NULL default '0',
`is_hi` tinyint(1) NOT NULL default '0',
`topmid` int(11) NOT NULL default '0',
`plid` mediumint(8) NOT NULL default '0',
PRIMARY KEY  (`pmid`),
KEY `msgtoid` (`msgtoid`,`folder`,`dateline`),
KEY `msgfromid` (`msgfromid`,`folder`,`dateline`),
KEY `uids` (`plid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_pms_index`;
CREATE TABLE `jishigou_pms_index` (
`plid` mediumint(8) unsigned NOT NULL auto_increment,
`uids` char(17) NOT NULL,
PRIMARY KEY  (`plid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_pms_list`;
CREATE TABLE `jishigou_pms_list` (
`plid` mediumint(8) unsigned NOT NULL default '0',
`uid` mediumint(8) unsigned NOT NULL default '0',
`pmnum` int(10) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
`lastmessage` text NOT NULL,
`is_new` tinyint(1) NOT NULL default '0',
PRIMARY KEY  (`plid`,`uid`),
KEY `dateline` (`dateline`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_report`;
CREATE TABLE `jishigou_report` (
`id` int(10) unsigned NOT NULL auto_increment,
`uid` mediumint(8) NOT NULL default '0',
`username` char(15) NOT NULL default '',
`ip` char(15) NOT NULL default '',
`type` tinyint(1) NOT NULL default '0',
`reason` tinyint(1) NOT NULL default '0',
`content` text NOT NULL default '',
`tid` int(10) NOT NULL default '0',
`dateline` int(10) NOT NULL default '0',
`process_user` char(15) NOT NULL default '',
`process_time` int(10) NOT NULL default '0',
`process_result` tinyint(1) NOT NULL default '0',
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_robot`;
CREATE TABLE `jishigou_robot` (
`name` char(50) NOT NULL default '',
`times` int(10) unsigned NOT NULL default '0',
`first_visit` int(10) NOT NULL default '0',
`last_visit` int(10) NOT NULL default '0',
`agent` char(255) NOT NULL default '',
`disallow` tinyint(1) NOT NULL default '0',
PRIMARY KEY  (`name`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_robot_ip`;
CREATE TABLE `jishigou_robot_ip` (
`ip` char(15) NOT NULL default '',
`name` char(50) NOT NULL default '',
`times` int(10) unsigned NOT NULL default '0',
`first_visit` int(10) NOT NULL default '0',
`last_visit` int(10) NOT NULL default '0',
PRIMARY KEY  (`ip`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_robot_log`;
CREATE TABLE `jishigou_robot_log` (
`name` char(50) NOT NULL default '',
`date` date NOT NULL default '0000-00-00',
`times` int(10) unsigned NOT NULL default '0',
`first_visit` int(10) unsigned NOT NULL default '0',
`last_visit` int(10) unsigned NOT NULL default '0',
UNIQUE KEY `name` (`name`,`date`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_role`;
CREATE TABLE `jishigou_role` (
`id` tinyint(1) unsigned NOT NULL auto_increment,
`name` varchar(50) NOT NULL default '',
`creditshigher` int(10) NOT NULL default '0',
`creditslower` int(10) NOT NULL default '0',
`privilege` mediumtext NOT NULL,
`type` enum('normal','admin') NOT NULL default 'normal',
`rank` tinyint(1) unsigned NOT NULL default '0',
`icon` char(50) NOT NULL,
`allow_sendpm_to` text NOT NULL,
`allow_sendpm_from` text NOT NULL,
`allow_topic_forward_to` text NOT NULL,
`allow_topic_forward_from` text NOT NULL,
`allow_topic_reply_to` text NOT NULL,
`allow_topic_reply_from` text NOT NULL,
`allow_topic_at_to` text NOT NULL,
`allow_topic_at_from` text NOT NULL,
`allow_follow_to` text NOT NULL,
`allow_follow_from` text NOT NULL,
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;
REPLACE INTO `jishigou_role` (`id`,`name`,`creditshigher`,`creditslower`,`privilege`,`type`,`rank`,`icon`,`allow_sendpm_to`,`allow_sendpm_from`,`allow_topic_forward_to`,`allow_topic_forward_from`,`allow_topic_reply_to`,`allow_topic_reply_from`,`allow_topic_at_to`,`allow_topic_at_from`,`allow_follow_to`,`allow_follow_from`) values (1,'游客',0,0,'273,274,275,281,282,283,284,285,286,288,289,290,291,292,293,295,297,299,300,303,448','normal',0,'','','','','','','','','','',''),(2,'管理员',0,0,'7,8,9,11,13,84,88,90,91,92,93,101,102,106,107,108,111,115,123,125,126,132,133,134,135,136,137,138,139,154,158,159,169,172,176,182,183,184,186,187,188,189,190,191,192,193,194,195,196,197,198,200,201,202,204,205,206,208,210,211,212,213,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,267,268,269,270,271,273,274,275,276,281,282,283,284,285,286,288,289,290,291,292,293,294,295,296,297,298,299,300,302,303,304,305,306,307,308,311,315,317,318,319,320,321,323,324,325,327,328,329,330,340,361,363,374,375,376,377,378,379,380,381,382,383,384,385,386,387,388,389,390,391,392,393,394,395,396,400,401,403,404,405,406,407,408,409,410,411,412,413,415,416,417,418,419,420,421,422,424,425,426,427,428,429,430,431,432,435,443,445,446,447,448','admin',0,'','0','','0','','0','','0','','0',''),(3,'普通会员',0,20,'7,176,193,194,195,196,197,198,273,274,275,276,281,282,283,284,285,286,288,289,290,291,292,293,294,295,296,297,298,299,300,302,303,378,448','normal',0,'','0','','0','','0','','0','','0',''),(4,'禁言组',0,0,'','normal',0,'','0','','0','','0','','0','','0',''),(5,'待验证会员',0,0,'273,274,275,281,282,283,284,285,288,289,290,291,292,293,295,297,299,300,303,447,448','normal',0,'','0','','0','','0','','0','','0',''),(7,'后台查看',0,0,'7,8,11,13,88,92,125,126,133,135,137,139,158,176,192,193,194,195,196,197,198,200,202,205,211,213,215,216,217,218,219,220,221,222,223,226,228,230,235,236,238,241,246,250,251,252,253,254,255,264,273,274,275,276,281,282,283,284,285,286,288,289,290,291,292,293,294,295,296,297,298,299,300,302,303,304,305,306,311,315,319,323,330,340,361,374,377,378,381,382,383,384,386,387,388,391,392,393,395,410,411,413,418,421,424,425,435,443,446,447,448','admin',0,'','0','','0','','0','','0','','0',''),(118,'封号',0,0,'','normal',0,'','','','','','','','','','',''),(108,'LV1会员',20,300,'7,176,193,194,195,196,197,198,273,274,275,276,281,282,283,284,285,286,288,289,290,291,292,293,294,295,296,297,298,299,300,302,303,378,448','normal',1,'','0','','0','','0','','0','','0',''),(109,'LV2会员',300,1000,'7,176,193,194,195,196,197,198,273,274,275,276,281,282,283,284,285,286,288,289,290,291,292,293,294,295,296,297,298,299,300,302,303,330,340,377,378,448','normal',2,'','0','','0','','0','','0','','0',''),(110,'LV3会员',1000,3000,'7,176,193,194,195,196,197,198,273,274,275,276,281,282,283,284,285,286,288,289,290,291,292,293,294,295,296,297,298,299,300,302,303,330,340,377,378,447,448','normal',3,'','','','','','','','','','',''),(111,'LV4会员',3000,6000,'7,176,193,194,195,196,197,198,273,274,275,276,281,282,283,284,285,286,288,289,290,291,292,293,294,295,296,297,298,299,300,302,303,330,340,377,378,447,448','normal',4,'','','','','','','','','','',''),(112,'LV5会员',6000,12000,'7,176,193,194,195,196,197,198,273,274,275,276,281,282,283,284,285,286,288,289,290,291,292,293,294,295,296,297,298,299,300,302,303,330,340,377,378,447,448','normal',5,'','','','','','','','','','',''),(113,'LV6会员',12000,20000,'7,176,193,194,195,196,197,198,273,274,275,276,281,282,283,284,285,286,288,289,290,291,292,293,294,295,296,297,298,299,300,302,303,330,340,377,378,447,448','normal',6,'','','','','','','','','','',''),(114,'LV7会员',20000,30000,'7,176,193,194,195,196,197,198,273,274,275,276,281,282,283,284,285,286,288,289,290,291,292,293,294,295,296,297,298,299,300,302,303,330,340,377,378,447,448','normal',7,'','','','','','','','','','',''),(115,'LV8会员',30000,45000,'7,176,193,194,195,196,197,198,273,274,275,276,281,282,283,284,285,286,288,289,290,291,292,293,294,295,296,297,298,299,300,302,303,330,340,377,378,447,448','normal',8,'','','','','','','','','','',''),(116,'LV9会员',45000,60000,'7,176,193,194,195,196,197,198,273,274,275,276,281,282,283,284,285,286,288,289,290,291,292,293,294,295,296,297,298,299,300,302,303,330,340,377,378,447,448','normal',9,'','','','','','','','','','',''),(117,'LV10会员',60000,0,'7,176,193,194,195,196,197,198,273,274,275,276,281,282,283,284,285,286,288,289,290,291,292,293,294,295,296,297,298,299,300,302,303,330,340,377,378,447,448','normal',10,'','','','','','','','','','','');

DROP TABLE IF EXISTS `jishigou_role_action`;
CREATE TABLE `jishigou_role_action` (
`id` smallint(4) unsigned NOT NULL auto_increment,
`name` varchar(255) NOT NULL default '',
`module` varchar(50) NOT NULL default 'index',
`action` varchar(255) NOT NULL default '',
`describe` varchar(255) NOT NULL default '',
`message` varchar(255) NOT NULL default '',
`allow_all` tinyint(1) NOT NULL default '0',
`credit_require` varchar(255) NOT NULL default '',
`credit_update` varchar(255) NOT NULL default '',
`log` tinyint(1) unsigned NOT NULL default '0',
`is_admin` tinyint(1) unsigned default '0',
PRIMARY KEY  (`id`),
UNIQUE KEY `action` (`module`,`name`,`is_admin`)
) ENGINE=MyISAM;
REPLACE INTO `jishigou_role_action` (`id`,`name`,`module`,`action`,`describe`,`message`,`allow_all`,`credit_require`,`credit_update`,`log`,`is_admin`) values (88,'进入后台','index','*','','',0,'','',0,1),(92,'查看URL地址设置','setting','modify_rewrite','','',0,'','',0,1),(7,'发新微博','topic','add|do_add','','',0,'','',0,0),(8,'查看角色列表','role','list','','',0,'','',0,1),(9,'修改角色权限','role','domodify','','',0,'','',0,1),(11,'所有动作列表','role_action','list','','',0,'','',0,1),(13,'查看核心设置','setting','modify_normal','','',0,'','',0,1),(435,'查看界面显示设置','show','show','','',0,'','',0,1),(186,'执行删除话题操作','tag','delete','','',0,'','',0,1),(182,'执行编辑微博','topic','domodify','','',0,'','',0,1),(183,'执行删除微博','topic','delete','','',0,'','',0,1),(176,'发送私信','pm','send|dosend','','',0,'','',0,0),(187,'执行添加用户操作','member','doadd','','',0,'','',0,1),(188,'搜索用户页面','member','search','','',0,'','',0,1),(138,'分模块动作列表','role_action','list_action','','',0,'','',0,1),(84,'修改友情链接设置','link','domodify','','',0,'','',0,1),(400,'添加动作权限','role_action','add','','',0,'','',0,1),(90,'提交数据库备份','db','doexport','','',0,'','',0,1),(91,'修改核心设置','setting','domodify_normal','','',0,'','',0,1),(93,'修改URL地址设置','setting','domodify_rewrite','','',0,'','',0,1),(101,'修改动作设置','role_action','domodify','','',0,'','',0,1),(102,'删除动作','role_action','delete','','',0,'','',0,1),(184,'删除私信','pm','delete','','',0,'','',0,1),(189,'修改广告设置','income','domodify','','',0,'','',0,1),(106,'修改界面显示设置','show','domodify','','',0,'','',0,1),(107,'解压缩数据备份包','db','importzip','','',0,'','',0,1),(108,'开关蜘蛛统计','robot','domodify','','',0,'','',0,1),(111,'修改内容过滤设置','setting','domodify_filter','','',0,'','',0,1),(115,'修改IP访问控制','setting','domodify_access','','',0,'','',0,1),(123,'执行数据库优化','db','dooptimize','','',0,'','',0,1),(125,'查看内容过滤设置','setting','modify_filter','','',0,'','',0,1),(126,'查看IP访问控制','setting','modify_access','','',0,'','',0,1),(132,'导入数据恢复','db','doimport','','',0,'','',0,1),(133,'查看数据恢复页面','db','import','','',0,'','',0,1),(134,'删除数据库备份','db','dodelete','','',0,'','',0,1),(135,'查看UC整合配置','ucenter','ucenter','','',0,'','',0,1),(136,'修改UC整合配置','ucenter','do_setting','','',0,'','',0,1),(137,'查看角色权限','role','modify','','',0,'','',0,1),(139,'动作设置','role_action','modify|domodify','','',0,'','',0,1),(154,'修改邮件发送设置','setting','do_modify_smtp','','',0,'','',0,1),(158,'清空缓存','cache','*','','',0,'','',0,1),(159,'系统后台升级','upgrade','*','','',0,'','',0,1),(172,'执行举报管理','report','batch_process','','',0,'','',0,1),(169,'禁止搜索引擎','robot','disallow0|disallow1','','',0,'','',0,1),(190,'添加公告','notice','add','','',0,'','',0,1),(191,'执行编辑公告操作','notice','domodify','','',0,'','',0,1),(192,'添加角色','role','add|doadd','','',0,'','',0,1),(193,'读取新浪微博内容','xwb','__synctopic','','',0,'','',0,0),(194,'读取新浪微博评论','xwb','__syncreply','','',0,'','',0,0),(195,'发起新的投票','vote','create','','',0,'','',0,0),(196,'进行投票','vote','vote','','',0,'','',0,0),(197,'转发微博','topic','forward','','',0,'','',0,0),(198,'评论微博','topic','reply','','',0,'','',0,0),(200,'查看积分设置','setting','modify_credits','','',0,'','',0,1),(201,'修改积分设置','setting','do_modify_credits','','',0,'','',0,1),(202,'查看积分规则列表','setting','list_credits_rule','','',0,'','',0,1),(204,'修改积分规则','setting','do_modify_credits_rule','','',0,'','',0,1),(205,'查看某项积分规则','setting','modify_credits_rule','','',0,'','',0,1),(206,'删除站外调用','share','delete','','',0,'','',0,1),(208,'添加站外调用','share','add|do_add','','',0,'','',0,1),(210,'编辑站外调用','share','modify|domodify','','',0,'','',0,1),(211,'查看QQ微博设置','setting','modify_qqwb','','',0,'','',0,1),(212,'修改QQ微博设置','setting','do_modify_qqwb','','',0,'','',0,1),(213,'查看新浪微博设置','setting','modify_sina','','',0,'','',0,1),(215,'查看邮件发送设置','setting','modify_smtp','','',0,'','',0,1),(216,'查看远程附件设置','setting','modify_ftp','','',0,'','',0,1),(217,'查看推荐话题','setting','modify_hot_tag_recommend','','',0,'','',0,1),(218,'查看首页幻灯管理','setting','modify_slide_index','','',0,'','',0,1),(219,'查看内页幻灯管理','setting','modify_slide','','',0,'','',0,1),(220,'编辑用户页面','member','modify','','',0,'','',0,1),(221,'添加用户页面','member','add','','',0,'','',0,1),(222,'查看数据备份页面','db','export','','',0,'','',0,1),(223,'查看数据表优化页面','db','optimize','','',0,'','',0,1),(224,'修改新浪微博设置','setting','do_modify_sina','','',0,'','',0,1),(225,'修改QQ机器人设置','imjiqiren','do_modify_setting','','',0,'','',0,1),(226,'查看短信发送记录','sms','send_log','','',0,'','',0,1),(227,'修改手机短信设置','sms','do_modify_setting','','',0,'','',0,1),(228,'查看短信接收记录','sms','receive_log','','',0,'','',0,1),(229,'删除短信收发记录','sms','delete_log','','',0,'','',0,1),(230,'查看微博列表','topic','modifylist','','',0,'','',0,1),(231,'修改推荐话题','setting','do_modify_hot_tag_recommend','','',0,'','',0,1),(232,'修改首页幻灯设置','setting','do_modify_slide_index','','',0,'','',0,1),(233,'修改内页幻灯设置','setting','do_modify_slide','','',0,'','',0,1),(234,'修改多个计划任务','task','dobatchmodify','','',0,'','',0,1),(235,'查看计划任务','task','list','','',0,'','',0,1),(236,'查看单个计划任务','task','modify','','',0,'','',0,1),(237,'修改单个计划任务','task','domodify','','',0,'','',0,1),(238,'查看计划任务记录','task','log_list','','',0,'','',0,1),(239,'删除计划任务','task','log_delete','','',0,'','',0,1),(240,'修改远程附件设置','setting','do_modify_ftp','','',0,'','',0,1),(241,'查看投票','vote','edit','','',0,'','',0,1),(242,'修改投票','vote','doedit','','',0,'','',0,1),(243,'删除投票','vote','delete','','',0,'','',0,1),(244,'添加个人标签','user_tag','add','','',0,'','',0,1),(245,'删除个人标签','user_tag','delete','','',0,'','',0,1),(246,'查看个人标签','user_tag','modify','','',0,'','',0,1),(247,'修改个人标签','user_tag','domodify','','',0,'','',0,1),(248,'修改关于我们设置','web_info','domodify','','',0,'','',0,1),(249,'执行删除公告操作','notice','delete','','',0,'','',0,1),(250,'查看编辑公告页面','notice','modify','','',0,'','',0,1),(251,'查看微群分类','qun','category','','',0,'','',0,1),(252,'查看微群等级','qun','level','','',0,'','',0,1),(253,'查看微群策略','qun','ploy','','',0,'','',0,1),(254,'查看微群管理','qun','manage','','',0,'','',0,1),(255,'查看微群设置','qun','setting','','',0,'','',0,1),(256,'修改微群设置','qun','dosetting','','',0,'','',0,1),(257,'修改微群分类','qun','docategory','','',0,'','',0,1),(258,'修改微博等级','qun','dolevel','','',0,'','',0,1),(259,'修改微群策略','qun','doploy','','',0,'','',0,1),(260,'执行微群管理','qun','domanage','','',0,'','',0,1),(261,'用户搜索结果','member','dosearch','','',0,'','',0,1),(262,'修改用户信息','member','domodify','','',0,'','',0,1),(263,'执行删除用户操作','member','delete','','',0,'','',0,1),(264,'查看在线用户','sessions','search','','',0,'','',0,1),(265,'添加勋章','medal','add','','',0,'','',0,1),(267,'修改勋章','medal','modify|domodify','','',0,'','',0,1),(268,'删除勋章','medal','delete','','',0,'','',0,1),(269,'添加V认证','vipintro','add','','',0,'','',0,1),(270,'取消V认证','vipintro','open_validate','','',0,'','',0,1),(271,'修改V认证','vipintro','modify','','',0,'','',0,1),(273,'查看我的首页','topic','myhome','','',0,'','',0,0),(274,'查看TA关注的用户','topic','follow','','',0,'','',0,0),(275,'查看关注TA的用户','topic','fans','','',0,'','',0,0),(276,'设置我的模板（样式、换肤）','skin','do_modify','','',0,'','',0,0),(281,'查看昵称找人页面','search','user','','',0,'','',0,0),(282,'查看标签找人页面','search','usertag','','',0,'','',0,0),(283,'查看关键词找微博页面','search','topic','','',0,'','',0,0),(284,'查看话题找微博页面','search','tag','','',0,'','',0,0),(285,'查看关键词找投票页面','search','vote','','',0,'','',0,0),(286,'个人微博秀调用','show','show','','',0,'','',0,0),(288,'查看媒体汇页面','other','media','','',0,'','',0,0),(289,'查看达人榜页面','topic','top','','',0,'','',0,0),(290,'查看最新发布的微博','topic','new','','',0,'','',0,0),(291,'查看最新评论的微博','topic','newreply','','',0,'','',0,0),(292,'查看我的勋章页面','settings','user_medal','','',0,'','',0,0),(293,'查看我的资料页面','settings','base','','',0,'','',0,0),(294,'执行修改个人资料操作','settings','do_modify_profile','','',0,'','',0,0),(295,'查看修改头像页面','settings','face','','',0,'','',0,0),(296,'执行头像修改操作','settings','do_modify_face','','',0,'','',0,0),(297,'查看修改密码页面','settings','secret','','',0,'','',0,0),(298,'执行修改密码操作','settings','do_modify_password','','',0,'','',0,0),(299,'查看我的积分','settings','extcredits','','',0,'','',0,0),(300,'查看私信列表','pm','list','','',0,'','',0,0),(302,'设置私信为未读','pm','markunread','','',0,'','',0,0),(303,'查看投票详情','vote','view','','',0,'','',0,0),(304,'查看话题扩展','tag','extra','','',0,'','',0,1),(305,'查看话题推介','tag','recommend','','',0,'','',0,1),(306,'查看话题列表','tag','list','','',0,'','',0,1),(307,'编辑话题推介','tag','do_recommend','','',0,'','',0,1),(308,'编辑话题扩展','tag','add_extra','','',0,'','',0,1),(311,'查看导航设置','setting','navigation','','',0,'','',0,1),(315,'查看活动管理','event','manage','','',0,'','',0,1),(317,'修改导航设置','setting','do_navigation','','',0,'','',0,1),(318,'设置默认关注和推介','setting','do_regfollow','','',0,'','',0,1),(319,'查看短信用户','sms','list','','',0,'','',0,1),(320,'导出短信用户','sms','export_to_excel','','',0,'','',0,1),(321,'删除活动','event','delete','','',0,'','',0,1),(323,'查看插件列表','plugin','main','','',0,'','',0,1),(324,'插件安装','plugin','add','','',0,'','',0,1),(325,'设计插件','plugin','design|adddesign','','',0,'','',0,1),(327,'启用插件','plugin','action','','',0,'','',0,1),(328,'卸载插件','plugin','uninstall','','',0,'','',0,1),(329,'导出所有用户','member','export_all_user','','',0,'','',0,1),(330,'使用微博墙功能','wall','control','','',0,'','',0,0),(340,'创建微群','qun','create|docreate','','',0,'','',0,0),(361,'查看分类管理','fenlei','manage','','',0,'','',0,1),(363,'修改API设置','api','do_modify_setting','','',0,'','',0,1),(374,'查看待审核列表','verify','edit|doedit','','',0,'','',0,1),(375,'审核用户信息','verify','doverify','','',0,'','',0,1),(376,'审核微博','topic','doverify','','',0,'','',0,1),(377,'附件上传','uploadattach','attach','','',0,'','',0,0),(378,'附件下载','uploadattach','down','','',0,'','',0,0),(379,'查看注册控制选项','setting','modify_register','','',0,'','',0,1),(380,'查看自动关注设置','setting','regfollow','','',0,'','',0,1),(381,'查看Discuz论坛调用设置','dzbbs','discuz_setting','','',0,'','',0,1),(382,'查看皮肤风格设置','show','modify_theme','','',0,'','',0,1),(383,'查看名人堂设置','vipintro','people_setting','','',0,'','',0,1),(384,'查看微博评论调用列表','output','output_setting','','',0,'','',0,1),(385,'管理微博列表','topic','topic_manage','','',0,'','',0,1),(386,'查看待审微博','topic','verify','','',0,'','',0,1),(387,'查看微博回收站','topic','del','','',0,'','',0,1),(388,'查看微博审核工作','topic','manage','','',0,'','',0,1),(389,'用户签名管理','topic','signature','','',0,'','',0,1),(390,'自我介绍管理','topic','aboutme','','',0,'','',0,1),(391,'查看用户列表','member','newm','','',0,'','',0,1),(392,'查看禁言用户','member','force_out','','',0,'','',0,1),(393,'查看上报领导','member','leaderlist','','',0,'','',0,1),(394,'查看投票列表','vote','index','','',0,'','',0,1),(395,'查看活动主题','event','index','','',0,'','',0,1),(396,'直播管理','live','index','','',0,'','',0,1),(401,'查看验证码设置','setting','modify_seccode','','',0,'','',0,1),(420,'后台操作记录','logs','*','','',0,'','',0,1),(403,'查看默认关注分组','setting','follow','','',0,'','',0,1),(404,'查看图片上传设置','setting','modify_image','','',0,'','',0,1),(405,'查看发布来源设置','setting','modify_topic_from','','',0,'','',0,1),(406,'查看图片签名档设置','setting','modify_qmd','','',0,'','',0,1),(407,'查看邀请文字说明','setting','invite','','',0,'','',0,1),(408,'修改内容发布来源','setting','do_modify_topic_from','','',0,'','',0,1),(409,'添加直播','live','add','','',0,'','',0,1),(410,'查看直播设置','live','config','','',0,'','',0,1),(411,'查看微博评论调用设置','output','modify','','',0,'','',0,1),(412,'添加微博评论调用','output','add','','',0,'','',0,1),(413,'查看分类信息基本设置','fenlei','setting','','',0,'','',0,1),(419,'批量用户V认证操作','vipintro','tuijian','','',0,'','',0,1),(415,'私信群发列表','pm','pmsend','','',0,'','',0,1),(416,'执行私信群发','pm','dopmsend','','',0,'','',0,1),(417,'删除群发私信','pm','delmsg','','',0,'','',0,1),(418,'查看私信列表','pm','pm_manage','','',0,'','',0,1),(421,'查看模板风格设置','show','modify_template','','',0,'','',0,1),(422,'网站LOGO设置','show','editlogo','','',0,'','',0,1),(424,'查看DeDeCMS调用设置','dedecms','dedecms_setting','','',0,'','',0,1),(425,'查看PHPWind调用设置','phpwind','phpwind_setting','','',0,'','',0,1),(426,'编辑站外调用设置','output','do_modify','','',0,'','',0,1),(427,'删除微博评论调用','output','delete','','',0,'','',0,1),(428,'修改皮肤风格设置','show','domodifytheme','','',0,'','',0,1),(429,'查看站外调用列表','share','share_setting','','',0,'','',0,1),(430,'修改DeDeCMS调用设置','dedecms','dedecms_save','','',0,'','',0,1),(431,'修改PHPWind调用设置','phpwind','phpwind_save','','',0,'','',0,1),(432,'修改Discuz论坛调用设置','dzbbs','dzbbs_save','','',0,'','',0,1),(443,'后台功能搜索','search','*','','',0,'','',0,1),(445,'后台短信发送','sms','do_send','','',0,'','',0,1),(446,'查看待验证用户','member','waitvalidate','','',0,'','',0,1),(447,'发起新活动','event','create','','',0,'','',0,0),(448,'查看活动','event','detail','','',0,'','',0,0);

DROP TABLE IF EXISTS `jishigou_role_module`;
CREATE TABLE `jishigou_role_module` (
`module` varchar(50) NOT NULL default '',
`name` varchar(255) NOT NULL default '',
UNIQUE KEY `module` (`module`)
) ENGINE=MyISAM;
REPLACE INTO `jishigou_role_module` (`module`,`name`) values ('role_action','动作权限管理'),('role','角色设置'),('login','登录退出'),('index','后台访问'),('pm','私信管理'),('setting','系统设置'),('link','友情链接设置'),('role_module','动作模块设置'),('db','数据库管理'),('show','界面与显示设置'),('robot','蜘蛛爬行记录'),('tag','话题管理'),('report','举报管理'),('topic','微博管理'),('ucenter','Ucenter整合'),('cache','缓存管理'),('upgrade','系统升级'),('profile','个人资料'),('member','用户管理'),('income','广告管理'),('notice','网站公告'),('xwb','新浪微博'),('vote','投票'),('share','站外调用'),('imjiqiren','QQ机器人'),('sms','手机短信'),('task','计划任务'),('user_tag','个人标签'),('web_info','关于我们'),('qun','微群'),('sessions','在线用户'),('medal','勋章(用户荣誉)'),('vipintro','用户V认证'),('skin','前台换肤'),('search','搜索'),('tools','工具'),('other','其他'),('settings','设置'),('event','活动'),('plugin','插件模块'),('wall','微博墙'),('fenlei','分类信息'),('api','API应用'),('verify','头像签名审核'),('uploadattach','附件'),('dzbbs','Discuz论坛调用'),('output','微博评论站外调用'),('live','微直播'),('module','module'),('logs','后台操作记录'),('dedecms','DeDeCMS调用'),('phpwind','PHPWind调用');

DROP TABLE IF EXISTS `jishigou_sessions`;
CREATE TABLE `jishigou_sessions` (
`sid` char(6) NOT NULL default '',
`ip1` tinyint(1) unsigned NOT NULL default '0',
`ip2` tinyint(1) unsigned NOT NULL default '0',
`ip3` tinyint(1) unsigned NOT NULL default '0',
`ip4` tinyint(1) unsigned NOT NULL default '0',
`uid` mediumint(8) unsigned NOT NULL default '0',
`action` smallint(4) unsigned NOT NULL default '0',
`slastactivity` int(10) unsigned NOT NULL default '0',
UNIQUE KEY `sid` (`sid`),
KEY `uid` (`uid`)
) ENGINE=MEMORY;

DROP TABLE IF EXISTS `jishigou_tag`;
CREATE TABLE `jishigou_tag` (
`id` mediumint(8) unsigned NOT NULL auto_increment,
`name` char(30) NOT NULL default '',
`user_id` mediumint(8) unsigned NOT NULL default '0',
`username` char(15) NOT NULL default '',
`dateline` int(10) unsigned NOT NULL default '0',
`last_post` int(10) unsigned NOT NULL default '0',
`total_count` int(10) unsigned NOT NULL default '0',
`user_count` mediumint(8) unsigned NOT NULL default '0',
`topic_count` mediumint(8) unsigned NOT NULL default '0',
`tag_count` mediumint(8) NOT NULL default '0',
`status` tinyint(1) NOT NULL default '0',
`extra` tinyint(1) NOT NULL default '0',
PRIMARY KEY  (`id`),
UNIQUE KEY `name` (`name`),
KEY `total_count` (`total_count`),
KEY `last_post` (`last_post`),
KEY `user_id` (`user_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_tag_favorite`;
CREATE TABLE `jishigou_tag_favorite` (
`id` int(10) unsigned NOT NULL auto_increment,
`tag` char(64) NOT NULL default '',
`uid` mediumint(8) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `tag` (`tag`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic`;
CREATE TABLE `jishigou_topic` (
`tid` int(10) unsigned NOT NULL auto_increment,
`uid` mediumint(8) unsigned NOT NULL default '0',
`username` char(15) NOT NULL default '',
`content` char(255) NOT NULL default '',
`content2` char(255) NOT NULL default '',
`imageid` char(100) NOT NULL default '',
`videoid` int(10) unsigned NOT NULL default '0',
`musicid` int(10) unsigned NOT NULL default '0',
`longtextid` int(10) unsigned NOT NULL default '0',
`attachid` char(100) NOT NULL default '',
`roottid` int(10) unsigned NOT NULL default '0',
`replys` smallint(4) unsigned NOT NULL default '0',
`forwards` smallint(6) NOT NULL default '0',
`totid` int(10) unsigned NOT NULL default '0',
`touid` mediumint(8) unsigned NOT NULL default '0',
`tousername` char(15) NOT NULL default '',
`dateline` int(10) unsigned NOT NULL default '0',
`lastupdate` int(10) unsigned NOT NULL default '0',
`from` enum('web','wap','mobile','qq','msn','api','sina','qqwb','vote','qun','event','android','iphone','ipad','sms','androidpad') NOT NULL default 'web',
`type` char(15) NOT NULL default '',
`item_id` int(10) unsigned NOT NULL default '0',
`item` char(15) NOT NULL default '',
`postip` char(15) NOT NULL default '',
`managetype` tinyint(1) NOT NULL default '0',
PRIMARY KEY  (`tid`),
KEY `uid_type` (`uid`,`type`),
KEY `dateline` (`dateline`),
KEY `managetype` (`managetype`),
KEY `item_id_item` (`item_id`,`item`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_verify`;
CREATE TABLE `jishigou_topic_verify` (
`id` int(10) unsigned NOT NULL auto_increment,
`tid` int(10) unsigned NOT NULL ,
`uid` mediumint(8) unsigned NOT NULL default '0',
`username` char(15) NOT NULL default '',
`content` char(255) NOT NULL default '',
`content2` char(255) NOT NULL default '',
`imageid` char(100) NOT NULL default '',
`attachid` char(100) NOT NULL default '',
`videoid` int(10) unsigned NOT NULL default '0',
`musicid` int(10) unsigned NOT NULL default '0',
`longtextid` int(10) unsigned NOT NULL default '0',
`roottid` int(10) unsigned NOT NULL default '0',
`replys` smallint(4) unsigned NOT NULL default '0',
`forwards` smallint(6) NOT NULL default '0',
`totid` int(10) unsigned NOT NULL default '0',
`touid` mediumint(8) unsigned NOT NULL default '0',
`tousername` char(15) NOT NULL default '',
`dateline` int(10) unsigned NOT NULL default '0',
`lastupdate` int(10) unsigned NOT NULL default '0',
`from` enum('web','wap','mobile','qq','msn','api','sina','qqwb','vote','qun','event','android','iphone','ipad','sms','androidpad') NOT NULL default 'web',
`type` char(15) NOT NULL default '',
`item_id` int(10) unsigned NOT NULL default '0',
`item` char(15) NOT NULL default '',
`postip` char(15) NOT NULL default '',
`managetype` tinyint(1) NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `uid_type` (`uid`,`type`),
KEY `dateline` (`dateline`),
KEY `managetype` (`managetype`),
KEY `item_id_item` (`item_id`,`item`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_favorite`;
CREATE TABLE `jishigou_topic_favorite` (
`id` int(10) unsigned NOT NULL auto_increment,
`tid` int(10) unsigned NOT NULL default '0',
`tuid` mediumint(10) unsigned NOT NULL default '0',
`uid` mediumint(8) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_image`;
CREATE TABLE `jishigou_topic_image` (
`id` int(10) unsigned NOT NULL auto_increment,
`tid` int(10) NOT NULL default '0',
`site_url` char(255) NOT NULL default '',
`photo` char(255) NOT NULL default '',
`name` char(255) NOT NULL default '',
`description` char(255) NOT NULL default '',
`filesize` int(10) unsigned NOT NULL default '0',
`width` smallint(4) unsigned NOT NULL default '0',
`height` smallint(4) unsigned NOT NULL default '0',
`uid` mediumint(8) unsigned NOT NULL default '0',
`username` char(15) NOT NULL default '',
`item` char(100) NOT NULL default '',
`itemid` int(10) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
`image_url` char(255) NOT NULL,
PRIMARY KEY  (`id`),
KEY `tid` (`tid`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_mention`;
CREATE TABLE `jishigou_topic_mention` (
`id` int(10) unsigned NOT NULL auto_increment,
`tid` int(10) unsigned NOT NULL default '0',
`uid` mediumint(8) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `uid` (`uid`),
KEY `tid` (`tid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_more`;
CREATE TABLE `jishigou_topic_more` (
`tid` int(10) unsigned NOT NULL default '0',
`parents` text NOT NULL default '',
`replyids` longtext NOT NULL default '',
`replyidscount` smallint(4) unsigned NOT NULL default '0',
PRIMARY KEY  (`tid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_music`;
CREATE TABLE `jishigou_topic_music` (
`id` int(11) NOT NULL auto_increment,
`uid` int(11) NOT NULL default '0',
`tid` int(11) NOT NULL default '0',
`username` varchar(50) NOT NULL default '',
`music_url` varchar(255) NOT NULL default '',
`dateline` int(11) NOT NULL default '0',
`xiami_id` int(20) NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `uid` (`uid`),
KEY `tid` (`tid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_reply`;
CREATE TABLE `jishigou_topic_reply` (
`tid` int(10) unsigned NOT NULL default '0',
`replyid` int(10) unsigned NOT NULL default '0',
KEY `tid` (`tid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_tag`;
CREATE TABLE `jishigou_topic_tag` (
`item_id` mediumint(8) unsigned NOT NULL default '0',
`tag_id` mediumint(8) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
`count` mediumint(6) NOT NULL default '0',
PRIMARY KEY  (`item_id`,`tag_id`),
KEY `tag_id` (`tag_id`),
KEY `dateline` (`dateline`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_video`;
CREATE TABLE `jishigou_topic_video` (
`id` int(11) NOT NULL auto_increment,
`uid` int(11) NOT NULL default '0',
`tid` int(11) NOT NULL default '0',
`username` varchar(50) NOT NULL default '',
`video_hosts` varchar(255) NOT NULL default '',
`video_link` varchar(255) NOT NULL default '',
`video_url` varchar(255) NOT NULL default '',
`video_img_url` varchar(255) NOT NULL default '',
`video_img` varchar(255) NOT NULL default '',
`dateline` int(11) NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `tid` (`tid`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_url`;
CREATE TABLE `jishigou_url` (
`id` int(10) unsigned NOT NULL auto_increment,
`key` varchar(10) character set gbk collate gbk_bin NOT NULL default '',
`url` text NOT NULL,
`dateline` int(10) unsigned NOT NULL default '0',
`open_times` mediumint(8) unsigned NOT NULL default '0',
`url_hash` char(32) NOT NULL default '',
`title` varchar(100) NOT NULL,
`description` varchar(255) NOT NULL,
`site_id` int(10) unsigned NOT NULL,
PRIMARY KEY  (`id`),
UNIQUE KEY `url_hash` (`url_hash`),
UNIQUE KEY `key` (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_validate`;
CREATE TABLE `jishigou_validate` (
`id` int(10) unsigned NOT NULL auto_increment,
`item` varchar(20) NOT NULL default '',
`item_id` int(10) unsigned NOT NULL default '0',
`item_table` varchar(30) NOT NULL default '',
`item_table_operation` enum('insert','update') NOT NULL default 'update',
`item_sql` text NOT NULL default '',
`request_uid` int(10) unsigned NOT NULL default '0',
`request_username` varchar(15) NOT NULL default '',
`request_reason` text NOT NULL default '',
`request_time` int(10) unsigned NOT NULL default '0',
`validate_result` tinyint(1) unsigned NOT NULL default '0',
`validate_result_describe` text NOT NULL default '',
`validate_uid` int(10) unsigned NOT NULL default '0',
`validate_username` varchar(15) NOT NULL default '',
`validate_time` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `item` (`item_id`,`item_table`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_weather`;
CREATE TABLE `jishigou_weather` (
`id` char(6) NOT NULL default '',
`city` char(50) NOT NULL default '',
`day` tinyint(1) unsigned NOT NULL default '0',
`weather` char(50) NOT NULL default '',
`temperature_min` tinyint(1) NOT NULL default '0',
`temperature_max` tinyint(1) NOT NULL default '0',
`wind_direction` char(50) NOT NULL default '',
`area_code` char(4) NOT NULL default '',
`post_code` mediumint(6) unsigned NOT NULL default '0',
`read_time` int(10) unsigned NOT NULL default '0',
`read_from` char(50) NOT NULL default '',
PRIMARY KEY  (`id`,`day`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_group`;
CREATE TABLE `jishigou_group` (
`id` int(11) NOT NULL auto_increment,
`uid` int(11) NOT NULL default '0',
`group_name` char(15) NOT NULL default '',
`group_count` int(11) NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_groupfields`;
CREATE TABLE `jishigou_groupfields` (
`id` int(11) NOT NULL auto_increment,
`gid` int(11) NOT NULL default '0',
`uid` int(11) NOT NULL default '0',
`touid` int(11) NOT NULL default '0',
`g_name` char(15) NOT NULL default '',
`display` tinyint(4) NOT NULL default '0',
PRIMARY KEY (`id`),
KEY `gid_uid` (`gid`,`uid`),
KEY `uid_touid` (`uid`,`touid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_medal`;
CREATE TABLE `jishigou_medal` (
`id` int(11) NOT NULL auto_increment,
`medal_img` char(255) NOT NULL,
`medal_img2` char(200) NOT NULL,
`medal_name` char(30) NOT NULL,
`medal_depict` char(50) NOT NULL,
`medal_count` int(11) NOT NULL default '0',
`is_open` tinyint(4) NOT NULL default '1',
`conditions` varchar(250) NOT NULL,
`dateline` int(11) NOT NULL default '0',
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;
REPLACE INTO `jishigou_medal` (`id`, `medal_img`, `medal_img2`, `medal_name`, `medal_depict`, `medal_count`, `is_open`, `conditions`, `dateline`) VALUES (1, './images/medal/1301651267/1_o.jpg', './images/medal/1301651267/1_s.jpg', '微博达人', '连续3天发布原创微博，就能获得微博达人勋章', 0, 1, 'a:4:{s:4:"type";s:5:"topic";s:3:"day";s:1:"3";s:6:"endday";s:0:"";s:7:"tagname";N;}', 1301651267), (2, './images/medal/1301651359/2_o.jpg', './images/medal/1301651359/2_s.jpg', '评论专家', '连续3天对他人微博进行评论，就能获得”评论专家“勋章', 0, 1, 'a:4:{s:4:"type";s:5:"reply";s:3:"day";s:1:"3";s:6:"endday";N;s:7:"tagname";N;}', 1301651359);

DROP TABLE IF EXISTS `jishigou_medal_apply`;
CREATE TABLE `jishigou_medal_apply` (
`apply_id` int(10) NOT NULL auto_increment,
`uid` int(10) NOT NULL default '0',
`nickname` char(25) NOT NULL default '',
`medal_id` smallint(6) NOT NULL default '0',
`dateline` int(10) NOT NULL default '0',
PRIMARY KEY  (`apply_id`),
KEY `uid` (`uid`),
KEY `medal_id` (`medal_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_user_medal`;
CREATE TABLE `jishigou_user_medal` (
`id` int(11) NOT NULL auto_increment,
`uid` int(11) NOT NULL,
`nickname` char(50) NOT NULL,
`medalid` int(11) NOT NULL,
`is_index` tinyint(4) NOT NULL default '1',
`dateline` int(11) NOT NULL,
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_notice`;
CREATE TABLE `jishigou_notice` (
`id` int(11) NOT NULL auto_increment,
`title` char(200) NOT NULL default '',
`content` text NOT NULL default '',
`dateline` int(10) NOT NULL default '0',
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_media`;
CREATE TABLE `jishigou_media` (
`id` int(11) NOT NULL auto_increment,
`media_name` char(20) NOT NULL default '',
`media_count` smallint(6) NOT NULL default '0',
`order` int(11) NOT NULL default '0',
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cron`;
CREATE TABLE `jishigou_cron` (
`id` int(11) NOT NULL auto_increment,
`touid` int(11) NOT NULL default '0',
`toemail` char(40) NOT NULL default '',
`at_content` text NOT NULL default '',
`pm_content` text NOT NULL default '',
`reply_content` text NOT NULL default '',
`sendtime` int(11) NOT NULL default '0',
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_blacklist`;
CREATE TABLE `jishigou_blacklist` (
`id` int(11) NOT NULL auto_increment,
`uid` int(11) NOT NULL default '0',
`touid` int(11) NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `uid_touid` (`uid`,`touid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_show`;
CREATE TABLE `jishigou_topic_show` (
`id` int(11) NOT NULL auto_increment,
`uid` int(11) NOT NULL default '0',
`stylevalue` text NOT NULL default '',
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_user_tag`;
CREATE TABLE `jishigou_user_tag` (
`id` int(11) NOT NULL auto_increment,
`name` char(30) NOT NULL default '',
`count` int(11) NOT NULL default '0',
`type` char(20) NOT NULL default '',
`dateline` int(11) NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `name` (`name`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_user_tag_fields`;
CREATE TABLE `jishigou_user_tag_fields` (
`id` int(11) NOT NULL auto_increment,
`tag_id` int(11) NOT NULL default '0',
`uid` int(11) NOT NULL default '0',
`tag_name` char(50) NOT NULL default '',
PRIMARY KEY  (`id`),
KEY `uid` (`uid`),
KEY `tag_id` (`tag_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_credits_log`;
CREATE TABLE `jishigou_credits_log` (
`uid` mediumint(8) unsigned NOT NULL default '0',
`operation` char(3) NOT NULL default '',
`relatedid` int(10) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
`extcredits1` int(10) NOT NULL default '0',
`extcredits2` int(10) NOT NULL default '0',
`extcredits3` int(10) NOT NULL default '0',
`extcredits4` int(10) NOT NULL default '0',
`extcredits5` int(10) NOT NULL default '0',
`extcredits6` int(10) NOT NULL default '0',
`extcredits7` int(10) NOT NULL default '0',
`extcredits8` int(10) NOT NULL default '0',
KEY `uid` (`uid`),
KEY `operation` (`operation`),
KEY `relatedid` (`relatedid`),
KEY `dateline` (`dateline`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_credits_rule`;
CREATE TABLE `jishigou_credits_rule` (
`rid` mediumint(8) unsigned NOT NULL auto_increment,
`rulename` varchar(20) NOT NULL default '',
`action` varchar(20) NOT NULL default '',
`cycletype` tinyint(1) NOT NULL default '0',
`cycletime` int(10) NOT NULL default '0',
`rewardnum` tinyint(2) NOT NULL default '1',
`norepeat` tinyint(1) NOT NULL default '0',
`extcredits1` int(10) NOT NULL default '0',
`extcredits2` int(10) NOT NULL default '0',
`extcredits3` int(10) NOT NULL default '0',
`extcredits4` int(10) NOT NULL default '0',
`extcredits5` int(10) NOT NULL default '0',
`extcredits6` int(10) NOT NULL default '0',
`extcredits7` int(10) NOT NULL default '0',
`extcredits8` int(10) NOT NULL default '0',
`related` char(20) NOT NULL default '',
PRIMARY KEY  (`rid`),
UNIQUE KEY `action` (`action`)
) ENGINE=MyISAM;
REPLACE INTO `jishigou_credits_rule` (`rid`,`rulename`,`action`,`cycletype`,`cycletime`,`rewardnum`,`norepeat`,`extcredits1`,`extcredits2`,`extcredits3`,`extcredits4`,`extcredits5`,`extcredits6`,`extcredits7`,`extcredits8`,`related`) values (1,'发布原创微博','topic',1,0,10,0,0,2,0,0,0,0,0,0,''),(7,'发送短消息','pm',1,0,1,0,0,1,0,0,0,0,0,0,''),(3,'关注好友','buddy',1,0,10,0,0,1,0,0,0,0,0,0,''),(8,'设置头像','face',0,0,1,0,0,10,0,0,0,0,0,0,''),(9,'VIP认证','vip',0,0,1,0,0,20,0,0,0,0,0,0,''),(6,'每天登录','login',1,0,1,0,0,2,0,0,0,0,0,0,''),(2,'评论或转发微博','reply',1,0,10,0,0,1,0,0,0,0,0,0,''),(4,'邀请注册','register',1,0,10,0,0,10,0,0,0,0,0,0,''),(10,'发布指定话题','_T84202031',1,0,2,0,0,5,0,0,0,0,0,0,'新人报到'),(11,'关注指定用户','_U-2012344970',0,0,1,0,0,5,0,0,0,0,0,0,'admin'),(12,'删除微博','topic_del',4,0,0,0,0,-5,0,0,0,0,0,0,''),(13,'取消关注好友','buddy_del',4,0,0,0,0,-5,0,0,0,0,0,0,''),(15,'发布指定话题','_T',1,0,1,0,0,0,0,0,0,0,0,0,''),(16,'关注指定用户','_U',1,0,1,0,0,0,0,0,0,0,0,0,''),(17,'发起投票','vote_add',1,0,10,0,0,2,0,0,0,0,0,0,''),(18,'删除投票','vote_del',4,0,0,0,0,-5,0,0,0,0,0,0,'');

DROP TABLE IF EXISTS `jishigou_credits_rule_log`;
CREATE TABLE `jishigou_credits_rule_log` (
`clid` mediumint(8) unsigned NOT NULL auto_increment,
`uid` mediumint(8) unsigned NOT NULL default '0',
`rid` mediumint(8) unsigned NOT NULL default '0',
`total` mediumint(8) unsigned NOT NULL default '0',
`cyclenum` mediumint(8) unsigned NOT NULL default '0',
`extcredits1` int(10) NOT NULL default '0',
`extcredits2` int(10) NOT NULL default '0',
`extcredits3` int(10) NOT NULL default '0',
`extcredits4` int(10) NOT NULL default '0',
`extcredits5` int(10) NOT NULL default '0',
`extcredits6` int(10) NOT NULL default '0',
`extcredits7` int(10) NOT NULL default '0',
`extcredits8` int(10) NOT NULL default '0',
`starttime` int(10) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
`relatedid` int(10) NOT NULL default '0',
PRIMARY KEY  (`clid`),
KEY `uid` (`uid`,`rid`),
KEY `dateline` (`dateline`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_task`;
CREATE TABLE `jishigou_task` (
`id` smallint(4) unsigned NOT NULL auto_increment,
`available` tinyint(1) NOT NULL default '0',
`type` enum('user','system') NOT NULL default 'user',
`name` char(50) NOT NULL default '',
`filename` char(50) NOT NULL default '',
`lastrun` int(10) unsigned NOT NULL default '0',
`nextrun` int(10) unsigned NOT NULL default '0',
`weekday` tinyint(1) NOT NULL default '0',
`day` tinyint(1) NOT NULL default '0',
`hour` tinyint(1) NOT NULL default '0',
`minute` char(36) NOT NULL default '',
PRIMARY KEY  (`id`),
KEY `nextrun` (`available`,`nextrun`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_task_log`;
CREATE TABLE `jishigou_task_log` (
`id` int(10) NOT NULL auto_increment,
`task_id` int(10) unsigned NOT NULL default '0',
`exec_time` float unsigned NOT NULL default '0',
`message` text NOT NULL default '',
`error` int(10) NOT NULL default '0',
`dateline` int(10) NOT NULL default '0',
`ip` varchar(16) NOT NULL default '0',
`username` varchar(15) NOT NULL default '',
`uid` mediumint(8) unsigned NOT NULL default '0',
`agent` varchar(255) NOT NULL default '',
PRIMARY KEY  (`id`),
KEY `uid` (`uid`),
KEY `task_id` (`task_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_xwb_bind_info`;
CREATE TABLE `jishigou_xwb_bind_info` (
`uid` mediumint(8) unsigned NOT NULL default '0',
`sina_uid` bigint(20) unsigned NOT NULL default '0',
`token` char(32) NOT NULL default '',
`tsecret` char(32) NOT NULL default '',
`profile` text NOT NULL default '',
`share_time` int(10) NOT NULL default '0',
`last_read_time` int(10) unsigned NOT NULL default '0',
`last_read_id` bigint(20) unsigned NOT NULL default '0',
PRIMARY KEY  (`uid`),
UNIQUE KEY `sina_uid` (`sina_uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_xwb_bind_topic`;
CREATE TABLE `jishigou_xwb_bind_topic` (
`tid` bigint(20) unsigned NOT NULL default '0',
`mid` bigint(20) unsigned NOT NULL default '0',
`last_read_time` int(10) unsigned NOT NULL default '0',
KEY `tid` (`tid`),
KEY `mid` (`mid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_imjiqiren_client_user`;
CREATE TABLE `jishigou_imjiqiren_client_user` (
`id` int(10) unsigned NOT NULL auto_increment,
`uid` int(10) unsigned NOT NULL default '0',
`username` char(30) NOT NULL default '',
`user_im` int(10) unsigned NOT NULL default '0',
`try_bind_times` int(10) unsigned NOT NULL default '0',
`last_try_bind_time` int(10) unsigned NOT NULL default '0',
`send_times` int(10) unsigned NOT NULL default '0',
`last_send_time` int(10) unsigned NOT NULL default '0',
`last_send_message_id` int(10) unsigned NOT NULL default '0',
`stop_receive` tinyint(1) unsigned NOT NULL default '0',
`receive_times` int(10) unsigned NOT NULL default '0',
`last_receive_time` int(10) unsigned NOT NULL default '0',
`last_receive_message_id` int(10) unsigned NOT NULL default '0',
`stop_sign_update` tinyint(1) unsigned NOT NULL default '0',
`sign_update_times` int(10) unsigned NOT NULL default '0',
`last_sign_update_time` int(10) unsigned NOT NULL default '0',
`last_sign_update_message_id` int(10) unsigned NOT NULL default '0',
`reset_password_times` int(10) unsigned NOT NULL default '0',
`last_reset_password_time` int(10) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
`enable` tinyint(1) unsigned NOT NULL default '1',
`t_enable` tinyint(1) unsigned NOT NULL default '1',
`p_enable` tinyint(1) unsigned NOT NULL default '1',
`m_enable` tinyint(1) unsigned NOT NULL default '1',
`f_enable` tinyint(1) unsigned NOT NULL default '1',
`share_time` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `uid` (`uid`),
KEY `user_im` (`user_im`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_imjiqiren_failedlogins`;
CREATE TABLE `jishigou_imjiqiren_failedlogins` (
`ip` CHAR(15) NOT NULL default '',
`count` TINYINT(1) UNSIGNED NOT NULL default '0',
`lastupdate` INT(10) UNSIGNED NOT NULL default '0',
PRIMARY KEY  (`ip`)
) ENGINE=MYISAM;

DROP TABLE IF EXISTS `jishigou_imjiqiren_send_queue`;
CREATE TABLE `jishigou_imjiqiren_send_queue` (
`to` int(10) unsigned NOT NULL default '0',
`message` text NOT NULL default '',
`salt` char(10) NOT NULL default '',
`dateline` int(10) unsigned NOT NULL default '0',
UNIQUE KEY `to` (`to`),
KEY `dateline` (`dateline`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_sms_client_user`;
CREATE TABLE `jishigou_sms_client_user` (
`id` int(10) unsigned NOT NULL auto_increment,
`uid` int(10) unsigned NOT NULL default '0',
`username` char(30) NOT NULL default '',
`user_im` char(20) NOT NULL default '',
`bind_key` char(10) NOT NULL default '',
`bind_key_time` int(10) unsigned NOT NULL default '0',
`try_bind_times` int(10) unsigned NOT NULL default '0',
`last_try_bind_time` int(10) unsigned NOT NULL default '0',
`send_times` int(10) unsigned NOT NULL default '0',
`last_send_time` int(10) unsigned NOT NULL default '0',
`last_send_message_id` int(10) unsigned NOT NULL default '0',
`stop_receive` tinyint(1) unsigned NOT NULL default '0',
`receive_times` int(10) unsigned NOT NULL default '0',
`last_receive_time` int(10) unsigned NOT NULL default '0',
`last_receive_message_id` int(10) unsigned NOT NULL default '0',
`reset_password_times` int(10) unsigned NOT NULL default '0',
`last_reset_password_time` int(10) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
`enable` tinyint(1) unsigned NOT NULL default '1',
`t_enable` tinyint(1) unsigned NOT NULL default '0',
`p_enable` tinyint(1) unsigned NOT NULL default '0',
`m_enable` tinyint(1) unsigned NOT NULL default '0',
`f_enable` tinyint(1) unsigned NOT NULL default '0',
`share_time` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `uid` (`uid`),
KEY `user_im` (`user_im`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_sms_failedlogins`;
CREATE TABLE `jishigou_sms_failedlogins` (
`ip` char(15) NOT NULL default '',
`count` tinyint(1) unsigned NOT NULL default '0',
`lastupdate` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`ip`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_sms_send_queue`;
CREATE TABLE `jishigou_sms_send_queue` (
`to` int(10) unsigned NOT NULL default '0',
`message` text NOT NULL default '',
`salt` char(10) NOT NULL default '',
`dateline` int(10) unsigned NOT NULL default '0',
UNIQUE KEY `to` (`to`),
KEY `dateline` (`dateline`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_sms_receive_log`;
CREATE TABLE `jishigou_sms_receive_log` (
`id` int(10) NOT NULL auto_increment,
`uid` mediumint(8) unsigned NOT NULL,
`username` char(15) NOT NULL,
`dateline` int(10) unsigned NOT NULL,
`mobile` char(20) NOT NULL default '',
`message` text NOT NULL,
`msg_id` char(20) NOT NULL,
`status` tinyint(1) NOT NULL,
`tid` int(10) unsigned NOT NULL COMMENT 'topic id',
PRIMARY KEY  (`id`),
KEY `dateline` (`dateline`),
KEY `uid` (`uid`),
KEY `mobile` (`mobile`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_sms_send_log`;
CREATE TABLE `jishigou_sms_send_log` (
`id` int(10) NOT NULL auto_increment,
`uid` mediumint(8) unsigned NOT NULL,
`username` char(15) NOT NULL,
`dateline` int(10) unsigned NOT NULL,
`mobile` char(20) NOT NULL default '',
`message` text NOT NULL,
`msg_id` char(20) NOT NULL,
`status` tinyint(1) NOT NULL,
PRIMARY KEY  (`id`),
KEY `dateline` (`dateline`),
KEY `uid` (`uid`),
KEY `mobile` (`mobile`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_schedule`;
CREATE TABLE `jishigou_schedule` (
`id` bigint(20) unsigned NOT NULL auto_increment,
`uid` int(10) unsigned NOT NULL default '0',
`type` char(255) NOT NULL default '',
`vars` text NOT NULL,
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_qqwb_bind_info`;
CREATE TABLE `jishigou_qqwb_bind_info` (
`uid` int(10) unsigned NOT NULL,
`qqwb_username` char(20) NOT NULL default '',
`token` char(32) NOT NULL,
`tsecret` char(32) NOT NULL,
`dateline` int(10) unsigned NOT NULL,
`synctoqq` tinyint(1) NOT NULL,
PRIMARY KEY  (`uid`),
UNIQUE KEY `qqwb_username` (`qqwb_username`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_qqwb_bind_topic`;
CREATE TABLE `jishigou_qqwb_bind_topic` (
`tid` int(10) unsigned NOT NULL,
`qqwb_id` bigint(20) unsigned NOT NULL,
KEY `tid` (`tid`),
KEY `qqwb_id` (`qqwb_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_vote`;
CREATE TABLE `jishigou_vote` (
`vid` int(10) unsigned NOT NULL auto_increment,
`uid` mediumint(8) unsigned NOT NULL default '0',
`username` char(15) NOT NULL,
`subject` char(80) NOT NULL,
`voter_num` mediumint(8) unsigned NOT NULL default '0',
`reply_num` mediumint(8) unsigned NOT NULL default '0',
`maxchoice` tinyint(3) unsigned NOT NULL default '0',
`multiple` tinyint(1) unsigned NOT NULL default '0',
`is_view` tinyint(1) unsigned NOT NULL default '1',
`recd` tinyint(1) unsigned NOT NULL default '0',
`expiration` int(10) unsigned NOT NULL default '0',
`lastvote` int(10) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
`postip` CHAR(15) DEFAULT '' NOT NULL,
`item` char(15) NOT NULL default '',
`item_id` int(10) NOT NULL default 0,
`verify` tinyint(1) NOT NULL default '1' COMMENT '审核',
PRIMARY KEY (`vid`),
KEY `uid` (`uid`),
KEY `dateline` (`dateline`),
KEY `lastvote` (`lastvote`),
KEY `voter_num` (`voter_num`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_vote_field`;
CREATE TABLE `jishigou_vote_field` (
`vid` int(10) unsigned NOT NULL,
`message` text NOT NULL,
`option` text NOT NULL,
PRIMARY KEY  (`vid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_vote_option`;
CREATE TABLE `jishigou_vote_option` (
`oid` int(10) unsigned NOT NULL auto_increment,
`vid` int(10) unsigned NOT NULL default '0',
`vote_num` mediumint(8) unsigned NOT NULL default '0',
`option` varchar(100) NOT NULL,
PRIMARY KEY  (`oid`),
KEY `vid` (`vid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_vote_user`;
CREATE TABLE `jishigou_vote_user` (
`uid` mediumint(8) unsigned NOT NULL,
`username` varchar(15) NOT NULL,
`vid` int(10) unsigned NOT NULL,
`option` text NOT NULL,
`dateline` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`uid`,`vid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_vote`;
CREATE TABLE `jishigou_topic_vote` (
`tid` int(10) unsigned NOT NULL default '0',
`item_id` int(10) unsigned NOT NULL default '0',
`uid` mediumint(8) unsigned NOT NULL,
PRIMARY KEY  (`tid`,`item_id`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_tag_recommend`;
CREATE TABLE `jishigou_tag_recommend` (
`id` int(10) NOT NULL auto_increment,
`name` char(50) NOT NULL,
`desc` text NOT NULL,
`uid` mediumint(8) NOT NULL,
`username` char(30) NOT NULL,
`dateline` int(10) NOT NULL,
`last_update` int(10) NOT NULL,
`order` int(10) NOT NULL,
`enable` tinyint(1) NOT NULL default '1',
PRIMARY KEY  (`id`),
KEY `order` (`order`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_api`;
CREATE TABLE `jishigou_topic_api` (
`tid` int(10) unsigned NOT NULL default '0',
`item_id` int(10) unsigned NOT NULL default '0',
`uid` mediumint(8) unsigned NOT NULL,
PRIMARY KEY  (`tid`,`item_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_qun`;
CREATE TABLE `jishigou_qun` (
`qid` int(10) unsigned NOT NULL auto_increment,
`cat_id` smallint(6) unsigned NOT NULL default '0',
`name` char(50) NOT NULL,
`icon` char(60) NOT NULL,
`desc` char(200) NOT NULL,
`founderuid` mediumint(8) unsigned NOT NULL default '0',
`foundername` char(15) NOT NULL,
`level` smallint(6) unsigned NOT NULL default '0',
`credits` int(10) unsigned NOT NULL default '0',
`province` char(16) NOT NULL,
`city` char(16) NOT NULL,
`recd` tinyint(1) unsigned NOT NULL default '0',
`join_type` tinyint(1) unsigned NOT NULL default '0',
`gview_perm` tinyint(1) unsigned NOT NULL default '0',
`member_num` mediumint(8) unsigned NOT NULL default '0',
`topic_num` mediumint(8) unsigned NOT NULL default '0',
`thread_num` mediumint(8) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
`closed` tinyint(1) unsigned NOT NULL default '0',
`qun_theme_id` char(6) NOT NULL default '',
`postip` char(15) NOT NULL default 0,
`lastactivity` int(10) unsigned NOT NULL default '0',
PRIMARY KEY (`qid`),
KEY `cat_id` (`cat_id`),
KEY `founderuid` (`founderuid`),
KEY `lastactivity` (`lastactivity`),
KEY `dateline` (`dateline`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_qun_announcement`;
CREATE TABLE `jishigou_qun_announcement` (
`id` int(10) NOT NULL auto_increment,
`author` char(15) NOT NULL,
`qid` int(10) unsigned NOT NULL default '0',
`author_id` mediumint(9) unsigned NOT NULL default '0',
`message` text NOT NULL,
`dateline` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_qun_apply`;
CREATE TABLE `jishigou_qun_apply` (
`qid` int(10) unsigned NOT NULL,
`uid` mediumint(8) unsigned NOT NULL,
`username` varchar(15) NOT NULL,
`message` varchar(255) NOT NULL,
`apply_time` int(10) unsigned NOT NULL,
PRIMARY KEY  (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_qun_category`;
CREATE TABLE `jishigou_qun_category` (
`cat_id` smallint(6) unsigned NOT NULL auto_increment,
`cat_name` char(15) NOT NULL,
`qun_num` int(10) unsigned NOT NULL default '0',
`parent_id` smallint(6) unsigned NOT NULL default '0',
`display_order` smallint(6) unsigned NOT NULL default '0',
PRIMARY KEY  (`cat_id`)
) ENGINE=MyISAM;

REPLACE INTO `jishigou_qun_category` VALUES (1, '行业交流', 0, 0, 0);
REPLACE INTO `jishigou_qun_category` VALUES (2, 'IT互联网', 0, 1, 0);
REPLACE INTO `jishigou_qun_category` VALUES (3, '商业财经', 0, 1, 0);
REPLACE INTO `jishigou_qun_category` VALUES (4, '传媒公关', 0, 1, 0);
REPLACE INTO `jishigou_qun_category` VALUES (5, '兴趣爱好', 0, 0, 0);
REPLACE INTO `jishigou_qun_category` VALUES (6, '动漫', 0, 5, 0);
REPLACE INTO `jishigou_qun_category` VALUES (7, '游戏', 0, 5, 0);
REPLACE INTO `jishigou_qun_category` VALUES (8, '体育', 0, 5, 0);
REPLACE INTO `jishigou_qun_category` VALUES (9, '音乐', 0, 5, 0);
REPLACE INTO `jishigou_qun_category` VALUES (10, '电影', 0, 5, 0);
REPLACE INTO `jishigou_qun_category` VALUES (11, '购物', 0, 5, 0);
REPLACE INTO `jishigou_qun_category` VALUES (12, '旅游', 0, 5, 0);
REPLACE INTO `jishigou_qun_category` VALUES (13, '摄影', 0, 5, 0);

DROP TABLE IF EXISTS `jishigou_qun_level`;
CREATE TABLE `jishigou_qun_level` (
`level_id` smallint(6) unsigned NOT NULL auto_increment,
`level_name` char(20) NOT NULL,
`credits_higher` int(10) NOT NULL default '0',
`credits_lower` int(10) NOT NULL default '0',
`member_num` int(10) unsigned NOT NULL default '0',
`admin_num` smallint(6) unsigned NOT NULL default '0',
PRIMARY KEY  (`level_id`)
) ENGINE=MyISAM;
REPLACE INTO `jishigou_qun_level` VALUES (1, '初级群', -999999999, 999999999, 100, 3);

DROP TABLE IF EXISTS `jishigou_qun_ploy`;
CREATE TABLE `jishigou_qun_ploy` (
`id` smallint(6) unsigned NOT NULL auto_increment,
`fans_num_min` int(10) unsigned NOT NULL default '0',
`fans_num_max` int(10) unsigned NOT NULL default '0',
`topics_higher` int(10) unsigned NOT NULL default '0',
`topics_lower` int(10) unsigned NOT NULL default '0',
`qun_num` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;
REPLACE INTO `jishigou_qun_ploy` VALUES (1, 10, 999999999, 999999999, 10, 3);

DROP TABLE IF EXISTS `jishigou_qun_tag`;
CREATE TABLE `jishigou_qun_tag` (
`tag_id` int(10) unsigned NOT NULL auto_increment,
`tag_name` char(30) NOT NULL,
`count` mediumint(8) unsigned NOT NULL default '0',
`dateline` int(10) NOT NULL default '0',
PRIMARY KEY  (`tag_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_qun_tag_fields`;
CREATE TABLE `jishigou_qun_tag_fields` (
`id` int(10) unsigned NOT NULL auto_increment,
`tag_id` int(10) unsigned NOT NULL default '0',
`qid` int(10) unsigned NOT NULL default '0',
`tag_name` char(30) NOT NULL,
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_qun_user`;
CREATE TABLE `jishigou_qun_user` (
`qid` int(10) unsigned NOT NULL,
`uid` mediumint(8) unsigned NOT NULL,
`username` char(15) NOT NULL,
`level` tinyint(3) unsigned NOT NULL default '0',
`join_time` int(10) unsigned NOT NULL default '0',
`lastupdate` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`qid`,`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_qun`;
CREATE TABLE `jishigou_topic_qun` (
`tid` int(10) unsigned NOT NULL,
`item_id` int(10) unsigned NOT NULL,
`uid` mediumint(8) unsigned NOT NULL,
PRIMARY KEY  (`tid`,`item_id`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_share`;
CREATE TABLE `jishigou_share` (
`id` int(11) NOT NULL auto_increment,
`name` char(50) NOT NULL,
`type` char(20) NOT NULL,
`topic_style` text NOT NULL,
`show_style` char(255) NOT NULL,
`condition` text NOT NULL,
`nickname` char(255) NOT NULL,
`tag` char(255) NOT NULL,
`dateline` int(11) NOT NULL,
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_wall`;
CREATE TABLE `jishigou_wall` (
`id` int(10) unsigned NOT NULL auto_increment,
`uid` mediumint(8) unsigned NOT NULL,
`status` tinyint(1) unsigned NOT NULL default '1',
`show_mod` tinyint(1) NOT NULL,
`wall_reload_time` tinyint(1) unsigned NOT NULL default '5',
`last_load_time` int(10) unsigned NOT NULL,
`last_load_tid` int(10) unsigned NOT NULL,
`auto_wall_tid` int(10) unsigned NOT NULL,
`auto_wall_tag` char(255) NOT NULL,
`screen_ad_top` text NOT NULL,
`screen_ad_left` text NOT NULL,
`screen_ad_right` text NOT NULL,
PRIMARY KEY  (`id`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_wall_draft`;
CREATE TABLE `jishigou_wall_draft` (
`wall_id` int(10) unsigned NOT NULL,
`tid` int(10) unsigned NOT NULL,
`mark` tinyint(1) unsigned NOT NULL,
PRIMARY KEY  (`wall_id`,`tid`,`mark`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_wall_material`;
CREATE TABLE `jishigou_wall_material` (
`wall_id` int(10) unsigned NOT NULL,
`type` tinyint(1) unsigned NOT NULL,
`key` char(255) NOT NULL,
PRIMARY KEY  (`wall_id`,`type`,`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_wall_playlist`;
CREATE TABLE `jishigou_wall_playlist` (
`wall_id` int(10) unsigned NOT NULL,
`tid` int(10) unsigned NOT NULL,
`order` int(10) unsigned NOT NULL,
PRIMARY KEY  (`wall_id`,`tid`),
KEY `order` (`order`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_longtext`;
CREATE TABLE `jishigou_topic_longtext` (
`id` int(10) unsigned NOT NULL auto_increment,
`tid` int(10) unsigned NOT NULL COMMENT '微博ID',
`uid` int(10) unsigned NOT NULL,
`username` char(15) NOT NULL default '',
`longtext` longtext NOT NULL COMMENT '长文本的内容',
`dateline` int(10) unsigned NOT NULL,
`last_modify` int(10) unsigned NOT NULL,
`modify_times` int(10) unsigned NOT NULL,
`views` int(10) unsigned NOT NULL,
PRIMARY KEY  (`id`),
KEY `tid` (`tid`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_tag_extra`;
CREATE TABLE `jishigou_tag_extra` (
`id` int(10) unsigned NOT NULL,
`name` char(50) NOT NULL,
`data` longtext NOT NULL,
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_plugin`;
CREATE TABLE `jishigou_plugin` (
`pluginid` smallint(6) unsigned NOT NULL auto_increment COMMENT '插件id',
`available` tinyint(1) NOT NULL default '0' COMMENT '是否启用',
`adminid` tinyint(1) unsigned NOT NULL default '0' COMMENT '管理员id',
`name` varchar(40) NOT NULL default '' COMMENT '名称',
`identifier` varchar(40) NOT NULL default '' COMMENT '唯一标识符',
`description` varchar(255) NOT NULL default '' COMMENT '解释说明',
`datatables` varchar(255) NOT NULL default '' COMMENT '插件数据表',
`directory` varchar(100) NOT NULL default '' COMMENT '插件目录',
`copyright` varchar(100) NOT NULL default '' COMMENT '版权信息',
`modules` text NOT NULL COMMENT '插件信息',
`version` varchar(20) NOT NULL default '' COMMENT '插件版本',
PRIMARY KEY  (`pluginid`),
UNIQUE KEY `identifier` (`identifier`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_pluginvar`;
CREATE TABLE `jishigou_pluginvar` (
`pluginvarid` mediumint(8) unsigned NOT NULL auto_increment COMMENT '插件变量id',
`pluginid` smallint(6) unsigned NOT NULL default '0' COMMENT '插件id',
`displayorder` tinyint(3) NOT NULL default '0' COMMENT '显示顺序',
`title` varchar(100) NOT NULL default '' COMMENT '名称',
`description` varchar(255) NOT NULL default '' COMMENT '解释说明',
`variable` varchar(40) NOT NULL default '' COMMENT '变量名',
`type` varchar(20) NOT NULL default 'text' COMMENT '类型',
`value` text NOT NULL COMMENT '值',
`extra` text NOT NULL COMMENT '附加',
PRIMARY KEY  (`pluginvarid`),
KEY `pluginid` (`pluginid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_event`;
CREATE TABLE `jishigou_event` (
`id` mediumint(10) unsigned NOT NULL auto_increment,
`type_id` mediumint(10) NOT NULL,
`title` char(100) NOT NULL COMMENT '活动标题',
`fromt` int(10) NOT NULL COMMENT '开始时间',
`tot` int(10) NOT NULL COMMENT '结束时间',
`content` text NOT NULL COMMENT '活动描述',
`image` char(255) NOT NULL COMMENT '海报',
`province_id` mediumint(7) NOT NULL COMMENT '省份',
`area_id` mediumint(7) NOT NULL COMMENT '区域',
`city_id` mediumint(7) NOT NULL COMMENT '城市',
`address` char(255) NOT NULL COMMENT '具体地址',
`money` int(10) NOT NULL default '0' COMMENT '费用',
`app_num` int(10) NOT NULL default '0' COMMENT '报名人数',
`play_num` int(10) NOT NULL default '0' COMMENT '参与人数',
`postman` int(7) NOT NULL COMMENT '发起人',
`posttime` int(10) NOT NULL COMMENT '发布时间',
`lasttime` int(10) NOT NULL COMMENT '最后更新时间',
`qualification` text NOT NULL COMMENT '报名资格',
`need_app_info` text NOT NULL COMMENT '报名时必须填写的信息',
`recd` tinyint(1) NOT NULL default '0' COMMENT '推荐',
`verify` tinyint(1) NOT NULL default '1' COMMENT '审核',
`postip` char(15) NOT NULL default '',
`item` char(15) NOT NULL default '',
`item_id` int(10) NOT NULL default 0,
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_event_info`;
CREATE TABLE `jishigou_event_info` (
`id` mediumint(10) unsigned NOT NULL auto_increment,
`need_info` text NOT NULL,
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

REPLACE INTO `jishigou_event_info` (`id`, `need_info`) VALUES 
(1, 'a:6:{i:2;a:5:{s:2:"id";s:1:"2";s:4:"name";s:8:"真实姓名";s:9:"form_type";s:4:"text";s:8:"form_set";s:0:"";s:5:"ename";s:8:"realname";}i:3;a:5:{s:2:"id";s:1:"3";s:4:"name";s:4:"性别";s:9:"form_type";s:6:"select";s:8:"form_set";s:6:"男\r\n女";s:5:"ename";s:4:"sexy";}i:4;a:5:{s:2:"id";s:1:"4";s:4:"name";s:8:"手机号码";s:9:"form_type";s:4:"text";s:8:"form_set";s:0:"";s:5:"ename";s:8:"telphone";}i:24;a:5:{s:2:"id";s:2:"24";s:4:"name";s:2:"QQ";s:9:"form_type";s:4:"text";s:8:"form_set";s:0:"";s:5:"ename";s:2:"qq";}i:27;a:5:{s:2:"id";s:2:"27";s:4:"name";s:8:"自我介绍";s:9:"form_type";s:4:"text";s:8:"form_set";s:0:"";s:5:"ename";s:4:"show";}i:29;a:5:{s:2:"id";s:2:"29";s:4:"name";s:8:"联系地址";s:9:"form_type";s:4:"text";s:8:"form_set";s:0:"";s:5:"ename";s:7:"linkadd";}}');

DROP TABLE IF EXISTS `jishigou_event_member`;
CREATE TABLE `jishigou_event_member` (
`oid` mediumint(10) unsigned NOT NULL auto_increment,
`id` mediumint(10) NOT NULL,
`title` char(100) NOT NULL COMMENT '活动标题',
`fid` mediumint(8) NOT NULL COMMENT '用户ID',
`app` mediumint(1) NOT NULL default '0' COMMENT '是非报名',
`play` mediumint(1) NOT NULL default '0' COMMENT '是非参与',
`app_info` text NOT NULL COMMENT '报名时填写的资料',
`store` mediumint(1) NOT NULL default '0' COMMENT '是非收藏',
`app_time` int(10) NOT NULL,
`play_time` int(10) NOT NULL,
`store_time` int(10) NOT NULL,
PRIMARY KEY  (`oid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_event_needinfo`;
CREATE TABLE `jishigou_event_needinfo` (
`id` mediumint(10) unsigned NOT NULL auto_increment,
`name` char(100) NOT NULL,
`form_type` char(10) NOT NULL,
`form_set` mediumtext NOT NULL,
`ename` char(20) NOT NULL,
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

REPLACE INTO `jishigou_event_needinfo` (`id`, `name`, `form_type`, `form_set`, `ename`) VALUES 
(2, '真实姓名', 'text', '', 'realname'),
(3, '性别', 'select', '男\r\n女', 'sexy'),
(4, '手机号码', 'text', '', 'telphone'),
(5, '生日', 'text', '', 'birthday'),
(6, '证件号', 'text', '', 'card_id'),
(7, '邮寄地址', 'text', '', 'address'),
(8, '邮编', 'text', '', 'number'),
(9, '国籍', 'text', '', 'nation'),
(10, '出生地', 'text', '', 'birthadd'),
(11, '居住地', 'text', '', 'liveadd'),
(12, '毕业学校', 'text', '', 'school'),
(13, '学历', 'text', '', 'record'),
(14, '公司', 'text', '', 'company'),
(15, '职业', 'text', '', 'job'),
(16, '职位', 'text', '', 'position'),
(17, '年收入', 'text', '', 'money'),
(18, '情感状态', 'text', '', 'status'),
(19, '交友目的', 'text', '', 'goal'),
(20, '血型', 'select', 'A\r\nB\r\nAB\r\nO\r\n其他', 'blood'),
(21, '身高', 'text', '', 'height'),
(22, '体重', 'text', '', 'weight'),
(23, '支付宝', 'text', '', 'taobao'),
(24, 'QQ', 'text', '', 'qq'),
(25, 'MSN', 'text', '', 'msn'),
(26, '个人主页', 'text', '', 'url'),
(27, '自我介绍', 'text', '', 'show'),
(28, '兴趣爱好', 'text', '', 'like'),
(1, '联系地址', 'text', '', 'linkadd');

DROP TABLE IF EXISTS `jishigou_event_sort`;
CREATE TABLE `jishigou_event_sort` (
`id` mediumint(10) unsigned NOT NULL auto_increment,
`type` char(50) NOT NULL,
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

REPLACE INTO `jishigou_event_sort` (`id`, `type`) VALUES 
(1, '演出/电影'),
(2, '生活/聚会'),
(3, '旅行/户外'),
(4, '展览/沙龙'),
(5, '体育/健身'),
(6, '公益/环保'),
(7, '派对/夜店'),
(8, '作品征集'),
(9, '市集/游园'),
(10, '打折/促销'),
(11, '其他');

DROP TABLE IF EXISTS `jishigou_common_district` ;
CREATE TABLE `jishigou_common_district` (
`id` mediumint(8) unsigned NOT NULL auto_increment,
`name` char(255) NOT NULL,
`level` tinyint(4) unsigned NOT NULL default '0' COMMENT '级别',
`upid` mediumint(8) unsigned NOT NULL default '0' COMMENT '从属于',
`list` smallint(6) NOT NULL default '0' COMMENT '排序',
PRIMARY KEY  (`id`),
KEY `upid` (`upid`,`list`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_event`;
CREATE TABLE `jishigou_topic_event` (
`tid` int(10) unsigned NOT NULL default '0',
`item_id` int(10) unsigned NOT NULL default '0',
`uid` mediumint(8) unsigned NOT NULL,
PRIMARY KEY  (`tid`,`item_id`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_recommend`;
CREATE TABLE `jishigou_topic_recommend` (
`tid` int(10) unsigned NOT NULL default '0',
`item` char(15) NOT NULL,
`item_id` int(10) unsigned NOT NULL default '0',
`recd` tinyint(1) unsigned NOT NULL,
`display_order` smallint(6) unsigned NOT NULL default '0',
`expiration` int(10) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`tid`),
KEY `expiration` (`expiration`),
KEY `recd` (`recd`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_event_favorite`;
CREATE TABLE `jishigou_event_favorite` (
`id` int(10) unsigned NOT NULL auto_increment,
`type_id` mediumint(10) NOT NULL default '0',
`uid` mediumint(8) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `type_id` (`type_id`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_site`;
CREATE TABLE `jishigou_site` (
`id` int(10) unsigned NOT NULL auto_increment,
`host` char(50) NOT NULL,
`name` char(50) NOT NULL,
`description` char(255) NOT NULL,
`dateline` int(10) unsigned NOT NULL,
`url_count` int(10) unsigned NOT NULL,
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_force_out`;
CREATE TABLE `jishigou_force_out` (
`id` int(10) unsigned NOT NULL auto_increment,
`uid` int(10) unsigned NOT NULL default '0',
`role_id` tinyint(4) NOT NULL,
`douid` int(10) unsigned NOT NULL default '0',
`cause` char(100) NOT NULL default '',
`dateline` int(10) NOT NULL default '0',
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_sign_tag`;
CREATE TABLE `jishigou_sign_tag` (
`id` int(10) unsigned NOT NULL auto_increment,
`tag` text NOT NULL,
`credits` char(20) NOT NULL default '',
PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_qun_event`;
CREATE TABLE `jishigou_qun_event` (
`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
`qid` int(10) unsigned NOT NULL default '0',
`eid` int(10) NOT NULL default '0',
`recd` tinyint(1) NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `q_e_id` (`qid`,`eid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_qun_vote`;
CREATE TABLE `jishigou_qun_vote` (
`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
`qid` INT(10) UNSIGNED NOT NULL DEFAULT '0',
`vid` INT(10) NOT NULL DEFAULT '0',
`recd` TINYINT(1) NOT NULL DEFAULT '0',
PRIMARY KEY  (`id`),
KEY `q_vid` (`qid`,`vid`)
) ENGINE=MYISAM;

DROP TABLE IF EXISTS `jishigou_live`;
CREATE TABLE `jishigou_live` (
`lid` int(11) NOT NULL auto_increment,
`livename` varchar(60) NOT NULL,
`description` text NOT NULL,
`starttime` int(10) unsigned NOT NULL default '0',
`endtime` int(10) unsigned NOT NULL default '0',
`image` varchar(100) NOT NULL,
PRIMARY KEY  (`lid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_live`;
CREATE TABLE `jishigou_topic_live` (
`tid` int(10) unsigned NOT NULL default '0',
`item_id` int(10) unsigned NOT NULL default '0',
`uid` mediumint(8) unsigned NOT NULL,
PRIMARY KEY  (`tid`,`item_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_url`;
CREATE TABLE `jishigou_topic_url` (
`tid` int(10) unsigned NOT NULL,
`item_id` int(10) unsigned NOT NULL,
`uid` mediumint(8) unsigned NOT NULL,
PRIMARY KEY (`tid`,`item_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_item_user`;
CREATE TABLE `jishigou_item_user` (
`iid` int(11) NOT NULL auto_increment,
`item` varchar(10) NOT NULL,
`itemid` int(10) unsigned NOT NULL default '0',
`type` varchar(10) NOT NULL default '',
`uid` int(11) unsigned NOT NULL default '0',
`description` varchar(254) NOT NULL,
PRIMARY KEY  (`iid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_item_sms`;
CREATE TABLE `jishigou_item_sms` (
`sid` int(11) NOT NULL auto_increment,
`item` varchar(10) NOT NULL,
`itemid` int(10) unsigned NOT NULL default '0',
`uid` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`sid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_talk`;
CREATE TABLE `jishigou_talk` (
`lid` int(11) NOT NULL auto_increment,
`cat_id` int(11) unsigned NOT NULL,
`talkname` varchar(60) NOT NULL,
`description` text NOT NULL,
`starttime` int(10) unsigned NOT NULL default '0',
`endtime` int(10) unsigned NOT NULL default '0',
`image` varchar(100) NOT NULL,
PRIMARY KEY  (`lid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_talk_category`;
CREATE TABLE `jishigou_talk_category` (
`cat_id` smallint(6) unsigned NOT NULL auto_increment,
`cat_name` char(15) NOT NULL,
`talk_num` int(10) unsigned NOT NULL default '0',
`parent_id` smallint(6) unsigned NOT NULL default '0',
`display_order` smallint(6) unsigned NOT NULL default '0',
PRIMARY KEY  (`cat_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_talk`;
CREATE TABLE `jishigou_topic_talk` (
`tid` int(10) unsigned NOT NULL default '0',
`item_id` int(10) unsigned NOT NULL default '0',
`uid` mediumint(8) unsigned NOT NULL default '0',
`touid` mediumint(8) unsigned NOT NULL default '0',
`totid` int(10) unsigned NOT NULL default '0',
`istop` tinyint(1) unsigned NOT NULL default '0',
PRIMARY KEY  (`tid`,`item_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_topic_attach`;
CREATE TABLE `jishigou_topic_attach` (
`id` int(10) unsigned NOT NULL auto_increment,
`tid` int(10) NOT NULL default '0',
`site_url` char(255) NOT NULL default '',
`file` char(255) NOT NULL default '',
`name` char(255) NOT NULL default '',
`description` char(255) NOT NULL default '',
`filesize` int(10) unsigned NOT NULL default '0',
`filetype` varchar(10) NOT NULL default '',
`uid` mediumint(8) unsigned default '0',
`username` char(15) NOT NULL default '',
`dateline` int(10) unsigned NOT NULL default '0',
`file_url` char(255) NOT NULL default '',
`item` char(100) NOT NULL default '',
`itemid` int(10) unsigned NOT NULL default '0',
`download` int(10) unsigned NOT NULL default '0',
`score` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `tid` (`tid`),
KEY `uid` (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_validate_category`;
CREATE TABLE `jishigou_validate_category` (
`id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主类ID',
`category_id` int(10) NOT NULL DEFAULT '0' COMMENT '分类所属ID',
`category_name` char(20) NOT NULL,
`category_pic` char(200) NOT NULL,
`num` tinyint(4) NOT NULL DEFAULT '0',
`dateline` int(11) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=MyISAM;

REPLACE INTO `jishigou_validate_category` (`id`, `category_id`, `category_name`, `category_pic`, `num`, `dateline`) VALUES 
(1, 0, '个人', '', 0, 1322040871),
(2, 1, '站长', '', 0, 1322040878),
(3, 1, '其他', '', 0, 1324547052),
(4, 0, '企业', '', 0, 1324547052),
(5, 4, 'IT', '', 0, 1324547052),
(6, 4, '其他', '', 0, 1324547052);

DROP TABLE IF EXISTS `jishigou_validate_category_fields`;
CREATE TABLE `jishigou_validate_category_fields` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`uid` int(10) NOT NULL,
`category_fid` int(10) NOT NULL COMMENT '认证类别ID',
`category_id` int(10) NOT NULL COMMENT '认证类别子ID',
`province` char(20) NOT NULL,
`city` char(20) NOT NULL,
`validate_info` char(200) NOT NULL COMMENT '用户申请认证介绍',
`is_audit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否审核',
`audit_info` char(200) NOT NULL COMMENT '审核备注',
`order` int(10) NOT NULL,
`is_push` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐',
`dateline` int(10) NOT NULL,
PRIMARY KEY (`id`),
KEY `uid` (`uid`),
KEY `category_fid` (`category_fid`),
KEY `category_id` (`category_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_validate_extra`;
CREATE TABLE `jishigou_validate_extra` (
`id` int(10) NOT NULL,
`data` longtext NOT NULL
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_output`;
CREATE TABLE `jishigou_output` (
`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
`name` CHAR(100) NOT NULL,
`hash` CHAR(32) NOT NULL,
`lock_host` TEXT NOT NULL,
`per_page_num` INT(10) UNSIGNED NOT NULL DEFAULT '20',
`content_default` CHAR(100) NOT NULL,
`type_first` TINYINT(1) NOT NULL,
`open_times` INT(10) UNSIGNED NOT NULL,
`uid` MEDIUMINT(8) UNSIGNED NOT NULL,
`dateline` INT(10) UNSIGNED NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache`;
CREATE TABLE `jishigou_cache` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_1`;
CREATE TABLE `jishigou_cache_1` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_2`;
CREATE TABLE `jishigou_cache_2` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_3`;
CREATE TABLE `jishigou_cache_3` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_4`;
CREATE TABLE `jishigou_cache_4` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_5`;
CREATE TABLE `jishigou_cache_5` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_6`;
CREATE TABLE `jishigou_cache_6` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_7`;
CREATE TABLE `jishigou_cache_7` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_8`;
CREATE TABLE `jishigou_cache_8` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_9`;
CREATE TABLE `jishigou_cache_9` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_10`;
CREATE TABLE `jishigou_cache_10` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_11`;
CREATE TABLE `jishigou_cache_11` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_12`;
CREATE TABLE `jishigou_cache_12` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_13`;
CREATE TABLE `jishigou_cache_13` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_14`;
CREATE TABLE `jishigou_cache_14` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_cache_15`;
CREATE TABLE `jishigou_cache_15` (
`key` char(255) NOT NULL,
`val` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`key`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_log`;
CREATE TABLE `jishigou_log` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`uid` int(10) unsigned NOT NULL DEFAULT '0',
`username` char(15) NOT NULL,
`nickname` char(15) NOT NULL,
`role_action_id` int(10) unsigned NOT NULL DEFAULT '0',
`role_action_name` char(15) NOT NULL,
`mod` char(50) NOT NULL,
`code` char(255) NOT NULL DEFAULT '',
`ip` char(15) NOT NULL DEFAULT '',
`dateline` int(10) unsigned NOT NULL DEFAULT '0',
`request_method` enum('POST','GET') NOT NULL DEFAULT 'GET',
`data_length` int(10) unsigned NOT NULL,
`uri` char(255) NOT NULL,
PRIMARY KEY (`id`),
KEY `role_action_id` (`role_action_id`),
KEY `mod_code` (`mod`,`code`),
KEY `uid` (`uid`),
KEY `ip` (`ip`),
KEY `dateline` (`dateline`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `jishigou_log_data`;
CREATE TABLE `jishigou_log_data` (
`log_id` int(10) NOT NULL,
`user_agent` char(255) NOT NULL,
`log_data` longblob NOT NULL,
`dateline` int(10) unsigned NOT NULL,
PRIMARY KEY (`log_id`),
KEY `dateline` (`dateline`)
) ENGINE=MyISAM;
