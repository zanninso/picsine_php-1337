CREATE TABLE ft_table (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `login` varchar(128) DEFAULT 'toto' NOT NULL,
    `group` ENUM('staff', 'student', 'other') NOT NULL,
    `creation_date` date NOT NULL);