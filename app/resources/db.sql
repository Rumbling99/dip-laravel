DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
	`id`				INT UNSIGNED	NOT NULL AUTO_INCREMENT,
	`email`				VARCHAR(128)	NOT NULL,
	`name`				VARCHAR(128)	NOT NULL,
	`password`			VARCHAR(128)	NOT NULL,
	`created_at`		TIMESTAMP		NOT NULL,
	`updated_at`		TIMESTAMP		NOT NULL,
	`remember_token`	VARCHAR(128),
	PRIMARY KEY(`id`),
	KEY(`email`),
	KEY(`name`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=10001;

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
    `id`                        INT UNSIGNED    NOT NULL auto_increment,
    `game_id`                   INT UNSIGNED    NOT NULL,
    `game_time_year`            INT UNSIGNED    NOT NULL,
    `game_time_turn`            TINYINT         NOT NULL,
    `from`                      INT UNSIGNED    NOT NULL,
    `to`                        INT UNSIGNED    NOT NULL,
    `content`                   TEXT            NOT NULL,
    `created_at`                INT UNSIGNED    NOT NULL,
    PRIMARY KEY (`id`),
    KEY (`game_id`),
    KEY (`created_at`),
    KEY (`to`)
)DEFAULT CHARACTER SET utf8;

DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
    `id`                        INT UNSIGNED    NOT NULL auto_increment,
    `name`                      VARCHAR(64)     NOT NULL,
    `created_at`                TIMESTAMP       NOT NULL,
    `updated_at`                TIMESTAMP       NOT NULL,
    `meta`                      TEXT,
    `creator_id`                INT UNSIGNED    NOT NULL,
    `password`                  VARCHAR(64),
    `type`                      INT UNSIGNED    DEFAULT 0,
    `player_count`              INT UNSIGNED    DEFAULT 0,
    `max_player_count`          INT UNSIGNED    DEFAULT 7,
    `status`                    INT UNSIGNED    NOT NULL DEFAULT 1,
    `game_time_year`            INT UNSIGNED,
    `game_time_turn`            TINYINT,
    PRIMARY KEY (`id`),
    UNIQUE KEY(`name`)
)DEFAULT CHARACTER SET utf8;

DROP TABLE IF EXISTS `game_user`;
CREATE TABLE `game_user` (
    `id`                        INT unsigned    NOT NULL auto_increment,
    `game_id`                   INT unsigned    NOT NULL,
    `user_id`                   INT unsigned    NOT NULL,
    `play_as`                   INT unsigned    NOT NULL DEFAULT 0,
    `created_at`                TIMESTAMP       NOT NULL,
    `updated_at`                TIMESTAMP       NOT NULL,
    PRIMARY KEY (`id`),
    KEY (`game_id`),
    KEY (`user_id`)
)DEFAULT CHARACTER SET utf8;