-- data base lms_cid
CREATE DATABASE IF NOT EXISTS `intika`;

-- table users start
CREATE TABLE IF NOT EXISTS `users`
(
    `id`                INT          NOT NULL AUTO_INCREMENT,
    `dni`               VARCHAR(8)   NOT NULL,
    `name`              VARCHAR(255) NOT NULL,
    `last_name_first`   VARCHAR(255) NOT NULL,
    `last_name_second`  VARCHAR(255) NOT NULL,
    `email`             VARCHAR(255) NOT NULL,
    `password`          VARCHAR(255) NOT NULL,
    `user_image`        MEDIUMTEXT   NOT NULL,
    `role_id`           INT          NOT NULL,
    `date_added`        DATETIME     NOT NULL,
    `last_modified`     DATETIME     NOT NULL,
    `title`             LONGTEXT     NOT NULL,
    `verification_code` LONGTEXT     NOT NULL,
    `status`            INT          NOT NULL,

    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table users end

-- table category start
CREATE TABLE IF NOT EXISTS `category`
(
    `id`                 INT          NOT NULL AUTO_INCREMENT,
    `code`               VARCHAR(255) NOT NULL,
    `name`               VARCHAR(255) NOT NULL,
    `parent`             INT          NOT NULL,
    `slug`               VARCHAR(255) NOT NULL,
    `color`              VARCHAR(7)   NOT NULL,
    `date_added`         DATETIME     NOT NULL,
    `last_modified`      DATETIME     NOT NULL,
    `font_awesome_class` VARCHAR(255) NOT NULL,
    `thumbnail`          VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table category end

-- table role start
CREATE TABLE IF NOT EXISTS `role`
(
    `id`            INT          NOT NULL AUTO_INCREMENT,
    `name`          VARCHAR(124) NOT NULL,
    `date_added`    DATETIME     NOT NULL,
    `last_modified` DATETIME     NOT NULL,

    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table role end

-- table enrol start
CREATE TABLE IF NOT EXISTS `enrol`
(
    `id`            INT      NOT NULL AUTO_INCREMENT,
    `user_id`       INT      NOT NULL,
    `course_id`     INT      NOT NULL,
    `date_added`    DATETIME NOT NULL,
    `last_modified` DATETIME NOT NULL,

    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table enrol end

-- table slider start
CREATE TABLE IF NOT EXISTS `slider`
(
    `id`                INT        NOT NULL AUTO_INCREMENT,
    `title`             TINYTEXT   NOT NULL,
    `description_short` TINYTEXT   NOT NULL,
    `attachment`        MEDIUMTEXT NOT NULL,
    `status`            BOOLEAN DEFAULT 0,
    `order`             int        NOT NULL,
    `date_added`        DATETIME   NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table slider end

-- table routes start
CREATE TABLE IF NOT EXISTS `routes`
(
    `id`            INT         NOT NULL AUTO_INCREMENT,
    `name`          TINYTEXT    NOT NULL,
    `description`   MEDIUMTEXT  NOT NULL,
    `attachment`    TINYTEXT    NOT NULL,
    `price`         MEDIUMTEXT  NOT NULL,
    `destination`   MEDIUMTEXT DEFAULT NULL,
    `services`      MEDIUMTEXT DEFAULT NULL,
    `opening`       VARCHAR(64) NOT NULL,
    `ending`        VARCHAR(64) NOT NULL,
    `status`        BOOLEAN    DEFAULT 0,
    `date_added`    DATETIME   DEFAULT NULL,
    `last_modified` DATETIME    NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table routes end


-- table routes lesson start
ALTER TABLE routes
    ADD `itinerary` LONGTEXT NOT NULL;
-- table routes lesson end

-- table routes lesson start
ALTER TABLE routes
    ADD `findings` LONGTEXT NOT NULL;
-- table routes lesson end

-- table ddi start
CREATE TABLE IF NOT EXISTS `ddi`
(
    `id`        INT         NOT NULL AUTO_INCREMENT,
    `code`      VARCHAR(14) NOT NULL,
    `country`   VARCHAR(56) NOT NULL,
    `continent` VARCHAR(56) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table ddi end

-- table ask_about start
CREATE TABLE IF NOT EXISTS `ask_about`
(
    `id`              INT          NOT NULL AUTO_INCREMENT,
    `names`           VARCHAR(128) NOT NULL,
    `email`           VARCHAR(128) NOT NULL,
    `celular`         INT          NOT NULL,
    `message`         TINYTEXT     NOT NULL,
    `routes_id`       INT          NOT NULL,
    `country_code`    INT          NOT NULL,
    `date_added`      DATETIME     NOT NULL,
    `send_email`      BOOLEAN    DEFAULT 0,
    `resend_email`    MEDIUMTEXT DEFAULT NULL,
    `last_send_email` DATETIME     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table ask_about end

-- table destination start
CREATE TABLE IF NOT EXISTS `destination`
(
    `id`          INT          NOT NULL AUTO_INCREMENT,
    `destination` VARCHAR(128) NOT NULL,
    `date_added`  DATETIME     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table destination end

-- table services start
CREATE TABLE IF NOT EXISTS `services`
(
    `id`         INT          NOT NULL AUTO_INCREMENT,
    `services`   VARCHAR(128) NOT NULL,
    `icon`       VARCHAR(128) NOT NULL,
    `date_added` DATETIME     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table services end

-- table other_items start
CREATE TABLE IF NOT EXISTS `other_items`
(
    `id`            INT      NOT NULL AUTO_INCREMENT,
    `destinations`  LONGTEXT DEFAULT NULL,
    `services`      LONGTEXT DEFAULT NULL,
    `findings`      LONGTEXT DEFAULT NULL,
    `date_added`    DATETIME NOT NULL,
    `last_modified` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table other_items end

-- table settings start
CREATE TABLE IF NOT EXISTS `settings`
(
    `id`            INT      NOT NULL AUTO_INCREMENT,
    `name`          VARCHAR(56)  DEFAULT NULL,
    `name_up`       VARCHAR(56)  DEFAULT NULL,
    `email`         MEDIUMTEXT   DEFAULT NULL,
    `phone`         MEDIUMTEXT   DEFAULT NULL,
    `address`       VARCHAR(126) DEFAULT NULL,
    `postal_code`   VARCHAR(20)  DEFAULT NULL,
    `logo`          TINYTEXT     DEFAULT NULL,
    `logo_white`    TINYTEXT     DEFAULT NULL,
    `social_media`  MEDIUMTEXT   DEFAULT NULL,
    `abstract`      MEDIUMTEXT   DEFAULT NULL,
    `mission`       MEDIUMTEXT   DEFAULT NULL,
    `vision`        MEDIUMTEXT   DEFAULT NULL,
    `date_added`    DATETIME NOT NULL,
    `last_modified` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table settings end

INSERT INTO `users`(`id`, `dni`, `name`, `last_name_first`, `last_name_second`, `email`, `password`, `user_image`,
                    `role_id`, `date_added`, `last_modified`, `title`, `verification_code`, `status`)
VALUES (1, '60274663', 'John', 'Doe', ' ', 'john_doe@gmail.com',
        '649a79a9f28534010e431ce3536899bf7ede188ed8ef32c2d57e59b51dee5ad95f967c1fc1a79eda3e1efb22cd6412f71d08838bce8585cd3f1d76f8056ac6fczMVjCSKOjba1A67rZOV/kDERwhI15bMvKt1OtZ+vvbs=',
        ' ', 1, '2021-04-07 18:33:21', '2021-04-07 18:33:56', ' ', ' ', 1);

INSERT INTO `settings`(`id`, `name`, `name_up`, `email`, `phone`, `address`, `postal_code`, `logo`, `logo_white`, `social_media`, `abstract`, `mission`, `vision`, `date_added`, `last_modified`) VALUES (1, 'Intika Travel', 'Agencia de Turismo', '[\"example@intikatravel.com.pe\",\"\"]', '[\"987456384\",\"951478632\",\"\"]', 'Jr. JUNIN 189 - PUNO, PERÚ', '21001', 'assets/admin/images/settings/logo/logo.png', 'assets/admin/images/settings/logo_white/logo_white.png', '{\"facebook\":\"https:\\/\\/www.facebook.com\\/business\\/pages\",\"whatsapp\":\"+51987654321\",\"youtube\":\"https:\\/\\/www.youtube.com\\/channel\\/UCUN9lhwfMJRxMVuet7Shg0w\",\"twitter\":\"https:\\/\\/twitter.com\\/paginaseria\",\"telegram\":\"+51987654321\",\"instagram\":\"https:\\/\\/www.instagram.com\\/accounts\\/login\\/\"}', 'Seguridad, calidad en el servicio, compromiso, respeto, ética, responsabilidad, diversidad y competitividad.', 'Mision', 'Vision', '2021-05-03 00:12:03', '2021-05-03 19:55:35');

INSERT INTO `other_items`(`id`, `destinations`, `services`, `findings`, `date_added`, `last_modified`) VALUES (1, '[\"Puno\",\"Cusco\",\"Arequipa\",\"Moquegua\",\"Taquile\",\"Sillustani\",\"Amantani\",\"Uros\"]', '[\"Servicio 1\",\"Servicio 2\",\"Servicio 3\",\"Servicio 4\"]', '[\"Llevar Mochila\",\"Llevar Paragua\",\"Llevar Agua\"]', '2021-05-02 14:09:26', '2021-05-03 15:02:02');
