CREATE TABLE `Events` (
	`Id` INT NOT NULL,
	`Name` varchar(500),
	`Location` varchar(500),
	`EventDate` TIMESTAMP NOT NULL,
	PRIMARY KEY (`Id`)
);

CREATE TABLE `Stands` (
	`ID` INT NOT NULL,
	`Name` varchar(500),
	`EventId` INT NOT NULL UNIQUE,
	`Booked` BOOLEAN NOT NULL,
	`CompanyId` INT,
	`MapId` INT,
	PRIMARY KEY (`ID`)
);

CREATE TABLE `Company` (
	`ID` INT NOT NULL,
	`Name` varchar(500),
	`Logo` varchar(1500),
	`Contact_details` varchar(1500),
	`Market_doc` varchar(1500),
	`EventId` INT,
	`StandId` INT,
	PRIMARY KEY (`ID`)
);

CREATE TABLE `Map` (
	`ID` INT NOT NULL,
	`Url` varchar(1200),
	PRIMARY KEY (`ID`)
);

ALTER TABLE `Stands` ADD CONSTRAINT `Stands_fk0` FOREIGN KEY (`EventId`) REFERENCES `Events`(`Id`);

ALTER TABLE `Stands` ADD CONSTRAINT `Stands_fk1` FOREIGN KEY (`CompanyId`) REFERENCES `Company`(`ID`);

ALTER TABLE `Stands` ADD CONSTRAINT `Stands_fk2` FOREIGN KEY (`MapId`) REFERENCES `Map`(`ID`);

ALTER TABLE `Company` ADD CONSTRAINT `Company_fk0` FOREIGN KEY (`EventId`) REFERENCES `Events`(`Id`);

ALTER TABLE `Company` ADD CONSTRAINT `Company_fk1` FOREIGN KEY (`StandId`) REFERENCES `Stands`(`ID`);

