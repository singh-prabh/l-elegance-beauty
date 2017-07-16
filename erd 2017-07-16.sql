-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema beauty
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema beauty
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `beauty` DEFAULT CHARACTER SET utf8 ;
USE `beauty` ;

-- -----------------------------------------------------
-- Table `beauty`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`category` (
  `id_category` INT(11) NOT NULL AUTO_INCREMENT,
  `categoryName` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_category`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `beauty`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`user` (
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
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `beauty`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`order` (
  `id_order` INT(11) NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) NOT NULL,
  `statusCompleted` TINYINT(1) NOT NULL,
  `orderDate` DATETIME NOT NULL,
  `statusCollected` TINYINT(1) NOT NULL,
  `totalPrice` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id_order`),
  INDEX `id_user` (`id_user` ASC),
  CONSTRAINT `order_ibfk_1`
    FOREIGN KEY (`id_user`)
    REFERENCES `beauty`.`user` (`id_user`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `beauty`.`itembrand`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`itembrand` (
  `id_itembrand` INT(11) NOT NULL AUTO_INCREMENT,
  `itembrandName` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_itembrand`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `beauty`.`item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`item` (
  `id_item` INT(11) NOT NULL AUTO_INCREMENT,
  `itemName` VARCHAR(50) NOT NULL,
  `itemDescription` VARCHAR(45) NULL DEFAULT NULL,
  `itemPrice` DECIMAL(10,2) NOT NULL,
  `id_category` INT(11) NOT NULL,
  `id_itembrand` INT(11) NOT NULL,
  `itemImage` LONGBLOB NULL DEFAULT NULL,
  PRIMARY KEY (`id_item`),
  INDEX `item_fk_2_idx` (`id_itembrand` ASC),
  INDEX `item_fk_1_idx` (`id_category` ASC),
  CONSTRAINT `item_fk_1`
    FOREIGN KEY (`id_category`)
    REFERENCES `beauty`.`category` (`id_category`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `item_fk_2`
    FOREIGN KEY (`id_itembrand`)
    REFERENCES `beauty`.`itembrand` (`id_itembrand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 46
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `beauty`.`invoiceitem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`invoiceitem` (
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
    REFERENCES `beauty`.`order` (`id_order`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `invoiceitem_fk_2`
    FOREIGN KEY (`id_item`)
    REFERENCES `beauty`.`item` (`id_item`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `beauty`.`logintimestamp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`logintimestamp` (
  `id_logintimestamp` INT(11) NOT NULL AUTO_INCREMENT,
  `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_logintimestamp`))
ENGINE = InnoDB
AUTO_INCREMENT = 52
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `beauty`.`payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`payment` (
  `id_payment` INT(11) NOT NULL AUTO_INCREMENT,
  `id_order` INT(11) NOT NULL,
  `paymentType` VARCHAR(50) NOT NULL,
  `paymentAccount` VARCHAR(50) NOT NULL,
  `completed` TINYINT(2) NOT NULL,
  PRIMARY KEY (`id_payment`),
  INDEX `payment_ibfk_1` (`id_order` ASC),
  CONSTRAINT `payment_ibfk_1`
    FOREIGN KEY (`id_order`)
    REFERENCES `beauty`.`order` (`id_order`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `beauty`.`service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`service` (
  `id_service` INT(11) NOT NULL AUTO_INCREMENT,
  `serviceName` VARCHAR(45) NOT NULL,
  `serviceDescription` VARCHAR(45) NULL DEFAULT NULL,
  `servicePrice` DECIMAL(10,2) NOT NULL,
  `id_category` INT(11) NOT NULL,
  PRIMARY KEY (`id_service`),
  INDEX `service_fk_1_idx` (`id_category` ASC),
  CONSTRAINT `service_fk_1`
    FOREIGN KEY (`id_category`)
    REFERENCES `beauty`.`category` (`id_category`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 48
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `beauty`.`shoppingcartitem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`shoppingcartitem` (
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
    REFERENCES `beauty`.`item` (`id_item`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `shoppingcartitem_fk_2`
    FOREIGN KEY (`id_user`)
    REFERENCES `beauty`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8;

USE `beauty` ;

-- -----------------------------------------------------
-- Placeholder table for view `beauty`.`vw_completedorders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`vw_completedorders` (`OrderID` INT, `OrderCompleted` INT, `UserID` INT, `UserName` INT, `UserSurname` INT, `UserEmail` INT, `PaymentCompleted` INT);

-- -----------------------------------------------------
-- Placeholder table for view `beauty`.`vw_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`vw_item` (`ItemID` INT, `ItemName` INT, `ItemDescription` INT, `ItemPrice` INT, `BrandID` INT, `Brand` INT, `Category` INT, `CategoryID` INT, `Image` INT);

-- -----------------------------------------------------
-- Placeholder table for view `beauty`.`vw_order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`vw_order` (`OrderID` INT, `orderStatusCom` INT, `orderDate` INT, `orderStatusCol` INT, `UserID` INT, `totalPrice` INT, `invoiceitemID` INT, `quantity` INT, `price` INT, `invoiceTotalPrice` INT, `ItemID` INT, `ItemName` INT, `ItemDescription` INT, `ItemPrice` INT, `BrandID` INT, `CategoryID` INT, `BrandName` INT, `CategoryName` INT, `Image` INT);

-- -----------------------------------------------------
-- Placeholder table for view `beauty`.`vw_service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`vw_service` (`ServiceID` INT, `ServiceName` INT, `ServiceDescription` INT, `ServicePrice` INT, `Category` INT);

-- -----------------------------------------------------
-- Placeholder table for view `beauty`.`vw_uncompletedorder`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beauty`.`vw_uncompletedorder` (`OrderID` INT, `OrderCompleted` INT, `UserID` INT, `UserName` INT, `UserSurname` INT, `UserEmail` INT, `PaymentCompleted` INT);

-- -----------------------------------------------------
-- View `beauty`.`vw_completedorders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `beauty`.`vw_completedorders`;
USE `beauty`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `beauty`.`vw_completedorders` AS select `beauty`.`order`.`id_order` AS `OrderID`,`beauty`.`order`.`statusCompleted` AS `OrderCompleted`,`beauty`.`user`.`id_user` AS `UserID`,`beauty`.`user`.`userName` AS `UserName`,`beauty`.`user`.`userSurname` AS `UserSurname`,`beauty`.`user`.`userEmail` AS `UserEmail`,`beauty`.`payment`.`completed` AS `PaymentCompleted` from ((`beauty`.`order` join `beauty`.`user` on((`beauty`.`order`.`id_user` = `beauty`.`user`.`id_user`))) join `beauty`.`payment` on((`beauty`.`order`.`id_order` = `beauty`.`payment`.`id_order`))) where (`beauty`.`order`.`statusCompleted` = 1) order by `beauty`.`order`.`orderDate`;

-- -----------------------------------------------------
-- View `beauty`.`vw_item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `beauty`.`vw_item`;
USE `beauty`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `beauty`.`vw_item` AS select `beauty`.`item`.`id_item` AS `ItemID`,`beauty`.`item`.`itemName` AS `ItemName`,`beauty`.`item`.`itemDescription` AS `ItemDescription`,`beauty`.`item`.`itemPrice` AS `ItemPrice`,`beauty`.`itembrand`.`id_itembrand` AS `BrandID`,`beauty`.`itembrand`.`itembrandName` AS `Brand`,`beauty`.`category`.`categoryName` AS `Category`,`beauty`.`category`.`id_category` AS `CategoryID`,`beauty`.`item`.`itemImage` AS `Image` from ((`beauty`.`item` join `beauty`.`itembrand` on((`beauty`.`item`.`id_itembrand` = `beauty`.`itembrand`.`id_itembrand`))) join `beauty`.`category` on((`beauty`.`item`.`id_category` = `beauty`.`category`.`id_category`)));

-- -----------------------------------------------------
-- View `beauty`.`vw_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `beauty`.`vw_order`;
USE `beauty`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `beauty`.`vw_order` AS select `beauty`.`order`.`id_order` AS `OrderID`,`beauty`.`order`.`statusCompleted` AS `orderStatusCom`,`beauty`.`order`.`orderDate` AS `orderDate`,`beauty`.`order`.`statusCollected` AS `orderStatusCol`,`beauty`.`order`.`id_user` AS `UserID`,`beauty`.`order`.`totalPrice` AS `totalPrice`,`beauty`.`invoiceitem`.`id_invoiceitem` AS `invoiceitemID`,`beauty`.`invoiceitem`.`quantity` AS `quantity`,`beauty`.`invoiceitem`.`price` AS `price`,`beauty`.`invoiceitem`.`totalPrice` AS `invoiceTotalPrice`,`vw_item`.`ItemID` AS `ItemID`,`vw_item`.`ItemName` AS `ItemName`,`vw_item`.`ItemDescription` AS `ItemDescription`,`vw_item`.`ItemPrice` AS `ItemPrice`,`vw_item`.`BrandID` AS `BrandID`,`vw_item`.`CategoryID` AS `CategoryID`,`vw_item`.`Brand` AS `BrandName`,`vw_item`.`Category` AS `CategoryName`,`vw_item`.`Image` AS `Image` from ((`beauty`.`invoiceitem` join `beauty`.`vw_item` on((`beauty`.`invoiceitem`.`id_item` = `vw_item`.`ItemID`))) join `beauty`.`order` on((`beauty`.`invoiceitem`.`id_order` = `beauty`.`order`.`id_order`)));

-- -----------------------------------------------------
-- View `beauty`.`vw_service`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `beauty`.`vw_service`;
USE `beauty`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `beauty`.`vw_service` AS select `beauty`.`service`.`id_service` AS `ServiceID`,`beauty`.`service`.`serviceName` AS `ServiceName`,`beauty`.`service`.`serviceDescription` AS `ServiceDescription`,`beauty`.`service`.`servicePrice` AS `ServicePrice`,`beauty`.`category`.`categoryName` AS `Category` from (`beauty`.`service` join `beauty`.`category` on((`beauty`.`service`.`id_category` = `beauty`.`category`.`id_category`)));

-- -----------------------------------------------------
-- View `beauty`.`vw_uncompletedorder`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `beauty`.`vw_uncompletedorder`;
USE `beauty`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `beauty`.`vw_uncompletedorder` AS select `beauty`.`order`.`id_order` AS `OrderID`,`beauty`.`order`.`statusCompleted` AS `OrderCompleted`,`beauty`.`user`.`id_user` AS `UserID`,`beauty`.`user`.`userName` AS `UserName`,`beauty`.`user`.`userSurname` AS `UserSurname`,`beauty`.`user`.`userEmail` AS `UserEmail`,`beauty`.`payment`.`completed` AS `PaymentCompleted` from ((`beauty`.`order` join `beauty`.`user` on((`beauty`.`order`.`id_user` = `beauty`.`user`.`id_user`))) join `beauty`.`payment` on((`beauty`.`order`.`id_order` = `beauty`.`payment`.`id_order`))) where (`beauty`.`order`.`statusCompleted` = 0) order by `beauty`.`order`.`orderDate`;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
