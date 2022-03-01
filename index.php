<?php 
    require_once "model/koneksi.php";

    $sql    = "SELECT * FROM product ";
    $query  = $conn->query($sql);
    $data   = $query->fetchAll(PDO::FETCH_ASSOC);
    $no     = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site:Dashboard</title>
    <link rel="stylesheet" href="vendor/bootstrap.css">

    <style>
    </style>
</head>

<body>
    <div class="row mt-5">
        <div class="col-lg-12  d-flex justify-content-center bg-grey">
            <div class="container">
                <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exampleModal">
                    Add New
                </button>

                <table class="table table-striped responsive" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $product) { ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $product["title"]; ?></td>
                            <td>Rp. <?= number_format($product['price'], 2, ".", ",")  ?></td>
                            <td>
                                <a href="pages/edit.php?id=<?= $product['id'] ?>" class="btn btn-primary">Edit</a>
                                <a onclick="return confirmDelete()" href="model/delete.php?id=<?= $product['id'] ?>" class="btn btn-danger"  >Delete</a>
                            </td>
                        </tr>
                        <?php $no++ ;} ?>
                    </tbody>
                </table>


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Add New Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="model/insert.php" method="post">
                                <div class="form-group">
                                    <label for="title">Title Product</label>
                                    <input type="text" class="form-control" name="title" id="title" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" name="price" id="price" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="vendor/jquery.js"></script>
    <script src="vendor/bootstrap.js"></script>

    <script>
        function confirmDelete() {
            return confirm("Are you sure want to delete this data?");
        }
    </script>
</body>
</html>