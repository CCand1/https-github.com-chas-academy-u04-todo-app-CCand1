
//ta bort uppgift
if (isset($_GET['delete'])) {  <!-- create deletion-->
    $deleteId = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM todos WHERE id = ?");
    $stmt->bind_param("i", $deleteId);
    $stmt->execute();
    header('Location: index.php'); // Omdirigera efter borttagning
}

uppdatera.php
<?php
include 'index.php';

// Hämta uppgifter från databasen
$result = $conn->query("SELECT * FROM events");

// Visa uppgifterna
echo "<h2>Att göra lista</h2>";
echo "<ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>{$row['task_name']}</li>";
}
echo "</ul>";

// Lägg till ny uppgift
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST["task_name"];
    $conn->query("INSERT INTO tasks (task_name) VALUES ('$task_name')");
}
?>

<!-- Formulär för att lägga till uppgift -->
<form method="post" action="">
    <label>Ny uppgift:</label>
    <input type="text" name="task_name" required>
    <button type="submit">Lägg till</button>
</form>
