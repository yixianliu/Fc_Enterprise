/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 小程序
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 对接小程序
 */
DROP TABLE IF EXISTS `#DB_PREFIX#WeChat`;
CREATE TABLE `#DB_PREFIX#WeChat` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` VARCHAR(85) NOT NULL COMMENT '用户ID',
  `title` VARCHAR(125) NOT NULL COMMENT '招聘ID',
  `content` TEXT NOT NULL COMMENT '内容',
  `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
  `created_at` integer NOT NULL DEFAULT '0',
  `updated_at` integer NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 用户扩展表
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 用户签到内容
 */
DROP TABLE IF EXISTS `#DB_PREFIX#User_Calendar`;
CREATE TABLE `#DB_PREFIX#User_Calendar` (
    `calendar_id` INT(11) NULL AUTO_INCREMENT,
    `user_id` VARCHAR(55) NOT NULL COMMENT '用户ID',
    `content` VARCHAR(255) NOT NULL COMMENT '签到内容',
    `is_using` SET('On', 'Off') NULL DEFAULT 'On' COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '签到时间',
    PRIMARY KEY (`calendar_id`),
    KEY `user_id` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 用户签到内容 - 月
 */
DROP TABLE IF EXISTS `#DB_PREFIX#User_Calendar_Month`;
CREATE TABLE `#DB_PREFIX#User_Calendar_Month` (
    `calendar_id` INT(11) NULL AUTO_INCREMENT,
    `user_id` VARCHAR(55) NOT NULL COMMENT '用户ID',
    `content` VARCHAR(255) NOT NULL COMMENT '签到内容',
    `is_using` SET('On', 'Off') NULL DEFAULT 'On' COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '签到时间',
    PRIMARY
    KEY (`calendar_id`),
    KEY `user_id` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 用户签到内容 - 年
 */
DROP TABLE IF EXISTS `#DB_PREFIX#User_Calendar_Year`;
CREATE TABLE `#DB_PREFIX#User_Calendar_Year` (
    `calendar_id` INT(11) NULL AUTO_INCREMENT,
    `user_id` VARCHAR(55) NOT NULL COMMENT '用户ID',
    `content` VARCHAR(255) NOT NULL COMMENT '签到内容',
    `is_using` SET('On', 'Off') NULL DEFAULT 'On' COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '签到时间',
    PRIMARY
    KEY (`calendar_id`),
    KEY `user_id` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
* 用户设置
*/
DROP TABLE IF EXISTS `#DB_PREFIX#User_Config`;
CREATE TABLE `#DB_PREFIX#User_Config` (
    `conf_id` INT(11) NULL AUTO_INCREMENT,
    `user_id` VARCHAR(55) NOT NULL COMMENT '用户ID',
    `get_praise` SET('On', 'Off') NOT NULL COMMENT '接收 "赞" 提醒',
    `get_comment` SET('On', 'Off') NOT NULL COMMENT '接收 "评论" 提醒',
    `is_access` SET('On', 'Off') NOT NULL COMMENT '是否开启访问',
    `is_show_phone` SET('On', 'Off') NOT NULL COMMENT '是否开启显示手机',
    `is_show_sex` SET('On', 'Off') NOT NULL COMMENT '是否开启显示性别',
    `is_show_address` SET('On', 'Off') NOT NULL COMMENT '是否开启显示通讯地址',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`conf_id`),
    UNIQUE KEY `user_id` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 用户计划
 */
DROP TABLE IF EXISTS `#DB_PREFIX#User_Plan`;
CREATE TABLE `#DB_PREFIX#User_Plan` (
    `plan_id` INT(11) NULL AUTO_INCREMENT,
    `user_id` VARCHAR(55) NOT NULL COMMENT '用户ID',
    `plan_time` INT(4) UNSIGNED NOT NULL COMMENT '计划时间,7天,14天,21天',
    `start_time` INT(8) UNSIGNED NOT NULL COMMENT '计划开始时间',
    `end_time` INT(8) UNSIGNED NOT NULL COMMENT '计划结束时间',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`plan_id`),
    UNIQUE KEY `user_id` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 资源表
 * Author:  Yxl <zccem@163.com>
 * Created: 2016-3-15
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 影视资源
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Video`;
CREATE TABLE `#DB_PREFIX#Video` (
    `video_id` INT(11) NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类关键KEY',
    `p_key` VARCHAR(55) NOT NULL COMMENT '资源路径关键KEY',
    `name` VARCHAR(125) NOT NULL COMMENT '视频资源名称',
    `filename` VARCHAR(125) NOT NULL COMMENT '资源文件名',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `size` VARCHAR(55) NOT NULL COMMENT '资源大小',
    `img` VARCHAR(125) NOT NULL COMMENT '资源图片',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `is_thumbnail` SET('On', 'Off') NOT NULL default 'Off' COMMENT '是否生成缩略图',
    `views` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '浏览次数',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY KEY (`video_id`),
    KEY `c_key` (`c_key`),
    KEY `p_key` (`p_key`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 视频资源分类
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Video_Classify`;
CREATE TABLE `#DB_PREFIX#Video_Classify` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `c_key` VARCHAR(85) NOT NULL COMMENT '分类关键KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序ID',
    `r_key` VARCHAR(85) NOT NULL COMMENT '分类角色关键KEY',
    `name` VARCHAR(125) NOT NULL COMMENT '名称',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `parent_id` VARCHAR(85) NOT NULL COMMENT '父类ID',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`id`),
    KEY `r_key` (`r_key`),
    UNIQUE KEY `c_key` (`c_key`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 音乐资源
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Music`;
CREATE TABLE `#DB_PREFIX#Music` (
    `music_id` INT(11) NULL AUTO_INCREMENT,
    `c_key` VARCHAR(85) NOT NULL COMMENT '分类关键KEY',
    `r_key` VARCHAR(85) NOT NULL COMMENT '分类角色关键KEY',
    `name` VARCHAR(125) NOT NULL COMMENT '歌曲名称',
    `path` VARCHAR(255) NOT NULL COMMENT '路径',
    `lyric` TEXT NOT NULL COMMENT '歌词',
    `size` VARCHAR(55) NOT NULL COMMENT '大小',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY KEY (`music_id`),
    KEY `r_key` (`r_key`),
    UNIQUE KEY `c_key` (`c_key`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 音乐资源分类
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Music_Classify`;
CREATE TABLE `#DB_PREFIX#Music_Classify` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类关键KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序ID',
    `r_key` VARCHAR(55) NOT NULL COMMENT '分类角色关键KEY',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `parent_id` VARCHAR(55) NOT NULL COMMENT '父类ID',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY KEY (`id`),
    KEY `r_key` (`r_key`),
    UNIQUE KEY `c_key` (`c_key`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 文档资源
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Document`;
CREATE TABLE `#DB_PREFIX#Document` (
    `document_id` INT(11) NULL AUTO_INCREMENT,
    `c_key` VARCHAR(85) NOT NULL COMMENT '文档资源分类KEY',
    `r_key` VARCHAR(85) NOT NULL COMMENT '分类角色关键KEY',
    `name` VARCHAR(85) NOT NULL COMMENT '书籍名称',
    `path` VARCHAR(255) NOT NULL COMMENT '路径',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `size` VARCHAR(55) NOT NULL COMMENT '大小',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`document_id`),
    KEY `r_key` (`r_key`),
    UNIQUE KEY `c_key` (`c_key`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 文档资源分类
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Document_Classify`;
CREATE TABLE `#DB_PREFIX#Document_Classify` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类关键KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序ID',
    `r_key` VARCHAR(55) NOT NULL COMMENT '分类角色关键KEY',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `parent_id` VARCHAR(55) NOT NULL COMMENT '父类ID',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY KEY (`id`),
    KEY `r_key` (`r_key`),
    UNIQUE KEY `c_key` (`c_key`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 文档资源设置
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Document_Conf`;
CREATE TABLE `#DB_PREFIX#Document_Conf` (
    `conf_id` INT(11) NULL AUTO_INCREMENT,
    `p_key` VARCHAR(55) NOT NULL COMMENT '资源路径KEY',
    `r_key` VARCHAR(55) NOT NULL COMMENT '分类角色关键KEY',
    `path` VARCHAR(255) NOT NULL COMMENT '文档资源完整路径',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`conf_id`),
    KEY `r_key` (`r_key`),
    UNIQUE `path` (`path`),
    UNIQUE KEY `p_key` (`p_key`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 电影分类
 */
INSERT INTO `#DB_PREFIX#Video_Classify`
VALUES
(NULL, 'C1', 1, 'R15', '喜剧', NULL, 'C0', 'On', #TIME#),
(NULL, 'C2', 2, 'R15', '科幻', NULL, 'C0', 'On', #TIME#),
(NULL, 'C3', 3, 'R15', '悬疑', NULL, 'C0', 'On', #TIME#),
(NULL, 'C4', 4, 'R15', '文艺', NULL, 'C0', 'On', #TIME#),
(NULL, 'C5', 5, 'R15', '武侠', NULL, 'C0', 'On', #TIME#),
(NULL, 'C6', 6, 'R15', '动画', NULL, 'C0', 'On', #TIME#),
(NULL, 'C7', 7, 'R15', '爱情', NULL, 'C0', 'On', #TIME#);

/**
 * 音乐分类
 */
INSERT INTO `#DB_PREFIX#Music_Classify`
VALUES
(NULL, 'C1', 1, 'R15', '电子', NULL, 'C0', 'On', #TIME#),
(NULL, 'C2', 2, 'R15', '怀旧', NULL, 'C0', 'On', #TIME#),
(NULL, 'C3', 3, 'R15', '流行', NULL, 'C0', 'On', #TIME#),
(NULL, 'C4', 4, 'R15', '摇滚', NULL, 'C0', 'On', #TIME#),
(NULL, 'C5', 5, 'R15', '古典', NULL, 'C0', 'On', #TIME#),
(NULL, 'C6', 6, 'R15', '粤语', NULL, 'C0', 'On', #TIME#);

/**
 * 文档分类
 */
INSERT INTO `#DB_PREFIX#Document_Classify`
VALUES
(NULL, 'C1', 1, 'R15', '科技', NULL, 'C0', 'On', #TIME#),
(NULL, 'C2', 2, 'R15', '生活', NULL, 'C0', 'On', #TIME#),
(NULL, 'C3', 3, 'R15', '人文社科', NULL, 'C0', 'On', #TIME#),
(NULL, 'C4', 4, 'R15', '编程开发', NULL, 'C0', 'On', #TIME#);

/**
 * 版块
 */
INSERT INTO `#DB_PREFIX#Section`
VALUES
(NULL, 'S1', 1, '自律人生', NULL, NULL, NULL, 'S0', 'On', 'On', 'On', #TIME#, #TIME#),
(NULL, 'S2', 2, '励志牛人', NULL, NULL, NULL, 'S0', 'On', 'On', 'On', #TIME#, #TIME#),
(NULL, 'S3', 3, '大杂烩', NULL, NULL, NULL, 'S0', 'On', 'On', 'On', #TIME#, #TIME#),
(NULL, 'S4', 4, '音乐', NULL, NULL, NULL, 'S0', 'On', 'On', 'On', #TIME#, #TIME#),
(NULL, 'S5', 5, '视频', NULL, NULL, NULL, 'S0', 'On', 'On', 'On', #TIME#, #TIME#);

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 写入数据
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 菜单
 */
INSERT INTO `#DB_PREFIX#Menu`
VALUES

/*
    驯力文化
*/
(NULL, 'H1', 1, 'M0', 'admin', NULL, NULL, '驯力文化', NULL, 'On', #TIME#, #TIME#),

(NULL, 'HN1', 1, 'H1', 'guest', NULL, NULL, '文化中心', NULL, 'On', #TIME#, #TIME#),
(NULL, 'HN2', 2, 'H1', 'admin', NULL, NULL, '记录中心', NULL, 'On', #TIME#, #TIME#),
(NULL, 'HN3', 3, 'H1', 'admin', NULL, NULL, '统计中心', NULL, 'On', #TIME#, #TIME#),
(NULL, 'HN4', 4, 'H1', 'admin', NULL, NULL, '文档资源', NULL, 'On', #TIME#, #TIME#),
(NULL, 'HN5', 5, 'H1', 'admin', NULL, NULL, '视频资源', NULL, 'On', #TIME#, #TIME#),
(NULL, 'HN6', 6, 'H1', 'guest', NULL, NULL, '神推荐', NULL, 'On', #TIME#, #TIME#),
(NULL, 'HN7', 7, 'H1', 'admin', NULL, NULL, '驯力文化', NULL, 'On', #TIME#, #TIME#),

(NULL, 'HNC1', 1, 'HN6', 'admin', NULL, NULL, '最强人气', NULL, 'On', #TIME#, #TIME#),
(NULL, 'HNC2', 2, 'HN6', 'admin', NULL, NULL, '精选资源', NULL, 'On', #TIME#, #TIME#),
(NULL, 'HNC3', 3, 'HN6', 'admin', NULL, NULL, '土豪的世界', NULL, 'On', #TIME#, #TIME#);