CREATE TABLE IF NOT EXISTS `sentiws` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `word` VARCHAR(200) NOT NULL,
    `base` VARCHAR(200) NOT NULL,
    `type` ENUM('adjective', 'adverb', 'noun', 'verb'),
    `weight` FLOAT SIGNED DEFAUL 0.000
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'table holds structure for sentiWS, a collection of moods for each word';