<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ilac</title>
    <link rel="stylesheet" href="../styleview.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-primary text-center bg-dark">İlaç Formu</h2>
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
              <li><a class="dropdown-item" href="hasta.php">Hasta</a></li>
              <li><a class="dropdown-item" href="doktor.php">Doktor</a></li>
              <li><a class="dropdown-item" href="gorev.php">Görev</a></li>
              <li><a class="dropdown-item" href="hemsire.php">Hemşire</a></li>
              <li><a class="dropdown-item" href="hizmetli.php">Hizmetli</a></li>
              <li><a class="dropdown-item" href="ilac.php">İlaç</a></li>
              <li><a class="dropdown-item" href="muayene.php">Muayene</a></li>
              <li><a class="dropdown-item" href="recete.php">Reçete</a></li>
              <li><a class="dropdown-item" href="odalar.php">Oda</a></li>
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
<?php

$host = "localhost";
$port = "5432";
$dbname = ""; 
$user = "";
$password = "";

try {
    
    $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");

    
    $query = "SELECT * FROM ilac";
    $result = $db->query($query);

   
    echo "<table border='1'>
            <tr>
                <th>İlaç Kodu</th>
                <th>İlaç Adı</th>
                <th>İlaç Açıklaması</th>
            </tr>";

    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$row['ilac_kod']}</td>
                <td>{$row['ilac_ad']}</td>
                <td>{$row['ilac_aciklama']}</td>
              </tr>";
    }

    echo "</table>";

    
    $db = null;
} catch (PDOException $e) {
    
    echo "Hata: " . $e->getMessage();
}
?>
<footer class="container-fluid bg-dark text-center text-primary fixed-bottom">Copyright © Samet Altıntaş</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
