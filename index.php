
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Event lista</title>
</head>
<body>
    
<?php include('db.php'); ?>

<h1 id="main_title">Event Lista</h1>
<div class="container">
    <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Nytt Event</a> <br>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Event</th>
                <th>Plats</th>
                <th>Datum</th>
                <th>Uppdatera</th>
                <th>Ta bort</th>
            </tr>
        </thead>
        <tbody>
    </div>

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

                $sql = "SELECT * FROM gora";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error); 
                }

                else {
                   
                    while ($row = $result->fetch_assoc()) {
                        ?>
                                 
                    <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['event_namn'];?></td>
                    <td><?php echo $row['plats'];?></td>
                    <td><?php echo $row['datum'];?></td>
                    <td><a href="uppdatera.php?id=<?php echo $row['id'];?>" class="btn btn-success">Uppdatera</a></td>
					<td><a href="tabort.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Ta bort</a></td>
                </tr>
                <?php
                }
            }
                ?>

        </tbody>
    </table>

        <?php
if (isset($_GET['message'])) {
    echo "<h6 class='mt-3 text-center'>" . $_GET['message'] . "</h6>";
}

if (isset($_GET['laggtill_msg'])) {
    echo "<h6 class='mt-3 text-center'>" . $_GET['laggtill_msg'] . "</h6>";
}

if (isset($_GET['delete_msg'])) {
    echo "<h6 class='mt-3 text-center'>" . $_GET['delete_msg'] . "</h6>";
}
?>

    <!-- drop down list to add -->
    <form action="laggtill.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nytt Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
            <div class= "form-group">
                <label for="ename">Event</label>  <input type="text"  name="ename" class="form-control">
            </div>
            <div class= "form-group">
                <label for="plats">Plats</label>  <input type="text"  name="plats" class="form-control">
            </div>
            <div class= "form-group">
                <label for="datum">Datum</label>  <input type="date"  name="datum" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Stäng</button>
        <input type="submit" class="btn btn-success" name="nytt_event" value="Lägg till nytt event">
      </div>
    </div>
  </div>
</div>
</form>



    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>