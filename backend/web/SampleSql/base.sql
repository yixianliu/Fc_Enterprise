
/**
 * * * * * * * * * * * * * * * * * * * * * *
 * 基本表
 * Author:  Yxl <zccem@163.com>
 * Created: 2016-3-15
 * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 广告
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Ad`;
CREATE TABLE `#DB_PREFIX#Ad` (
    `ad_id` INT(11) NULL AUTO_INCREMENT,
    `location` VARCHAR(55) NOT NULL COMMENT '广告位置',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序ID',
    `weight` INT(11) UNSIGNED NOT NULL COMMENT '权重',
    `size` VARCHAR(55) NOT NULL COMMENT '广告形状大小',
    `url` VARCHAR(55) NOT NULL COMMENT '链接地址',
    `is_audit` SET('On', 'Off') NOT NULL COMMENT '审核',
    `start_time` INT(11) UNSIGNED NOT NULL COMMENT '开始时间',
    `end_time` INT(11) UNSIGNED NOT NULL COMMENT '结束时间',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`ad_id`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 友情链接
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Friend_Link`;
CREATE TABLE `#DB_PREFIX#Friend_Link` (
    `link_id` INT(11) NULL AUTO_INCREMENT,
    `title` VARCHAR(80) NULL COMMENT '标题',
    `content` VARCHAR(255) NULL COMMENT '介绍',
    `author` VARCHAR(55) NULL COMMENT '联系人',
    `img` VARCHAR(80) NULL COMMENT '图片地址',
    `url` VARCHAR(80) NULL COMMENT '链接地址',
    `is_status` SET('On', 'Off') NOT NULL COMMENT '友情链接状态',
    `is_audit` SET('On', 'Off') NOT NULL COMMENT '审核',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`link_id`),
    UNIQUE KEY `url` (`url`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 网站公告
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Announce`;
CREATE TABLE `#DB_PREFIX#Announce` (
    `announce_id` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(55) NOT NULL COMMENT '标题',
    `content` VARCHAR(80) NOT NULL COMMENT '内容',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`announce_id`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 管理员(包括审核,后台管理)
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Management`;
CREATE TABLE `#DB_PREFIX#Management` (
    `admin_id` INT(11) NULL AUTO_INCREMENT,
    `username` VARCHAR(85) NOT NULL COMMENT '账号',
    `password` VARCHAR(255) NOT NULL COMMENT '密码',
    `area` VARCHAR(125) NULL COMMENT '当前登录地区',
    `login_time` INT(11) UNSIGNED NOT NULL COMMENT '登陆时间',
    `last_login_time` INT(11) UNSIGNED NOT NULL COMMENT '最后登陆时间',
    `login_ip` VARCHAR(55) COMMENT '登陆IP',
    `token` INT(11) UNSIGNED NOT NULL COMMENT '权限ID',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `remember_token` VARCHAR(55) NULL COMMENT '保存密码TOKEN',
    PRIMARY
    KEY (`admin_id`),
    UNIQUE KEY `username` (`username`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 版块
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Section`;
CREATE TABLE `#DB_PREFIX#Section` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `s_key` VARCHAR(55) NOT NULL COMMENT '版块关键KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序ID',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` TEXT NULL COMMENT '描述',
    `keywords` VARCHAR(55) NULL COMMENT '关键字',
    `ico_class` VARCHAR(55) NOT NULL COMMENT '样式',
    `parent_key` VARCHAR(55) NOT NULL COMMENT '父类KEY',
    `is_ad` SET('On', 'Off') NOT NULL COMMENT '是否开启广告',
    `is_post` SET('On', 'Off') NOT NULL COMMENT '发布帖子',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`id`),
    UNIQUE `name` (`name`),
    UNIQUE KEY `s_key` (`s_key`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 配置
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Conf`;
CREATE TABLE `#DB_PREFIX#Conf` (
    `conf_id` INT(11) NULL AUTO_INCREMENT,
    `ckey` VARCHAR(80) NOT NULL COMMENT '配置关键字KEY',
    `name` VARCHAR(80) NOT NULL COMMENT '名称',
    `parameter` VARCHAR(255) NOT NULL COMMENT '值 / 参数',
    `description` VARCHAR(255) NULL COMMENT '描述',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否可用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`conf_id`),
    UNIQUE KEY `ckey` (`ckey`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 用户
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 用户信息
 */
