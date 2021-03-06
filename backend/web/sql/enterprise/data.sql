/**
 * Author:  yixia_000
 * Created: 2017-4-23
 */

/**
 * 网站配置参数 (中文版)
 */
INSERT INTO `#DB_PREFIX#Conf`
VALUES
(NULL, 'NAME', '网站名称', '#NAME#', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'SITE_URL', '网站地址', '#SITE_URL#', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'DEVELOPERS', '开发团队', '#DEVELOPERS#', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'TITLE', '网站标题', '#TITLE#', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'EMAIL', '网站邮箱', '#EMAIL#', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'DESCRIPTION', '网站描述', '#DESCRIPTION#', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'ICP', '网站ICP', '#ICP#', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'PHONE', '联系电话', '#PHONE#', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'COPYRIGHT', '网站版权', '#COPYRIGHT#', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'KEYWORDS', '网站关键字', '#KEYWORDS#', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'ADDRESS', '公司地址', '#ADDRESS#', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'PERSON', '公司负责人', '#PERSON#', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),

/* 网站配置 */
(NULL, 'TIME_FORMAT', '时间格式', 'm . d . Y', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'THEME_NAME', '主题名称', '默认', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'THEME_CUSTOMIZE_PATH', '主题路径', NULL, NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'FILE_UPLOAD_TYPE', '上传文件格式', 'zip,gz,rar,iso,doc,xsl,ppt,wps', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'IMAGE_UPLOAD_TYPE', '上传图片格式', 'jpg,gif,png', NULL, 'On', 'system', #TIME#, #TIME#),
(NULL, 'FILE_UPLOAD_SIZE', '上传文件大小', 5000000, NULL, 'On', 'system', #TIME#, #TIME#),
(NULL, 'IMAGE_UPLOAD_SIZE', '上传图片大小', 5000000, NULL, 'On', 'system', #TIME#, #TIME#),
(NULL, 'JUMP_SUCCEED_NUM', '成功跳转', 5, NULL, 'On', 'system', #TIME#, #TIME#),
(NULL, 'JUMP_ERROR_NUM', '错误跳转', 5, NULL, 'On', 'system', #TIME#, #TIME#),
(NULL, 'COMMENT_NUM', '留言列表页数量', 50, NULL, 'On', 'system', #TIME#, #TIME#),
(NULL, 'POST_VIEW_NUM', '帖子列表页数量', 25, NULL, 'On', 'system', #TIME#, #TIME#),
(NULL, 'PRODUCT_VIEW_NUM', '产品列表页数量', 25, NULL, 'On', 'system', #TIME#, #TIME#),
(NULL, 'MIC_VIEW_NUM', '产品列表页数量', 25, NULL, 'On', 'system', #TIME#, #TIME#),
(NULL, 'TIME_FORMAT', '是否启用时间格式', 'On', NULL, 'On', 'system', #TIME#, #TIME#),
(NULL, 'CODE_STATUS', '是否启用验证码', 'On', NULL, 'On', 'system', #TIME#, #TIME#),
(NULL, 'REG_STATUS', '是否启用注册', 'On', NULL, 'On', 'system', #TIME#, #TIME#),
(NULL, 'WEB_STATUS', '是否启用网站状态', 'On', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'LOGIN_STATUS', '是否启用登陆', 'On', NULL, 'On', 'System', 'zh-CN', #TIME#, #TIME#),
(NULL, 'QR_WX_CODE', '公众号二维码', '/themes/qijian/images/logo.jpg', NULL, 'On', 'QR', 'zh-CN', #TIME#, #TIME#),
(NULL, 'QR_MINIPROGRAM_CODE', '小程序二维码', '/themes/qijian/images/logo.jpg', NULL, 'On', 'QR', 'zh-CN', #TIME#, #TIME#),
(NULL, 'WEB_FOOT_LOGO', '网站底部Logo', '/themes/qijian/images/logo.jpg', NULL, 'On', 'Logo', 'zh-CN', #TIME#, #TIME#),
(NULL, 'WEB_LOGO', '网站Logo', '/themes/qijian/images/logo.jpg', NULL, 'On', 'Logo', 'zh-CN', #TIME#, #TIME#);

/**
 * 管理员
 */
INSERT INTO `#DB_PREFIX#Management`
VALUES
(NULL, 'admin', '#PASSWORD#', 'admin', NULL, NULL, 'On', #TIME#, #TIME#, NULL, 'Off'),
(NULL, 'admin_yxl', '#PASSWORD#', 'admin', NULL, NULL, 'On', #TIME#, #TIME#, NULL, 'On');

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 用户
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 用户安全问题
 */
INSERT INTO `#DB_PREFIX#User_Problems`
VALUES
(NULL, 'S1', '您配偶的生日是?', 'On', #TIME#),
(NULL, 'S2', '您母亲的姓名是?', 'On', #TIME#),
(NULL, 'S3', '您父亲的姓名是?', 'On', #TIME#),
(NULL, 'S4', '您配偶父亲或者母亲的姓名是?', 'On', #TIME#),
(NULL, 'S5', '您的出生地是?', 'On', #TIME#),
(NULL, 'S6', '您高中班主任的名字是?', 'On', #TIME#),
(NULL, 'S7', '您小学班主任的名字是?', 'On', #TIME#),
(NULL, 'S8', '您大学班主任的名字是?', 'On', #TIME#),
(NULL, 'S9', '您的小学校名是?', 'On', #TIME#),
(NULL, 'S10', '您的学号（或工号）是?', 'On', #TIME#),
(NULL, 'S11', '您父亲的生日是?', 'On', #TIME#),
(NULL, 'S12', '您母亲的生日是?', 'On', #TIME#),
(NULL, 'S13', '您配偶的生日是?', 'On', #TIME#);

/**
 * 幻灯片分类
 */
INSERT INTO `#DB_PREFIX#Slide_Classify`
VALUES
(NULL, 'index', '网站首页', NULL, 'On', #TIME#, #TIME#),
(NULL, 'news', '新闻中心', NULL, 'On', #TIME#, #TIME#),
(NULL, 'job', '招聘中心', NULL, 'On', #TIME#, #TIME#),
(NULL, 'product', '产品中心', NULL, 'On', #TIME#, #TIME#),
(NULL, 'purchase', '采购中心', NULL, 'On', #TIME#, #TIME#),
(NULL, 'supply', '供应中心', NULL, 'On', #TIME#, #TIME#),
(NULL, 'bid', '投标中心', NULL, 'On', #TIME#, #TIME#);

/**
 * 模块
 */
INSERT INTO `#DB_PREFIX#Module`
VALUES
  (NULL, 'product', 1, '产品中心', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
  (NULL, 'news', 2, '新闻中心', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
  (NULL, 'purchase', 3, '采购中心', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
  (NULL, 'supply', 3, '供应中心', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
  (NULL, 'pages', 4, '单页面', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
  (NULL, 'map', 5, '地图页面', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
  (NULL, 'job', 6, '招聘中心', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
  (NULL, 'download', 7, '下载中心', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
  (NULL, 'user', 8, '用户中心', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
  (NULL, 'comment', 9, '评论中心', NULL, NULL, NULL, 'On', #TIME#, #TIME#);

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 菜单
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

INSERT INTO `#DB_PREFIX#Pages`
VALUES
(NULL, '1519630269_1500', 'EN2', 'EN_1519630269_1', NULL, NULL, NULL, 'cn', 'On', #TIME#, #TIME#),
(NULL, '1519630269_1501', 'EN7', 'EN_1519630269_2', NULL, NULL, NULL, 'cn', 'On', #TIME#, #TIME#),
(NULL, '1519630269_1502', 'EN5', 'EN_1519630269_3', NULL, NULL, NULL, 'cn', 'On', #TIME#, #TIME#);

INSERT INTO `#DB_PREFIX#Menu_Model`
VALUES
(NULL, 'UP1', 1, 'product', '产品中心', 'On', #TIME#, #TIME#),
(NULL, 'UN1', 2, 'news', '新闻中心', 'On', #TIME#, #TIME#),
(NULL, 'UJ1', 3, 'job', '招聘中心', 'On', #TIME#, #TIME#),
(NULL, 'UC1', 4, 'pages', '自定义页面', 'On', #TIME#, #TIME#),
(NULL, 'UU1', 5, 'urls', '外部链接', 'On', #TIME#, #TIME#),
(NULL, 'UP2', 6, 'purchase', '采购中心', 'On', #TIME#, #TIME#),
(NULL, 'US1', 7, 'supply', '供应中心', 'On', #TIME#, #TIME#),
(NULL, 'UB1', 8, 'bid', '投标中心', 'On', #TIME#, #TIME#),
(NULL, 'UM1', 9, 'maps', '地图页面', 'On', #TIME#, #TIME#),
(NULL, 'UC2', 10, 'comment', '留言页面', 'On', #TIME#, #TIME#),
(NULL, 'UD2', 11, 'download', '下载中心', 'On', #TIME#, #TIME#);

/**
 * 菜单
 */
INSERT INTO `#DB_PREFIX#Menu`
VALUES

/*
    企业网站 - 前台
*/
(NULL, 'E1', 1, 'M0', 'guest', NULL, NULL, '企业文化', NULL, NULL, 'cn', 'On', #TIME#, #TIME#),

(NULL, 'EN1', 1, 'E1', 'guest', 'UU1', NULL, '网站首页', 'center/index', 'index', 'cn', 'On', #TIME#, #TIME#),
(NULL, 'EN2', 2, 'E1', 'guest', 'UC1', NULL, '公司简介', NULL, 'index', 'cn', 'On', #TIME#, #TIME#),
(NULL, 'EN3', 3, 'E1', 'guest', 'UP1', NULL, '产品中心', 'product/index', 'index', 'cn', 'On', #TIME#, #TIME#),
(NULL, 'EN4', 4, 'E1', 'guest', 'UN1', NULL, '新闻资讯', 'news/index', 'index', 'cn', 'On', #TIME#, #TIME#),
(NULL, 'EN5', 5, 'E1', 'guest', 'UC1', NULL, '工程案例', NULL, 'index', 'cn', 'On', #TIME#, #TIME#),
(NULL, 'EN6', 6, 'E1', 'guest', 'UJ1', NULL, '人才汇聚', 'job/index', 'index', 'cn', 'On', #TIME#, #TIME#),
(NULL, 'EN7', 7, 'E1', 'guest', 'UC1', NULL, '会员中心', 'member/reg', NULL, 'cn', 'On', #TIME#, #TIME#),
(NULL, 'EN8', 8, 'E1', 'guest', 'UP2', NULL, '采购中心', 'purchase/index', 'index', 'cn', 'On', #TIME#, #TIME#),

/*
    超级管理员
*/
(NULL, 'Super1', 1, 'M0', 'guest', NULL, NULL, '终极后台', NULL, NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'ESuper1', 1, 'Super1', 'admin', 'UU1', NULL, '后台管理', 'manage/center/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ESuper2', 2, 'Super1', 'admin', 'UU1', NULL, '模块管理', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ESuper3', 3, 'Super1', 'admin', 'UU1', NULL, '网站配置', 'manage/web/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ESuper4', 4, 'Super1', 'admin', 'UU1', NULL, '硬盘资源', 'manage/disk/index', NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'Module1', 1, 'ESuper2', 'admin', 'UU1', NULL, '模块列表', 'manage/module/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'Module2', 2, 'ESuper2', 'admin', 'UU1', NULL, '添加模块', 'manage/module/create', NULL, NULL, 'On', #TIME#, #TIME#),

/*
    后台管理 / Admin
*/
(NULL, 'A3', 1, 'M0', 'admin', NULL, NULL, '后台管理', NULL, NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'AC2', 1, 'A3', 'admin', 'UU1', NULL, '管理中心', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AP3', 2, 'A3', 'admin', 'UU1', NULL, '采购管理', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AU1', 3, 'A3', 'admin', 'UU1', NULL, '用户管理', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AP2', 4, 'A3', 'admin', 'UU1', NULL, '产品管理', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AN1', 5, 'A3', 'admin', 'UU1', NULL, '新闻管理', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AM1', 6, 'A3', 'admin', 'UU1', NULL, '菜单管理', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AR1', 7, 'A3', 'admin', 'UU1', NULL, '角色管理', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AJ1', 8, 'A3', 'admin', 'UU1', NULL, '招聘管理', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AD1', 9, 'A3', 'admin', 'UU1', NULL, '下载中心', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AS1', 10, 'A3', 'admin', 'UU1', NULL, '单页面管理', NULL, NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AC1', 11, 'A3', 'admin', 'UU1', NULL, '留言管理', NULL, NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'ACMM1', 1, 'AC1', 'admin', 'UU1', NULL, '留言列表', 'msg/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ACMM2', 2, 'AC1', 'admin', 'UU1', NULL, '添加留言', 'msg/create', NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'APPP1', 1, 'AP3', 'admin', 'UU1', NULL, '采购列表', 'purchase/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'APPP2', 2, 'AP3', 'admin', 'UU1', NULL, '添加采购', 'purchase/create', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'APPP3', 3, 'AP3', 'admin', 'UU1', NULL, '供求列表', 'supply/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'APPP4', 4, 'AP3', 'admin', 'UU1', NULL, '添加供求', 'supply/create', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'APPP5', 5, 'AP3', 'admin', 'UU1', NULL, '投标管理', 'bid/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'APPP6', 6, 'AP3', 'admin', 'UU1', NULL, '添加投标', 'bid/create', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'APPP9', 9, 'AP3', 'admin', 'UU1', NULL, '采供分类', 'psb-cls/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'APPP10', 10, 'AP3', 'admin', 'UU1', NULL, '添加采供分类', 'psb-cls/create', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'APPP11', 11, 'AP3', 'admin', 'UU1', NULL, '查看提交价格', 'sp-offer/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'APPP12', 12, 'AP3', 'admin', 'UU1', NULL, '导航分类管理', 'nav-cls/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'APPP13', 13, 'AP3', 'admin', 'UU1', NULL, '添加导航分类', 'nav-cls/create', NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'ADDD1', 1, 'AD1', 'admin', 'UU1', NULL, '下载中心列表', 'download/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ADDD2', 2, 'AD1', 'admin', 'UU1', NULL, '添加下载内容', 'download/create', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ADDD3', 3, 'AD1', 'admin', 'UU1', NULL, '下载中心分类', 'download-cls/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ADDD4', 4, 'AD1', 'admin', 'UU1', NULL, '添加下载中心分类', 'download-cls/create', NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'ASSS3', 3, 'AS1', 'admin', 'UU1', NULL, '单页面分类', 'pages-cls/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ASSS4', 4, 'AS1', 'admin', 'UU1', NULL, '添加单页面分类', 'pages-cls/create', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ASSS7', 7, 'AS1', 'admin', 'UU1', NULL, '单页面数据', 'pages-list/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ASSS8', 8, 'AS1', 'admin', 'UU1', NULL, '添加单页面数据', 'pages-list/create', NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'AUUV1', 1, 'AU1', 'admin', 'UU1', NULL, '所有用户', 'user/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AUUV2', 2, 'AU1', 'admin', 'UU1', NULL, '添加用户', 'user/create', NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'AMMV1', 1, 'AP2', 'admin', 'UU1', NULL, '所有产品', 'product/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AMMV2', 2, 'AP2', 'admin', 'UU1', NULL, '添加产品', 'product/create', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AMMV3', 3, 'AP2', 'admin', 'UU1', NULL, '产品分类', 'product-cls/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AMMV4', 4, 'AP2', 'admin', 'UU1', NULL, '添加产品分类', 'product-cls/create', NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'AMMC1', 1, 'AN1', 'admin', 'UU1', NULL, '所有新闻', 'news/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AMMC2', 2, 'AN1', 'admin', 'UU1', NULL, '添加新闻', 'news/create', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AMMC4', 4, 'AN1', 'admin', 'UU1', NULL, '新闻分类', 'news-cls/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AMMC5', 5, 'AN1', 'admin', 'UU1', NULL, '添加新闻分类', 'news-cls/create', NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'AUMV1', 1, 'AM1', 'admin', 'UU1', NULL, '所有菜单', 'menu/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AUMV2', 2, 'AM1', 'admin', 'UU1', NULL, '创建菜单', 'menu/create', NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'ACenter1', 1, 'AC2', 'admin', 'UU1', NULL, '管理中心', 'center/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ACenter2', 2, 'AC2', 'admin', 'UU1', NULL, '网站配置', 'center/conf', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ACenter3', 3, 'AC2', 'admin', 'UU1', NULL, '备份数据', 'backup/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ACenter4', 4, 'AC2', 'admin', 'UU1', NULL, '网站档案', 'center/info', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ACenter5', 5, 'AC2', 'admin', 'UU1', NULL, '网站SEO设置', 'center/seo', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ACenter6', 6, 'AC2', 'admin', 'UU1', NULL, '轮播图管理', 'slide/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ACenter7', 7, 'AC2', 'admin', 'UU1', NULL, '轮播图分类管理', 'slide-cls/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ACenter8', 8, 'AC2', 'admin', 'UU1', NULL, '模板管理', 'tpl/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ACenter9', 9, 'AC2', 'admin', 'UU1', NULL, '访客管理', 'visitor/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'ACenter10', 10, 'AC2', 'admin', 'UU1', NULL, '操作日志', 'operate/index', NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'AURR1', 1, 'AR1', 'admin', 'UU1', NULL, '所有角色', 'role/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AURR2', 2, 'AR1', 'admin', 'UU1', NULL, '添加角色', 'role/create', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AURR3', 3, 'AR1', 'admin', 'UU1', NULL, '所有权限', 'power/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AURR4', 4, 'AR1', 'admin', 'UU1', NULL, '添加权限', 'power/create', NULL, NULL, 'On', #TIME#, #TIME#),

(NULL, 'AJJV1', 1, 'AJ1', 'admin', 'UU1', NULL, '所有招聘', 'job/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AJJV2', 2, 'AJ1', 'admin', 'UU1', NULL, '添加招聘', 'job/create', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AJJV3', 3, 'AJ1', 'admin', 'UU1', NULL, '人才简历', 'resume/index', NULL, NULL, 'On', #TIME#, #TIME#),
(NULL, 'AJJV4', 4, 'AJ1', 'admin', 'UU1', NULL, '用户应聘', 'job/users', NULL, NULL, 'On', #TIME#, #TIME#)
