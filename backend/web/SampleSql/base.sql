/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 权限 / 角色
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `#DB_PREFIX#Rules`;
DROP TABLE IF EXISTS `#DB_PREFIX#Item_related`;
DROP TABLE IF EXISTS `#DB_PREFIX#ItemRp`;

/**
 * 规则,规则类名
 */
CREATE TABLE `#DB_PREFIX#Rules` (
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `data` VARCHAR(255) NULL COMMENT '路径规则',
    `description` TEXT NULL COMMENT '描述',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` INT(11) UNSIGNED NOT NULL,
    `updated_at` INT(11) UNSIGNED NOT NULL,
    PRIMARY KEY (`name`),
    UNIQUE KEY `data` (`data`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * (角色 + 权限)混搭
 */
CREATE TABLE `#DB_PREFIX#ItemRp` (
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `type` INT(11) UNSIGNED NULL COMMENT 'type字段区别，1为Role，2为Permission',
    `rule_name` VARCHAR(65) NULL COMMENT '规则名称',
    `data` TEXT NULL COMMENT '内容',
    `description` VARCHAR(255) NOT NULL COMMENT '角色描述',
    `created_at` INT(11) UNSIGNED NOT NULL,
    `updated_at` INT(11) UNSIGNED NOT NULL,
    PRIMARY KEY (`name`),
    KEY `type` (`type`),
    CONSTRAINT `#DB_PREFIX#ItemRp` FOREIGN KEY (`rule_name`) REFERENCES `#DB_PREFIX#Rules` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 关联(角色 + 权限)
 */
CREATE TABLE `#DB_PREFIX#Item_related` (
    `parent` VARCHAR(85) NOT NULL COMMENT '角色关键值',
    `child` VARCHAR(85) NOT NULL COMMENT '权限关键值',
    primary key (`parent`, `child`),
    foreign key (`parent`) references `#DB_PREFIX#ItemRp` (`name`) on delete cascade on update cascade,
    foreign key (`child`) references `#DB_PREFIX#ItemRp` (`name`) on delete cascade on update cascade
) ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

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
 * 管理员(包括审核,后台管理),这里的user_id是匹配yii2的rbac表
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Management`;
CREATE TABLE `#DB_PREFIX#Management` (
    `user_id` INT(11) NULL AUTO_INCREMENT,
    `username` VARCHAR(85) NOT NULL COMMENT '账号',
    `password` VARCHAR(255) NOT NULL COMMENT '密码',
    `r_key` VARCHAR(55) NOT NULL COMMENT '角色关键KEY',
    `area` VARCHAR(125) NULL COMMENT '当前登录地区',
    `login_ip` VARCHAR(55) COMMENT '登陆IP',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` INT(11) UNSIGNED NOT NULL,
    `updated_at` INT(11) UNSIGNED NOT NULL,
    `remember_token` VARCHAR(55) NULL COMMENT '保存密码TOKEN',
    PRIMARY KEY (`user_id`),
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
    `keywords` VARCHAR(155) NOT NULL COMMENT '关键字',
    `ico_class` VARCHAR(55) NULL COMMENT '样式',
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
    `c_key` VARCHAR(55) NOT NULL COMMENT '配置关键字KEY',
    `name` VARCHAR(80) NOT NULL COMMENT '名称',
    `parameter` VARCHAR(255) NOT NULL COMMENT '值 / 参数',
    `description` TEXT NULL COMMENT '描述',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否可用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`conf_id`),
    UNIQUE KEY `c_key` (`c_key`),
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
    `r_key` VARCHAR(55) NOT NULL COMMENT '角色关键KEY',
    `exp` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '经验值',
    `credit` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '积分',
    `nickname` VARCHAR(55) NULL DEFAULT NULL COMMENT '昵称',
    `signature` VARCHAR(80) NULL DEFAULT NULL COMMENT '个性签名',
    `telphone` VARCHAR(55) NULL DEFAULT NULL COMMENT '手机号码',
    `birthday` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '出生年月日',
    `answer` VARCHAR(55) NULL DEFAULT NULL COMMENT '用户答案',
    `s_key` VARCHAR(55) NULL DEFAULT NULL COMMENT '用户问题',
    `login_ip` VARCHAR(85) NULL DEFAULT 0 COMMENT '登陆IP',
    `consecutively` INT(11) UNSIGNED NOT NULL COMMENT '连续登录',
    `sex` SET('Male' , 'Female') NOT NULL DEFAULT 'Female' COMMENT '性别',
    `is_display` SET('On', 'Off') NOT NULL DEFAULT 'Off' COMMENT '显示信息',
    `is_head` SET('On', 'Off') NOT NULL DEFAULT 'Off' COMMENT '上传头像',
    `is_security` SET('On', 'Off') NOT NULL DEFAULT 'Off' COMMENT '安全设置',
    `is_using` SET('On', 'Off', 'Not') NOT NULL DEFAULT 'Off' COMMENT '是否可用',
    `created_at` INT(11) UNSIGNED NOT NULL,
    `updated_at` INT(11) UNSIGNED NOT NULL,
    PRIMARY
    KEY `id` (`id`),
    UNIQUE KEY (`user_id`),
    KEY `r_key` (`r_key`),
    UNIQUE `nickname` (`nickname`),
    UNIQUE KEY `username` (`username`),
    foreign key (`r_key`) references `#DB_PREFIX#ItemRp` (`name`) on delete cascade on update cascade
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
 * 菜单
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Menu`;
CREATE TABLE `#DB_PREFIX#Menu` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `m_key` VARCHAR(55) NOT NULL COMMENT '菜单关键KEY值',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序ID',
    `parent_id` VARCHAR(55) NULL COMMENT '父类值',
    `r_key` VARCHAR(55) NOT NULL COMMENT '菜单角色关键KEY',
    `name` VARCHAR(85) NOT NULL COMMENT '菜单名称',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`id`),
    KEY `r_key` (`r_key`),
    UNIQUE KEY `m_key` (`m_key`)
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
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类关键KEY',
    `r_key` VARCHAR(55) NOT NULL COMMENT '角色关键KEY',
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
    PRIMARY
    KEY (`video_id`),
    KEY `r_key` (`r_key`),
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
    PRIMARY
    KEY (`music_id`),
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
    PRIMARY
    KEY (`id`),
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
    PRIMARY
    KEY (`id`),
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
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 产品中心
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Product`;
CREATE TABLE `#DB_PREFIX#Product` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `product_id` VARCHAR(85) NOT NULL COMMENT '产品编号,唯一识别码',
    `user_id` VARCHAR(55) NOT NULL COMMENT '用户ID',
    `l_key` VARCHAR(55) NOT NULL COMMENT '等级KEY',
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `s_key` VARCHAR(55) NOT NULL COMMENT '版块KEY,版块默认为S0,意思是没有分配好相关版块.',
    `title` VARCHAR(125) NOT NULL COMMENT '标题',
    `content` TEXT NOT NULL COMMENT '内容',
    `price` INT(11) UNSIGNED NOT NULL COMMENT '一口价',
    `discount` INT(11) UNSIGNED NULL COMMENT '折扣价',
    `introduction` VARCHAR(255) NULL COMMENT '导读,获取产品介绍第一段.',
    `keywords` VARCHAR(120) NULL COMMENT '关键字',
    `path` VARCHAR(55) NULL COMMENT '产品文件路径',
    `praise` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '赞数量',
    `forward` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '转发数量',
    `collection` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '收藏数量',
    `share` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '分享数量',
    `attention` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '关注数量',
    `is_promote` SET('On', 'Off') NOT NULL COMMENT '推广',
    `is_hot` SET('On', 'Off') NOT NULL COMMENT '热门',
    `is_classic` SET('On', 'Off') NOT NULL COMMENT '经典',
    `is_winnow` SET('On', 'Off') NOT NULL COMMENT '精选',
    `is_recommend` SET('On', 'Off') NOT NULL COMMENT '推荐',
    `is_audit` SET('On', 'Off', 'Out', 'Not') NOT NULL COMMENT '审核',
    `is_field` SET('On', 'Off') NOT NULL COMMENT '是否生成字段JSON文件,没有生成的话,产品异常!',
    `is_comments` SET('On', 'Off') NOT NULL COMMENT '是否启用评论',
    `is_img` SET('On', 'Off') NOT NULL COMMENT '是否上传图片',
    `is_thumb` SET('On', 'Off') NOT NULL COMMENT '是否生成缩略图,发布产品可以上传图片,但最后审核通过了,才会生成缩略图',
    `grade` INT(6) UNSIGNED NOT NULL COMMENT '本站评分,由我们网站人员进行评估.',
    `user_grade` INT(6) UNSIGNED NOT NULL COMMENT '用户评分,由本站用户进行评估.',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`id`),
    UNIQUE KEY `product_id` (`product_id`),
    UNIQUE `title` (`title`),
    KEY `user_id` (`user_id`),
    KEY `c_key` (`c_key`),
    KEY `s_key` (`s_key`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * 产品分类(产品属于那种类型,例如电子产品,服装产品,这里的分类是根据版块ID来分类的)
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Product_Classify`;
CREATE TABLE `#DB_PREFIX#Product_Classify` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序',
    `r_key` VARCHAR(55) NOT NULL COMMENT '角色关键KEY',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` TEXT NULL COMMENT '描述',
    `keywords` VARCHAR(155) NOT NULL COMMENT '关键字',
    `ico_class` VARCHAR(55) NULL COMMENT '分类图标样式',
    `parent_id` VARCHAR(55) NOT NULL COMMENT '父类ID',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`id`),
    KEY `r_key` (`r_key`),
    UNIQUE KEY `c_key` (`c_key`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 新闻中心
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
DROP TABLE IF EXISTS `#DB_PREFIX#News`;
CREATE TABLE `#DB_PREFIX#News` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `news_id` VARCHAR(85) NOT NULL COMMENT '产品编号,唯一识别码',
    `user_id` VARCHAR(55) NOT NULL COMMENT '用户ID',
    `c_key` VARCHAR(55) NOT NULL COMMENT '新闻分类KEY',
    `sort_id` INT(11) UNSIGNED NULL COMMENT '排序',
    `title` VARCHAR(125) NOT NULL COMMENT '产品标题',
    `content` TEXT NOT NULL COMMENT '新闻内容',
    `introduction` VARCHAR(255) NULL COMMENT '导读,获取介绍第一段.',
    `keywords` VARCHAR(120) NULL COMMENT '关键字',
    `praise` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '赞数量',
    `forward` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '转发数量',
    `collection` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '收藏数量',
    `share` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '分享数量',
    `attention` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '关注数量',
    `is_promote` SET('On', 'Off') NOT NULL COMMENT '推广',
    `is_hot` SET('On', 'Off') NOT NULL COMMENT '热门',
    `is_winnow` SET('On', 'Off') NOT NULL COMMENT '精选',
    `is_recommend` SET('On', 'Off') NOT NULL COMMENT '推荐',
    `is_audit` SET('On', 'Off', 'Out', 'Not') NOT NULL COMMENT '审核',
    `is_comments` SET('On', 'Off') NOT NULL COMMENT '是否启用评论',
    `is_img` SET('On', 'Off') NOT NULL COMMENT '是否上传图片',
    `is_thumb` SET('On', 'Off') NOT NULL COMMENT '是否生成缩略图,发布产品可以上传图片,但最后审核通过了,才会生成缩略图',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`id`),
    UNIQUE KEY `news_id` (`news_id`),
    UNIQUE `title` (`title`),
    KEY `user_id` (`user_id`),
    KEY `c_key` (`c_key`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * 产品分类(产品属于那种类型,例如电子产品,服装产品,这里的分类是根据版块ID来分类的)
 */
DROP TABLE IF EXISTS `#DB_PREFIX#News_Classify`;
CREATE TABLE `#DB_PREFIX#News_Classify` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序',
    `r_key` VARCHAR(55) NOT NULL COMMENT '角色关键KEY',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` TEXT NULL COMMENT '描述',
    `keywords` VARCHAR(155) NOT NULL COMMENT '关键字',
    `ico_class` VARCHAR(55) NULL COMMENT '分类图标样式',
    `parent_id` VARCHAR(55) NOT NULL COMMENT '父类ID',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `published` INT(11) UNSIGNED NOT NULL COMMENT '发布时间',
    PRIMARY
    KEY (`id`),
    KEY `r_key` (`r_key`),
    UNIQUE KEY `c_key` (`c_key`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


# SET FOREIGN_KEY_CHECKS = 1;