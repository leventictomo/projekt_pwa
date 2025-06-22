<?php
include 'header.php';
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $naslov = $_POST['naslov'];
    $tekst = $_POST['tekst'];
    $kategorija = $_POST['kategorija'];

    $stmt = $conn->prepare("UPDATE vijesti SET naslov=?, tekst=?, kategorija=? WHERE id=?");
    $stmt->bind_param("sssi", $naslov, $tekst, $kategorija, $id);
    $stmt->execute();
    header("Location: administrator.php");
    exit;
} else {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM vijesti WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}
?>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Naslov: <input type="text" name="naslov" value="<?php echo $row['naslov']; ?>"><br>
    Tekst: <textarea name="tekst"><?php echo $row['tekst']; ?></textarea><br>
    <label for="kategorija">Kategorija vijesti:</label>
    <select name="kategorija">
        <option value="utakmice" <?php if ($row['kategorija'] == 'utakmice') echo 'selected'; ?>>Utakmice</option>
        <option value="ostalo" <?php if ($row['kategorija'] == 'ostalo') echo 'selected'; ?>>Ostalo</option>
    </select><br>
    <input type="submit" value="Spremi">
</form>
<?php 
include 'footer.php';
?>