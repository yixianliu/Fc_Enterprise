
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
(NULL, '#USERNAME#', '#PASSWORD#', NULL, #TIME#, #TIME#, NULL, 999, 'On', NULL),
(NULL, '#USERNAME#_Admin', '#PASSWORD#', NULL, #TIME#, #TIME#, NULL, 999, 'On', NULL);

/**
 * * * * * * * * * * * * * * * * * * * * * *
 * 权限
 * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 角色
 */
INSERT INTO `#DB_PREFIX#Role`
VALUES
(NULL, 1, 'R1', '一代宗师', 10000, '所有板块最高级别', NULL, 'On', #TIME#),
(NULL, 2, 'R2', '首席长老', 9000, '板块内最高级别', NULL, 'On', #TIME#),
(NULL, 3, 'R3', '左右护法', 8000, '圈内最高级别', NULL, 'On', #TIME#),
(NULL, 4, 'R4', '骨灰元老', 4000, '本论坛贡献最高者', NULL, 'On', #TIME#),
(NULL, 5, 'R5', '江湖奇才', 7000, '本版块贡献最高者', NULL, 'On', #TIME#),
(NULL, 6, 'R6', '金牌会员', 6000, '金牌会员', NULL, 'On', #TIME#),
(NULL, 7, 'R7', '高级会员', 5000, '高级会员', NULL, 'On', #TIME#),
(NULL, 8, 'R8', '特约撰稿人', 3000, '特约撰稿人', NULL, 'On', #TIME#),
(NULL, 9, 'R9', '中级会员', 2000, '中级会员', NULL, 'On', #TIME#),
(NULL, 10, 'R10', '初级会员', 1000,  '初级会员', NULL, 'On', #TIME#),
(NULL, 11, 'R11', '普通会员', 500, '普通会员', NULL, 'On', #TIME#),
(NULL, 12, 'R12', '验证用户', 100, '验证用户', NULL, 'On', #TIME#),
(NULL, 13, 'R13', '禁止发言', 50, '禁止发言', NULL, 'On', #TIME#),
(NULL, 14, 'R14', '未验证会员', 10, '未验证会员', NULL, 'On', #TIME#),
(NULL, 15, 'R15', '游客', 0, '游客,还没注册的', NULL, 'On', #TIME#);

/**
 * 权限
 */
INSERT INTO `#DB_PREFIX#Power`
VALUES

/*
    上传
*/
(NULL, 'U1', '上传图片',  NULL, 'User', 'Upload', 'Image', NULL, 'On', 'On', #TIME#),
(NULL, 'U2', '上传视频',  NULL, 'User', 'Upload', 'Video', NULL, 'On', 'On', #TIME#),
(NULL, 'U3', '上传音乐',  NULL, 'User', 'Upload', 'Music', NULL, 'On', 'On', #TIME#),

/*
    微商
*/
(NULL, 'MM1', '编辑商户',  NULL, 'Microhurt', 'Microhurt', 'Edit', NULL, 'On', 'On', #TIME#),
(NULL, 'MM2', '查看商户',  NULL, 'Microhurt', 'Microhurt', 'Details', NULL, 'On', 'On', #TIME#),
(NULL, 'MM3', '浏览商户',  NULL, 'Microhurt', 'Microhurt', 'View', NULL, 'On', 'On', #TIME#),
(NULL, 'MM4', '删除商户',  NULL, 'Microhurt', 'Microhurt', 'Delete', NULL, 'On', 'On', #TIME#),
(NULL, 'MM5', '添加商户',  NULL, 'Microhurt', 'Microhurt', 'Create', NULL, 'On', 'On', #TIME#),

/*
    用户
*/
(NULL, 'UA1', '编辑用户',  NULL, 'Admin', 'User', 'Edit', NULL, 'On', 'On', #TIME#),
(NULL, 'UA2', '查看用户',  NULL, 'Admin', 'User', 'Details', NULL, 'On', 'On', #TIME#),
(NULL, 'UA3', '浏览用户',  NULL, 'Admin', 'User', 'View', NULL, 'On', 'On', #TIME#),
(NULL, 'UA4', '删除商户',  NULL, 'Admin', 'User', 'Delete', NULL, 'On', 'On', #TIME#),
(NULL, 'UA5', '添加用户',  NULL, 'Admin', 'User', 'Create', NULL, 'On', 'On', #TIME#),

/*
    音乐资源
*/
(NULL, 'UP1', '编辑音乐资源',  NULL, 'Home', 'Product', 'Edit', NULL, 'On', 'On', #TIME#),
(NULL, 'UP2', '删除音乐资源',  NULL, 'Home', 'Product', 'Delete', NULL, 'On', 'On', #TIME#),
(NULL, 'UP3', '浏览音乐资源',  NULL, 'Home', 'Product', 'View', NULL, 'On', 'On', #TIME#),
(NULL, 'UP4', '创建音乐资源',  NULL, 'Home', 'Product', 'Create', NULL, 'On', 'On', #TIME#),
(NULL, 'UP5', '音乐资源详情',  NULL, 'Home', 'Product', 'Details', NULL, 'On', 'On', #TIME#),
(NULL, 'UP6', '音乐资源评论',  NULL, 'Home', 'Product', 'Comment', NULL, 'On', 'On', #TIME#),

/*
    电影资源
*/
(NULL, 'UM1', '编辑产品',  NULL, 'Home', 'Movie', 'Edit', NULL, 'On', 'On', #TIME#),
(NULL, 'UM2', '删除产品',  NULL, 'Home', 'Movie', 'Delete', NULL, 'On', 'On', #TIME#),
(NULL, 'UM3', '浏览产品',  NULL, 'Home', 'Movie', 'View', NULL, 'On', 'On', #TIME#),
(NULL, 'UM4', '创建产品',  NULL, 'Home', 'Movie', 'Create', NULL, 'On', 'On', #TIME#),
(NULL, 'UM5', '产品详情',  NULL, 'Home', 'Movie', 'Details', NULL, 'On', 'On', #TIME#),
(NULL, 'UM6', '产品评论',  NULL, 'Home', 'Movie', 'Comment', NULL, 'On', 'On', #TIME#);

/**
 * * * * * * * * * * * * * * * * * * * * * *
 * 用户
 * * * * * * * * * * * * * * * * * * * * * *
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
(NULL, 'H1', 1, 'M0', 'R15', '驯力文化', '亦以俭自律，不少变。', NULL, 'front', 'On', #TIME#),

(NULL, 'HN1', 1, 'H1', 'R15', '文化中心', '这里就是你训练自律的好地方.', NULL, 'culture', 'On', #TIME#),
(NULL, 'HN2', 2, 'H1', 'R15', '记录中心', '各种电影资源', NULL, NULL, 'On', #TIME#),
(NULL, 'HN3', 3, 'H1', 'R15', '统计中心', '各种音乐资源', NULL, 'Music', 'On', #TIME#),
(NULL, 'HN4', 4, 'H1', 'R15', '文档资源', '各种文档资源', NULL, NULL, 'On', #TIME#),
(NULL, 'HN5', 5, 'H1', 'R15', '视频资源', '各种视频资源', NULL, 'Video', 'On', #TIME#),
(NULL, 'HN6', 6, 'H1', 'R15', '神推荐', '男神、女神、屌丝各方人士极力推荐', NULL, 'God', 'On', #TIME#),
(NULL, 'HN7', 7, 'H1', 'R15', '驯力文化', '这里就是驯力文化的集散地,欢迎光临', NULL, 'Center', 'On', #TIME#),

(NULL, 'HNC1', 1, 'HN6', 'R15', '最强人气', '传说男神、女神、颜值高都看过!!', NULL, 'View', 'On', #TIME#),
(NULL, 'HNC2', 2, 'HN6', 'R15', '精选资源', '精选资源推荐', NULL, 'Choiceness', 'On', #TIME#),
(NULL, 'HNC3', 3, 'HN6', 'R15', '土豪的世界', '全民都喜欢的资源', NULL, 'Product', 'On', #TIME#),

/*
    用户中心 / User
*/
(NULL, 'U1', 1, 'M0', 'R15', '用户中心', '各种大神的产品,各种人气的产品', NULL, 'User', 'On', #TIME#),

(NULL, 'UN1', 1, 'U1', 'R15', '资源评测', '您的评测会带给更多人更多选择', NULL, 'Evaluate', 'On', #TIME#),
(NULL, 'UN2', 2, 'U1', 'R15', '精选大伽', '让每一次促销普及大众', NULL, 'Promote', 'On', #TIME#),
(NULL, 'UN3', 3, 'U1', 'R15', '淘一淘', '看看哪个产品与你最有缘', NULL, 'Tao', 'On', #TIME#),
(NULL, 'UN4', 4, 'U1', 'R15', '我的设置', '对用户发布的产品,进行管理和操作', NULL, 'Conf', 'On', #TIME#),
(NULL, 'UN5', 5, 'U1', 'R15', '我的吐槽', '只属于我的吐槽', NULL, 'Bullshit', 'On', #TIME#),

(NULL, 'UE1', 1, 'UN2', 'R15', '我的评测', '所发布的产品评测', NULL, 'View', 'On', #TIME#),
(NULL, 'UE2', 2, 'UN2', 'R15', '发布评测', '发布新评测', NULL, 'Create', 'On', #TIME#),

(NULL, 'UT1', 1, 'UN4', 'R15', '淘抢购', '限时限量牛人狂欢裸奔价', NULL, 'View', 'On', #TIME#),

(NULL, 'UC1', 1, 'UN5', 'R15', '个人设置', '设置用户资料内容', NULL, 'View', 'On', #TIME#),
(NULL, 'UC2', 2, 'UN5', 'R15', '头像设置', '个性头像让你更加出众', NULL, 'Head', 'On', #TIME#),

(NULL, 'UP1', 1, 'UN3', 'R15', '集聚人气产品', '为你找出最好最棒的产品', NULL, 'View', 'On', #TIME#),
(NULL, 'UP2', 2, 'UN3', 'R15', '本周大神作品', '本周的哟', NULL, 'Week', 'On', #TIME#),
(NULL, 'UP3', 3, 'UN3', 'R15', '本月大神作品', '本月的哟', NULL, 'Month', 'On', #TIME#),

/*
    搜索中心 / Search
*/
(NULL, 'S1', 1, 'M0', 'R15', '搜索中心', '本站旨在为您提供更多的商机', NULL, 'Search', 'On', #TIME#),

(NULL, 'SN1', 1, 'S1', 'R15', '搜索资源', '搜索你需要的资源,找不到别怕,可以发帖求助', NULL, NULL, 'On', #TIME#),
(NULL, 'SN2', 2, 'S1', 'R15', '搜索用户', '对网站用户发布的产品,进行管理和操作', NULL, NULL, 'On', #TIME#),
(NULL, 'SN3', 3, 'S1', 'R15', '搜索商户', '对网站用户发布的产品,进行管理和操作', NULL, NULL, 'On', #TIME#),

(NULL, 'SNSP1', 1, 'SN1', 'R15', '搜索产品', '搜索你需要的产品', NULL, 'product', 'On', #TIME#),
(NULL, 'SNSP2', 2, 'SN1', 'R15', '热门搜索', '好多人都在搜索的产品呢', NULL, 'product/hot', 'On', #TIME#),
(NULL, 'SNSP3', 3, 'SN1', 'R15', '新奇产品', '还没有人搜索的产品', NULL, 'product/novel', 'On', #TIME#),

(NULL, 'SNSU1', 1, 'SN2', 'R15', '搜索用户', '搜索你要找的用户', NULL, 'user', 'On', #TIME#),
(NULL, 'SNSU2', 2, 'SN2', 'R15', '热搜用户', '好多人都在搜索这个用户呢', NULL, 'user/hot', 'On', #TIME#),

(NULL, 'SMSU1', 1, 'SN2', 'R15', '搜索商户', '搜索你要找的商户', NULL, 'microhurt', 'On', #TIME#),
(NULL, 'SMSU2', 2, 'SN2', 'R15', '热搜商户', '好多人都在搜索这个商户', NULL, 'microhurt/hot', 'On', #TIME#),

/*
    后台管理 / Admin
*/
(NULL, 'A3', 1, 'M0', 'R1', '后台管理', '后台管理', NULL, 'Admin', 'On', #TIME#),

(NULL, 'AU1', 1, 'A3', 'R1', '用户管理', '用户管理', NULL, NULL, 'On', #TIME#),
(NULL, 'AMOVIE1', 2, 'A3', 'R1', '电影资源管理', '电影资源管理', NULL, NULL, 'On', #TIME#),
(NULL, 'AMUSIC1', 3, 'A3', 'R1', '音乐资源管理', '音乐资源管理', NULL, NULL, 'On', #TIME#),
(NULL, 'ADOC1', 4, 'A3', 'R1', '文档资源管理', '文档资源管理', NULL, NULL, 'On', #TIME#),
(NULL, 'AVIDEO1', 5, 'A3', 'R1', '视频资源管理', '视频资源管理', NULL, NULL, 'On', #TIME#),
(NULL, 'AM1', 6, 'A3', 'R1', '菜单管理', '菜单管理', NULL, NULL, 'On', #TIME#),
(NULL, 'AC2', 7, 'A3', 'R1', '管理中心', '对网站进行全方位管理和操作', NULL, NULL, 'On', #TIME#),
(NULL, 'AC3', 8, 'A3', 'R1', '核心配置', '核心配置', NULL, NULL, 'On', #TIME#),
(NULL, 'AR1', 9, 'A3', 'R1', '角色管理', '角色管理', NULL, NULL, 'On', #TIME#),
(NULL, 'AP1', 10, 'A3', 'R1', '权限管理', '权限管理', NULL, NULL, 'On', #TIME#),

(NULL, 'AUUV1', 1, 'AU1', 'R1', '所有用户', '查看所有用户', NULL, 'user', 'On', #TIME#),
(NULL, 'AUUV2', 2, 'AU1', 'R1', '查看用户', '查看用户', NULL, 'user/show', 'On', #TIME#),
(NULL, 'AUUV3', 3, 'AU1', 'R1', '编辑用户', '编辑用户 (提升权限,或者禁用)', NULL, 'user/edit', 'On', #TIME#),

(NULL, 'AMMV1', 1, 'AMOVIE1', 'R1', '所有电影资源', '查看所有电影资源', NULL, 'movie', 'On', #TIME#),
(NULL, 'AMMV2', 2, 'AMOVIE1', 'R1', '添加电影资源', '添加新的电影资源', NULL, 'movie/create', 'On', #TIME#),
(NULL, 'AMMV4', 4, 'AMOVIE1', 'R1', '电影资源分类', '创建新的分类信息', NULL, 'movie/classify', 'On', #TIME#),
(NULL, 'AMMV5', 5, 'AMOVIE1', 'R1', '添加资源分类', '创建新的分类信息', NULL, 'classify/movie', 'On', #TIME#),

(NULL, 'AMMC1', 1, 'AMUSIC1', 'R1', '所有音乐资源', '查看所有音乐资源', NULL, 'music', 'On', #TIME#),
(NULL, 'AMMC2', 2, 'AMUSIC1', 'R1', '添加音乐资源', '添加新的音乐资源', NULL, 'music/store', 'On', #TIME#),
(NULL, 'AMMC4', 4, 'AMUSIC1', 'R1', '音乐资源分类', '创建新的分类信息', NULL, 'music/classify', 'On', #TIME#),
(NULL, 'AMMC5', 5, 'AMUSIC1', 'R1', '添加资源分类', '创建新的分类信息', NULL, 'classify/music', 'On', #TIME#),

(NULL, 'AMDV1', 1, 'ADOC1', 'R1', '所有文档资源', '查看所有文档资源', NULL, 'document', 'On', #TIME#),
(NULL, 'AMDV2', 2, 'ADOC1', 'R1', '添加文档资源', '添加新的文档资源', NULL, 'document/create', 'On', #TIME#),
(NULL, 'AMDV4', 4, 'ADOC1', 'R1', '文档资源分类', '创建新的分类信息', NULL, 'document/classify', 'On', #TIME#),
(NULL, 'AMDV5', 5, 'ADOC1', 'R1', '添加资源分类', '创建新的分类信息', NULL, 'classify/document', 'On', #TIME#),

(NULL, 'AMVV1', 1, 'AVIDEO1', 'R1', '所有视频资源', '查看所有视频资源', NULL, 'video', 'On', #TIME#),
(NULL, 'AMVV2', 2, 'AVIDEO1', 'R1', '添加视频资源', '添加新的视频资源', NULL, 'video/create', 'On', #TIME#),
(NULL, 'AMVV4', 4, 'AVIDEO1', 'R1', '文档资源分类', '创建新的分类信息', NULL, 'video/classify', 'On', #TIME#),
(NULL, 'AMVV5', 5, 'AVIDEO1', 'R1', '添加资源分类', '创建新的分类信息', NULL, 'classify/video', 'On', #TIME#),

(NULL, 'AUMV1', 1, 'AM1', 'R1', '所有菜单', '查看所有菜单', NULL, 'menu', 'On', #TIME#),
(NULL, 'AUMV2', 2, 'AM1', 'R1', '创建菜单', '创建新的菜单', NULL, 'menu/store', 'On', #TIME#),

(NULL, 'AUCC1', 1, 'AC2', 'R1', '管理中心', '管理中心', NULL, 'center', 'On', #TIME#),

(NULL, 'ACCC1', 1, 'AC3', 'R1', '网站配置', '网站配置', NULL, 'conf', 'On', #TIME#),
(NULL, 'ACCC2', 2, 'AC3', 'R1', '备份数据', '备份网站数据', NULL, 'conf/store', 'On', #TIME#),
(NULL, 'ACCC3', 3, 'AC3', 'R1', '网站环境', '查看服务器环境', NULL, 'conf/show', 'On', #TIME#),

(NULL, 'AURR1', 1, 'AR1', 'R1', '所有角色', '查看所有角色', NULL, 'role/', 'On', #TIME#),
(NULL, 'AURR2', 2, 'AR1', 'R1', '查看角色', '查看角色', NULL, 'role/show', 'On', #TIME#),
(NULL, 'AURR3', 3, 'AR1', 'R1', '创建角色', '创建新的权限角色', NULL, 'role/store', 'On', #TIME#),

(NULL, 'AUPP1', 1, 'AP1', 'R1', '所有权限', '查看所有权限', NULL, 'power', 'On', #TIME#),
(NULL, 'AUPP2', 2, 'AP1', 'R1', '查看权限', '查看权限', NULL, 'power/show', 'On', #TIME#),
(NULL, 'AUPP3', 3, 'AP1', 'R1', '创建权限', '创建新的权限角色', NULL, 'power/store', 'On', #TIME#)
