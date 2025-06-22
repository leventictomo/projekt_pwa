<?php
session_start();
include 'header.php';
if (!isset($_SESSION['korisnik'])) {
    echo "
        <div>
            <form class='potrebna_prijava' action='login.php' method='get'>
                <p>Morate se prvo prijaviti.</p>
                <input type='submit' value='Prijava'>
            </form>
        </div>";
    include 'footer.php';
    exit;
}
if ($_SESSION['korisnik']['razina'] == 'korisnik') {
    echo "Pozdrav, {$_SESSION['korisnik']['ime']}. Nemate dovoljna prava za pristup ovoj stranici.";
    include 'footer.php';
    exit;
}
?>

<?php
$conn = new mysqli("localhost", "root", "", "hnkdrinovci");
$conn->set_charset("utf8mb4");

// Brisanje
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM vijesti WHERE id = $id");
    header("Location: administrator.php");
    exit();
}


$result = $conn->query("SELECT * FROM vijesti ORDER BY datum DESC");
?>
    <h2>Administracija vijesti</h2>
    <a href="unos.php">➕ Nova vijest</a>
    <table>
        <tr><th>ID</th><th>Naslov</th><th>Kategorija</th><th>Arhiva</th><th>Datum</th><th>Akcije</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['naslov']) ?></td>
            <td><?= $row['kategorija']==='utakmice'? 'Utakmice' : 'Ostalo' ?></td>
            <td><?= $row['arhiva'] ? '✅' : '❌' ?></td>
            <td><?= $row['datum'] ?></td>
            <td>
                <a href="clanak.php?id=<?= $row['id'] ?>">Pregled</a> |
                <a href="uredi.php?id=<?= $row['id'] ?>">Uredi</a> |
                <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Obrisati?')">Obriši</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </table>
</main>
    <footer>
        <p>Autor: Tomo Leventić | tleventic@tvz.hr | © 2025</p>
    </footer>
</body>
</html>