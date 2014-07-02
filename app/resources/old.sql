# DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
    `id`                        INT UNSIGNED    NOT NULL auto_increment,
    `name`                      VARCHAR(64)     NOT NULL,
    `time_created`              INT UNSIGNED    NOT NULL,
    `time_updated`              INT UNSIGNED    NOT NULL,
    `meta`                      TEXT,
    `creater`                   INT UNSIGNED    NOT NULL,
    `password`                  VARCHAR(64),
    `type`                      INT UNSIGNED    DEFAULT 0,
    `player_count`              INT UNSIGNED    DEFAULT 0,
    `max_player_count`          INT UNSIGNED    DEFAULT 7,
    `status`                    INT UNSIGNED    NOT NULL    DEFAULT 1,
    `game_time_year`            INT UNSIGNED,
    `game_time_turn`            TINYINT,
    PRIMARY KEY (`id`),
    UNIQUE KEY(`name`)
)DEFAULT CHARACTER SET utf8;

CREATE TABLE `game_situation` (
    `id`                        INT UNSIGNED    NOT NULL auto_increment,
    `game_id`                   INT UNSIGNED    NOT NULL,
    `region_id`                 INT UNSIGNED    NOT NULL,
    `occupant_country_id`       INT UNSIGNED    DEFAULT 0,
    `army_id`                   INT UNSIGNED    DEFAULT 0,
    `game_time_year`            INT UNSIGNED,
    `game_time_turn`            TINYINT,
    `time_created`              INT UNSIGNED    NOT NULL,
    PRIMARY KEY (`id`),
    KEY (`game_id`),
    KEY (`game_time_year`),
    KEY (`game_time_turn`)
)DEFAULT CHARACTER SET utf8;

# DROP TABLE IF EXISTS `army`;
CREATE TABLE `army` (
    `id`                INT UNSIGNED    NOT NULL auto_increment,
    `game_id`           INT UNSIGNED    NOT NULL,
    `country_id`        INT UNSIGNED    NOT NULL,
    `region_id`         INT UNSIGNED    NOT NULL,
    `type`              TINYINT             NOT NULL,
    `name`              VARCHAR(64),
    PRIMARY KEY (`id`),
    KEY (`game_id`),
    KEY (`country_id`)
)DEFAULT CHARACTER SET utf8;

# DROP TABLE IF EXISTS `weibo_user`;
CREATE TABLE `weibo_user` (
    `id`                    INT UNSIGNED    NOT NULL,
    `name`                  VARCHAR(64)     NOT NULL,
    `time_created`          INT UNSIGNED    NOT NULL,
    PRIMARY KEY (`id`)
)DEFAULT CHARACTER SET utf8;

# DROP TABLE IF EXISTS `player`;
CREATE TABLE `player` (
    `id`                    INT UNSIGNED    NOT NULL auto_increment,
    `name`                  VARCHAR(64)     NOT NULL,
    `time_created`          INT UNSIGNED    NOT NULL,
#    `time_last_login`       INT UNSIGNED    NOT NULL,
    `password_hash`         VARCHAR(64),
    `played_count`          INT UNSIGNED,
    `weibo_id`              INT UNSIGNED    DEFAULT NULL,
#    `rank`                  INT UNSIGNED    NOT NULL,
    PRIMARY KEY (`id`),
    KEY (`played_count`)
)DEFAULT CHARACTER SET utf8;

# DROP TABLE IF EXISTS `game_player`;
CREATE TABLE `game_player` (
    `id`                        INT unsigned    NOT NULL auto_increment,
    `game_id`                   INT unsigned    NOT NULL,
    `user_id`                   INT unsigned    NOT NULL,
    `play_as`                   INT unsigned    NOT NULL DEFAULT 0,
    `time_join`                 INT unsigned    NOT NULL,
    PRIMARY KEY (`id`),
    KEY (`game_id`),
    KEY (`user_id`)
)DEFAULT CHARACTER SET utf8;

# DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
    `id`                        INT UNSIGNED    NOT NULL,
    `name`                      VARCHAR(64)         NOT NULL,
    `color`                     CHAR(6)             NOT NULL DEFAULT 'AB9364',
    PRIMARY KEY (`id`)
)DEFAULT CHARACTER SET utf8;

# DROP TABLE IF EXISTS `region`;
CREATE TABLE `region` (
    `id`                        INT UNSIGNED    NOT NULL,
    `en_name`                   VARCHAR(64)         NOT NULL,
    `cn_name`                   VARCHAR(64)         NOT NULL,
    `short_name`                VARCHAR(64)         NOT NULL,
    `type`                      INT UNSIGNED    NOT NULL,
    PRIMARY KEY (`id`),
    KEY (`cn_name`),
    KEY (`en_name`),
    KEY (`short_name`)
)DEFAULT CHARACTER SET utf8;

# DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
    `id`                        INT UNSIGNED    NOT NULL auto_increment,
    `game_id`                   INT UNSIGNED    NOT NULL,
    `country_id`                INT UNSIGNED    NOT NULL,
    `order_type`                INT UNSIGNED    NOT NULL,
    `troop_type`                INT UNSIGNED    NOT NULL,
    `region_id`                 INT UNSIGNED    NOT NULL,
    `help_from`                 INT UNSIGNED,
    `help_to`                   INT UNSIGNED,
    `time_created`              INT UNSIGNED    NOT NULL,
    `game_time_year`            INT UNSIGNED    NOT NULL,
    `game_time_turn`            TINYINT             NOT NULL,
    PRIMARY KEY (`id`),
    KEY (`game_id`),
    KEY (`country_id`)
)DEFAULT CHARACTER SET utf8;

# DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
    `id`                        INT UNSIGNED    NOT NULL auto_increment,
    `game_id`                   INT UNSIGNED    NOT NULL,
    `game_time_year`            INT UNSIGNED    NOT NULL,
    `game_time_turn`            TINYINT             NOT NULL,
#    `title`                     VARCHAR(50)         NOT NULL,
    `from`                      INT UNSIGNED    NOT NULL,
    `to`                        INT UNSIGNED    NOT NULL,
    `content`                   TEXT                NOT NULL,
    `time_created`              INT UNSIGNED    NOT NULL,
    PRIMARY KEY (`id`),
    KEY (`game_id`),
    KEY (`time_created`),
    KEY (`to`)
)DEFAULT CHARACTER SET utf8;

INSERT INTO `player` (`id`, `name`, `time_created`, `password_hash`, `played_count`, `weibo_id`) VALUES
(1, 'haides99', 1377077648, NULL, 0, 1758512625),
(2, 'Zhuderian', 1377141569, NULL, 0, 1771589464);



