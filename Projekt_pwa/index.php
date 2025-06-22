<?php
$conn = new mysqli("localhost", "root", "", "hnkdrinovci");
$conn->set_charset("utf8mb4");

function prikaziKategoriju($kategorija, $naslov) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM vijesti WHERE kategorija = ? AND arhiva = 0 ORDER BY datum DESC");
    $stmt->bind_param("s", $kategorija);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<section class='category'><h2>$naslov</h2><div class='articles'>";
    while ($row = $result->fetch_assoc()) {
        echo '<article>
                <a href="clanak.php?id=' . $row['id'] . '">
                    <img src="' . $row['slika'] . '" alt="">
                    <h3>' . htmlspecialchars($row['naslov']) . '</h3>
                </a>
            </article>';
    }
    echo "</div></section>";
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>HNK Drinovci - Vijesti</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="date">Lipanj, 2025.</div>
        <h1>HNK Drinovci</h1>
        <nav>
            <ul>
                <li><a href="index.php">Naslovna</a></li>
                <li><a href="kategorija.php?kategorija=utakmice">Utakmice</a></li>
                <li><a href="kategorija.php?kategorija=ostalo">Ostalo</a></li>
                <li><a href="unos.php">Unos</a></li>
                <li><a href="administrator.php">Administracija</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php
        prikaziKategoriju("utakmice", "Utakmice");
        prikaziKategoriju("ostalo", "Ostalo");
        ?>
    </main>

    <footer>
        <p>Autor: Tomo Leventić | tleventic@tvz.hr | © 2025</p>
    </footer>
</body>
</html>