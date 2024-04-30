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
        
        $hasta_tc = $_POST["hasta_tc"];
        $hasta_ad = $_POST["hasta_ad"];
        $hasta_soyad = $_POST["hasta_soyad"];
        $hasta_tel = $_POST["hasta_tel"];
        $hasta_klinik = $_POST["hasta_klinik"];
        $hasta_adres = $_POST["hasta_adres"];
        $randevu_gun = $_POST["randevu_gun"];
        $randevu_saat = $_POST["randevu_saat"];
        $taburcu_tarih = $_POST["taburcu_tarih"];
        $oda_no = $_POST["oda_no"];
        $hemsire_tc = $_POST["hemsire_tc"];

        
        $query = "INSERT INTO hasta (hasta_tc, hasta_ad, hasta_soyad, hasta_tel, hasta_klinik, hasta_adres, randevu_gun, randevu_saat, taburcu_tarih, oda_no, hemsire_tc) VALUES (:hasta_tc, :hasta_ad, :hasta_soyad, :hasta_tel, :hasta_klinik, :hasta_adres, :randevu_gun, :randevu_saat, :taburcu_tarih, :oda_no, :hemsire_tc)";

        
        $statement = $db->prepare($query);

        
        $statement->bindParam(":hasta_tc", $hasta_tc);
        $statement->bindParam(":hasta_ad", $hasta_ad);
        $statement->bindParam(":hasta_soyad", $hasta_soyad);
        $statement->bindParam(":hasta_tel", $hasta_tel);
        $statement->bindParam(":hasta_klinik", $hasta_klinik);
        $statement->bindParam(":hasta_adres", $hasta_adres);
        $statement->bindParam(":randevu_gun", $randevu_gun);
        $statement->bindParam(":randevu_saat", $randevu_saat);
        $statement->bindParam(":taburcu_tarih", $taburcu_tarih);
        $statement->bindParam(":oda_no", $oda_no);
        $statement->bindParam(":hemsire_tc", $hemsire_tc);

        
        $statement->execute();

        echo "Veri başarıyla eklendi.";
        header("refresh:3;url=ekle-hasta.php");
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
    <title>Hasta Ekleme Formu</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-primary text-center bg-dark">Hasta Ekleme Formu</h2>
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
        <label for="hasta_tc">Hasta TC</label>
        <input type="text" name="hasta_tc" maxlength="11" required>
        <br>
        <label for="hasta_ad">Hasta Ad</label>
        <input type="text" name="hasta_ad" maxlength="35" required>
        <br>
        <label for="hasta_soyad">Hasta Soyad</label>
        <input type="text" name="hasta_soyad" maxlength="35" required>
        <br>
        <label for="hasta_tel">Hasta Telefon</label>
        <input type="text" name="hasta_tel" maxlength="11" required>
        <br>
        <label for="hasta_klinik">Hasta Klinik</label>
        <input type="text" name="hasta_klinik" maxlength="50" required>
        <br>
        <label for="hasta_adres">Adres</label>
        <input type="text" name="hasta_adres" maxlength="150" required>
        <br>
        <label for="randevu_gun">Randevu Günü</label>
        <input type="text" name="randevu_gun" required>
        <br>
        <label for="randevu_saat">Randevu Saati</label>
        <input type="text" name="randevu_saat" required>
        <br>
        <label for="taburcu_tarih">Taburcu Olma Tarihi(yyyy-aa-gg)</label>
        <input type="text" name="taburcu_tarih" required>
        <br>
        <label for="oda_no">Oda No(5)</label>
        <input type="text" name="oda_no" maxlength="5" required>
        <br>
        <label for="hemsire_tc">Hemşire TC</label>
        <input type="text" name="hemsire_tc" maxlength="11" required>
        <br>
        <button type="submit" class="bg-primary">Ekle</button>
    </form>
    <footer class="container-fluid bg-dark text-center text-primary fixed-bottom">Copyright © Samet Altıntaş</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
