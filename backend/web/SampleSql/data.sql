
/**
 * Author:  yixia_000
 * Created: 2017-4-23
 */

/**
 * 网站配置参数
 */
INSERT INTO `#DB_PREFIX#Conf`
VALUES
(NULL, 'NAME', '网站名称', '#NAME#', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'SITE_URL', '网站地址', '#SITE_URL#', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'DEVELOPERS', '开发团队', '#DEVELOPERS#', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'TITLE', '网站标题', '#TITLE#', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'EMAIL', '网站邮箱', '#EMAIL#', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'DESCRIPTION', '网站描述', '#DESCRIPTION#', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'ICP', '网站ICP', '#ICP#', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'PHONE', '联系电话', '#PHONE#', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'COPYRIGHT', '网站版权', '#COPYRIGHT#', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'KEYWORDS', '网站关键字', '#KEYWORDS#', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'FILE_UPLOAD_TYPE', '上传文件格式', 'zip,gz,rar,iso,doc,xsl,ppt,wps', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'IMAGE_UPLOAD_TYPE', '上传图片格式', 'jpg,gif,png', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'FILE_UPLOAD_SIZE', '上传文件大小', 5000000, NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'IMAGE_UPLOAD_SIZE', '上传图片大小', 5000000, NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'JUMP_SUCCEED_NUM', '成功跳转', 5, NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'JUMP_ERROR_NUM', '错误跳转', 5, NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'COMMENT_NUM', '留言列表页数量', 25, NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'VIEW_NUM', '帖子列表页数量', 50, NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'TIME_FORMAT', '是否启用时间格式', 'On', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'CODE_STATUS', '是否启用验证码', 'On', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'REG_STATUS', '是否启用注册', 'On', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'WEB_STATUS', '是否启用网站状态', 'On', NULL, 'On', 'cn', #TIME#, #TIME#),
(NULL, 'LOGIN_STATUS', '是否启用登陆', 'On', NULL, 'On', 'cn', #TIME#, #TIME#);

/**
 * 友情链接
 */
INSERT INTO `#DB_PREFIX#Friend_link`
VALUES
(NULL, '#DEVELOPERS#', '#TITLE#', '#USERNAME#', NULL, '#SITE_URL#', 'On', 'On', #TIME#, #TIME#);

/**
 * 管理员
 */
INSERT INTO `#DB_PREFIX#Management`
VALUES
(NULL, '#USERNAME#', '#PASSWORD#', 'R1', NULL, NULL, 'On', NULL, #TIME#, #TIME# ),
(NULL, '#USERNAME#Zcc', '#PASSWORD#', 'R2', NULL, NULL, 'On', NULL, #TIME#, #TIME#);

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
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 菜单
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

INSERT INTO `#DB_PREFIX#Menu_Model`
VALUES
(NULL, 'UP1', 1, 'product', '产品中心', 'On', #TIME#, #TIME#),
(NULL, 'UN1', 2, 'news', '新闻中心', 'On', #TIME#, #TIME#),
(NULL, 'UJ1', 3, 'job', '招聘中心', 'On', #TIME#, #TIME#),
(NULL, 'UC1', 4, 'pages', '自定义页面', 'On', #TIME#, #TIME#),
(NULL, 'UU1', 5, 'urls', '外部链接', 'On', #TIME#, #TIME#);

INSERT INTO `#DB_PREFIX#Menu`
VALUES

/*
    驯力文化 - 前台
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
(NULL, 'HNC3', 3, 'HN6', 'admin', NULL, NULL, '土豪的世界', NULL, 'On', #TIME#, #TIME#),

/*
    企业网站 - 前台
*/
(NULL, 'E1', 1, 'M0', 'guest', NULL, NULL, '企业文化', NULL, 'On', #TIME#, #TIME#),

(NULL, 'EN1', 1, 'E1', 'guest', NULL, NULL, '网站首页', NULL, 'On', #TIME#, #TIME#),
(NULL, 'EN2', 2, 'E1', 'guest', NULL, NULL, '公司简介', NULL, 'On', #TIME#, #TIME#),
(NULL, 'EN3', 3, 'E1', 'guest', NULL, NULL, '产品中心', NULL, 'On', #TIME#, #TIME#),
(NULL, 'EN4', 4, 'E1', 'guest', NULL, NULL, '新闻资讯', NULL, 'On', #TIME#, #TIME#),
(NULL, 'EN5', 5, 'E1', 'guest', NULL, NULL, '招商加盟', NULL, 'On', #TIME#, #TIME#),
(NULL, 'EN6', 6, 'E1', 'guest', NULL, NULL, '招贤纳士', NULL, 'On', #TIME#, #TIME#),
(NULL, 'EN7', 7, 'E1', 'guest', NULL, NULL, '联系我们', NULL, 'On', #TIME#, #TIME#),

/*
    后台管理 / Admin
*/
(NULL, 'A3', 1, 'M0', 'admin', NULL, NULL, '后台管理', NULL, 'On', #TIME#, #TIME#),

(NULL, 'AC2', 1, 'A3', 'admin', 'UU1', NULL, '管理中心', NULL, 'On', #TIME#, #TIME#),
(NULL, 'AU1', 2, 'A3', 'admin', 'UU1', NULL, '用户管理', NULL, 'On', #TIME#, #TIME#),
(NULL, 'AP2', 3, 'A3', 'admin', 'UU1', NULL, '产品管理', NULL, 'On', #TIME#, #TIME#),
(NULL, 'AN1', 4, 'A3', 'admin', 'UU1', NULL, '新闻管理', NULL, 'On', #TIME#, #TIME#),
(NULL, 'AM1', 7, 'A3', 'admin', 'UU1', NULL, '菜单管理', NULL, 'On', #TIME#, #TIME#),
(NULL, 'AR1', 8, 'A3', 'admin', 'UU1', NULL, '角色管理', NULL, 'On', #TIME#, #TIME#),
(NULL, 'AJ1', 9, 'A3', 'admin', 'UU1', NULL, '招聘管理', NULL, 'On', #TIME#, #TIME#),
(NULL, 'AD1', 11, 'A3', 'admin', 'UU1', NULL, '下载中心', NULL, 'On', #TIME#, #TIME#),
(NULL, 'AS1', 12, 'A3', 'admin', 'UU1', NULL, '单页面管理', NULL, 'On', #TIME#, #TIME#),
(NULL, 'AC1', 13, 'A3', 'admin', 'UU1', NULL, '留言管理', NULL, 'On', #TIME#, #TIME#),

(NULL, 'ACMM1', 1, 'AC1', 'admin', 'UU1', NULL, '留言列表', 'msg/index', 'On', #TIME#, #TIME#),
(NULL, 'ACMM2', 2, 'AC1', 'admin', 'UU1', NULL, '添加留言', 'msg/create', 'On', #TIME#, #TIME#),

(NULL, 'ADDD1', 1, 'AD1', 'admin', 'UU1', NULL, '下载中心列表', 'download/index', 'On', #TIME#, #TIME#),
(NULL, 'ADDD2', 2, 'AD1', 'admin', 'UU1', NULL, '添加下载内容', 'download/create', 'On', #TIME#, #TIME#),
(NULL, 'ADDD3', 3, 'AD1', 'admin', 'UU1', NULL, '下载中心分类', 'download-cls/index', 'On', #TIME#, #TIME#),
(NULL, 'ADDD4', 4, 'AD1', 'admin', 'UU1', NULL, '添加下载中心分类', 'download-cls/create', 'On', #TIME#, #TIME#),

(NULL, 'ASSS1', 1, 'AS1', 'admin', 'UU1', NULL, '所有单页面', 'pages/index', 'On', #TIME#, #TIME#),
(NULL, 'ASSS2', 2, 'AS1', 'admin', 'UU1', NULL, '添加单页面', 'pages/create', 'On', #TIME#, #TIME#),
(NULL, 'ASSS3', 3, 'AS1', 'admin', 'UU1', NULL, '单页面分类', 'pages-cls/index', 'On', #TIME#, #TIME#),
(NULL, 'ASSS4', 4, 'AS1', 'admin', 'UU1', NULL, '添加单页面分类', 'pages-cls/create', 'On', #TIME#, #TIME#),

(NULL, 'AUUV1', 1, 'AU1', 'admin', 'UU1', NULL, '所有用户', 'user/index', 'On', #TIME#, #TIME#),
(NULL, 'AUUV2', 2, 'AU1', 'admin', 'UU1', NULL, '添加用户', 'user/create', 'On', #TIME#, #TIME#),

(NULL, 'AMMV1', 1, 'AP2', 'admin', 'UU1', NULL, '所有产品', 'product/index', 'On', #TIME#, #TIME#),
(NULL, 'AMMV2', 2, 'AP2', 'admin', 'UU1', NULL, '添加产品', 'product/create', 'On', #TIME#, #TIME#),
(NULL, 'AMMV3', 3, 'AP2', 'admin', 'UU1', NULL, '产品分类', 'product-cls/index', 'On', #TIME#, #TIME#),
(NULL, 'AMMV4', 4, 'AP2', 'admin', 'UU1', NULL, '添加产品分类', 'product-cls/create', 'On', #TIME#, #TIME#),

(NULL, 'AMMC1', 1, 'AN1', 'admin', 'UU1', NULL, '所有新闻', 'news/index', 'On', #TIME#, #TIME#),
(NULL, 'AMMC2', 2, 'AN1', 'admin', 'UU1', NULL, '添加新闻', 'news/create', 'On', #TIME#, #TIME#),
(NULL, 'AMMC4', 4, 'AN1', 'admin', 'UU1', NULL, '新闻分类', 'news-cls/index', 'On', #TIME#, #TIME#),
(NULL, 'AMMC5', 5, 'AN1', 'admin', 'UU1', NULL, '添加新闻分类', 'news-cls/create', 'On', #TIME#, #TIME#),

(NULL, 'AUMV1', 1, 'AM1', 'admin', 'UU1', NULL, '所有菜单', 'menu/index', 'On', #TIME#, #TIME#),
(NULL, 'AUMV2', 2, 'AM1', 'admin', 'UU1', NULL, '创建菜单', 'menu/create', 'On', #TIME#, #TIME#),

(NULL, 'ACCC1', 1, 'AC2', 'admin', 'UU1', NULL, '管理中心', 'center/index', 'On', #TIME#, #TIME#),
(NULL, 'ACCC2', 2, 'AC2', 'admin', 'UU1', NULL, '网站配置', 'center/conf', 'On', #TIME#, #TIME#),
(NULL, 'ACCC3', 3, 'AC2', 'admin', 'UU1', NULL, '备份数据', 'center/backup', 'On', #TIME#, #TIME#),
(NULL, 'ACCC4', 4, 'AC2', 'admin', 'UU1', NULL, '网站档案', 'center/info', 'On', #TIME#, #TIME#),
(NULL, 'ACCC5', 5, 'AC2', 'admin', 'UU1', NULL, '网站SEO设置', 'center/seo', 'On', #TIME#, #TIME#),

(NULL, 'AURR1', 1, 'AR1', 'admin', 'UU1', NULL, '所有角色权限', NULL, 'On', #TIME#, #TIME#),
(NULL, 'AURR2', 2, 'AR1', 'admin', 'UU1', NULL, '查看角色权限', NULL, 'On', #TIME#, #TIME#),
(NULL, 'AURR3', 3, 'AR1', 'admin', 'UU1', NULL, '创建角色权限', NULL, 'On', #TIME#, #TIME#),
(NULL, 'AURR4', 4, 'AR1', 'admin', 'UU1', NULL, '角色关联权限', NULL, 'On', #TIME#, #TIME#),

(NULL, 'AJJV1', 1, 'AJ1', 'admin', 'UU1', NULL, '所有招聘', 'job/index', 'On', #TIME#, #TIME#),
(NULL, 'AJJV2', 2, 'AJ1', 'admin', 'UU1', NULL, '添加招聘', 'job/create', 'On', #TIME#, #TIME#),
(NULL, 'AJJV3', 3, 'AJ1', 'admin', 'UU1', NULL, '人才简历', 'resume/index', 'On', #TIME#, #TIME#),
(NULL, 'AJJV4', 4, 'AJ1', 'admin', 'UU1', NULL, '用户应聘', 'job/users', 'On', #TIME#, #TIME#)
