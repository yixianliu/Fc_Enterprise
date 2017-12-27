
/**
 * Author:  yixia_000
 * Created: 2017-4-23
 */

/**
 * 网站配置参数
 */
INSERT INTO `#DB_PREFIX#Conf`
VALUES
(NULL, 'NAME', '网站名称', '#NAME#', NULL, 'On', #TIME#),
(NULL, 'SITE_URL', '网站地址', '#SITE_URL#', NULL, 'On', #TIME#),
(NULL, 'DEVELOPERS', '开发团队', '#DEVELOPERS#', NULL, 'On', #TIME#),
(NULL, 'TITLE', '网站标题', '#TITLE#', NULL, 'On', #TIME#),
(NULL, 'EMAIL', '网站邮箱', '#EMAIL#', NULL, 'On', #TIME#),
(NULL, 'DESCRIPTION', '网站描述', '#DESCRIPTION#', NULL, 'On', #TIME#),
(NULL, 'ICP', '网站ICP', '#ICP#', NULL, 'On', #TIME#),
(NULL, 'PHONE', '联系电话', '#PHONE#', NULL, 'On', #TIME#),
(NULL, 'COPYRIGHT', '网站版权', '#COPYRIGHT#', NULL, 'On', #TIME#),
(NULL, 'KEYWORDS', '网站关键字', '#KEYWORDS#', NULL, 'On', #TIME#),
(NULL, 'FILE_UPLOAD_TYPE', '上传文件格式', 'zip,gz,rar,iso,doc,xsl,ppt,wps', NULL, 'On', #TIME#),
(NULL, 'IMAGE_UPLOAD_TYPE', '上传图片格式', 'jpg,gif,png', NULL, 'On', #TIME#),
(NULL, 'FILE_UPLOAD_SIZE', '上传文件大小', 5000000, NULL, 'On', #TIME#),
(NULL, 'IMAGE_UPLOAD_SIZE', '上传图片大小', 5000000, NULL, 'On', #TIME#),
(NULL, 'JUMP_SUCCEED_NUM', '成功跳转', 5, NULL, 'On', #TIME#),
(NULL, 'JUMP_ERROR_NUM', '错误跳转', 5, NULL, 'On', #TIME#),
(NULL, 'COMMENT_NUM', '留言列表页数量', 25, NULL, 'On', #TIME#),
(NULL, 'VIEW_NUM', '帖子列表页数量', 50, NULL, 'On', #TIME#),
(NULL, 'TIME_FORMAT', '是否启用时间格式', 'On', NULL, 'On', #TIME#),
(NULL, 'CODE_STATUS', '是否启用验证码', 'On', NULL, 'On', #TIME#),
(NULL, 'REG_STATUS', '是否启用注册', 'On', NULL, 'On', #TIME#),
(NULL, 'WEB_STATUS', '是否启用网站状态', 'On', NULL, 'On', #TIME#),
(NULL, 'LOGIN_STATUS', '是否启用登陆', 'On', NULL, 'On', #TIME#);

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
INSERT INTO `#DB_PREFIX#Menu`
VALUES

/*
    驯力文化 - 前台
*/
(NULL, 'H1', 1, 'M0', 'admin', NULL, '驯力文化', 'On', #TIME#, #TIME#),

(NULL, 'HN1', 1, 'H1', 'guest', NULL, '文化中心', 'On', #TIME#, #TIME#),
(NULL, 'HN2', 2, 'H1', 'admin', NULL, '记录中心', 'On', #TIME#, #TIME#),
(NULL, 'HN3', 3, 'H1', 'admin', NULL, '统计中心', 'On', #TIME#, #TIME#),
(NULL, 'HN4', 4, 'H1', 'admin', NULL, '文档资源', 'On', #TIME#, #TIME#),
(NULL, 'HN5', 5, 'H1', 'admin', NULL, '视频资源', 'On', #TIME#, #TIME#),
(NULL, 'HN6', 6, 'H1', 'guest', NULL, '神推荐', 'On', #TIME#, #TIME#),
(NULL, 'HN7', 7, 'H1', 'admin', NULL, '驯力文化', 'On', #TIME#, #TIME#),

(NULL, 'HNC1', 1, 'HN6', 'admin', NULL, '最强人气', 'On', #TIME#, #TIME#),
(NULL, 'HNC2', 2, 'HN6', 'admin', NULL, '精选资源', 'On', #TIME#, #TIME#),
(NULL, 'HNC3', 3, 'HN6', 'admin', NULL, '土豪的世界', 'On', #TIME#, #TIME#),

/*
    企业网站 - 前台
*/
(NULL, 'E1', 1, 'M0', 'guest', NULL, '企业文化', 'On', #TIME#, #TIME#),

(NULL, 'EN1', 1, 'E1', 'guest', NULL, '网站首页', 'On', #TIME#, #TIME#),
(NULL, 'EN2', 2, 'E1', 'guest', NULL, '公司简介', 'On', #TIME#, #TIME#),
(NULL, 'EN3', 3, 'E1', 'guest', NULL, '产品中心', 'On', #TIME#, #TIME#),
(NULL, 'EN4', 4, 'E1', 'guest', NULL, '新闻资讯', 'On', #TIME#, #TIME#),
(NULL, 'EN5', 5, 'E1', 'guest', NULL, '招商加盟', 'On', #TIME#, #TIME#),
(NULL, 'EN6', 6, 'E1', 'guest', NULL, '招贤纳士', 'On', #TIME#, #TIME#),
(NULL, 'EN7', 7, 'E1', 'guest', NULL, '联系我们', 'On', #TIME#, #TIME#),

/*
    后台管理 / Admin
*/
(NULL, 'A3', 1, 'M0', 'admin', NULL, '后台管理', 'On', #TIME#, #TIME#),

(NULL, 'AC2', 1, 'A3', 'admin', NULL, '管理中心', 'On', #TIME#, #TIME#),
(NULL, 'AU1', 2, 'A3', 'admin', NULL, '用户管理', 'On', #TIME#, #TIME#),
(NULL, 'AP2', 3, 'A3', 'admin', NULL, '产品管理', 'On', #TIME#, #TIME#),
(NULL, 'AN1', 4, 'A3', 'admin', NULL, '新闻管理', 'On', #TIME#, #TIME#),
(NULL, 'AM1', 7, 'A3', 'admin', NULL, '菜单管理', 'On', #TIME#, #TIME#),
(NULL, 'AR1', 8, 'A3', 'admin', NULL, '角色管理', 'On', #TIME#, #TIME#),
(NULL, 'AJ1', 9, 'A3', 'admin', NULL, '招聘管理', 'On', #TIME#, #TIME#),
(NULL, 'AD1', 11, 'A3', 'admin', NULL, '下载中心', 'On', #TIME#, #TIME#),
(NULL, 'AS1', 12, 'A3', 'admin', NULL, '单页面管理', 'On', #TIME#, #TIME#),

(NULL, 'ADDD1', 1, 'AD1', 'admin', 'download/index', '下载中心列表', 'On', #TIME#, #TIME#),
(NULL, 'ADDD2', 2, 'AD1', 'admin', 'download/create', '添加下载内容', 'On', #TIME#, #TIME#),
(NULL, 'ADDD3', 3, 'AD1', 'admin', 'download-cls/index', '下载中心分类', 'On', #TIME#, #TIME#),
(NULL, 'ADDD4', 4, 'AD1', 'admin', 'download-cls/create', '添加下载中心分类', 'On', #TIME#, #TIME#),

(NULL, 'ASSS1', 1, 'AS1', 'admin', 'pages/index', '所有单页面', 'On', #TIME#, #TIME#),
(NULL, 'ASSS2', 2, 'AS1', 'admin', 'pages/create', '添加单页面', 'On', #TIME#, #TIME#),
(NULL, 'ASSS3', 3, 'AS1', 'admin', 'pages-cls/index', '单页面分类', 'On', #TIME#, #TIME#),
(NULL, 'ASSS4', 4, 'AS1', 'admin', 'pages-cls/create', '添加单页面分类', 'On', #TIME#, #TIME#),

(NULL, 'AUUV1', 1, 'AU1', 'admin', 'user/index', '所有用户', 'On', #TIME#, #TIME#),
(NULL, 'AUUV2', 2, 'AU1', 'admin', 'user/create', '添加用户', 'On', #TIME#, #TIME#),

(NULL, 'AMMV1', 1, 'AP2', 'admin', 'product/index', '所有产品', 'On', #TIME#, #TIME#),
(NULL, 'AMMV2', 2, 'AP2', 'admin', 'product/create', '添加产品', 'On', #TIME#, #TIME#),
(NULL, 'AMMV3', 3, 'AP2', 'admin', 'product-cls/index', '产品分类', 'On', #TIME#, #TIME#),
(NULL, 'AMMV4', 4, 'AP2', 'admin', 'product-cls/create', '添加产品分类', 'On', #TIME#, #TIME#),

(NULL, 'AMMC1', 1, 'AN1', 'admin', NULL, '所有新闻', 'On', #TIME#, #TIME#),
(NULL, 'AMMC2', 2, 'AN1', 'admin', NULL, '添加新闻', 'On', #TIME#, #TIME#),
(NULL, 'AMMC4', 4, 'AN1', 'admin', NULL, '新闻分类', 'On', #TIME#, #TIME#),
(NULL, 'AMMC5', 5, 'AN1', 'admin', NULL, '添加新闻分类', 'On', #TIME#, #TIME#),

(NULL, 'AUMV1', 1, 'AM1', 'admin', 'menu/index', '所有菜单', 'On', #TIME#, #TIME#),
(NULL, 'AUMV2', 2, 'AM1', 'admin', 'menu/create', '创建菜单', 'On', #TIME#, #TIME#),

(NULL, 'AUCC1', 1, 'AC2', 'admin', 'center/index', '管理中心', 'On', #TIME#, #TIME#),
(NULL, 'ACCC2', 2, 'AC2', 'admin', 'center/conf', '网站配置', 'On', #TIME#, #TIME#),
(NULL, 'ACCC3', 3, 'AC2', 'admin', 'center/backup', '备份数据', 'On', #TIME#, #TIME#),
(NULL, 'ACCC4', 4, 'AC2', 'admin', 'center/info', '网站档案', 'On', #TIME#, #TIME#),
(NULL, 'ACCC5', 5, 'AC2', 'admin', 'center/seo', '网站SEO设置', 'On', #TIME#, #TIME#),

(NULL, 'AURR1', 1, 'AR1', 'admin', NULL, '所有角色权限', 'On', #TIME#, #TIME#),
(NULL, 'AURR2', 2, 'AR1', 'admin', NULL, '查看角色权限', 'On', #TIME#, #TIME#),
(NULL, 'AURR3', 3, 'AR1', 'admin', NULL, '创建角色权限', 'On', #TIME#, #TIME#),
(NULL, 'AURR4', 4, 'AR1', 'admin', NULL, '角色关联权限', 'On', #TIME#, #TIME#),

(NULL, 'AJJV1', 1, 'AJ1', 'admin', 'job/index', '所有招聘', 'On', #TIME#, #TIME#),
(NULL, 'AJJV2', 2, 'AJ1', 'admin', 'job/create', '添加招聘', 'On', #TIME#, #TIME#),
(NULL, 'AJJV3', 3, 'AJ1', 'admin', 'resume/index', '人才简历', 'On', #TIME#, #TIME#),
(NULL, 'AJJV4', 4, 'AJ1', 'admin', 'job/users', '用户应聘', 'On', #TIME#, #TIME#)
