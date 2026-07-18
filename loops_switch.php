<?php
echo " For Loop";
echo "<br>";

for($i = 0; $i<=10; $i++){
	echo "$i <br> ";
}


echo" While Loop";
echo " <br> ";

$j = 1;
while($j<=20){
	echo "$j <br>";
	$j++;
}


echo" Do while Loop";
echo "<br>";

$k = 1;
do {
    echo " $k <br>";
    $k++;
} while ($k <= 5);

echo" Switch Case ";
echo "<br>";

$day = 3;

switch ($day) {
    case 1:
        echo "Monday";
        break;

    case 2:
        echo "Tuesday";
        break;

    case 3:
        echo "Wednesday";
        break;

    case 4:
        echo "Thursday";
        break;

    case 5:
        echo "Friday";
        break;

    default:
        echo "Invalid Day";
}

?>