SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+08:00";

DROP DATABASE IF EXISTS `uwe`;
CREATE DATABASE IF NOT EXISTS `uwe` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `uwe`;

CREATE TABLE assignment(
    id INT NOT NULL AUTO_INCREMENT,
    District_en VARCHAR(255), 
    District_cn VARCHAR(255), 
    Name_en VARCHAR(255), 
    Name_cn VARCHAR(255), 
    Address_en VARCHAR(255), 
    Address_cn VARCHAR(255), 
    GIHS VARCHAR(255), 
    Court_no_en VARCHAR(255), 
    Court_no_cn VARCHAR(255), 
    Ancillary_facilities_en VARCHAR(255), 
    Ancillary_facilities_cn VARCHAR(255), 
    Opening_hours_en VARCHAR(255), 
    Opening_hours_cn VARCHAR(255),
    Phone VARCHAR(255), 
    Remarks_en VARCHAR(255), 
    Remarks_cn VARCHAR(255), 
    Longitude VARCHAR(255), 
    Latitude VARCHAR(255),
    created_at TimeStamp,
    PRIMARY KEY (id)
);