<?php

echo'<a href="https://github.com/becodeorg/GNK-Holberton-1.9/blob/master/3-De-berg/06-SQL/1.select.md">Exercises</a>';

//How many boys are there in Becode?
"SELECT COUNT(*) FROM octocats WHERE gender = 'm'"

//How many girls are there in Becode / Central?
"SELECT COUNT(*) FROM octocats WHERE gender = 'f' AND promo = 'promo1-central'"

//How many boys are there in Becode / Central?
"SELECT COUNT(*) FROM octocats WHERE gender = 'm' AND promo = 'promo1-central'"

//How many octocats are there whose first name is 'Nadia' at becode?
"SELECT COUNT(*) FROM octocats WHERE firstname = 'Nadia'"

//On this new SQLFiddle, finds the function to display only the year of the "birthdate" column and displays the first name of all octocts and their year of birth.
'SELECT EXTRACT(YEAR FROM birthdate), firstname FROM octocats'

//Find the function to return a table containing only the maximum temperature expected ("Tomorrow the maximum observed in Belgium will be ... degrees")
"SELECT CONCAT('Tomorrow the maximum observed in Belgium will be ', MAX(haut), ' degrees') as weather FROM Météo"

//Find the function to return a table containing only the expected minimum temperature ("Tomorrow the minima observed in Belgium will be ... degrees"
"SELECT CONCAT('Tomorrow the minima observed in Belgium will be ', MIN(bas), ' degrees') as weather FROM Météo"

?>