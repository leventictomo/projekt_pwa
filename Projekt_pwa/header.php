<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>HNK Drinovci</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="container">
        <h1>HNK Drinovci</h1>
        <nav>
            <ul>
                <li><a href="index.php">Naslovna</a></li>
                <li><a href="kategorija.php?kategorija=utakmice">Utakmice</a></li>
                <li><a href="kategorija.php?kategorija=ostalo">Ostalo</a></li>
                <li><a href="unos.php">Unos</a></li>
                <li><a href="administrator.php">Administracija</a></li>
            <?php if (isset($_SESSION['korisnik'])): ?>
                <li><a href="logout.php">Odjava (<?= htmlspecialchars($_SESSION['korisnik']['korisnicko_ime']) ?>)</a></li>
            <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
<main>