
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- carriersdelivery_packingcosts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `carriersdelivery_packingcosts`;

CREATE TABLE `carriersdelivery_packingcosts`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `weight_max` DECIMAL(16,6) DEFAULT 0.000000,
    `cost` DECIMAL(16,6) DEFAULT 0.000000,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- carriersdelivery_carrier
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `carriersdelivery_carrier`;

CREATE TABLE `carriersdelivery_carrier`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(90) NOT NULL,
    `country_id` INTEGER NOT NULL,
    `diesel_tax_percent` DECIMAL(16,6) DEFAULT 0.000000,
    `fees_cost` DECIMAL(16,6) DEFAULT 0.000000,
    `unit_per_kg` SMALLINT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `carriersdelivery_carrier_country_id` (`country_id`),
    CONSTRAINT `fk_carriersdelivery_carrier_country_id`
        FOREIGN KEY (`country_id`)
        REFERENCES `country` (`id`)
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- carriersdelivery_areas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `carriersdelivery_areas`;

CREATE TABLE `carriersdelivery_areas`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(90) NOT NULL,
    `carrier_id` INTEGER NOT NULL,
    `departments` TEXT,
    PRIMARY KEY (`id`),
    INDEX `carriersdelivery_areas_carrier_id` (`carrier_id`),
    CONSTRAINT `fk_carriersdelivery_areas_carrier_id`
        FOREIGN KEY (`carrier_id`)
        REFERENCES `carriersdelivery_carrier` (`id`)
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- carriersdelivery_areascosts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `carriersdelivery_areascosts`;

CREATE TABLE `carriersdelivery_areascosts`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `carrierarea_id` INTEGER NOT NULL,
    `weight_max` DECIMAL(16,6) DEFAULT 0.000000,
    `cost` DECIMAL(16,6) DEFAULT 0.000000,
    PRIMARY KEY (`id`),
    INDEX `carriersdelivery_areascosts_carrierarea_id` (`carrierarea_id`),
    CONSTRAINT `fk_carriersdelivery_areascosts_carrierarea_id`
        FOREIGN KEY (`carrierarea_id`)
        REFERENCES `carriersdelivery_areas` (`id`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- carriersdelivery_areascostskg
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `carriersdelivery_areascostskg`;

CREATE TABLE `carriersdelivery_areascostskg`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `carrierarea_id` INTEGER NOT NULL,
    `weight_max` DECIMAL(16,6) DEFAULT 0.000000,
    `cost` DECIMAL(16,6) DEFAULT 0.000000,
    PRIMARY KEY (`id`),
    INDEX `carriersdelivery_areascostskg_carrierarea_id` (`carrierarea_id`),
    CONSTRAINT `fk_carriersdelivery_areascostskg_carrierarea_id`
        FOREIGN KEY (`carrierarea_id`)
        REFERENCES `carriersdelivery_areas` (`id`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- carriersdelivery_order
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `carriersdelivery_order`;

CREATE TABLE `carriersdelivery_order`
(
    `order_id` INTEGER NOT NULL,
    `postage_log` TEXT,
    PRIMARY KEY (`order_id`),
    CONSTRAINT `fk_carriersdelivery_order_order_id`
        FOREIGN KEY (`order_id`)
        REFERENCES `order` (`id`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- carriersdelivery_product
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `carriersdelivery_product`;

CREATE TABLE `carriersdelivery_product`
(
    `product_id` INTEGER NOT NULL,
    `carrier_id` INTEGER NOT NULL,
    PRIMARY KEY (`product_id`,`carrier_id`),
    INDEX `FI_carriersdelivery_product_carrier_id` (`carrier_id`),
    CONSTRAINT `fk_carriersdelivery_product_product_id`
        FOREIGN KEY (`product_id`)
        REFERENCES `product` (`id`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE,
    CONSTRAINT `fk_carriersdelivery_product_carrier_id`
        FOREIGN KEY (`carrier_id`)
        REFERENCES `carriersdelivery_carrier` (`id`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
