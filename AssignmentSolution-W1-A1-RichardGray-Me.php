<?php //Richard Gray Assignment 1 
//variables
$name = "Richard Gray";
$city = "Baltimore";
$state = "Maryland";
$temperature = "81";
$date = date("l jS \of F Y");
$earth_radius = 3959;
$earth_volume = (4/3) * pi() * ($earth_radius**3);

$message = "My name is $name <br> 
            My city is $city in the state of $state <br>
            The current temperature (F) is $temperature <br>
            The current date is $date <br>
            Earth volume is $earth_volume cubic miles <br>";       
echo $message;


?>
