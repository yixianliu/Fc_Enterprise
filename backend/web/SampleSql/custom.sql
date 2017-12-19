/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 小程序
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * 对接小程序
 */
DROP TABLE IF EXISTS `#DB_PREFIX#WeChat`;
CREATE TABLE `#DB_PREFIX#WeChat` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` VARCHAR(85) NOT NULL COMMENT '用户ID',
  `title` VARCHAR(125) NOT NULL COMMENT '招聘ID',
  `content` TEXT NOT NULL COMMENT '内容',
  `is_using` SET('On', 'Off') NOT NULL COMMENT '是否启用',
  `created_at` INT(11) UNSIGNED NOT NULL,
  `updated_at` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;