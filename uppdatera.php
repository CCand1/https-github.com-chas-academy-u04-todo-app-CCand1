<?php
ob_start(); // Start output buffering

include('header.php');
include('db.php');

// Check if ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch event details from the database
    $sql = "SELECT * FROM gora WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // If no result found, terminate with an error message
    if (!$result) {
        die("Invalid query");
    }
}

// Handle form submission for updating event
if (isset($_POST['uppdatera_event'])) {
    $ename = $_POST['ename'];
    $plats = $_POST['plats'];
    $datum = $_POST['datum'];

    // Prepare and execute the update query
    $query = "UPDATE gora SET event_namn = :ename, plats = :plats, datum = :datum WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':ename', $ename);
    $stmt->bindParam(':plats', $plats);
    $stmt->bindParam(':datum', $datum);
    $stmt->bindParam(':id', $id);
    $updateResult = $stmt->execute();

    // Check if update was successful
    if (!$updateResult) {
        die("Failed to update event");
    } else {
        // Redirect user back to the index page
        header("Location: index.php");
        exit();
    }
}
?>

<form action="uppdatera.php?id=<?php echo $id; ?>" method="post">

    <div class="form-group">
        <label for="ename">Event</label>
        <input type="text" name="ename" class="form-control" value="<?php echo $result['event_namn']; ?>">
    </div>
    <div class="form-group">
        <label for="plats">Plats</label>
        <input type="text" name="plats" class="form-control" value="<?php echo $result['plats']; ?>">
    </div>
    <div class="form-group">
        <label for="datum">Datum</label>
        <input type="date" name="datum" class="form-control" value="<?php echo $result['datum']; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="uppdatera_event" value="UPPDATERA">
</form>

<?php include('footer.php'); ?>

<?php ob_end_flush(); // Flush the output buffer and send the content to the browser ?>
