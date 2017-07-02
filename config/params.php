<?php

/**
 * @abstract 配置文件
 * @author Yxl <zccem@163.com>
 */
return [
    'NAME' => '驯力日历',
    'TITLE' => '亦以俭自律，不少变。',
    'SITE_URL' => 'http://www.yxlcms.com',
    'KEYWORDS' => '地摊、微商、发布、共享、资讯、网络、创意、手工、DIY',
    'ICP' => '闽ICP备08105208号',
    'DESCRIPTION' => '方便、易用、极具价值的网络个人表达和用户交流分享生活的产品,分享周边地摊产品的平台.',
    'DEVELOPERS' => '创始工作室, 竭诚为您服务',
    'PHONE' => '+8613400000043',
    'COPYRIGHT' => '创始工作室室 - Founding Chamber',
    'EMAIL' => 'Admin_Fc@Yxlcms.com', // 管理员邮箱
    'FIXPHONE' => '+8613400000043', // 传真

    /**
     * 站点设置
     */
    'CODE_STATUS' => 'On',
    'REG_STATUS' => 'On',
    'WEB_STATUS' => 'On',
    'LOGIN_STATUS' => 'On', // 是否能登录
    // 时间格式
    'TIME_FORMAT' => 'm . d . Y',
    'TIME_US_FORMAT' => 'm . d . Y',
    'TIME_CUSTOMIZE_FORMAT' => NULL, // 自定义时间格式

    /**
     * 列表页数量
     */
    'COMMENT_NUM' => '50',
    'VIEW_NUM' => '50',
    'BIG_VIEW_NUM' => '50',
    'DEFAULT_VIEW_NUM' => '20',
    'PRODUCT_VIEW_NUM' => '20',
    'LONG_VIEW_NUM' => '20',
    'MIC_VIEW_NUM' => '20', // 商户列表数量

    /**
     * 上传
     */
    'FILE_UPLOAD_TYPE' => 'zip,gz,rar,iso,doc,xsl,ppt,wps',
    'IMAGE_UPLOAD_TYPE' => 'jpg,gif,png',
    'FILE_UPLOAD_SIZE' => '5000000',
    'IMAGE_UPLOAD_SIZE' => '5000000',

    // 页面跳转描述
    'JUMP_SUCCEED_NUM' => '5',
    'JUMP_ERROR_NUM' => '5',

    // 主题
    'THEME_NAME' => 'Default',
    'THEME_CUSTOMIZE_PATH' => NULL, // 主题自定义路径

    /**
     * 挂载中心帐号密码
     */
    'Username' => 'yixianliu',
    'Password' => 'yixianliu',
];
