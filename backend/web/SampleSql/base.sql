/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 基本表
 * Author:  Yxl <zccem@163.com>
 * Created: 2016-3-15
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
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
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY
    KEY (`ad_id`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE# COMMENT='广告';

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
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
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
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
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
    `item_name` VARCHAR(80) NOT NULL COMMENT '角色关键KEY',
    `area` VARCHAR(125) NULL COMMENT '当前登录地区',
    `login_ip` VARCHAR(55) COMMENT '登陆IP',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
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
    `json_data` VARCHAR(255) NULL COMMENT '样式',
    `parent_key` VARCHAR(55) NOT NULL COMMENT '父类KEY',
    `is_ad` SET('On', 'Off') NOT NULL COMMENT '是否开启广告',
    `is_post` SET('On', 'Off') NOT NULL COMMENT '发布帖子',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE `name` (`name`),
    UNIQUE KEY `s_key` (`s_key`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 配置
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Conf`;
CREATE TABLE `#DB_PREFIX#Conf` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '配置关键字KEY',
    `name` VARCHAR(80) NOT NULL COMMENT '名称',
    `parameter` TEXT NOT NULL COMMENT '值 / 参数',
    `description` TEXT NULL COMMENT '描述',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否可用',
    `is_language` SET('cn', 'en') NULL COMMENT '多语言类别',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 在线留言
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Online_Msg`;
CREATE TABLE `#DB_PREFIX#Online_Msg` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `user_id` VARCHAR(85) NOT NULL COMMENT '账号',
    `email` VARCHAR(85)  NULL COMMENT '邮箱',
    `telephone` VARCHAR(85)  NULL COMMENT '联系电话',
    `address` VARCHAR(255)  NULL COMMENT '联系地址',
    `title` VARCHAR(155) NULL COMMENT '留言标题',
    `content` TEXT NOT NULL COMMENT '留言内容',
    `is_audit` SET('On', 'Off') NOT NULL COMMENT '是否审核',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`)
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
    `username` VARCHAR(80) NOT NULL COMMENT '手机号码',
    `password` VARCHAR(255) NOT NULL COMMENT '密码',
    `r_key` VARCHAR(55) NOT NULL COMMENT '角色关键KEY',
    `credit` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '积分',
    `exp` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '经验值',
    `nickname` VARCHAR(55) NULL DEFAULT NULL COMMENT '昵称',
    `head` VARCHAR(125) NULL DEFAULT NULL COMMENT '用户头像',
    `signature` VARCHAR(80) NULL DEFAULT NULL COMMENT '个性签名',
    `birthday` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '出生年月日',
    `answer` VARCHAR(55) NULL DEFAULT NULL COMMENT '用户答案',
    `s_key` VARCHAR(55) NULL DEFAULT NULL COMMENT '用户问题',
    `login_ip` VARCHAR(85) NULL DEFAULT 0 COMMENT '登陆IP',
    `consecutively` INT(11) UNSIGNED NOT NULL COMMENT '连续登录',
    `sex` SET('Male' , 'Female') NOT NULL DEFAULT 'Female' COMMENT '性别',
    `job` VARCHAR(55) NULL COMMENT '所在企业的职位名称',
    `is_type` SET('user' , 'enterprise', 'supplier') NOT NULL DEFAULT 'user' COMMENT '用户类型,用户、企业、供应商',
    `is_display` SET('On', 'Off') NOT NULL DEFAULT 'Off' COMMENT '显示信息',
    `is_auth` SET('On', 'Off') NOT NULL DEFAULT 'Off' COMMENT '企业认证',
    `is_head` SET('On', 'Off') NOT NULL DEFAULT 'Off' COMMENT '上传头像',
    `is_security` SET('On', 'Off') NOT NULL DEFAULT 'Off' COMMENT '安全设置',
    `is_using` SET('On', 'Off', 'Not') NOT NULL DEFAULT 'Off' COMMENT '是否可用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY `id` (`id`),
    UNIQUE KEY (`user_id`),
    KEY `r_key` (`r_key`),
    UNIQUE `nickname` (`nickname`),
    UNIQUE KEY `username` (`username`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 供应商资料
 */
DROP TABLE IF EXISTS `#DB_PREFIX#User_Supply`;
CREATE TABLE `#DB_PREFIX#User_Supply` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `user_id` VARCHAR(55) NOT NULL COMMENT '用户ID',
    `name` VARCHAR(125) NOT NULL COMMENT '企业名称',
    `content` TEXT NULL DEFAULT NULL COMMENT '企业简介',
    `path` VARCHAR(125) NULL COMMENT '公司图片',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
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
    PRIMARY KEY (`security_id`),
    UNIQUE KEY `skey` (`skey`)
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
    `rp_key` VARCHAR(85) NOT NULL COMMENT '菜单关联角色, 多个角色可用逗号分开',
    `model_key` VARCHAR(85) NULL COMMENT '菜单模型',
    `custom_key` VARCHAR(85) NULL COMMENT '和自定义页面的KEY对应,不是自定义页面不需要填写',
    `name` VARCHAR(85) NOT NULL COMMENT '菜单名称',
    `url` VARCHAR(85) NULL COMMENT '菜单超链接',
    `is_type` SET('index', 'list', 'view', 'show', 'center') NULL COMMENT '单页面类型, 首页, 列表, 内容, 展示, 中心,',
    `is_language` SET('cn', 'en') NULL DEFAULT 'cn' COMMENT '语言类别',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `rp_key` (`rp_key`),
    UNIQUE KEY `m_key` (`m_key`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 菜单模型
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Menu_Model`;
CREATE TABLE `#DB_PREFIX#Menu_Model` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `model_key` VARCHAR(55) NOT NULL COMMENT '菜单模型',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序ID',
    `url_key` VARCHAR(85) NOT NULL COMMENT 'Url 模型',
    `name` VARCHAR(85) NOT NULL COMMENT '模型名称',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `model_key` (`model_key`),
    UNIQUE KEY `url_key` (`url_key`)
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
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `s_key` VARCHAR(55) NOT NULL COMMENT '版块KEY,版块默认为S0,意思是没有分配好相关版块.',
    `title` VARCHAR(125) NOT NULL COMMENT '标题',
    `content` TEXT NOT NULL COMMENT '内容',
    `price` INT(11) UNSIGNED NOT NULL COMMENT '一口价',
    `discount` INT(11) UNSIGNED NULL COMMENT '折扣价',
    `introduction` VARCHAR(255) NULL COMMENT '导读,获取产品介绍第一段.',
    `keywords` VARCHAR(120) NULL COMMENT '关键字',
    `path` VARCHAR(125) NULL COMMENT '产品文件路径',
    `images` VARCHAR(255) NULL COMMENT '产品缩略图',
    `praise` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '赞数量',
    `forward` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '转发数量',
    `collection` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '收藏数量',
    `share` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '分享数量',
    `attention` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '关注数量',
    `is_language` SET('cn', 'en') NULL DEFAULT 'cn' COMMENT '语言类别',
    `is_promote` SET('On', 'Off') NOT NULL COMMENT '推广',
    `is_hot` SET('On', 'Off') NOT NULL COMMENT '热门',
    `is_classic` SET('On', 'Off') NOT NULL COMMENT '经典',
    `is_winnow` SET('On', 'Off') NOT NULL COMMENT '精选',
    `is_recommend` SET('On', 'Off') NOT NULL COMMENT '推荐',
    `is_audit` SET('On', 'Off', 'Out', 'Not') NOT NULL COMMENT '审核',
    `is_field` SET('On', 'Off') NOT NULL COMMENT '是否生成字段JSON文件,没有生成的话,产品异常!',
    `is_comments` SET('On', 'Off') NOT NULL COMMENT '是否启用评论',
    `is_img` SET('On', 'Off') NULL DEFAULT 'On' COMMENT '是否上传图片',
    `is_thumb` SET('On', 'Off') NULL DEFAULT 'On' COMMENT '是否生成缩略图,发布产品可以上传图片,但最后审核通过了,才会生成缩略图',
    `grade` INT(6) UNSIGNED NOT NULL COMMENT '本站评分,由我们网站人员进行评估.',
    `user_grade` INT(6) UNSIGNED NULL COMMENT '用户评分,由本站用户进行评估.',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
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
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` TEXT NULL COMMENT '描述',
    `keywords` VARCHAR(155) NOT NULL COMMENT '关键字',
    `json_data` VARCHAR(255) NULL COMMENT 'Json数据',
    `parent_id` VARCHAR(55) NOT NULL COMMENT '父类ID',
    `is_language` SET('cn', 'en') NULL DEFAULT 'cn' COMMENT '语言类别',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
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
    `path` VARCHAR(125) NULL COMMENT '新闻文件路径',
    `images` VARCHAR(255) NULL COMMENT '缩略图',
    `keywords` VARCHAR(120) NULL COMMENT '关键字',
    `praise` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '赞数量',
    `forward` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '转发数量',
    `collection` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '收藏数量',
    `share` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '分享数量',
    `attention` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '关注数量',
    `is_language` SET('cn', 'en') NULL DEFAULT 'cn' COMMENT '语言类别',
    `is_promote` SET('On', 'Off') NOT NULL COMMENT '推广',
    `is_hot` SET('On', 'Off') NOT NULL COMMENT '热门',
    `is_winnow` SET('On', 'Off') NOT NULL COMMENT '精选',
    `is_recommend` SET('On', 'Off') NOT NULL COMMENT '推荐',
    `is_audit` SET('On', 'Off', 'Out', 'Not') NOT NULL COMMENT '审核',
    `is_comments` SET('On', 'Off') NOT NULL COMMENT '是否启用评论',
    `is_img` SET('On', 'Off') NOT NULL COMMENT '是否上传图片',
    `is_thumb` SET('On', 'Off') NOT NULL COMMENT '是否生成缩略图,发布产品可以上传图片,但最后审核通过了,才会生成缩略图',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `news_id` (`news_id`),
    UNIQUE `title` (`title`),
    KEY `user_id` (`user_id`),
    KEY `c_key` (`c_key`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * 新闻分类
 */
DROP TABLE IF EXISTS `#DB_PREFIX#News_Classify`;
CREATE TABLE `#DB_PREFIX#News_Classify` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` TEXT NULL COMMENT '描述',
    `keywords` VARCHAR(155) NOT NULL COMMENT '关键字',
    `json_data` VARCHAR(255) NULL COMMENT 'Json数据',
    `parent_id` VARCHAR(55) NOT NULL COMMENT '父类ID',
    `is_language` SET('cn', 'en') NULL DEFAULT 'cn' COMMENT '语言类别',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `c_key` (`c_key`),
    UNIQUE `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 招聘中心
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Job`;
CREATE TABLE `#DB_PREFIX#Job` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `job_id` VARCHAR(85) NOT NULL COMMENT '招聘编号,唯一识别码',
    `user_id` VARCHAR(55) NOT NULL COMMENT '发布用户ID',
    `title` VARCHAR(125) NOT NULL COMMENT '标题',
    `content` TEXT NOT NULL COMMENT '内容',
    `keywords` VARCHAR(120) NULL COMMENT '关键字',
    `images` VARCHAR(255) NULL COMMENT '招聘图片',
    `is_language` SET('cn', 'en') NULL DEFAULT 'cn' COMMENT '语言类别',
    `is_audit` SET('On', 'Off', 'Out', 'Not') NOT NULL COMMENT '审核',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `job_id` (`job_id`),
    UNIQUE `title` (`title`),
    KEY `user_id` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * 用户应聘
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Job_Apply_For`;
CREATE TABLE `#DB_PREFIX#Job_Apply_For` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` VARCHAR(85) NOT NULL COMMENT '用户ID',
    `job_id` VARCHAR(85) NOT NULL COMMENT '招聘ID',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `user_id` (`user_id`),
    UNIQUE `job_id` (`job_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * 用户简历
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Resume`;
CREATE TABLE `#DB_PREFIX#Resume` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` VARCHAR(85) NOT NULL COMMENT '用户ID',
    `title` VARCHAR(125) NOT NULL COMMENT '简历标题',
    `content` TEXT NOT NULL COMMENT '简历内容',
    `path` VARCHAR(125) NULL COMMENT '上传简历路径',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `user_id` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 采购 + 供应 + 投标
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 采购
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Purchase`;
CREATE TABLE `#DB_PREFIX#Purchase` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `purchase_id` VARCHAR(85) NOT NULL COMMENT '编号',
    `user_id` VARCHAR(85) NOT NULL COMMENT '用户ID',
    `title` VARCHAR(125) NOT NULL COMMENT '标题',
    `content` TEXT NOT NULL COMMENT '内容',
    `path` VARCHAR(125) NULL COMMENT '上传文件',
    `price` VARCHAR(85) NOT NULL COMMENT '目标价格',
    `num` INT(11) UNSIGNED NOT NULL COMMENT '数量',
    `unit` VARCHAR(125) NOT NULL COMMENT '单位',
    `is_type` SET('Long', 'Short') NOT NULL COMMENT '类型 (分为长期 / 短期)',
    `is_status` SET('On', 'Off') NOT NULL COMMENT '采购状态',
    `start_at` INT(11) UNSIGNED NOT NULL COMMENT '起始时间',
    `end_at` INT(11) UNSIGNED NOT NULL COMMENT '结束时间',
    `is_send_msg` SET('On', 'Off') NOT NULL COMMENT '是否群发短信',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    UNIQUE KEY `purchase_id` (`purchase_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * 供应
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Supply`;
CREATE TABLE `#DB_PREFIX#Supply` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `supply_id` VARCHAR(85) NOT NULL COMMENT '编号',
    `user_id` VARCHAR(85) NOT NULL COMMENT '用户ID',
    `title` VARCHAR(125) NOT NULL COMMENT '标题',
    `content` TEXT NOT NULL COMMENT '内容',
    `path` VARCHAR(125) NULL COMMENT '上传文件',
    `price` VARCHAR(85) NOT NULL COMMENT '目标价格',
    `num` INT(11) UNSIGNED NOT NULL COMMENT '数量',
    `unit` VARCHAR(125) NOT NULL COMMENT '单位',
    `is_type` SET('Long', 'Short') NOT NULL COMMENT '类型 (分为长期 / 短期)',
    `is_status` SET('On', 'Off') NOT NULL COMMENT '采购状态',
    `start_at` INT(11) UNSIGNED NOT NULL COMMENT '起始时间',
    `end_at` INT(11) UNSIGNED NOT NULL COMMENT '结束时间',
    `is_send_msg` SET('On', 'Off') NOT NULL COMMENT '是否群发短信',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    UNIQUE KEY `supply_id` (`supply_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * 投标管理
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Bid`;
CREATE TABLE `#DB_PREFIX#Bid` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `bid_id` VARCHAR(85) NOT NULL COMMENT '编号',
    `user_id` VARCHAR(85) NOT NULL COMMENT '用户ID',
    `title` VARCHAR(125) NOT NULL COMMENT '标题',
    `content` TEXT NOT NULL COMMENT '内容',
    `path` VARCHAR(125) NULL COMMENT '上传文件',
    `price` VARCHAR(85) NOT NULL COMMENT '目标价格',
    `is_send_msg` SET('On', 'Off') NOT NULL COMMENT '是否群发短信',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    UNIQUE KEY `bid_id` (`bid_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * 招标管理
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Tender`;
CREATE TABLE `#DB_PREFIX#Tender` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `tender_id` VARCHAR(85) NOT NULL COMMENT '编号',
    `user_id` VARCHAR(85) NOT NULL COMMENT '用户ID',
    `title` VARCHAR(125) NOT NULL COMMENT '标题',
    `content` TEXT NOT NULL COMMENT '内容',
    `path` VARCHAR(125) NULL COMMENT '上传文件',
    `price` VARCHAR(85) NOT NULL COMMENT '目标价格',
    `is_send_msg` SET('On', 'Off') NOT NULL COMMENT '是否群发短信',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    UNIQUE KEY `tender_id` (`tender_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * 供求 + 采购 + 投标分类
 */
DROP TABLE IF EXISTS `#DB_PREFIX#PSB_Classify`;
CREATE TABLE `#DB_PREFIX#PSB_Classify` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` TEXT NULL COMMENT '描述',
    `keywords` VARCHAR(155) NOT NULL COMMENT '关键字',
    `json_data` VARCHAR(255) NULL COMMENT 'Json数据',
    `parent_id` VARCHAR(55) NOT NULL COMMENT '父类ID',
    `is_type` SET('Supply', 'Purchase', 'Bid') NOT NULL COMMENT '类型,采购方还是供应方',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `c_key` (`c_key`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * 采购或者供应方提交报价
 */
DROP TABLE IF EXISTS `#DB_PREFIX#SP_Offer`;
CREATE TABLE `#DB_PREFIX#SP_Offer` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `offer_id` VARCHAR(85) NOT NULL COMMENT '对应的类目 ID',
    `user_id` VARCHAR(85) NOT NULL COMMENT '用户ID',
    `price` VARCHAR(85) NOT NULL COMMENT '提交价格',
    `content` TEXT NOT NULL COMMENT '提交内容',
    `path` VARCHAR(125) NULL COMMENT '上传文件',
    `is_type` SET('Supply', 'Purchase', 'Bid') NOT NULL COMMENT '类型,采购方还是供应方',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    KEY `offer_id` (`offer_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 下载中心
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Download`;
CREATE TABLE `#DB_PREFIX#Download` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `title` VARCHAR(85) NOT NULL COMMENT '下载标题',
    `path` VARCHAR(85) NOT NULL COMMENT '文件路径',
    `content` TEXT NOT NULL COMMENT '文件描述',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE `title` (`title`),
    KEY `c_key` (`c_key`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * 下载中心分类
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Download_Classify`;
CREATE TABLE `#DB_PREFIX#Download_Classify` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` TEXT NULL COMMENT '描述',
    `keywords` VARCHAR(155) NOT NULL COMMENT '关键字',
    `json_data` VARCHAR(255) NULL COMMENT 'Json数据',
    `parent_id` VARCHAR(55) NOT NULL COMMENT '父类ID',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `c_key` (`c_key`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 页面管理
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 幻灯片
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Slide`;
CREATE TABLE `#DB_PREFIX#Slide` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '幻灯片关键KEY,假如为单页面的话,值为Pages',
    `path` VARCHAR(255) NOT NULL COMMENT '幻灯片图片路径',
    `description` TEXT NULL COMMENT '描述',
    `is_language` SET('cn', 'en') NULL DEFAULT 'cn' COMMENT '语言类别',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否可用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `c_key` (`c_key`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 幻灯片分类
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Slide_Classify`;
CREATE TABLE `#DB_PREFIX#Slide_Classify` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '幻灯片关键KEY',
    `name` VARCHAR(255) NOT NULL COMMENT '分类名称',
    `description` TEXT NULL COMMENT '描述',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否可用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `c_key` (`c_key`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 单页面
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Pages`;
CREATE TABLE `#DB_PREFIX#Pages` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `page_id` VARCHAR(55) NOT NULL COMMENT '页面ID',
    `m_key` VARCHAR(55) NOT NULL COMMENT '对应的菜单KEY',
    `p_key` VARCHAR(55) NOT NULL COMMENT '单页面关键KEY',
    `content` TEXT NULL COMMENT '单页面内容',
    `parent_id` VARCHAR(85) NULL COMMENT '父类,为空的话,为顶级',
    `path` VARCHAR(255) NULL COMMENT '页面相关图片和文件',
    `is_language` SET('cn', 'en') NULL DEFAULT 'cn' COMMENT '语言类别',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否可用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `page_id` (`page_id`),
    UNIQUE KEY `p_key` (`p_key`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 单页面列表内容
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Pages_List`;
CREATE TABLE `#DB_PREFIX#Pages_List` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `page_id` VARCHAR(55) NOT NULL COMMENT '对应的页面ID',
    `c_key` VARCHAR(55) NOT NULL COMMENT '单页面列表分类KEY',
    `title` VARCHAR(80) NOT NULL COMMENT '列表标题',
    `content` TEXT NULL COMMENT '单页面内容',
    `path` VARCHAR(255) NOT NULL COMMENT '单页面路径',
    `is_recommend` SET('On', 'Off') NOT NULL COMMENT '推荐',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否可用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `title` (`title`),
    KEY `c_key` (`c_key`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

/**
 * 单页面分类
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Pages_Classify`;
CREATE TABLE `#DB_PREFIX#Pages_Classify` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `page_id` VARCHAR(55) NOT NULL COMMENT '页面ID',
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` TEXT NULL COMMENT '描述',
    `keywords` VARCHAR(155) NULL COMMENT '关键字',
    `json_data` VARCHAR(255) NULL COMMENT 'Json数据',
    `parent_id` VARCHAR(55) NULL COMMENT '父类ID',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `c_key` (`c_key`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;


/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 采购供应平台分类
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 导航分类
 */
DROP TABLE IF EXISTS `#DB_PREFIX#Nav_Classify`;
CREATE TABLE `#DB_PREFIX#Nav_Classify` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `c_key` VARCHAR(55) NOT NULL COMMENT '分类KEY',
    `p_key` VARCHAR(255) NOT NULL COMMENT '对应分类KEY',
    `sort_id` INT(11) UNSIGNED NOT NULL COMMENT '排序',
    `name` VARCHAR(85) NOT NULL COMMENT '名称',
    `description` TEXT NULL COMMENT '描述',
    `keywords` VARCHAR(155) NULL COMMENT '关键字',
    `json_data` VARCHAR(255) NULL COMMENT 'Json数据',
    `parent_id` VARCHAR(55) NULL COMMENT '父类ID',
    `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
    `created_at` integer NOT NULL DEFAULT '0',
    `updated_at` integer NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `c_key` (`c_key`)
)ENGINE=InnoDB DEFAULT CHARSET=#DB_CODE#;

# SET FOREIGN_KEY_CHECKS = 1;