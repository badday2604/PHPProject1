-- MySQL Script generated by MySQL Workbench
-- Wed Feb 17 23:11:31 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bookstore
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bookstore
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bookstore` DEFAULT CHARACTER SET utf8 ;
USE `bookstore` ;

-- -----------------------------------------------------
-- Table `bookstore`.`books`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bookstore`.`books` ;

CREATE TABLE IF NOT EXISTS `bookstore`.`books` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `description` VARCHAR(300) NULL,
  `author` VARCHAR(45) NULL,
  `unit_price` DOUBLE NULL,
  `published_date` DATE NULL,
  `quantity` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bookstore`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bookstore`.`users` ;

CREATE TABLE IF NOT EXISTS `bookstore`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(60) NULL,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `phone` VARCHAR(20) NULL,
  `card_no` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bookstore`.`orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bookstore`.`orders` ;

CREATE TABLE IF NOT EXISTS `bookstore`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `order_date` DATE NULL,
  `ship_date` DATE NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`, `users_id`),
  CONSTRAINT `fk_orders_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `bookstore`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bookstore`.`order_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bookstore`.`order_details` ;

CREATE TABLE IF NOT EXISTS `bookstore`.`order_details` (
  `books_id` INT NOT NULL,
  `orders_id` INT NOT NULL,
  `order_qty` INT NULL,
  `quoted_price` DOUBLE NULL,
  PRIMARY KEY (`books_id`, `orders_id`),
  CONSTRAINT `fk_books_has_orders_books`
    FOREIGN KEY (`books_id`)
    REFERENCES `bookstore`.`books` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_books_has_orders_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `bookstore`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;