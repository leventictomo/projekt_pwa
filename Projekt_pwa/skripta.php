<?php
$conn = new mysqli("localhost", "root", "", "hnkdrinovci");
$conn->set_charset("utf8mb4");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $naslov = $_POST['naslov'];
    $sazetak = $_POST['sazetak'];
    $tekst = $_POST['tekst'];
    $kategorija = $_POST['kategorija'];
    $arhiva = isset($_POST['prikaz']) ? 0 : 1;

    $slika = '';
    if (isset($_FILES['slika']) && $_FILES['slika']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'fotografije/';
        $slika = $uploadDir . basename($_FILES['slika']['name']);
        move_uploaded_file($_FILES['slika']['tmp_name'], $slika);
    }

    $stmt = $conn->prepare("INSERT INTO vijesti (naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $naslov, $sazetak, $tekst, $slika, $kategorija, $arhiva);
    $stmt->execute();

    header("Location: clanak.php?id=" . $stmt->insert_id);
    exit();
}
$conn->close();
?>