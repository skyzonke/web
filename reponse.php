<!doctype html>
<html lang='fr'>
<head>
<meta charset="utf-8">
<title>
Réponse au formulaire :
</title>
</head>
<body>
<h1>
	Merci d'avoir répondu au quizz !
</h1>
<?php
if ((isset($_GET['marathon'])) and (!empty($_GET['marathon']))) {
	echo "Selon vous, la longueur d'un marathon est de: ";
	echo $_GET['marathon']." km <br/>";
	if (($_GET['marathon']=="42,2") or ($_GET['marathon']=="42,195"))
		echo "Excellente réponse !"; 
	elseif (($_GET['marathon']>=42) 
		and ($_GET['marathon']<43) )
		echo "Très bien<br/>";
else 
echo "Non, la longueur d'un marathon est de 42,195 km <br/>";
}

/* Réponse pour le triathlon : */
if ((!empty($_GET['course'])) and ( !empty($_GET['natation'])) 
	and (!empty($_GET['velo'])) and (empty($_GET['rugby']))
	and (empty($_GET['badminton'])) and (empty($_GET['roller']))
	and (empty($_GET['pingpong'])))
		echo "Bravo le triathlon est bien composé du velo, 
	de la course et de la natation !";
	else {
	echo "Mauvaise réponse !";
	echo " Le triathlon est composé du velo, de la course et de la natation !";
}
echo "<br/>";
/* les prochains jo: */
if ($_GET['jo']=="londres") 
	echo "Non, ce sont les JO de 2012 qui se sont déroulés à Londres !";
	elseif  ($_GET['jo']=="rio")
	echo "Non, ce sont les JO de 2016 qui se sont déroulés à Rio !";
	elseif  ($_GET['jo']=="paris") 
		echo "Bravo, les prochains JO se dérouleront bien à Paris !";
	else
	echo "Mauvaise réponse ! Les prochains jo se dérouleront à Rio !";
echo "<br/>";
if (!empty($_GET['rb1'])){
if ($_GET['rb1'] == "2")
	 	echo "Bravo, Zidane a bien marqué 2 buts en finale en 1998";
	else
		echo "Mauvaise réponse ! Zidane a marqué 2 buts en finale en 1998";
echo "<br/>";
}
//print_r($_GET['s1']);
if (!empty($_GET['coul'])){
    $couleursReponse = $_GET['coul'];
    $couleursCorrectes = array(['rose','noir','blanc']);
    if (count($couleursReponse) == count($couleursCorrectes) && !array_diff($couleursReponse, $couleursCorrectes))
        echo "Bravo les couleurs de Fleury Hand Ball sont bien Rose Noir et Blanc !";
else
        echo "Mauvaise réponse : les couleurs de Fleury Hand Ball sont: Rose Noir et Blanc !";
}
?>
</body>
</html>
