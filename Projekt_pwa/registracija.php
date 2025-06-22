<?php
include 'header.php';
?>

<div class="container">

    <form method="post" action="skripta_registracija.php">
        <h2>Registracija</h2>
        <label for="ime">Ime:</label>
        <input type="text" name="ime" required>

        <label for="prezime">Prezime:</label>
        <input type="text" name="prezime" required>

        <label for="korisnicko_ime">Korisničko ime:</label>
        <input type="text" name="korisnicko_ime" required>

        <label for="lozinka">Lozinka:</label>
        <input type="password" name="lozinka" required>

        <label for="lozinka2">Ponovi lozinku:</label>
        <input type="password" name="lozinka2" required>

        <input type="submit" value="Registriraj se">
    </form>
</div>

<?php include 'footer.php'; ?>