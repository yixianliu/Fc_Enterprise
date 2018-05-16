/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 权限 / 角色
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
DROP TABLE IF EXISTS `#DB_PREFIX#auth_role`;
CREATE TABLE `#DB_PREFIX#auth_role` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(80) NOT NULL DEFAULT '' COMMENT '角色名称',
    `description` varchar(80) NOT NULL DEFAULT '' COMMENT '权限描述',
    `rule_name` varchar(80) NULL DEFAULT '' COMMENT '规则',
    `data` varchar(80) NULL DEFAULT '' COMMENT '数据',
    `type` smallint NOT NULL DEFAULT 0 COMMENT '状态 1：角色 2：权限',
    `status` smallint NOT NULL DEFAULT 0 COMMENT '状态 1：有效 0：无效',
    `updated_at` integer NOT NULL DEFAULT '0' COMMENT '最后一次更新时间',
    `created_at` integer NOT NULL DEFAULT '0' COMMENT '插入时间',
    PRIMARY KEY (`id`),
    UNIQUE KEY `name` (`name`),
    UNIQUE KEY `description` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色权限表';

DROP TABLE IF EXISTS `#DB_PREFIX#auth_user_role`;
CREATE TABLE `#DB_PREFIX#auth_user_role` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `user_id` varchar(80) NOT NULL COMMENT '用户id',
    `role_id` varchar(80) NOT NULL COMMENT '角色ID',
    `created_at` integer NOT NULL DEFAULT '0' COMMENT '插入时间',
    `updated_at` integer NOT NULL DEFAULT '0' COMMENT '最后一次更新时间',
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户角色关联表';

DROP TABLE IF EXISTS `#DB_PREFIX#auth_role_permisson`;
CREATE TABLE `#DB_PREFIX#auth_role_permisson` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `parent` varchar(80) NOT NULL DEFAULT '' COMMENT '角色名称',
    `child` varchar(80) NOT NULL DEFAULT '' COMMENT '权限名称',
    PRIMARY KEY (`id`),
    KEY `parent` (`parent`),
    KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色权限关联表';

DROP TABLE IF EXISTS `#DB_PREFIX#auth_rule`;
CREATE TABLE `#DB_PREFIX#auth_rule` (
    `name` varchar(80) NOT NULL,
    `data` blob,
    `updated_at` integer NOT NULL DEFAULT '0' COMMENT '最后一次更新时间',
    `created_at` integer NOT NULL DEFAULT '0' COMMENT '插入时间',
    primary key (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='规则表';

/**
 * 插入数据
 */

INSERT INTO `#DB_PREFIX#auth_user_role`
VALUES
(NULL, 1, 'admin', '#TIME#', '#TIME#'),
(NULL, 2, 'admin', '#TIME#', '#TIME#');

INSERT INTO `#DB_PREFIX#auth_role`
VALUES

/* 角色 */
(NULL, 'admin', '管理员', null, null, 1, 1, '#TIME#', '#TIME#'),
(NULL, 'guest', '游客', null, null, 1, 1, '#TIME#', '#TIME#'),
(NULL, 'user', '会员', null, null, 1, 1, '#TIME#', '#TIME#'),

/* 权限 */
(NULL, 'indexCenter', '管理首页', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'confCenter', '用户中心', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateCenter', '更新网站配置', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'createCenter', '创建网站配置', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewCenter', '查看网站配置', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteCenter', '删除网站配置', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createSlide', '发布幻灯片', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateSlide', '更新幻灯片', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexSlide', '幻灯片列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewSlide', '查看幻灯片', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteSlide', '删除幻灯片', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createSlide-cls', '添加幻灯片类型', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateSlide-cls', '更新幻灯片类型', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexSlide-cls', '幻灯片类型列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewSlide-cls', '查看幻灯片类型', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteSlide-cls', '删除幻灯片类型', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createMenu', '添加菜单', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateMenu', '更新菜单', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexMenu', '菜单列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewMenu', '查看菜单', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteMenu', '删除菜单', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'adjustmentMenu', '菜单Url设置', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createUser', '添加用户', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateUser', '更新用户', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexUser', '用户列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewUser', '查看用户', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteUser', '删除用户', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createRole', '添加角色', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateRole', '更新角色', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexRole', '角色列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewRole', '查看角色', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteRole', '删除角色', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createNews', '添加新闻', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateNews', '更新新闻', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexNews', '新闻列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewNews', '查看新闻', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteNews', '删除新闻', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createNews-cls', '添加新闻分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateNews-cls', '更新新闻分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexNews-cls', '新闻分类列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewNews-cls', '查看新闻分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteNews-cls', '删除新闻分类', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createProduct', '添加产品', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateProduct', '更新产品', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexProduct', '产品列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewProduct', '查看产品', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteProduct', '删除产品', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createProduct-cls', '添加产品分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateProduct-cls', '更新产品分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexProduct-cls', '产品分类列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewProduct-cls', '查看产品分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteProduct-cls', '删除产品分类', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createJob', '添加招聘', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateJob', '更新招聘', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexJob', '招聘列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewJob', '查看招聘', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteJob', '删除招聘', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createResume', '添加简历', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateResume', '更新简历', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexResume', '简历列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewResume', '查看简历', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteResume', '删除简历', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createPages', '添加自定义页面', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updatePages', '更新自定义页面', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexPages', '自定义页面列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewPages', '查看自定义页面', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deletePages', '删除自定义页面', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createPages-cls', '添加自定义页面分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updatePages-cls', '更改自定义页面分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexPages-cls', '自定义页面分类列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewPages-cls', '查看自定义页面分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deletePages-cls', '删除自定义页面分类', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createPages-list', '添加自定义页面内容', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updatePages-list', '更新自定义页面内容', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexPages-list', '自定义页面内容列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewPages-list', '查看自定义页面内容', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deletePages-list', '删除自定义页面内容', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createDownload', '添加下载内容', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateDownload', '更改下载内容', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexDownload', '下载内容列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewDownload', '查看下载内容', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteDownload', '删除下载内容', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createDownload-cls', '添加下载内容分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateDownload-cls', '更新下载内容分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexDownload-cls', '下载内容分类列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewDownload-cls', '查看下载内容分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteDownload-cls', '删除下载内容分类', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createPurchase', '添加采购', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updatePurchase', '更改采购', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexPurchase', '采购列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewPurchase', '查看采购', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deletePurchase', '删除采购', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createNav-cls', '添加导航分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateNav-cls', '更改导航分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexNav-cls', '导航分类列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewNav-cls', '查看导航分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteNav-cls', '删除导航分类', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createSupply', '添加供应', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateSupply', '更改供应', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexSupply', '供应列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewSupply', '查看供应', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteSupply', '删除供应', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createBid', '添加投标', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateBid', '更改投标', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexBid', '投标列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewBid', '查看投标', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteBid', '删除投标', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createSp-offer', '添加价格提交', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updateSp-offer', '更改价格', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexSp-offer', '价格列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewSp-offer', '查看价格', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deleteSp-offer', '删除价格', null, null, 2, 1, '#TIME#', '#TIME#'),

(NULL, 'createPsb-cls', '添加相关分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'updatePsb-cls', '更改相关分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'indexPsb-cls', '相关分类列表', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'viewPsb-cls', '查看相关分类', null, null, 2, 1, '#TIME#', '#TIME#'),
(NULL, 'deletePsb-cls', '删除相关分类', null, null, 2, 1, '#TIME#', '#TIME#');