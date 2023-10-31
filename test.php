<!DOCTYPE html>
<html>
<head>
  <title>Ettevõtete hinnangud</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h2>Ettevõtete hinnangud</h2>
    <div class="row">
      <div class="col-md-4">
        <form action="search.php" method="GET">
          <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Otsi ettevõtteid">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-4">
        <form action="sort.php" method="GET">
          <div class="input-group">
            <select name="sort" class="form-control">
              <option value="name">Nimi</option>
              <option value="location">Asukoht</option>
              <option value="average_rating">Keskmine hinne</option>
              <option value="num_ratings">Hindajate arv</option>
            </select>
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                Sorteeri
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <br>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nimi</th>
          <th>Asukoht</th>
          <th>Keskmine hinne</th>
          <th>Hindajate arv</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Siin tuleks rakendada andmebaasist ettevõtete andmete lugemist ja kuvamist
        $companies = [
          ["nimi" => "Ettevõte 1", "asukoht" => "Asukoht 1", "keskmine_hinne" => 4.5, "hindajate_arv" => 10],
          ["nimi" => "Ettevõte 2", "asukoht" => "Asukoht 2", "keskmine_hinne" => 3.8, "hindajate_arv" => 7],
          // ...
        ];

       
        foreach ($companies as $company) {
            echo "<tr>";
            echo "<td><a href='rate.php?company=".$company['nimi']."'>".$company['nimi']."</a></td>";
            echo "<td>".$company['asukoht']."</td>";
            echo "<td>".$company['keskmine_hinne']."</td>";
            echo "<td>".$company['hindajate_arv']."</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </body>
  </html>
  