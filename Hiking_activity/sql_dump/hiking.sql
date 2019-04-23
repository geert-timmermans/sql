/* create database */
CREATE DATABASE reunion_island;

/* create table */
CREATE TABLE hiking(
   id int PRIMARY KEY AUTO_INCREMENT,
   name varchar(255),
   difficulty varchar(255),
   distance(km) INT(11),
   duration INT (11),
   height_difference(m) INT(255)
);

/* insert data into table */
INSERT INTO hiking(name, difficulty, distance, duration, height_difference)
VALUES
('The rise of the Rivière to the east of the 1st waterfall', 'Very difficult', '23.1', '09:00', 600),
('The courses of Bel Air and Parc Marc Rivière by the Rivière', 'easy', '5.1', '01:30', 140),
('From the D242 to the RF 13 by the Taïbit, Marla and the Col de Fourche', 'difficult', '14.8', '06:00', 1520),
('The Roland Garros airport tour in Saint-Denis', 'easy', '12.4', '03:00', 60);
