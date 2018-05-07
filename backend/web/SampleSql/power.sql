/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 权限 / 角色
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
DROP TABLE IF EXISTS `#DB_PREFIX#role`;
CREATE TABLE `#DB_PREFIX#role` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
    `status`SET('On', 'Off') NOT NULL DEFAULT 'On' COMMENT '状态 1：有效 0：无效',
    `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次更新时间',
    `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色表';

DROP TABLE IF EXISTS `#DB_PREFIX#permission`;
CREATE TABLE `#DB_PREFIX#permission` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL DEFAULT '' COMMENT '权限名称',
    `title` varchar(50) NOT NULL DEFAULT '' COMMENT '权限标题',
    `description` varchar(50) NOT NULL DEFAULT '' COMMENT '权限描述',
    `status` SET('On', 'Off') NOT NULL DEFAULT 'On' COMMENT '状态 1：有效 0：无效',
    `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次更新时间',
    `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限详情表';

DROP TABLE IF EXISTS `#DB_PREFIX#user_role`;
CREATE TABLE `#DB_PREFIX#user_role` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
    `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色ID',
    `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户角色表';

DROP TABLE IF EXISTS `#DB_PREFIX#role_permisson`;
CREATE TABLE `#DB_PREFIX#role_permisson` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色id',
    `permission_id` int(11) NOT NULL DEFAULT '0' COMMENT '权限id',
    `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
    PRIMARY KEY (`id`),
    KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色权限表';

/**
 * 插入数据
 */
INSERT INTO `#DB_PREFIX#role`
VALUES
(NULL, 'admin', 'On', '#TIME#', '#TIME#'),
(NULL, 'guest', 'On', '#TIME#', '#TIME#');

INSERT INTO `#DB_PREFIX#permission`
VALUES
(NULL, 'indexCenter', '管理首页', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'confCenter', '用户中心', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateCenter', '更新网站配置', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'createCenter', '创建网站配置', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewCenter', '查看网站配置', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteCenter', '删除网站配置', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createSlide', '发布幻灯片', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateSlide', '更新幻灯片', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexSlide', '幻灯片列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewSlide', '查看幻灯片', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteSlide', '删除幻灯片', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createSlide-cls', '添加幻灯片类型', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateSlide-cls', '更新幻灯片类型', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexSlide-cls', '更新幻灯片类型', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewSlide-cls', '查看幻灯片类型', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteSlide-cls', '删除幻灯片类型', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createMenu', '添加菜单', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateMenu', '更新菜单', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexMenu', '菜单列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewMenu', '查看菜单', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteMenu', '删除菜单', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'adjustmentMenu', '菜单Url设置', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createUser', '添加用户', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateUser', '更新用户', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexUser', '用户列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewUser', '查看用户', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteUser', '删除用户', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createRole', '添加角色', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateRole', '更新角色', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexRole', '角色列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewRole', '查看角色', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteRole', '删除角色', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createNews', '添加新闻', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateNews', '更新新闻', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexNews', '新闻列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewNews', '查看新闻', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteNews', '删除新闻', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createNews-cls', '添加新闻分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateNews-cls', '更新新闻分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexNews-cls', '更新新闻分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewNews-cls', '更新新闻分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteNews-cls', '删除新闻分类', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createProduct', '添加产品', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateProduct', '更新产品', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexProduct', '产品列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewProduct', '查看产品', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteProduct', '删除产品', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createProduct-cls', '添加产品分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateProduct-cls', '更新产品分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexProduct-cls', '产品分类列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewProduct-cls', '查看产品分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteProduct-cls', '删除产品分类', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createJob', '添加招聘', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateJob', '更新招聘', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexJob', '招聘列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewJob', '查看招聘', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteJob', '删除招聘', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createResume', '添加简历', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateResume', '更新简历', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexResume', '简历列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewResume', '查看简历', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteResume', '删除简历', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createPages', '添加自定义页面', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updatePages', '更新自定义页面', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexPages', '自定义页面列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewPages', '查看自定义页面', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deletePages', '删除自定义页面', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createPages-cls', '添加自定义页面分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updatePages-cls', '更改自定义页面分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexPages-cls', '自定义页面分类列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewPages-cls', '查看自定义页面分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deletePages-cls', '删除自定义页面分类', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createPages-list', '添加自定义页面内容', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updatePages-list', '更新自定义页面内容', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexPages-list', '自定义页面内容列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewPages-list', '查看自定义页面内容', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deletePages-list', '删除自定义页面内容', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createDownload', '添加下载内容', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateDownload', '更改下载内容', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexDownload', '下载内容列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewDownload', '查看下载内容', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteDownload', '删除下载内容', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createDownload-cls', '添加下载内容分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateDownload-cls', '更新下载内容分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexDownload-cls', '下载内容分类列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewDownload-cls', '查看下载内容分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteDownload-cls', '删除下载内容分类', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createPurchase', '添加采购', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updatePurchase', '更改采购', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexPurchase', '采购列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewPurchase', '查看采购', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deletePurchase', '删除采购', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createNav-cls', '添加导航分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateNav-cls', '更改导航分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexNav-cls', '导航分类列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewNav-cls', '查看导航分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteNav-cls', '删除导航分类', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createSupply', '添加供应', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateSupply', '更改供应', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexSupply', '供应列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewSupply', '查看供应', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteSupply', '删除供应', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createBid', '添加投标', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateBid', '更改投标', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexBid', '投标列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewBid', '查看投标', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteBid', '删除投标', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createSp-offer', '添加价格提交', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updateSp-offer', '更改价格', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexSp-offer', '价格列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewSp-offer', '查看价格', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deleteSp-offer', '删除价格', null, 'On', '#TIME#', '#TIME#'),

(NULL, 'createPsb-cls', '添加相关分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'updatePsb-cls', '更改相关分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'indexPsb-cls', '相关分类列表', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'viewPsb-cls', '查看相关分类', null, 'On', '#TIME#', '#TIME#'),
(NULL, 'deletePsb-cls', '删除相关分类', null, 'On', '#TIME#', '#TIME#');