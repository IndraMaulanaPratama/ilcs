<?php 
    require_once "../model/koneksi.php";

    $id     = $_GET['id'];
    $sql    = "SELECT * FROM product WHERE id = '$id'";
    $query  = $conn->query($sql);
    $data   = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site:Dashboard</title>
    <link rel="stylesheet" href="../vendor/bootstrap.css">

    <style>
    </style>
</head>

<body>
    <div class="row mt-5">
        <div class="col-lg-12  d-flex justify-content-center bg-grey">
            <div class="container">
              <?php foreach($data as $data){ ?>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Form Edit Product</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Id Product <small><?= $data['id']; ?></small></h6>
                  <hr>
                  <form action="../model/update.php" method="post">
                    <input type="hidden" value="<?= $data['id'] ?>" name="id">
                    <div class="form-group">
                      <label for="title">Title Product</label>
                      <input type="text" class="form-control" value="<?= $data['title'] ?>" name="title" id="title" required autofocus>
                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="number" class="form-control" value="<?= $data['price'] ?>" name="price" id="price" required>
                    </div>
                    <a href="#" class="btn btn-info">Return</a>
                    <input type="submit" class="btn btn-danger" value="Save Change">
                  </form>
                </div>
              </div>
              <?php } ?>
            </div>
        </div>
    </div>
    

    <script src="../vendor/jquery.js"></script>
    <script src="../vendor/bootstrap.js"></script>
</body>
</html>