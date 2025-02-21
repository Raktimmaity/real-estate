<?php
// starting the session
session_start();

// including the database connection file
include '../include/db.php';

// add category feaure
if (isset($_POST['add_category'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $query = "INSERT INTO categories (name, description) VALUES ('$name', '$description')";

    if (mysqli_query($conn, $query)) {
        echo "<script> alert('✅ Category added successfully!'); </script>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
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
                <h2 class="mb-4">Add New Category</h2>

                <!-- Fetch categories for the dropdown -->
                <?php
                $categories = mysqli_query($conn, "SELECT * FROM categories");
                ?>
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form class="row g-3" action="add_category.php" method="POST" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label"> <strong> Category Name </strong></label>
                                <input type="text" class="form-control" id="inputEmail4" name="name" placeholder="Enter the category name" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword4" class="form-label"> <strong> Category Description </strong></label>
                                <textarea type="text" name="description" placeholder="Enter the category description" required class="form-control" id="inputPassword4"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn" name="add_category" style="background-color: #00B98E; color: #0E2E50; font-weight: bold;">Add Category</button>
                            </div>
                        </form>
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