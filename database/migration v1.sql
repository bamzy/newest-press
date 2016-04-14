/*
*/

INSERT INTO `tbl_rec` (rec_text, active) VALUES ('Unspecified', 'Y');
INSERT INTO `tbl_editreq` (`edreq_text`) VALUES ('Unspecified');
ALTER TABLE `newest`.`tbl_people`
ADD COLUMN `notify` ENUM('Yes', 'No') DEFAULT 'No'  NOT NULL
AFTER `created`;
ALTER TABLE `newest`.`tbl_people`
DROP COLUMN `phone`,
ADD COLUMN `phone` CHAR(20) NOT NULL
AFTER `notify`;

CREATE TABLE `newest`.`tbl_category` (
  `id`           BIGINT(20) NOT NULL AUTO_INCREMENT,
  `categoryName` CHAR(100)  NOT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `tbl_category` (categoryName) VALUES ('Science fiction');
INSERT INTO `tbl_category` (categoryName) VALUES ('Satire');
INSERT INTO `tbl_category` (categoryName) VALUES ('Drama');
INSERT INTO `tbl_category` (categoryName) VALUES ('Action and Adventure');
INSERT INTO `tbl_category` (categoryName) VALUES ('Romance');
INSERT INTO `tbl_category` (categoryName) VALUES ('Mystery');
INSERT INTO `tbl_category` (categoryName) VALUES ('Horror');
INSERT INTO `tbl_category` (categoryName) VALUES ('Self help');
INSERT INTO `tbl_category` (categoryName) VALUES ('Health');
INSERT INTO `tbl_category` (categoryName) VALUES ('Guide');
INSERT INTO `tbl_category` (categoryName) VALUES ('Travel');
INSERT INTO `tbl_category` (categoryName) VALUES ('Children');
INSERT INTO `tbl_category` (categoryName) VALUES ('Religion, Spirituality & New Age');
INSERT INTO `tbl_category` (categoryName) VALUES ('Science');
INSERT INTO `tbl_category` (categoryName) VALUES ('History');
INSERT INTO `tbl_category` (categoryName) VALUES ('Math');
INSERT INTO `tbl_category` (categoryName) VALUES ('Anthology');
INSERT INTO `tbl_category` (categoryName) VALUES ('Poetry');
INSERT INTO `tbl_category` (categoryName) VALUES ('Encyclopedias');
INSERT INTO `tbl_category` (categoryName) VALUES ('Dictionaries');
INSERT INTO `tbl_category` (categoryName) VALUES ('Comics');
INSERT INTO `tbl_category` (categoryName) VALUES ('Art');
INSERT INTO `tbl_category` (categoryName) VALUES ('Cookbooks');
INSERT INTO `tbl_category` (categoryName) VALUES ('Diaries');
INSERT INTO `tbl_category` (categoryName) VALUES ('Journals');
INSERT INTO `tbl_category` (categoryName) VALUES ('Prayer books');
INSERT INTO `tbl_category` (categoryName) VALUES ('Series');
INSERT INTO `tbl_category` (categoryName) VALUES ('Trilogy');
INSERT INTO `tbl_category` (categoryName) VALUES ('Biographies');
INSERT INTO `tbl_category` (categoryName) VALUES ('Autobiographies');
INSERT INTO `tbl_category` (categoryName) VALUES ('Fantasy');




