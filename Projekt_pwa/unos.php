<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos nove vijesti</title>
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
        <form action="skripta.php" method="POST" enctype="multipart/form-data">
            <h2>Unesi novu vijest</h2>
            <label for="naslov">Naslov vijesti:</label>
            <input type="text" id="naslov" name="naslov" required>

            <label for="sazetak">Kratki sažetak:</label>
            <textarea id="sazetak" name="sazetak" rows="3" required></textarea>

            <label for="tekst">Tekst vijesti:</label>
            <textarea id="tekst" name="tekst" rows="8" required></textarea>

            <label for="kategorija">Kategorija vijesti:</label>
            <select id="kategorija" name="kategorija" required>
                <option value="">-- Odaberi kategoriju --</option>
                <option value="utakmice">Utakmice</option>
                <option value="ostalo">Ostalo</option>
            </select>

            <label for="slika">Odaberi sliku:</label>
            <input type="file" id="slika" name="slika" accept="image/*" required>

            <label>
                <input type="checkbox" name="prikaz" value="da">
                Prikaži vijest na stranici
            </label>

            <input type="submit" value="Pošalji vijest">
        </form>
    </main>

    <footer>
        <p>Autor: Tomo Leventić | tleventic@tvz.hr | © 2025</p>
    </footer>
</body>
</html>