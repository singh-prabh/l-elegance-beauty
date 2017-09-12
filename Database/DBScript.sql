-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema xn0fkp1h8ovpfs96
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema xn0fkp1h8ovpfs96
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `xn0fkp1h8ovpfs96` DEFAULT CHARACTER SET utf8 ;
USE `xn0fkp1h8ovpfs96` ;

-- -----------------------------------------------------
-- Table `xn0fkp1h8ovpfs96`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`category` (
  `id_category` INT(11) NOT NULL AUTO_INCREMENT,
  `categoryName` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_category`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `xn0fkp1h8ovpfs96`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`user` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `userName` VARCHAR(50) NOT NULL,
  `userSurname` VARCHAR(50) NOT NULL,
  `userContact` VARCHAR(20) NOT NULL,
  `userEmail` VARCHAR(50) NOT NULL,
  `userPassword` VARCHAR(50) NOT NULL,
  `activated` TINYINT(1) NOT NULL,
  `admin` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `userEmail_UNIQUE` (`userEmail` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `xn0fkp1h8ovpfs96`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`order` (
  `id_order` INT(11) NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) NOT NULL,
  `statusCompleted` TINYINT(1) NOT NULL,
  `orderDate` DATETIME NOT NULL,
  `statusCollected` TINYINT(1) NOT NULL,
  `totalPrice` DECIMAL(10,2) NOT NULL,
  `paymentCompleted` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id_order`),
  INDEX `id_user` (`id_user` ASC),
  CONSTRAINT `order_ibfk_1`
    FOREIGN KEY (`id_user`)
    REFERENCES `xn0fkp1h8ovpfs96`.`user` (`id_user`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `xn0fkp1h8ovpfs96`.`itembrand`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`itembrand` (
  `id_itembrand` INT(11) NOT NULL AUTO_INCREMENT,
  `itembrandName` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_itembrand`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `xn0fkp1h8ovpfs96`.`item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`item` (
  `id_item` INT(11) NOT NULL AUTO_INCREMENT,
  `itemName` VARCHAR(50) NOT NULL,
  `itemDescription` VARCHAR(45) NULL DEFAULT NULL,
  `itemPrice` DECIMAL(10,2) NOT NULL,
  `id_category` INT(11) NOT NULL,
  `id_itembrand` INT(11) NOT NULL,
  `itemImage` LONGBLOB NULL DEFAULT NULL,
  `activated` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id_item`),
  INDEX `item_fk_2_idx` (`id_itembrand` ASC),
  INDEX `item_fk_1_idx` (`id_category` ASC),
  CONSTRAINT `item_fk_1`
    FOREIGN KEY (`id_category`)
    REFERENCES `xn0fkp1h8ovpfs96`.`category` (`id_category`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `item_fk_2`
    FOREIGN KEY (`id_itembrand`)
    REFERENCES `xn0fkp1h8ovpfs96`.`itembrand` (`id_itembrand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 46
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `xn0fkp1h8ovpfs96`.`invoiceitem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`invoiceitem` (
  `id_invoiceitem` INT(11) NOT NULL AUTO_INCREMENT,
  `id_order` INT(11) NOT NULL,
  `id_item` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `totalPrice` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id_invoiceitem`),
  INDEX `invoiceitem_fk_1_idx` (`id_order` ASC),
  INDEX `invoiceitem_fk_2_idx` (`id_item` ASC),
  CONSTRAINT `invoiceitem_fk_1`
    FOREIGN KEY (`id_order`)
    REFERENCES `xn0fkp1h8ovpfs96`.`order` (`id_order`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `invoiceitem_fk_2`
    FOREIGN KEY (`id_item`)
    REFERENCES `xn0fkp1h8ovpfs96`.`item` (`id_item`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `xn0fkp1h8ovpfs96`.`logintimestamp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`logintimestamp` (
  `id_logintimestamp` INT(11) NOT NULL AUTO_INCREMENT,
  `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_logintimestamp`))
ENGINE = InnoDB
AUTO_INCREMENT = 145
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `xn0fkp1h8ovpfs96`.`service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`service` (
  `id_service` INT(11) NOT NULL AUTO_INCREMENT,
  `serviceName` VARCHAR(45) NOT NULL,
  `serviceDescription` VARCHAR(45) NULL DEFAULT NULL,
  `servicePrice` DECIMAL(10,2) NOT NULL,
  `id_category` INT(11) NOT NULL,
  PRIMARY KEY (`id_service`),
  INDEX `service_fk_1_idx` (`id_category` ASC),
  CONSTRAINT `service_fk_1`
    FOREIGN KEY (`id_category`)
    REFERENCES `xn0fkp1h8ovpfs96`.`category` (`id_category`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 49
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `xn0fkp1h8ovpfs96`.`shoppingcartitem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`shoppingcartitem` (
  `id_shoppingcartitem` INT(11) NOT NULL AUTO_INCREMENT,
  `id_item` INT(11) NOT NULL,
  `id_user` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL,
  `totalPrice` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id_shoppingcartitem`),
  INDEX `shoppingcartitem_fk_1_idx` (`id_item` ASC),
  INDEX `shoppingcartitem_fk_2_idx` (`id_user` ASC),
  CONSTRAINT `shoppingcartitem_fk_1`
    FOREIGN KEY (`id_item`)
    REFERENCES `xn0fkp1h8ovpfs96`.`item` (`id_item`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `shoppingcartitem_fk_2`
    FOREIGN KEY (`id_user`)
    REFERENCES `xn0fkp1h8ovpfs96`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;

USE `xn0fkp1h8ovpfs96` ;

-- -----------------------------------------------------
-- Placeholder table for view `xn0fkp1h8ovpfs96`.`vw_cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`vw_cart` (`shoppingcartitemID` INT, `quantity` INT, `totalPrice` INT, `userID` INT, `ItemID` INT, `ItemName` INT, `ItemDescription` INT, `ItemPrice` INT, `BrandID` INT, `CategoryID` INT, `BrandName` INT, `CategoryName` INT, `Image` INT);

-- -----------------------------------------------------
-- Placeholder table for view `xn0fkp1h8ovpfs96`.`vw_completedorders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`vw_completedorders` (`OrderID` INT, `OrderCompleted` INT, `orderDate` INT, `orderStatusCol` INT, `totalPrice` INT, `UserID` INT, `UserName` INT, `UserSurname` INT, `UserEmail` INT, `paymentCompleted` INT);

-- -----------------------------------------------------
-- Placeholder table for view `xn0fkp1h8ovpfs96`.`vw_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`vw_item` (`ItemID` INT, `ItemName` INT, `ItemDescription` INT, `ItemPrice` INT, `activated` INT, `BrandID` INT, `Brand` INT, `Category` INT, `CategoryID` INT, `Image` INT);

-- -----------------------------------------------------
-- Placeholder table for view `xn0fkp1h8ovpfs96`.`vw_order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`vw_order` (`OrderID` INT, `orderStatusCom` INT, `orderDate` INT, `orderStatusCol` INT, `UserID` INT, `totalPrice` INT, `paymentCompleted` INT, `invoiceitemID` INT, `quantity` INT, `price` INT, `invoiceTotalPrice` INT, `ItemID` INT, `ItemName` INT, `ItemDescription` INT, `ItemPrice` INT, `BrandID` INT, `CategoryID` INT, `BrandName` INT, `CategoryName` INT, `Image` INT);

-- -----------------------------------------------------
-- Placeholder table for view `xn0fkp1h8ovpfs96`.`vw_service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`vw_service` (`ServiceID` INT, `ServiceName` INT, `ServiceDescription` INT, `ServicePrice` INT, `Category` INT);

-- -----------------------------------------------------
-- Placeholder table for view `xn0fkp1h8ovpfs96`.`vw_uncompletedorder`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xn0fkp1h8ovpfs96`.`vw_uncompletedorder` (`OrderID` INT, `OrderCompleted` INT, `orderDate` INT, `orderStatusCol` INT, `totalPrice` INT, `UserID` INT, `UserName` INT, `UserSurname` INT, `UserEmail` INT, `paymentCompleted` INT);

-- -----------------------------------------------------
-- procedure CalculateNumberLogIn
-- -----------------------------------------------------

DELIMITER $$
USE `xn0fkp1h8ovpfs96`$$
CREATE DEFINER=`sn88sg90mmglwiga`@`%` PROCEDURE `CalculateNumberLogIn`()
BEGIN
SELECT COUNT(*) AS `count` 
FROM logintimestamp
WHERE DATE(`timestamp`) = CURDATE();
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure CountUncompletedOrders
-- -----------------------------------------------------

DELIMITER $$
USE `xn0fkp1h8ovpfs96`$$
CREATE DEFINER=`sn88sg90mmglwiga`@`%` PROCEDURE `CountUncompletedOrders`()
BEGIN
SELECT COUNT(*) AS `count` 
FROM `order`
WHERE `statusCompleted` = "0";
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure NumberOrdersToCollect
-- -----------------------------------------------------

DELIMITER $$
USE `xn0fkp1h8ovpfs96`$$
CREATE DEFINER=`sn88sg90mmglwiga`@`%` PROCEDURE `NumberOrdersToCollect`()
BEGIN
SELECT COUNT(*) AS `count` 
FROM `order`
WHERE `statusCompleted` = "1" && `statusCollected`="0";
END$$

DELIMITER ;

-- -----------------------------------------------------
-- View `xn0fkp1h8ovpfs96`.`vw_cart`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `xn0fkp1h8ovpfs96`.`vw_cart`;
USE `xn0fkp1h8ovpfs96`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`sn88sg90mmglwiga`@`%` SQL SECURITY DEFINER VIEW `xn0fkp1h8ovpfs96`.`vw_cart` AS select `xn0fkp1h8ovpfs96`.`shoppingcartitem`.`id_shoppingcartitem` AS `shoppingcartitemID`,`xn0fkp1h8ovpfs96`.`shoppingcartitem`.`quantity` AS `quantity`,`xn0fkp1h8ovpfs96`.`shoppingcartitem`.`totalPrice` AS `totalPrice`,`xn0fkp1h8ovpfs96`.`shoppingcartitem`.`id_user` AS `userID`,`vw_item`.`ItemID` AS `ItemID`,`vw_item`.`ItemName` AS `ItemName`,`vw_item`.`ItemDescription` AS `ItemDescription`,`vw_item`.`ItemPrice` AS `ItemPrice`,`vw_item`.`BrandID` AS `BrandID`,`vw_item`.`CategoryID` AS `CategoryID`,`vw_item`.`Brand` AS `BrandName`,`vw_item`.`Category` AS `CategoryName`,`vw_item`.`Image` AS `Image` from (`xn0fkp1h8ovpfs96`.`shoppingcartitem` join `xn0fkp1h8ovpfs96`.`vw_item` on((`xn0fkp1h8ovpfs96`.`shoppingcartitem`.`id_item` = `vw_item`.`ItemID`)));

-- -----------------------------------------------------
-- View `xn0fkp1h8ovpfs96`.`vw_completedorders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `xn0fkp1h8ovpfs96`.`vw_completedorders`;
USE `xn0fkp1h8ovpfs96`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`sn88sg90mmglwiga`@`%` SQL SECURITY DEFINER VIEW `xn0fkp1h8ovpfs96`.`vw_completedorders` AS select `xn0fkp1h8ovpfs96`.`order`.`id_order` AS `OrderID`,`xn0fkp1h8ovpfs96`.`order`.`statusCompleted` AS `OrderCompleted`,`xn0fkp1h8ovpfs96`.`order`.`orderDate` AS `orderDate`,`xn0fkp1h8ovpfs96`.`order`.`statusCollected` AS `orderStatusCol`,`xn0fkp1h8ovpfs96`.`order`.`totalPrice` AS `totalPrice`,`xn0fkp1h8ovpfs96`.`user`.`id_user` AS `UserID`,`xn0fkp1h8ovpfs96`.`user`.`userName` AS `UserName`,`xn0fkp1h8ovpfs96`.`user`.`userSurname` AS `UserSurname`,`xn0fkp1h8ovpfs96`.`user`.`userEmail` AS `UserEmail`,`xn0fkp1h8ovpfs96`.`order`.`paymentCompleted` AS `paymentCompleted` from (`xn0fkp1h8ovpfs96`.`order` join `xn0fkp1h8ovpfs96`.`user` on((`xn0fkp1h8ovpfs96`.`order`.`id_user` = `xn0fkp1h8ovpfs96`.`user`.`id_user`))) where (`xn0fkp1h8ovpfs96`.`order`.`statusCompleted` = 1) order by `xn0fkp1h8ovpfs96`.`order`.`orderDate`;

-- -----------------------------------------------------
-- View `xn0fkp1h8ovpfs96`.`vw_item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `xn0fkp1h8ovpfs96`.`vw_item`;
USE `xn0fkp1h8ovpfs96`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`sn88sg90mmglwiga`@`%` SQL SECURITY DEFINER VIEW `xn0fkp1h8ovpfs96`.`vw_item` AS select `xn0fkp1h8ovpfs96`.`item`.`id_item` AS `ItemID`,`xn0fkp1h8ovpfs96`.`item`.`itemName` AS `ItemName`,`xn0fkp1h8ovpfs96`.`item`.`itemDescription` AS `ItemDescription`,`xn0fkp1h8ovpfs96`.`item`.`itemPrice` AS `ItemPrice`,`xn0fkp1h8ovpfs96`.`item`.`activated` AS `activated`,`xn0fkp1h8ovpfs96`.`itembrand`.`id_itembrand` AS `BrandID`,`xn0fkp1h8ovpfs96`.`itembrand`.`itembrandName` AS `Brand`,`xn0fkp1h8ovpfs96`.`category`.`categoryName` AS `Category`,`xn0fkp1h8ovpfs96`.`category`.`id_category` AS `CategoryID`,`xn0fkp1h8ovpfs96`.`item`.`itemImage` AS `Image` from ((`xn0fkp1h8ovpfs96`.`item` join `xn0fkp1h8ovpfs96`.`itembrand` on((`xn0fkp1h8ovpfs96`.`item`.`id_itembrand` = `xn0fkp1h8ovpfs96`.`itembrand`.`id_itembrand`))) join `xn0fkp1h8ovpfs96`.`category` on((`xn0fkp1h8ovpfs96`.`item`.`id_category` = `xn0fkp1h8ovpfs96`.`category`.`id_category`)));

-- -----------------------------------------------------
-- View `xn0fkp1h8ovpfs96`.`vw_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `xn0fkp1h8ovpfs96`.`vw_order`;
USE `xn0fkp1h8ovpfs96`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`sn88sg90mmglwiga`@`%` SQL SECURITY DEFINER VIEW `xn0fkp1h8ovpfs96`.`vw_order` AS select `xn0fkp1h8ovpfs96`.`order`.`id_order` AS `OrderID`,`xn0fkp1h8ovpfs96`.`order`.`statusCompleted` AS `orderStatusCom`,`xn0fkp1h8ovpfs96`.`order`.`orderDate` AS `orderDate`,`xn0fkp1h8ovpfs96`.`order`.`statusCollected` AS `orderStatusCol`,`xn0fkp1h8ovpfs96`.`order`.`id_user` AS `UserID`,`xn0fkp1h8ovpfs96`.`order`.`totalPrice` AS `totalPrice`,`xn0fkp1h8ovpfs96`.`order`.`paymentCompleted` AS `paymentCompleted`,`xn0fkp1h8ovpfs96`.`invoiceitem`.`id_invoiceitem` AS `invoiceitemID`,`xn0fkp1h8ovpfs96`.`invoiceitem`.`quantity` AS `quantity`,`xn0fkp1h8ovpfs96`.`invoiceitem`.`price` AS `price`,`xn0fkp1h8ovpfs96`.`invoiceitem`.`totalPrice` AS `invoiceTotalPrice`,`vw_item`.`ItemID` AS `ItemID`,`vw_item`.`ItemName` AS `ItemName`,`vw_item`.`ItemDescription` AS `ItemDescription`,`vw_item`.`ItemPrice` AS `ItemPrice`,`vw_item`.`BrandID` AS `BrandID`,`vw_item`.`CategoryID` AS `CategoryID`,`vw_item`.`Brand` AS `BrandName`,`vw_item`.`Category` AS `CategoryName`,`vw_item`.`Image` AS `Image` from ((`xn0fkp1h8ovpfs96`.`invoiceitem` join `xn0fkp1h8ovpfs96`.`vw_item` on((`xn0fkp1h8ovpfs96`.`invoiceitem`.`id_item` = `vw_item`.`ItemID`))) join `xn0fkp1h8ovpfs96`.`order` on((`xn0fkp1h8ovpfs96`.`invoiceitem`.`id_order` = `xn0fkp1h8ovpfs96`.`order`.`id_order`)));

-- -----------------------------------------------------
-- View `xn0fkp1h8ovpfs96`.`vw_service`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `xn0fkp1h8ovpfs96`.`vw_service`;
USE `xn0fkp1h8ovpfs96`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`sn88sg90mmglwiga`@`%` SQL SECURITY DEFINER VIEW `xn0fkp1h8ovpfs96`.`vw_service` AS select `xn0fkp1h8ovpfs96`.`service`.`id_service` AS `ServiceID`,`xn0fkp1h8ovpfs96`.`service`.`serviceName` AS `ServiceName`,`xn0fkp1h8ovpfs96`.`service`.`serviceDescription` AS `ServiceDescription`,`xn0fkp1h8ovpfs96`.`service`.`servicePrice` AS `ServicePrice`,`xn0fkp1h8ovpfs96`.`category`.`categoryName` AS `Category` from (`xn0fkp1h8ovpfs96`.`service` join `xn0fkp1h8ovpfs96`.`category` on((`xn0fkp1h8ovpfs96`.`service`.`id_category` = `xn0fkp1h8ovpfs96`.`category`.`id_category`)));

-- -----------------------------------------------------
-- View `xn0fkp1h8ovpfs96`.`vw_uncompletedorder`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `xn0fkp1h8ovpfs96`.`vw_uncompletedorder`;
USE `xn0fkp1h8ovpfs96`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`sn88sg90mmglwiga`@`%` SQL SECURITY DEFINER VIEW `xn0fkp1h8ovpfs96`.`vw_uncompletedorder` AS select `xn0fkp1h8ovpfs96`.`order`.`id_order` AS `OrderID`,`xn0fkp1h8ovpfs96`.`order`.`statusCompleted` AS `OrderCompleted`,`xn0fkp1h8ovpfs96`.`order`.`orderDate` AS `orderDate`,`xn0fkp1h8ovpfs96`.`order`.`statusCollected` AS `orderStatusCol`,`xn0fkp1h8ovpfs96`.`order`.`totalPrice` AS `totalPrice`,`xn0fkp1h8ovpfs96`.`user`.`id_user` AS `UserID`,`xn0fkp1h8ovpfs96`.`user`.`userName` AS `UserName`,`xn0fkp1h8ovpfs96`.`user`.`userSurname` AS `UserSurname`,`xn0fkp1h8ovpfs96`.`user`.`userEmail` AS `UserEmail`,`xn0fkp1h8ovpfs96`.`order`.`paymentCompleted` AS `paymentCompleted` from (`xn0fkp1h8ovpfs96`.`order` join `xn0fkp1h8ovpfs96`.`user` on((`xn0fkp1h8ovpfs96`.`order`.`id_user` = `xn0fkp1h8ovpfs96`.`user`.`id_user`))) where (`xn0fkp1h8ovpfs96`.`order`.`statusCompleted` = 0) order by `xn0fkp1h8ovpfs96`.`order`.`orderDate`;
USE `xn0fkp1h8ovpfs96`;

DELIMITER $$
USE `xn0fkp1h8ovpfs96`$$
CREATE
DEFINER=`sn88sg90mmglwiga`@`%`
TRIGGER `xn0fkp1h8ovpfs96`.`user_BEFORE_INSERT`
BEFORE INSERT ON `xn0fkp1h8ovpfs96`.`user`
FOR EACH ROW
BEGIN
IF (NEW.admin ="") THEN
SET NEW.admin = "0";
END IF;
IF (NEW.activated ="") THEN
SET NEW.activated = "1";
END IF;
END$$

USE `xn0fkp1h8ovpfs96`$$
CREATE
DEFINER=`sn88sg90mmglwiga`@`%`
TRIGGER `xn0fkp1h8ovpfs96`.`order_BEFORE_INSERT`
BEFORE INSERT ON `xn0fkp1h8ovpfs96`.`order`
FOR EACH ROW
BEGIN
IF (NEW.statusCompleted ="0" && NEW.statusCollected ="1") THEN
SET NEW.statusCollected = "0";
END IF;
END$$

USE `xn0fkp1h8ovpfs96`$$
CREATE
DEFINER=`sn88sg90mmglwiga`@`%`
TRIGGER `xn0fkp1h8ovpfs96`.`order_BEFORE_UPDATE`
BEFORE UPDATE ON `xn0fkp1h8ovpfs96`.`order`
FOR EACH ROW
BEGIN
IF (NEW.statusCompleted ="0" && NEW.statusCollected ="1") THEN
SET NEW.statusCollected = "0";
END IF;
END$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
