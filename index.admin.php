<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script type="text/javascript" data-name="TokenSigning" data-by="Web-eID extension" src="chrome-extension://ncibgoaomkmdpilpocfeponihegamlic/token-signing-page-script.js"></script></head>
  <body>
    
    
  <!DOCTYPE html>
<html>
<head>
    <title>Onapager Administraator</title>
</head>
<body>
    <?php
    // Defineerime kasutajanime ja parooli
    $username = 'admin';
    $password = 'Passw0rd';

    // Kontrollime, kas kasutaja on juba sisse loginud
    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
        || $_SERVER['PHP_AUTH_USER'] != $username || $_SERVER['PHP_AUTH_PW'] != $password) {

        // Kui kasutaja pole sisse loginud, siis küsime kasutajanime ja parooli
        header('WWW-Authenticate: Basic realm="Turvaline kontroll"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Palun sisestage kasutajanimi ja parool';
        exit;
    } 
    ?>
</body>
</html>




<div class="container">
  <?php
  if (isset($_GET['delete'])) {
    echo "Kustutan";
  }


  ?>
    <h1>Ettevõtete hinnangud</h1>
    <!-- Ülejäänud kood siin -->
    <?php
    $servername = "192.168.8.109";
    $username = "kasutaja";
    $password = "Passw0rd";
    $database = "mydb";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Andmebaasiga ühendamine ebaõnnestus: " . $conn->connect_error);
    }

    ?>

    <!-- Ülejäänud kood siin -->

          <!-- Navigeerimisriba -->
          <nav class="navbar">
              <div class="container-fluid">
                  <a href="lisauustoit.php">
                      <button type="button" class="btn btn-success">+Lisa asutus</button>
                  </a>
                  <a href="index.php">
                      <button type="button" class="btn btn-danger">Logi valja</button>
                  </a>
                  <form class="d-flex" role="search">
                      <div class="input-group">
                          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                          <button class="btn btn-success" type="submit">Otsi</button>
                      </div>
                  </form>

              </div>
          </nav>
          


    <?php
    if (!isset($_GET['page'])) {
        // Esimene leht
        $page = 1;
    } else {
        $page = $_GET['page'];
    }



    //Search bar
    $search = $_GET["search"];
    $sql = "SELECT r.name AS name, r.location AS location, AVG(rv.rating) AS keskmine_hinnang, COUNT(rv.rating) AS hindajate_arv
    FROM restoraunts r
    LEFT JOIN reviews rv ON r.id = rv.restaurants_id
    WHERE r.name LIKE '%$search%'
    GROUP BY r.name, r.location
    LIMIT " . (($page - 1) * 10) . ", 10";

    $result = mysqli_query($conn, $sql);
    ?>

<table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col"><a href="?sort=nimi">Nimi</a></th>
                    <th scope="col"><a href="?sort=asukoht">Asukoht</a></th>
                    <th scope="col"><a href="?sort=keskmine_hinne">Keskmine hinne</a></th>
                    <th scope="col"><a href="?sort=hindajate_arv">Hindajate arv</a></th>
                </tr>
            </thead>
            <tbody>
        <?php
        // Sortimisparameetri kontroll
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'nimi';
        $sort_column = '';
        switch ($sort) {
            case 'nimi':
                $sort_column = 'name';
                break;
            case 'asukoht':
                $sort_column = 'location';
                break;
            case 'keskmine_hinne':
                $sort_column = 'keskmine_hinnang';
                break;
            case 'hindajate_arv':
                $sort_column = 'hindajate_arv';
                break;
            default:
                $sort_column = 'name';
                break;
        }

        // Päringu koostamine sortimiseks
        $sort_sql = "SELECT r.name AS name, r.location AS location, AVG(rv.rating) AS keskmine_hinnang, COUNT(rv.rating) AS hindajate_arv
            FROM restoraunts r
            LEFT JOIN reviews rv ON r.id = rv.restaurants_id
            WHERE r.name LIKE '%$search%'
            GROUP BY r.name, r.location
            ORDER BY $sort_column ASC
            LIMIT " . (($page - 1) * 10) . ", 10";

        $result = mysqli_query($conn, $sort_sql);

        // Andmete kuvamine
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["location"] . "</td>";
            echo "<td>" . $row["keskmine_hinnang"] . "</td>";
            echo "<td>" . $row["hindajate_arv"] . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
        </table>





    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php if ($page > 1) : ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo ($page - 1); ?>&search=<?php echo $search; ?>">Previous</a></li>
            <?php endif; ?>

            <?php
            // Kogu kirjete arv
            $count_sql = "SELECT COUNT(*) AS count
            FROM restoraunts
            WHERE name LIKE '%$search%'";
            $count_result = mysqli_query($conn, $count_sql);
            $count_row = mysqli_fetch_assoc($count_result);
            $total_records = $count_row['count'];

            // Lehtede arv
            $total_pages = ceil($total_records / 10);

            for ($i = 1; $i <= $total_pages; $i++) {
              echo "<li class='page-item'><a class='page-link' href='?page=$i&search=$search'>$i</a></li>";
          }
          
          if ($page < $total_pages) {
              ?>
              <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 1); ?>&search=<?php echo $search; ?>">Next</a></li>
          <?php
          }
          ?>
          
          </ul>
          </nav>
          
</div>
          


    
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>











</body>




</html>