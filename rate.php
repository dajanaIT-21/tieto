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
    <h2>Ettevõtte hindamine</h2>
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



<style>
  .rating {
    font-size: 30px;
  }

  .star {
    color: #FFD700; /* Yellow color */
    cursor: pointer;
  }
</style>

<form method="POST" action="">
  <div class="form-group">
    <label for="name">Nimi:</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>

  <div class="form-group">
    <label for="comment">Kommentaar:</label>
    <textarea class="form-control" id="comment" name="comment" required></textarea>
  </div>

  <div class="form-group">
    <label for="rating">Hinnang:</label>
    <div class="rating">
      <span class="star" data-rating="1">&#9733;</span>
      <span class="star" data-rating="2">&#9733;</span>
      <span class="star" data-rating="3">&#9733;</span>
      <span class="star" data-rating="4">&#9733;</span>
      <span class="star" data-rating="5">&#9733;</span>
      <span class="star" data-rating="6">&#9733;</span>
      <span class="star" data-rating="7">&#9733;</span>
      <span class="star" data-rating="8">&#9733;</span>
      <span class="star" data-rating="9">&#9733;</span>
      <span class="star" data-rating="10">&#9733;</span>
      <input type="hidden" name="rating" id="rating-value" value="1">
    </div>
  </div>

  <button type="submit" class="btn btn-success">Hinda</button>
  <a href="index.php" class="btn btn-success">Tagasi avalehele</a>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.star').click(function() {
      var ratingValue = $(this).data('rating');
      $('#rating-value').val(ratingValue);

      $('.star').each(function() {
        if ($(this).data('rating') <= ratingValue) {
          $(this).html('&#9733;'); // Filled star
        } else {
          $(this).html('&#9734;'); // Empty star
        }
      });
    });
  });
</script>






  </div>
</body>
</html>
