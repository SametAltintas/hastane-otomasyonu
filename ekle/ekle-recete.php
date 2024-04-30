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
        
        $recete_id = $_POST["recete_id"];
        $hasta_id = $_POST["hasta_id"];
        $ilac_kod = $_POST["ilac_kod"];

        
        $query = "INSERT INTO recete (recete_id, hasta_id,ilac_kod) VALUES (:recete_id, :hasta_id, :ilac_kod)";

        
        $statement = $db->prepare($query);

        
        $statement->bindParam(":recete_id", $recete_id);
        $statement->bindParam(":hasta_id", $hasta_id);
        $statement->bindParam(":ilac_kod", $ilac_kod);

        
        $statement->execute();

        echo "Veri başarıyla eklendi.";
        header("refresh:3;url=ekle-recete.php");
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
    <title>Reçete Ekleme Formu</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-primary text-center bg-dark">Reçete Ekleme Formu</h2>
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
        <label for="recete_id">Reçete ID</label>
        <input type="text" name="recete_id" maxlength="5" required>
        <br>
        <label for="hasta_id">Hasta ID</label>
        <input type="text" name="hasta_id" required>
        <br>
        <label for="ilac_kod">İlaç Kodu:</label>
        <input type="text" name="ilac_kod" maxlength="10" required>
        <br>
        <button type="submit" class="bg-primary">Ekle</button>
    </form>
    
    <footer class="container-fluid bg-dark text-center text-primary fixed-bottom">Copyright © Samet Altıntaş</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
