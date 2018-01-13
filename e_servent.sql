-- MySQL Script generated by MySQL Workbench
-- 01/14/18 01:06:01
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema utility
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema utility
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `utility` DEFAULT CHARACTER SET utf8 ;
USE `utility` ;

-- -----------------------------------------------------
-- Table `utility`.`object`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `utility`.`object` (
  `username` VARCHAR(32) NOT NULL COMMENT '',
  `oname` VARCHAR(32) NOT NULL COMMENT '',
  `photo` VARCHAR(255) NOT NULL COMMENT '',
  `address` VARCHAR(32) NOT NULL COMMENT '',
  `city` VARCHAR(32) NOT NULL COMMENT '',
  `email` VARCHAR(32) NOT NULL COMMENT '',
  PRIMARY KEY (`username`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `utility`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `utility`.`category` (
  `cname` VARCHAR(32) NOT NULL COMMENT '',
  `icon` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`cname`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `utility`.`subcat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `utility`.`subcat` (
  `sname` VARCHAR(32) NOT NULL COMMENT '',
  `cname` VARCHAR(32) NOT NULL COMMENT '',
  `icon` VARCHAR(32) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`sname`)  COMMENT '',
  INDEX `cname` (`cname` ASC)  COMMENT '',
  CONSTRAINT `subcat_ibfk_1`
    FOREIGN KEY (`cname`)
    REFERENCES `utility`.`category` (`cname`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `utility`.`appointment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `utility`.`appointment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `time` TIME NOT NULL COMMENT '',
  `date` DATE NOT NULL COMMENT '',
  `clientId` VARCHAR(32) NOT NULL COMMENT '',
  `username` VARCHAR(32) NOT NULL COMMENT '',
  `isApproved` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '',
  `sname` VARCHAR(32) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `username` (`username` ASC)  COMMENT '',
  INDEX `clientId` (`clientId` ASC)  COMMENT '',
  INDEX `sname` (`sname` ASC)  COMMENT '',
  CONSTRAINT `appointment_ibfk_1`
    FOREIGN KEY (`username`)
    REFERENCES `utility`.`object` (`username`),
  CONSTRAINT `appointment_ibfk_2`
    FOREIGN KEY (`clientId`)
    REFERENCES `utility`.`object` (`username`),
  CONSTRAINT `appointment_ibfk_3`
    FOREIGN KEY (`sname`)
    REFERENCES `utility`.`subcat` (`sname`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `utility`.`availability`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `utility`.`availability` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `day` VARCHAR(32) NOT NULL COMMENT '',
  `timeFrom` TIME NOT NULL COMMENT '',
  `timeto` TIME NOT NULL COMMENT '',
  `username` VARCHAR(32) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `username` (`username` ASC)  COMMENT '',
  CONSTRAINT `availability_ibfk_1`
    FOREIGN KEY (`username`)
    REFERENCES `utility`.`object` (`username`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `utility`.`subcat_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `utility`.`subcat_user` (
  `username` VARCHAR(32) NOT NULL COMMENT '',
  `sname` VARCHAR(32) NOT NULL COMMENT '',
  `persona` VARCHAR(200) NULL DEFAULT NULL COMMENT '',
  INDEX `username` (`username` ASC)  COMMENT '',
  INDEX `sname` (`sname` ASC)  COMMENT '',
  CONSTRAINT `subcat_user_ibfk_1`
    FOREIGN KEY (`username`)
    REFERENCES `utility`.`object` (`username`),
  CONSTRAINT `subcat_user_ibfk_2`
    FOREIGN KEY (`sname`)
    REFERENCES `utility`.`subcat` (`sname`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `utility`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `utility`.`users` (
  `username` VARCHAR(32) NULL DEFAULT NULL COMMENT '',
  `password` VARCHAR(128) NOT NULL COMMENT '',
  INDEX `username` (`username` ASC)  COMMENT '',
  CONSTRAINT `users_ibfk_1`
    FOREIGN KEY (`username`)
    REFERENCES `utility`.`object` (`username`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
