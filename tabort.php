<?php
ob_start(); // Start output buffering

include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $query = "DELETE FROM gora WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Check if deletion was successful
        if ($stmt->rowCount() > 0) {
            // Redirect user back to the index page
            header('Location: index.php?delete_msg=Du tog bort eventet.');
            exit();
        } else {
            die("No records were deleted.");
        }
    } catch (PDOException $e) {
        die("Funkar inte: " . $e->getMessage());
    }
}

?>

<?php ob_end_flush(); // Flush the output buffer and send the content to the browser ?>
