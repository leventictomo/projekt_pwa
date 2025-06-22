<?php
$conn = new mysqli("localhost", "root", "", "hnkdrinovci");
$conn->set_charset("utf8mb4");

$id = intval($_GET['id'] ?? 0);
$stmt = $conn->prepare("SELECT * FROM vijesti WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if (!$row) die("Vijest nije pronađena.");
?>
<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="UTF-8">
        <title><?php echo htmlspecialchars($row['naslov']); ?></title>
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
    <main class="article-page">
        <h2><?php echo htmlspecialchars($row['naslov']); ?></h2>
        <p class="date"><?php echo date("j/n/Y H:i", strtotime($row['datum'])); ?> | <?php echo $row['kategorija']==='utakmice'? 'Utakmice' : 'Ostale vijesti'; ?></p>
        <?php if ($row['slika']): ?>
        <img src="<?php echo $row['slika']; ?>" alt="">
        <?php endif; ?>
        <p><strong><?php echo htmlspecialchars($row['sazetak']); ?></strong></p>
        <p><?php echo nl2br(htmlspecialchars($row['tekst'])); ?></p>
    </main>
    <footer>
        <p>Autor: Tomo Leventić | tleventic@tvz.hr | © 2025</p>
    </footer>
</body>
</html>