DROP TABLE IF EXISTS `#DB_PREFIX#User`;
CREATE TABLE `#DB_PREFIX#User` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `user_id` VARCHAR(55) NOT NULL COMMENT '用户ID',
    `username` VARCHAR(80) NOT NULL COMMENT '邮箱 / 用户名',
    `password` VARCHAR(255) NOT NULL COMMENT '密码',
    `rkey` VARCHAR(55) NOT NULL COMMENT '角色关键KEY',
    `exp` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '经验值',
    `credit` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '积分',
    `nickname` VARCHAR(55) NULL DEFAULT NULL COMMENT '昵称',
    `signature` VARCHAR(80) NULL DEFAULT NULL COMMENT '个性签名',
    `telphone` VARCHAR(55) NULL DEFAULT NULL COMMENT '手机号码',
    `birthday` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '出生年月日',
    `answer` VARCHAR(55) NULL DEFAULT NULL COMMENT '用户答案',
    `skey` VARCHAR(55) NULL DEFAULT NULL COMMENT '用户问题',
    `reg_time` INT(11) UNSIGNED NOT NULL COMMENT '注册时间',
    `last_login_time` INT(11) UNSIGNED NOT NULL COMMENT '最后登陆时间',
    `login_ip` VARCHAR(85) NULL DEFAULT 0 COMMENT '登陆IP',
    `consecutively` INT(11) UNSIGNED NOT NULL COMMENT '连续登录',
    `sex` SET('Male' , 'Female') NOT NULL DEFAULT 'Female' COMMENT '性别',
    `is_display` SET('On', 'Off') NOT NULL DEFAULT 'Off' COMMENT '显示信息',
    `is_head` SET('On', 'Off') NOT NULL DEFAULT 'Off' COMMENT '上传头像',
    `is_security` SET('On', 'Off') NOT NULL DEFAULT 'Off' COMMENT '安全设置',
    `is_using` SET('On', 'Off', 'Not') NOT NULL DEFAULT 'Off' COMMENT '是否可用',
    `grade` INT(11) UNSIGNED NOT NULL COMMENT '星级评分1-15, 工作人员审核评分',
    PRIMARY
    KEY `id` (`id`),
    UNIQUE KEY (`user_id`),
    KEY `rkey` (`rkey`),
    UNIQUE `nickname` (`nickname`),
    UNIQUE `signature` (`signature`),
    UNIQUE KEY `username` (`username`)
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
 * 用户安全问题
 */
