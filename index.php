<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP et MySQL</title>
</head>

<body>



    <?php

    if (extension_loaded('PDO')) {
        echo 'PDO OK';
    } else {
        echo 'PDO KO';
    }

    $dsn = 'mysql:host=localhost;dbname=colyseum;port=3306;charset=utf8';
    $pdo = new PDO($dsn, 'root', 'kenya2010');

    $query = $pdo->query("SELECT * FROM clients");
    $resultat = $query->fetchAll();
    ?>
    <h2>Exercice 1</h2>
    <?php

    print("<table border=\"1\">");

    foreach ($resultat as $key => $variable){

         print("<tr>"); 
         print("<td>" . $resultat[$key]['id'] . "</td>");
         print("<td>" . $resultat[$key]['lastName'] . "</td>");
         print("<td>" . $resultat[$key]['firstName'] . "</td>");
         print("<td>" . $resultat[$key]['birthDate'] . "</td>");
         print("<td>" . $resultat[$key]['card'] . "</td>");
         print("<td>" . $resultat[$key]['cardNumber'] . "</td>");
         print("<tr>");

           }

    print("</table>");

?>
    <h2>Exercice 2</h2>

    <?php
    $query = $pdo->query("SELECT * FROM showTypes");
    $resultat = $query->fetchAll();

    print("<table border=\"1\">");

    foreach ($resultat as $key => $variable) {
        print("<tr>");
        print("<td>" . $resultat[$key]['id'] . "</td>");
        print("<td>" . $resultat[$key]['type'] . "</td>");
        print("<tr>");
    }

    print("</table>");
    ?>
    <h2>Exercice 3 </h2>

    <?php

    $query = $pdo->query("SELECT * FROM clients");
    $resultat = $query->fetchAll();

    print("<table border=\"1\">");

    for ($i = 0; $i < 20; $i++) {
        print("<td>" . $resultat[$i]['id'] . " </td>");
        print("<td>" . $resultat[$i]['lastName'] . "</td>");
        print("<td>" . $resultat[$i]['firstName'] . "</td>");
        print("<td>" . $resultat[$i]['birthDate'] . "</td>");
        print("<td>" . $resultat[$i]['card'] . "</td>");
        print("<td>" . $resultat[$i]['cardNumber'] . "</td>");
        print("<tr>");
    }
    print("</table>");
    ?>

    <h2>Exercice 4 </h2>
    <?php
    $query = $pdo->query("SELECT * FROM clients");
    $resultat = $query->fetchAll();

    print("<table border=\"1\">");

    foreach ($resultat as $key => $variable) {
        if ($resultat[$key]['card'] == true) {
            print("<tr>");
            print("<td>" . $resultat[$key]['id'] . "</td>");
            print("<td>" . $resultat[$key]['lastName'] . "</td>");
            print("<td>" . $resultat[$key]['firstName'] . "</td>");
            print("<td>" . $resultat[$key]['birthDate'] . "</td>");
            print("<td>" . $resultat[$key]['card'] . "</td>");
            print("<td>" . $resultat[$key]['cardNumber'] . "</td>");
            print("<tr>");
        } else {
            echo "";
        }
    }
    print("</table>");

    ?>

    <h2>Exercice 5 </h2>

    <?php
    $query = $pdo->query("SELECT * FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName ASC");
    $resultat = $query->fetchAll();


    foreach ($resultat as $key => $variable) {
        echo "nom du client : " . " " . $resultat[$key]['lastName'] . " , " . " prenom du client : " . $resultat[$key]['firstName'] . "<br>";
    }
    ?>

    <h2>Exercice 6 </h2>

    <?php
    $query = $pdo->query("SELECT * FROM shows ORDER BY title");
    $resultat = $query->fetchAll();

    foreach ($resultat as $key => $variable) {
        print("<p>" . $resultat[$key]['title'] . " par " . $resultat[$key]['performer'] . " le " . $resultat[$key]['date'] . " à " . $resultat[$key]['startTime'] . "</p>");
    }

    ?>

    <h2> Exercice 7 </h2>

    <?php
    $query = $pdo->query("SELECT * FROM clients");
    $resultat = $query->fetchAll();

    foreach($resultat as $key => $variable){
        print("Nom : " . $resultat[$key]['lastName'] . "<br>");
        print("Prenom : " . $resultat[$key]['firstName'] . "<br>");
        print("Date de Naissance : " . $resultat[$key]['birthDate'] . "<br>");
        if($resultat[$key]['card'] == true){
            print("Carte de fidélité : Oui " . "<br>");
            print("Numero de carte de fidélité : " . $resultat[$key]['cardNumber'] . "<br><br>");
        }else{
            print("Carte de fidélité : Non <br><br>");
        }
    }

    ?>
</body>

</html>