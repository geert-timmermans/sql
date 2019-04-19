<?php
echo'<a href="https://github.com/becodeorg/GNK-Holberton-1.9/blob/master/3-De-berg/06-SQL/1.select.md">Exercises</a>';
//only cities
'SELECT ville FROM Météo'

//all cities and their maximum temperature
'SELECT ville,haut FROM Météo'

//all cities and their minimum temperature
'SELECT ville,bas FROM Météo'

//Where cities whose maximum temperature exceeds 27 degrees
'SELECT ville FROM Météo WHERE haut >= 27'

//Where cities whose minimum temperature will be less than or equal to 15 degrees
'SELECT ville FROM Météo WHERE bas <= 15'

//Where cities with a minimum temperature of 15 degrees
'SELECT ville FROM Météo WHERE bas = 15'

//Where cities whose minimum temperature will NOT be equal to 15 degrees
'SELECT ville FROM Météo WHERE bas <> 15'

//Where cities whose name begins with "Br"
"SELECT ville FROM Météo WHERE ville LIKE 'br%'"

//Where cities with a maximum temperature between 26 and 28 degrees
'SELECT ville FROM Météo WHERE haut BETWEEN 26 AND 28'

//Where cities with a minimum temperature of 14 or 16 degrees
'SELECT ville FROM Météo WHERE bas = 14 OR bas = 16'

//Where cities with a maximum temperature of 26 or higher and a minimum temperature of less than 14
'SELECT ville FROM Météo WHERE haut >= 26 OR bas <= 14'

?>