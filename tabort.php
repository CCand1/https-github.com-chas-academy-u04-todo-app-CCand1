//ta bort uppgift
if (isset($_GET['delete'])) {  <!-- create deletion-->
    $deleteId = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM todos WHERE id = ?");
    $stmt->bind_param("i", $deleteId);
    $stmt->execute();
    header('Location: index.php'); // Omdirigera efter borttagning
}
