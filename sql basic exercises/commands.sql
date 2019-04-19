/* assignment: */
/* https://github.com/becodeorg/GNK-Holberton-1.9/tree/master/3-De-berg/06-SQL/sql-exo */

/* Displays all data. */
SELECT * FROM students JOIN school ON students.school = school.idschool;

/* Shows only first names. */
SELECT prenom FROM students;

/* Shows the names, birth dates and school of each. */
SELECT students.nom, students.datenaissance, school.school FROM students JOIN school ON students.school = school.idschool;

/* Shows only students who are female. */
SELECT * FROM students JOIN school ON students.school = school.idschool WHERE genre = 'f';

/* Shows only students who are part of Andy School. */
SELECT * FROM students JOIN school ON students.school = school.idschool WHERE school.school = 'Charleroi';

/* Shows only the first names of the students, in reverse order to the alphabet (ESCR). Then the same thing but limiting the results to 2. */
SELECT prenom FROM students ORDER BY prenom DESC;
SELECT prenom FROM students ORDER BY prenom DESC LIMIT 2;

/* Add Ginette Dalor, born 01/01/1930 and assign her to Central, still in SQL. */
INSERT INTO students(nom, prenom, datenaissance, genre, school) VALUES('Dalor', 'Ginette', '1930-01-01', 'F', 1);

/* Modify Ginette (always in SQL) and change his sex and his name in "Omer". */
UPDATE students SET prenom = 'Omer', genre = 'M' WHERE idstudent = 32;

/* Delete the person whose ID is 3. */
DELETE FROM students WHERE idstudent = 3;

/* Change the contents of the School column so that "1" is replaced by "Central" and "2" is replaced by "Anderlecht". (pay attention to the type of the column!) */
UPDATE students, school SET students.school = school.school WHERE students.school = school.idschool;