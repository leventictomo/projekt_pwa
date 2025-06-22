<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$baza = "korisnici";

$conn = new mysqli($host, $user, $pass, $baza);
$conn->set_charset("utf8mb4");

include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = trim($_POST['ime']);
    $prezime = trim($_POST['prezime']);
    $korisnicko_ime = trim($_POST['korisnicko_ime']);
    $lozinka = $_POST['lozinka'];
    $lozinka2 = $_POST['lozinka2'];

    if ($lozinka !== $lozinka2) {
        echo "Lozinke se ne podudaraju. <a href='registracija.php'>Pokušaj ponovno.</a>";
        include 'footer.php';
        exit;
    }

    $stmt = $conn->prepare("SELECT id FROM korisnik WHERE korisnicko_ime = ?");
    $stmt->bind_param("s", $korisnicko_ime);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo "Korisničko ime već postoji. <a href='registracija.php'>Pokušaj drugo.</a>";
        include 'footer.php';
        exit;
    }
    $stmt->close();

    $hashed = password_hash($lozinka, PASSWORD_DEFAULT);

    //početna razina je korisnik
    $stmt = $conn->prepare("INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, 'korisnik')");
    $stmt->bind_param("ssss", $ime, $prezime, $korisnicko_ime, $hashed);

    if ($stmt->execute()) {
        echo "Registracija uspješna. <a href='login.php'>Prijavi se</a>";
        include 'footer.php';
    } else {
        echo "Došlo je do greške: " . $conn->error;
        include 'footer.php';
    }

    $stmt->close();
    $conn->close();
}
?>