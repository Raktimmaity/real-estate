<?php
// starting the session
session_start();

// including the database connection file
include '../include/db.php';

// update feature for the category
if (isset($_POST['update_category'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $query = "UPDATE categories SET name='$name', description='$description' WHERE id='$id'";
    $runquery = mysqli_query($conn, $query);
    if ($runquery) {
        echo "<script>alert('Category updated successfully!'); 
        window.location.href='./view_category.php';</script>";
    } else {
        echo "<script>alert('Error updating property.');</script>";
    }
}

// delete feature for the category
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $deleteQuery = "DELETE FROM categories WHERE id='$id'";
    $runquery = mysqli_query($conn, $deleteQuery);
    if ($runquery) {
        echo "<script>alert('Category deleted successfully!'); 
        window.location.href='./view_category.php';</script>";
    } else {
        echo "<script>alert('Error deleting category.');</script>";
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
                <h2 class="mb-4">All Categories</h2>
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- display all categories -->
                            <table class="table table-hover">
                                <thead>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    $query = "SELECT * FROM categories";
                                    $run_query = mysqli_query($conn, $query);
                                    while ($data = mysqli_fetch_array($run_query)) {
                                    ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $data['name'] ?></td>
                                            <td>
                                                <?= $data['description'] ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn" style="background-color: #0E2E50; color: #fff;" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id'] ?>"><i class="bi bi-pen-fill"></i> Edit </button>
                                                <a href="./view_category.php?del=<?= $data['id'] ?>">
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"><i class="bi bi-trash-fill"></i> Delete </button>
                                                </a>
                                            </td>
                                            <div class="modal fade" id="exampleModal<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editPropertyLabel">Edit <?= $data['name'] ?></h5>
                                                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" value="<?= $data['id'] ?>" name="id">

                                                                <div class="mb-3">
                                                                    <label class="form-label">Name</label>
                                                                    <input type="text" class="form-control" name="name" id="title" value="<?= $data['name'] ?>" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea class="form-control" name="description" id="description" rows="3" required><?= $data['description'] ?></textarea>
                                                                </div>


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" name="update_category" class="btn btn-primary">Update Data</button>
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
        </div>
        </main>
        <!-- main section end -->

    </div>
    </div>
    <!-- container section start -->

    <!-- incluing the footer from the footer.php -->
    <?php include './include/footer.php'; ?>

</body>

</html>