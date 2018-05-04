/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 权限 / 角色
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

CREATE TABLE `role` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
    `status`SET('On', 'Off') NOT NULL DEFAULT 'On' COMMENT '状态 1：有效 0：无效',
    `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次更新时间',
    `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色表';

CREATE TABLE `permission` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL DEFAULT '' COMMENT '权限名称',
    `title` varchar(50) NOT NULL DEFAULT '' COMMENT '权限标题',
    `description` varchar(50) NOT NULL DEFAULT '' COMMENT '权限描述',
    `urls` varchar(1000) NOT NULL DEFAULT '' COMMENT 'json 数组',
    `status` SET('On', 'Off') NOT NULL DEFAULT 'On' COMMENT '状态 1：有效 0：无效',
    `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次更新时间',
    `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限详情表';

CREATE TABLE `user_role` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
    `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色ID',
    `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户角色表';

CREATE TABLE `role_permisson` (
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
(NULL, 'admin', 'On', #TIME#, #TIME#),
(NULL, 'guest', 'On', #TIME#, #TIME#);

INSERT INTO `#DB_PREFIX#permission`
VALUES
(NULL, 'indexCenter', '管理首页', null, 'On', #TIME#, #TIME#),
(NULL, 'confCenter', '用户中心', null, 'On', #TIME#, #TIME#),
(NULL, 'updateCenter', '更新网站配置', null, 'On', #TIME#, #TIME#),
(NULL, 'createCenter', '创建网站配置', null, 'On', #TIME#, #TIME#),
(NULL, 'viewCenter', '查看网站配置', null, 'On', #TIME#, #TIME#),
(NULL, 'deleteCenter', '删除网站配置', null, 'On', #TIME#, #TIME#),

(NULL, 'createSlide', '发布幻灯片', null, 'On', #TIME#, #TIME#),
(NULL, 'updateSlide', '更新幻灯片', null, 'On', #TIME#, #TIME#),
(NULL, 'indexSlide', '幻灯片列表', null, 'On', #TIME#, #TIME#),
(NULL, 'viewSlide', '查看幻灯片', null, 'On', #TIME#, #TIME#),
(NULL, 'deleteSlide', '删除幻灯片', null, 'On', #TIME#, #TIME#),

(NULL, 'createSlide-cls', '添加幻灯片类型', null, 'On', #TIME#, #TIME#),
(NULL, 'updateSlide-cls', '更新幻灯片类型', null, 'On', #TIME#, #TIME#),
(NULL, 'indexSlide-cls', '更新幻灯片类型', null, 'On', #TIME#, #TIME#),
(NULL, 'viewSlide-cls', '查看幻灯片类型', null, 'On', #TIME#, #TIME#),
(NULL, 'deleteSlide-cls', '删除幻灯片类型', null, 'On', #TIME#, #TIME#),

(NULL, 'createMenu', '添加菜单', null, 'On', #TIME#, #TIME#),
(NULL, 'updateMenu', '更新菜单', null, 'On', #TIME#, #TIME#),
(NULL, 'indexMenu', '菜单列表', null, 'On', #TIME#, #TIME#),
(NULL, 'viewMenu', '查看菜单', null, 'On', #TIME#, #TIME#),
(NULL, 'deleteMenu', '删除菜单', null, 'On', #TIME#, #TIME#),
(NULL, 'adjustmentMenu', '菜单Url设置', null, 'On', #TIME#, #TIME#),

(NULL, 'createUser', '添加用户', null, 'On', #TIME#, #TIME#),
(NULL, 'updateUser', '更新用户', null, 'On', #TIME#, #TIME#),
(NULL, 'indexUser', '用户列表', null, 'On', #TIME#, #TIME#),
(NULL, 'viewUser', '查看用户', null, 'On', #TIME#, #TIME#),
(NULL, 'deleteUser', '删除用户', null, 'On', #TIME#, #TIME#),

(NULL, 'createRole', '添加角色', null, 'On', #TIME#, #TIME#),
(NULL, 'updateRole', '更新角色', null, 'On', #TIME#, #TIME#),
(NULL, 'indexRole', '角色列表', null, 'On', #TIME#, #TIME#),
(NULL, 'viewRole', '查看角色', null, 'On', #TIME#, #TIME#),
(NULL, 'deleteRole', '删除角色', null, 'On', #TIME#, #TIME#),

(NULL, 'createNews', '添加新闻', null, 'On', #TIME#, #TIME#),
(NULL, 'updateNews', '更新新闻', null, 'On', #TIME#, #TIME#),
(NULL, 'indexNews', '新闻列表', null, 'On', #TIME#, #TIME#),
(NULL, 'viewNews', '查看新闻', null, 'On', #TIME#, #TIME#),
(NULL, 'deleteNews', '删除新闻', null, 'On', #TIME#, #TIME#),

(NULL, 'createNews-cls', '添加新闻分类', null, 'On', #TIME#, #TIME#),
(NULL, 'updateNews-cls', '更新新闻分类', null, 'On', #TIME#, #TIME#),
(NULL, 'indexNews-cls', '更新新闻分类', null, 'On', #TIME#, #TIME#),
(NULL, 'viewNews-cls', '更新新闻分类', null, 'On', #TIME#, #TIME#),
(NULL, 'deleteNews-cls', '删除新闻分类', null, 'On', #TIME#, #TIME#),

(NULL, 'createProduct', '添加产品', null, 'On', #TIME#, #TIME#),
(NULL, 'updateProduct', '更新产品', null, 'On', #TIME#, #TIME#),
