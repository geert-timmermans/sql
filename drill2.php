<?php
echo'<a href="https://github.com/becodeorg/GNK-Holberton-1.9/blob/master/3-De-berg/06-SQL/1.select.md">Exercises</a>';
//Displays all octocats and their data
'SELECT * FROM octocats'

//Shows only the first names
'SELECT firstname FROM octocats'

//Display the first names, names and ages of each octocat
'SELECT firstname, lastname, age FROM octocats'

//Shows octocats whose name starts with 'N'
"SELECT firstname, lastname, age FROM octocats WHERE lastname LIKE 'n%'"

//Display the first and last name of the octocats of promo promo-central
"SELECT firstname,lastname FROM octocats WHERE promo = 'promo1-central'"

//Display the first name, last name and year of birth of the octocats of the promo "promo1-anderlecht"
"SELECT firstname,lastname,birthdate FROM octocats WHERE promo = 'promo1-anderlecht'"

?>