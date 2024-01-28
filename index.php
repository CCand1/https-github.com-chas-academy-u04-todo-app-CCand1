<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> <!-- CSS from Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"><!-- JS from Bootstrap-->
</head>
<body>
    <div class="container my-5">
        <h2>Att göra lista</h2>
        <a class="btn btn-primary" href="/events/skapa.php" role="button">Nytt event</a> <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th> <!-- creating a table-->
                    <th>Event namn</th>
                    <th>Plats</th>
                    <td>Antal personer involverade</td>
                    <th>Datum</th>
                    <th>Klart datum</th>


                </tr>
            </thead>
            <tbody>
                <?php

use FTP\Connection;
                                    //creating connection
                $servername = "db";
                $username = "mariadb";
                $password = "mariadb";
                $database = "mariadb";
                                    
                $connection = new mysqli($servername,$username, $password,$database);

                if ($connection->connect_error) {
                    die("Connection failed :". $connection->connect_error);
                }

                $sql = "SELECT * FROM att_göra_lista";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error); 
                }

                while ($row = $result->fetch_assoc()) {
                    echo "                
                    <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['event_namn']}</td>
                    <td>{$row['plats']}</td>
                    <td>{$row['antal_personer_involverade']}</td>
                    <td>{$row['datum']}</td>
                    <td>{$row['klart-datum']}</td>
                    <td>
                        <a class='btn btn-primary btn-sm'  href='/göra/uppdatera.php'>Uppdatera</a>
                        <a class='btn btn-danger btn-sm'  href='/göra/tabort.php'>Ta bort</a>
                    </td>
                </tr>";
                }
                ?>
                <tr>
                <td>101</td>
                <td>Asien resa</td>
                <td>Peking</td>
                <td>8</td>
                <td>2024-05-01</td>
                <td>2024-06-01</td>
                <td>
                    <a class='btn btn-primary btn-sm'  href='/göra/uppdatera.php'>Uppdatera</a>
                    <a class='btn btn-danger btn-sm'  href='/göra/tabort.php'>Ta bort</a>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</body>
</html>