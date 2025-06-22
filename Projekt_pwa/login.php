<?php
session_start();
require_once 'db_korisnici.php';

include 'header.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $korisnicko_ime = trim($_POST['korisnicko_ime']);
    $lozinka = $_POST['lozinka'];

    $conn = new mysqli("localhost", "root", "", "korisnici");
    $conn->set_charset("utf8mb4");

    // Pronađi korisnika po korisničkom imenu
    $stmt = $conn->prepare("SELECT id, ime, prezime, korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?");
    $stmt->bind_param("s", $korisnicko_ime);
    $stmt->execute();
    $result = $stmt->get_result();

    // Provjera postoji li korisnik
    if ($result->num_rows === 1) {
        $korisnik = $result->fetch_assoc();

        // Provjera lozinke
        if (password_verify($lozinka, $korisnik['lozinka'])) {
            // Prijava uspješna — spremi korisnika u sesiju
            $_SESSION['korisnik'] = [
                'id' => $korisnik['id'],
                'ime' => $korisnik['ime'],
                'prezime' => $korisnik['prezime'],
                'korisnicko_ime' => $korisnik['korisnicko_ime'],
                'razina' => $korisnik['razina']
            ];

            // Ako je administrator, preusmjeri na administrator.php
            if ($korisnik['razina'] == 'administrator') {
                header("Location: administrator.php");
                exit;
            } else {
                // Nema administratorska prava
                echo "<div class='obavijest'>";
                echo "<p>Pozdrav, {$korisnik['ime']}. Nemate dovoljna prava za pristup administratorskoj stranici.</p>";
                echo "<p><a href='index.php'>Povratak na naslovnicu</a></p>";
                echo "</div>";
            }
        } else {
            // Pogrešna lozinka
            echo "<div class='obavijest'>";
            echo "<p>Pogrešno korisničko ime ili lozinka.</p>";
            echo "<a href='login.php'>Pokušaj ponovno</a>";
            echo "</div>";
        }
    } else {
        // Korisnik ne postoji
        echo "<div class='obavijest'>";
        echo "<p>Korisnik ne postoji. <a href='registracija.php'>Registriraj se</a></p>";
        echo "</div>";
    }

    $stmt->close();
    $conn->close();
}
?>

<?php if (!isset($_SESSION['korisnik'])): ?>
<div class="container">
    <form method="post" action="login.php">
        <h2>Prijava</h2>
        <label for="korisnicko_ime">Korisničko ime:</label>
        <input type="text" name="korisnicko_ime" required>

        <label for="lozinka">Lozinka:</label>
        <input type="password" name="lozinka" required>
        <br>
        <input type="submit" value="Prijavi se">
        <br><br>
        <p>Nemate račun? <a href="registracija.php">Registrirajte se</a></p>
    </form>
</div>
<?php endif; ?>

<?php include 'footer.php'; ?>