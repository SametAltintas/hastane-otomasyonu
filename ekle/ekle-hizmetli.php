<?php
$host = "localhost";  
$port = "5432";       
$dbname = "";  
$user = "";  
$password = ""; 

try {
    
    $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");

    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $hizmetli_tc = $_POST["hizmetli_tc"];
        $hizmetli_ad = $_POST["hizmetli_ad"];
        $hizmetli_soyad = $_POST["hizmetli_soyad"];
        $hizmetli_telefon = $_POST["hizmetli_telefon"];
        $hizmetli_adres = $_POST["hizmetli_adres"];

       
        $query = "INSERT INTO hizmetli (hizmetli_tc, hizmetli_ad, hizmetli_soyad, hizmetli_telefon, hizmetli_adres) VALUES (:hizmetli_tc, :hizmetli_ad, :hizmetli_soyad, :hizmetli_telefon, :hizmetli_adres)";
        
        
        $statement = $db->prepare($query);

        
        $statement->bindParam(":hizmetli_tc", $hizmetli_tc);
        $statement->bindParam(":hizmetli_ad", $hizmetli_ad);
        $statement->bindParam(":hizmetli_soyad", $hizmetli_soyad);
        $statement->bindParam(":hizmetli_telefon", $hizmetli_telefon);
        $statement->bindParam(":hizmetli_adres", $hizmetli_adres);
        
        $statement->execute();

        echo "Veri başarıyla eklendi.";
        header("refresh:3;url=ekle-hemsire.php");
    }
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
} finally {
    
    $db = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hizmetli Ekleme Formu</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-primary text-center bg-dark">Hizmetli Ekleme Formu</h2>
    <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <p class="navbar-brand">DEVLET HASTANESİ</p>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Formlar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ekleme
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="ekle-hasta.php">Hasta</a></li>
              <li><a class="dropdown-item" href="ekle-doktor.php">Doktor</a></li>
              <li><a class="dropdown-item" href="ekle-gorev.php">Görev</a></li>
              <li><a class="dropdown-item" href="ekle-hemsire.php">Hemşire</a></li>
              <li><a class="dropdown-item" href="ekle-hizmetli.php">Hizmetli</a></li>
              <li><a class="dropdown-item" href="ekle-ilac.php">İlaç</a></li>
              <li><a class="dropdown-item" href="ekle-muayene.php">Muayene</a></li>
              <li><a class="dropdown-item" href="ekle-recete.php">Reçete</a></li>
              <li><a class="dropdown-item" href="ekle-oda.php">Oda</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Listeler
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../goruntule/hasta.php">Hasta</a></li>
              <li><a class="dropdown-item" href="../goruntule/doktor.php">Doktor</a></li>
              <li><a class="dropdown-item" href="../goruntule/gorev.php">Görev</a></li>
              <li><a class="dropdown-item" href="../goruntule/hemsire.php">Hemşire</a></li>
              <li><a class="dropdown-item" href="../goruntule/hizmetli.php">Hizmetli</a></li>
              <li><a class="dropdown-item" href="../goruntule/ilac.php">İlaç</a></li>
              <li><a class="dropdown-item" href="../goruntule/muayene.php">Muayene</a></li>
              <li><a class="dropdown-item" href="../goruntule/recete.php">Reçete</a></li>
              <li><a class="dropdown-item" href="../goruntule/odalar.php">Oda</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Silme
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../sil/sil_hasta.php">Hasta</a></li>
              <li><a class="dropdown-item" href="../sil/sil-doktor.php">Doktor</a></li>
              <li><a class="dropdown-item" href="../sil/sil-gorev.php">Görev</a></li>
              <li><a class="dropdown-item" href="../sil/sil_hemsire.php">Hemşire</a></li>
              <li><a class="dropdown-item" href="../sil/sil-hizmetli.php">Hizmetli</a></li>
              <li><a class="dropdown-item" href="../sil/sil-ilac.php">İlaç</a></li>
              <li><a class="dropdown-item" href="../sil/sil-muayene.php">Muayene</a></li>
              <li><a class="dropdown-item" href="../sil/sil-recete.php">Reçete</a></li>
              <li><a class="dropdown-item" href="../sil/sil-oda.php">Oda</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="hizmetli_tc">TC</label>
        <input type="text" name="hizmetli_tc" maxlength="11" required>
        <br>
        <label for="hizmetli_ad">AD</label>
        <input type="text" name="hizmetli_ad" maxlength="35" required>
        <br>
        <label for="hizmetli_soyad">Soyad</label>
        <input type="text" name="hizmetli_soyad" maxlength="35" required>
        <br>
        <label for="hizmetli_telefon">Telefon</label>
        <input type="text" name="hizmetli_telefon" maxlength="11" required>
        <br>
        <label for="hizmetli_adres">Adres</label>
        <input type="text" name="hizmetli_adres" maxlength="150" required>
        <br>
        <button type="submit" class="bg-primary">Ekle</button>
    </form>
    <footer class="container-fluid bg-dark text-center text-primary fixed-bottom">Copyright © Samet Altıntaş</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

