<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

  
    <div class="container">

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Andmete valideerimine ja andmebaasi salvestamine peaks toimuma siin
      $name = $_POST['name'];
      $comment = $_POST['comment'];
      $rating = $_POST['rating'];

      // Andmete salvestamine andmebaasi või mujale

      echo "<p>Aitäh hinnangu eest!</p>";
      echo "<a href='index.php'>Tagasi avalehele</a>";
      exit();
    }
    ?>


<div class="container">  

<h2>Valitud ettevõtte</h2>


<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <h3>Ettevõte muutmine</h3>
    <form class="needs-validation" novalidate>
      <div class="row">

        <div class="col-md-6 mb-3 ">
          <label for="valid1">Eesnimi*</label>
          <input type="text" class="form-control" id="valid1" placeholder="Eesnimi" required>
          <div class="valid-feedback">Korras</div>
          <div class="invalid-feedback">Palun taida!</div>
        </div>

        <div class="col-md-6 mb-3">
          <label for="valid2">Ettevõtte address</label>
          <input type="text" class="form-control" id="valid2" placeholder="Address" required>
          <div class="valid-feedback">Korras</div>
          <div class="invalid-feedback">Palun tada!</div>
        </div>

      </div>
      
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="valid1">email@email.ee</label>
        <input type="text" class="form-control" id="valid1" placeholder="email" required>
        <div class="valid-feedback">Korras</div>
        <div class="invalid-feedback">Palun tГ¤ida!</div>
      </div>


      <div class="col-6 mb-3">
      <label for="valid2">Mis asi sa tahada muuta:</label>
      <select name="sort" class="form-control">
                    <option value="name">Nimi</option>
                    <option value="location">Asukoht</option>
                    <option value="average_rating">Keskmine hinne</option>
                    <option value="num_ratings">Hindajate arv</option>
                </select>
        <div class="valid-feedback">Korras</div>
        <div class="invalid-feedback">Palun tГ¤ida!</div>
      </div>
    
    
      <div class="form-row">
        <div class="col-12 md-4">
            <label placeholder="kirjeldus" for="kirjeldus" class="form-label">Kirjeldus</label>
            <textarea class="form-control" id="kirjeldus" rows="3" class="form-control" required></textarea>
            <div class="valid-feedback">Korras</div>
            <div class="invalid-feedback">Palun taida!</div>
        </div>
    </div>
    


    <div class="form-row">
        <div class="col-md-4 mb-3 my-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="check1" name="option1" value="something" class="form-control" required>
                <label class="form-check-label">Olen tutvunud ja nous <span class="text-primary">privaatsustingimustega</span></label>
              </div>
          <div class="valid-feedback">Korras</div>
          <div class="invalid-feedback">Palun taida!</div>
        </div>
    </div>

        <input class="btn btn-success" type="submit" value="Saada">
        
    <button class="btn btn-danger mt-2" type="button" href="index.admin.php">Tagasi avalehele</button>

    
    </form>


    <script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
</script>
























    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>