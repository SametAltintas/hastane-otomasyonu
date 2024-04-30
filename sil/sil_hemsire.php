<?php

$host = "localhost";
$port = "5432";
$dbname = ""; 
$user = "";
$password = "";


if(isset($_POST['delete_value'])) {
    $delete_value = $_POST['delete_value'];

    try {
        
        $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");

        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $sql = "DELETE FROM hemsire WHERE hemsire_tc = :delete_value";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':delete_value', $delete_value, PDO::PARAM_INT);
        $stmt->execute();

        echo "Satır başarıyla silindi.";
        header("refresh:3;url=sil_hemsire.php");
    } catch (PDOException $e) {
        echo "Hata: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hemşire Silme</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-primary text-center bg-dark">Hemşire Silme Formu</h2>
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
              <li><a class="dropdown-item" href="../ekle/ekle-hasta.php">Hasta</a></li>
              <li><a class="dropdown-item" href="../ekle/ekle-doktor.php">Doktor</a></li>
              <li><a class="dropdown-item" href="../ekle/ekle-gorev.php">Görev</a></li>
              <li><a class="dropdown-item" href="../ekle/ekle-hemsire.php">Hemşire</a></li>
              <li><a class="dropdown-item" href="../ekle/ekle-hizmetli.php">Hizmetli</a></li>
              <li><a class="dropdown-item" href="../ekle/ekle-ilac.php">İlaç</a></li>
              <li><a class="dropdown-item" href="../ekle/ekle-muayene.php">Muayene</a></li>
              <li><a class="dropdown-item" href="../ekle/ekle-recete.php">Reçete</a></li>
              <li><a class="dropdown-item" href="../ekle/ekle-oda.php">Oda</a></li>
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
              <li><a class="dropdown-item" href="sil_hasta.php">Hasta</a></li>
              <li><a class="dropdown-item" href="sil-doktor.php">Doktor</a></li>
              <li><a class="dropdown-item" href="sil-gorev.php">Görev</a></li>
              <li><a class="dropdown-item" href="sil_hemsire.php">Hemşire</a></li>
              <li><a class="dropdown-item" href="sil-hizmetli.php">Hizmetli</a></li>
              <li><a class="dropdown-item" href="sil-ilac.php">İlaç</a></li>
              <li><a class="dropdown-item" href="sil-muayene.php">Muayene</a></li>
              <li><a class="dropdown-item" href="sil-recete.php">Reçete</a></li>
              <li><a class="dropdown-item" href="sil-oda.php">Oda</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<form method="post" action="">
    <label>Hemşire TC:</label>
    <input type="text" name="delete_value" maxlenght="11" required>
    <input type="submit" value="Sil" class="bg-primary">
</form>
<footer class="container-fluid bg-dark text-center text-primary fixed-bottom">Copyright © Samet Altıntaş</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>
</html>

