<?php

include 'db.php';

if (isset($_POST['nytt_event'])) {
    $ename = $_POST['ename'];
    $plats = $_POST['plats'];
    $datum = $_POST['datum'];

    if ($ename == '' || empty($ename)) {
        header('location:index.php?message=Skriv namnet på det nya eventet!');
    } else {
        try {
            $query = "INSERT INTO `gora` (`event_namn`, `plats`, `datum`) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$ename, $plats, $datum]);
            
            header('location:index.php?laggtill_msg=Tack, allt gick bra!');
        } catch (Exception $e) {
            header('location:index.php?message=' . urlencode($e->getMessage()));
        }
    }
}

?>


