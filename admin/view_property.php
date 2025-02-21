<?php
// starting the session
session_start();

// including the database connection file
include '../include/db.php';

// update the property feature
if (isset($_POST['update_property'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $size = $_POST['size'];
    $bedrooms = $_POST['bedrooms'];
    $bathrooms = $_POST['bathrooms'];
    $status = $_POST['status'];


    $query = "UPDATE properties SET title='$title', description='$description', price='$price', location='$location', size='$size', bedrooms='$bedrooms', bathrooms='$bathrooms', status='$status' WHERE id='$id'";
    $runquery = mysqli_query($conn, $query);
    if ($runquery) {
        echo "<script>alert('Property updated successfully!'); 
        window.location.href='./view_property.php';</script>";
    } else {
        echo "<script>alert('Error updating property.');</script>";
    }
}

// delete the property feature 
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $deleteQuery = "DELETE FROM properties WHERE id='$id'";
    $runquery = mysqli_query($conn, $deleteQuery);
    if ($runquery) {
        echo "<script>alert('Property deleted successfully!'); 
        window.location.href='./view_property.php';</script>";
    } else {
        echo "<script>alert('Error deleting property.');</script>";
    }
}
?>

<!-- incluing the title from the title.php -->
<?php include './include/title.php'; ?>

<body>
    <!-- incluing the header from the header.php -->
    <?php include './include/header.php'; ?>

    <!-- container section start -->
    <div class="container-fluid">
        <div class="row">

            <!-- incluing the sidebar from the sidebar.php -->
            <?php include './include/sidebar.php'; ?>

            <!-- main section start -->
            <main class="col-md-10 col-12 p-4">
                <h2 class="mb-4">All Property</h2>
                <div class="card shadow-lg">
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    $query = "SELECT p.id, p.title, p.description, p.price, p.location, p.size, p.bedrooms, p.bathrooms, p.status, 
                        c.name AS category_name, p.image 
                        FROM properties p
                        JOIN categories c ON p.category_id = c.id
                        GROUP BY p.id";
                                    $run_query = mysqli_query($conn, $query);
                                    while ($data = mysqli_fetch_array($run_query)) {
                                    ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><img class="img-thumbnail" src="./<?= $data['image'] ?>" alt="" width="100"></td>
                                            <td><?= $data['title'] ?></td>
                                            <td><?= $data['price'] ?></td>
                                            <td><?= $data['location'] ?></td>
                                            <td><?= $data['status'] ?></td>
                                            <td>
                                                <button type="button" class="btn" style="background-color: #0E2E50; color: #fff;" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id'] ?>"><i class="bi bi-pen-fill"></i> Edit </button>
                                                <a href="./view_property.php?del=<?= $data['id'] ?>">
                                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete </button>
                                                </a>
                                            </td>
                                            <div class="modal fade" id="exampleModal<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editPropertyLabel">Edit <?= $data['title'] ?></h5>
                                                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" value="<?= $data['id'] ?>" name="id">

                                                                <div class="mb-3">
                                                                    <label class="form-label">Title</label>
                                                                    <input type="text" class="form-control" name="title" id="title" value="<?= $data['title'] ?>" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea class="form-control" name="description" id="description" rows="3" required><?= $data['description'] ?></textarea>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Price</label>
                                                                    <input type="text" class="form-control" name="price" id="price" value="<?= $data['price'] ?>" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Location</label>
                                                                    <input type="text" class="form-control" name="location" id="location" value="<?= $data['location'] ?>" required>
                                                                </div>


                                                                <div class="mb-3">
                                                                    <label class="form-label">Size <small> (in Sqft)</small></label>
                                                                    <input type="number" class="form-control" name="size" id="size" value="<?= $data['size'] ?>" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Bedrooms</label>
                                                                    <input type="number" class="form-control" name="bedrooms" id="bedrooms" value="<?= $data['bedrooms'] ?>" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Bathrooms</label>
                                                                    <input type="number" class="form-control" name="bathrooms" id="bathrooms" value="<?= $data['bathrooms'] ?>" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Status</label>
                                                                    <select class="form-select" name="status" id="status" required>
                                                                        <option value="For Sale">For Sale</option>
                                                                        <option value="For Rent">For Rent</option>
                                                                    </select>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" name="update_property" class="btn btn-primary">Update Property</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </tr>
                                    <?php
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <!-- main section end -->

        </div>
    </div>
    <!-- container section end -->

    <!-- incluing the footer from the footer.php -->
    <?php include './include/footer.php'; ?>
</body>

</html>