DROP TABLE IF EXISTS `#DB_PREFIX#User_Problems`;
CREATE TABLE `#DB_PREFIX#User_Problems` (
    `security_id` INT(11) NULL AUTO_INCREMENT,
    `skey` VARCHAR(55) NOT NULL COMMENT '安全问题KEY',
    `name` VARCHAR(85) NOT NULL COMMENT '问题',
    `is_using` SET('On', 'Off') NULL DEFAULT 'On' COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`security_id`),
    UNIQUE KEY `skey` (`skey`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

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
    PRIMARY
    KEY (`calendar_id`),
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
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 权限 / 角色
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 关联 / 角色 + 权限
 */
DROP TABLE IF EXISTS `#DB_PREFIX#User_Related_rp`;
CREATE TABLE `#DB_PREFIX#User_Related_rp` (
    `rp_id` int(11) NULL AUTO_INCREMENT,
    `r_key` VARCHAR(85) NOT NULL COMMENT '角色关键值',
    `p_key` VARCHAR(85) NOT NULL COMMENT '权限关键值',
    PRIMARY
    KEY (`rp_id`),
    KEY `r_key` (`r_key`),
    KEY `p_key` (`p_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * 权限
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Power`;
CREATE TABLE `#DB_PREFIX#Power` (
    `power_id` INT(11) NULL AUTO_INCREMENT,
    `pkey` VARCHAR(85) NOT NULL COMMENT '权限关键KEY',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` VARCHAR(125) NULL COMMENT '描述',
    `path` VARCHAR(85) NOT NULL COMMENT '目录',
    `class` VARCHAR(55) NOT NULL COMMENT '类',
    `fun` VARCHAR(55) NOT NULL COMMENT '函数',
    `group` VARCHAR(55) NULL COMMENT '分组',
    `effective` SET('On', 'Off') NOT NULL COMMENT '是否有效 / 经过程序判断,该权限是否有对应的类和函数',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`power_id`),
    UNIQUE KEY `pkey` (`pkey`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 角色
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Role`;
CREATE TABLE `#DB_PREFIX#Role` (
    `role_id` INT(11) NULL AUTO_INCREMENT,
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序ID',
    `rkey` VARCHAR(55) NOT NULL COMMENT '权限关键KEY',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `exp` INT(11) UNSIGNED NOT NULL COMMENT '经验值',
    `description` VARCHAR(255) NOT NULL COMMENT '角色描述',
    `ico_class` VARCHAR(125) NULL COMMENT '角色图标样式',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`role_id`),
    KEY `rkey` (`rkey`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * * * * * * * * * * * * * * * * * * * * * *
 * 菜单
 * * * * * * * * * * * * * * * * * * * * * *
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Menu`;
CREATE TABLE `#DB_PREFIX#Menu` (
    `menu_id` INT(11) NULL AUTO_INCREMENT,
    `mkey` VARCHAR(55) NOT NULL COMMENT '菜单值',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序ID',
    `parent_id` VARCHAR(55) NULL COMMENT '父类值',
    `rkey` VARCHAR(55) NOT NULL COMMENT '菜单角色关键KEY',
    `name` VARCHAR(85) NOT NULL COMMENT '菜单名称',
    `title` VARCHAR(125) NOT NULL COMMENT '菜单标题',
    `ico_class` VARCHAR(85) NULL COMMENT '图标样式',
    `url` VARCHAR(85) NULL COMMENT '菜单链接地址',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`menu_id`),
    KEY `rkey` (`rkey`),
    UNIQUE KEY `mkey` (`mkey`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * * * * * * * * * * * * * * * * * * * * * *
 * 资源表
 * Author:  Yxl <zccem@163.com>
 * Created: 2016-3-15
 * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 影视资源
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Video`;
CREATE TABLE `#DB_PREFIX#Video` (
    `video_id` INT(11) NULL AUTO_INCREMENT,
    `ckey` VARCHAR(55) NOT NULL COMMENT '分类关键KEY',
    `rkey` VARCHAR(55) NOT NULL COMMENT '角色关键KEY',
    `name` VARCHAR(125) NOT NULL COMMENT '视频资源名称',
    `pkey` VARCHAR(55) NOT NULL COMMENT '资源路径关键KEY',
    `filename` VARCHAR(125) NOT NULL COMMENT '资源文件名',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `size` VARCHAR(55) NOT NULL COMMENT '资源大小',
    `img` VARCHAR(55) NOT NULL COMMENT '资源图片',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `is_thumbnail` SET('On', 'Off') NOT NULL default 'Off' COMMENT '是否生成缩略图',
    `views` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '浏览次数',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`video_id`),
    KEY `rkey` (`rkey`),
    KEY `ckey` (`ckey`),
    KEY `pkey` (`pkey`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 视频资源分类
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Video_Classify`;
CREATE TABLE `#DB_PREFIX#Video_Classify` (
    `video_id` INT(11) NULL AUTO_INCREMENT,
    `ckey` VARCHAR(85) NOT NULL COMMENT '分类关键KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序ID',
    `rkey` VARCHAR(85) NOT NULL COMMENT '分类角色关键KEY',
    `name` VARCHAR(125) NOT NULL COMMENT '名称',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `parent_id` VARCHAR(85) NOT NULL COMMENT '父类ID',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`video_id`),
    KEY `rkey` (`rkey`),
    UNIQUE KEY `ckey` (`ckey`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 视频资源设置
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Video_Conf`;
CREATE TABLE `#DB_PREFIX#Video_Conf` (
    `conf_id` INT(11) NULL AUTO_INCREMENT,
    `pkey` VARCHAR(55) NOT NULL COMMENT '资源路径KEY',
    `rkey` VARCHAR(85) NOT NULL COMMENT '资源路径角色权限KEY',
    `path` VARCHAR(255) NOT NULL COMMENT '视频资源完整路径',
    `servername` VARCHAR(255) NOT NULL COMMENT '虚拟路径',
    `port` VARCHAR(255) NOT NULL COMMENT '虚拟路径的访问端口',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`conf_id`),
    UNIQUE `path` (`path`),
    UNIQUE `servername` (`servername`),
    UNIQUE `port` (`port`),
    UNIQUE KEY `pkey` (`pkey`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 音乐资源
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Music`;
CREATE TABLE `#DB_PREFIX#Music` (
    `music_id` INT(11) NULL AUTO_INCREMENT,
    `ckey` VARCHAR(85) NOT NULL COMMENT '分类关键KEY',
    `rkey` VARCHAR(85) NOT NULL COMMENT '分类角色关键KEY',
    `name` VARCHAR(125) NOT NULL COMMENT '歌曲名称',
    `path` VARCHAR(255) NOT NULL COMMENT '路径',
    `lyric` TEXT NOT NULL COMMENT '歌词',
    `size` VARCHAR(55) NOT NULL COMMENT '大小',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`music_id`),
    KEY `rkey` (`rkey`),
    UNIQUE KEY `ckey` (`ckey`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 音乐资源分类
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Music_Classify`;
CREATE TABLE `#DB_PREFIX#Music_Classify` (
    `classify_id` INT(11) NULL AUTO_INCREMENT,
    `ckey` VARCHAR(80) NOT NULL COMMENT '分类关键KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序ID',
    `rkey` VARCHAR(55) NOT NULL COMMENT '分类角色关键KEY',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `parent_id` VARCHAR(55) NOT NULL COMMENT '父类ID',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`classify_id`),
    KEY `rkey` (`rkey`),
    UNIQUE KEY `ckey` (`ckey`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 音乐资源设置
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Music_Conf`;
CREATE TABLE `#DB_PREFIX#Music_Conf` (
    `conf_id` INT(11) NULL AUTO_INCREMENT,
    `pkey` VARCHAR(85) NOT NULL COMMENT '资源路径KEY',
    `path` VARCHAR(255) NOT NULL COMMENT '音乐资源完整路径',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`conf_id`),
    UNIQUE KEY `pkey` (`pkey`),
    UNIQUE `path` (`path`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 文档资源
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Document`;
CREATE TABLE `#DB_PREFIX#Document` (
    `document_id` INT(11) NULL AUTO_INCREMENT,
    `ckey` VARCHAR(85) NOT NULL COMMENT '文档资源分类KEY',
    `rkey` VARCHAR(85) NOT NULL COMMENT '分类角色关键KEY',
    `name` VARCHAR(85) NOT NULL COMMENT '书籍名称',
    `path` VARCHAR(255) NOT NULL COMMENT '路径',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `size` VARCHAR(55) NOT NULL COMMENT '大小',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`document_id`),
    KEY `rkey` (`rkey`),
    UNIQUE KEY `ckey` (`ckey`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 文档资源分类
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Document_Classify`;
CREATE TABLE `#DB_PREFIX#Document_Classify` (
    `classify_id` INT(11) NULL AUTO_INCREMENT,
    `ckey` VARCHAR(55) NOT NULL COMMENT '分类关键KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序ID',
    `rkey` VARCHAR(55) NOT NULL COMMENT '分类角色关键KEY',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `parent_id` VARCHAR(55) NOT NULL COMMENT '父类ID',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`classify_id`),
    KEY `rkey` (`rkey`),
    UNIQUE KEY `ckey` (`ckey`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 文档资源设置
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Document_Conf`;
CREATE TABLE `#DB_PREFIX#Document_Conf` (
    `conf_id` INT(11) NULL AUTO_INCREMENT,
    `pkey` VARCHAR(55) NOT NULL COMMENT '资源路径KEY',
    `rkey` VARCHAR(55) NOT NULL COMMENT '分类角色关键KEY',
    `path` VARCHAR(255) NOT NULL COMMENT '文档资源完整路径',
    `description` VARCHAR(255) NOT NULL COMMENT '描述',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`conf_id`),
    KEY `rkey` (`rkey`),
    UNIQUE `path` (`path`),
    UNIQUE KEY `pkey` (`pkey`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;