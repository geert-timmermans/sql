<?php

echo'<a href="https://github.com/becodeorg/GNK-Holberton-1.9/blob/master/3-De-berg/06-SQL/1.select.md">Exercises</a>';

//Display the first and last name of all octocats, in ascending alphabetical order of the first name.
'SELECT firstname, lastname FROM octocats ORDER BY firstname ASC'

//Display the first and last name of all octocats, in descending alphabetical order of the surname.
'SELECT firstname, lastname FROM octocats ORDER BY lastname DESC'

//Display the first name, last name and age of all octocats, from the youngest to the oldest.
'SELECT firstname, lastname, age FROM octocats ORDER BY age ASC'

//Display the first name, last name and age of all octocats, from the oldest to the youngest.
'SELECT firstname, lastname, age FROM octocats ORDER BY age DESC'

//Display the first name, last name and age of all octocats, from the youngest to the oldest, from the "promo1-central" promo.
'SELECT firstname, lastname, age FROM octocats WHERE promo = promo1-central ORDER BY age ASC'

//Display the first name, last name and age of all octocats, from the youngest to the oldest, from the "promo1-central" promo, whose age is between 23 and 28.
"SELECT firstname, lastname, age FROM octocats WHERE promo = 'promo1-central' BETWEEN 23 AND 28 ORDER BY age ASC"

//Displays the first name, last name, age and gender of all octocats, from the youngest to the oldest, from the "promo1-central" promo and between 25 and 35 years old.
"SELECT firstname, lastname, age, gender FROM octocats WHERE promo = 'promo1-central' AND age BETWEEN 25 AND 35 ORDER BY age ASC"

//Displays the first name, last name, age and gender of all octocats, from the youngest to the oldest, from the "promo1-central" promo, which is between 25 and 35 years old and whose gender is masculine .
"SELECT firstname, lastname, age, gender FROM octocats WHERE promo = 'promo1-central' AND gender LIKE 'M%' AND age BETWEEN 25 AND 35 ORDER BY age ASC"

//Display the first name, last name, age of the oldest octocate of Becode / Central. So you have to get a table with a single row.
"SELECT firstname, lastname, MAX(age) AS age FROM octocats WHERE promo = 'promo1-central'"

?>