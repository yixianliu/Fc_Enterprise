
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
(NULL, '#DEVELOPERS#', '#TITLE#', '#USERNAME#', NULL, '#SITE_URL#', 'On', 'On', #TIME#);

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
(NULL, 'S1', 1, '自律人生', NULL, NULL, NULL, 'S0', 'On', 'On', 'On', #TIME#),
(NULL, 'S2', 2, '励志牛人', NULL, NULL, NULL, 'S0', 'On', 'On', 'On', #TIME#),
(NULL, 'S3', 3, '大杂烩', NULL, NULL, NULL, 'S0', 'On', 'On', 'On', #TIME#),
(NULL, 'S4', 4, '音乐', NULL, NULL, NULL, 'S0', 'On', 'On', 'On', #TIME#),
(NULL, 'S5', 5, '视频', NULL, NULL, NULL, 'S0', 'On', 'On', 'On', #TIME#);

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
(NULL, 'H1', 1, 'M0', 'R15', '驯力文化', 'On', #TIME#),

(NULL, 'HN1', 1, 'H1', 'R15', '文化中心', 'On', #TIME#),
(NULL, 'HN2', 2, 'H1', 'R15', '记录中心', 'On', #TIME#),
(NULL, 'HN3', 3, 'H1', 'R15', '统计中心', 'On', #TIME#),
(NULL, 'HN4', 4, 'H1', 'R15', '文档资源', 'On', #TIME#),
(NULL, 'HN5', 5, 'H1', 'R15', '视频资源', 'On', #TIME#),
(NULL, 'HN6', 6, 'H1', 'R15', '神推荐', 'On', #TIME#),
(NULL, 'HN7', 7, 'H1', 'R15', '驯力文化', 'On', #TIME#),

(NULL, 'HNC1', 1, 'HN6', 'R15', '最强人气', 'On', #TIME#),
(NULL, 'HNC2', 2, 'HN6', 'R15', '精选资源', 'On', #TIME#),
(NULL, 'HNC3', 3, 'HN6', 'R15', '土豪的世界', 'On', #TIME#),

/*
    后台管理 / Admin
*/
(NULL, 'A3', 1, 'M0', 'R1', '后台管理', 'On', #TIME#),

(NULL, 'AC2', 1, 'A3', 'R1', '管理中心', 'On', #TIME#),
(NULL, 'AU1', 2, 'A3', 'R1', '用户管理', 'On', #TIME#),
(NULL, 'AP2', 3, 'A3', 'R1', '产品管理', 'On', #TIME#),
(NULL, 'AN1', 4, 'A3', 'R1', '新闻管理', 'On', #TIME#),
(NULL, 'AM1', 7, 'A3', 'R1', '菜单管理', 'On', #TIME#),
(NULL, 'AR1', 8, 'A3', 'R1', '角色管理', 'On', #TIME#),
(NULL, 'AP1', 9, 'A3', 'R1', '权限管理', 'On', #TIME#),

(NULL, 'AUUV1', 1, 'AU1', 'R1', '所有用户', 'On', #TIME#),
(NULL, 'AUUV2', 2, 'AU1', 'R1', '查看用户', 'On', #TIME#),
(NULL, 'AUUV3', 3, 'AU1', 'R1', '编辑用户', 'On', #TIME#),

(NULL, 'AMMV1', 1, 'AP2', 'R1', '所有产品', 'On', #TIME#),
(NULL, 'AMMV2', 2, 'AP2', 'R1', '添加产品', 'On', #TIME#),
(NULL, 'AMMV4', 4, 'AP2', 'R1', '产品分类', 'On', #TIME#),
(NULL, 'AMMV5', 5, 'AP2', 'R1', '添加产品分类', 'On', #TIME#),

(NULL, 'AMMC1', 1, 'AN1', 'R1', '所有新闻', 'On', #TIME#),
(NULL, 'AMMC2', 2, 'AN1', 'R1', '添加新闻', 'On', #TIME#),
(NULL, 'AMMC4', 4, 'AN1', 'R1', '新闻分类', 'On', #TIME#),
(NULL, 'AMMC5', 5, 'AN1', 'R1', '添加新闻分类', 'On', #TIME#),

(NULL, 'AUMV1', 1, 'AM1', 'R1', '所有菜单', 'On', #TIME#),
(NULL, 'AUMV2', 2, 'AM1', 'R1', '创建菜单', 'On', #TIME#),

(NULL, 'AUCC1', 1, 'AC2', 'R1', '管理中心', 'On', #TIME#),
(NULL, 'ACCC2', 2, 'AC2', 'R1', '网站配置', 'On', #TIME#),
(NULL, 'ACCC3', 3, 'AC2', 'R1', '备份数据', 'On', #TIME#),

(NULL, 'AURR1', 1, 'AR1', 'R1', '所有角色', 'On', #TIME#),
(NULL, 'AURR2', 2, 'AR1', 'R1', '查看角色', 'On', #TIME#),
(NULL, 'AURR3', 3, 'AR1', 'R1', '创建角色', 'On', #TIME#),

(NULL, 'AUPP1', 1, 'AP1', 'R1', '所有权限', 'On', #TIME#),
(NULL, 'AUPP2', 2, 'AP1', 'R1', '查看权限', 'On', #TIME#),
(NULL, 'AUPP3', 3, 'AP1', 'R1', '创建权限', 'On', #TIME#)
