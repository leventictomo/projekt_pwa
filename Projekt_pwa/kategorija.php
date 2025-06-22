<?php
$conn = new mysqli("localhost", "root", "", "hnkdrinovci");
$conn->set_charset("utf8mb4");

$kategorija = $_GET['kategorija'] ?? 'utakmice';

$stmt = $conn->prepare("SELECT * FROM vijesti WHERE kategorija = ? AND arhiva = 0 ORDER BY datum DESC");
$stmt->bind_param("s", $kategorija);
$stmt->execute();
$result = $stmt->get_result();

$naslov = $kategorija === 'utakmice' ? 'Utakmice' : 'Ostalo';
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $naslov; ?></title>
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
    <section class="category">
        <h2><?php echo $naslov; ?></h2>
        <div class="articles">
            <?php while ($row = $result->fetch_assoc()): ?>
            <article>
                <a href="clanak.php?id=<?php echo $row['id']; ?>">
                    <img src="<?php echo $row['slika']; ?>" alt="">
                    <h3><?php echo htmlspecialchars($row['naslov']); ?></h3>
                </a>
            </article>
            <?php endwhile; ?>
        </div>
    </section>
</main>
<footer>
    <p>Autor: Tomo Leventić | tleventic@tvz.hr | © 2025</p>
</footer>
</body>
</html>