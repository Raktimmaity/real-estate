<?php
// starting the session
session_start();

// including the database connection file
include '../include/db.php';

// add new property feature
if (isset($_POST['add_property'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = $_POST['price'];
    $size = $_POST['size'];
    $bedrooms = $_POST['bedrooms'];
    $bathrooms = $_POST['bathrooms'];
    $status = $_POST['status'];
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $category_id = $_POST['category_id'];

    // upload image
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = 'uploads/' . basename($image);

    if (move_uploaded_file($image_tmp, $image_path)) {
        $sql = "INSERT INTO properties (title, description, price, location, category_id, image, size, bedrooms, bathrooms, status) 
                VALUES ('$title', '$description', '$price', '$location', '$category_id', '$image_path', '$size', '$bedrooms', '$bathrooms', '$status')";

        if (mysqli_query($conn, $sql)) {
            echo "
            <script>
                alert('✅ Property added successfully!');
                window.location.href = './add_property.php';
            </script>";
        } else {
            echo "❌ Error: " . mysqli_error($conn);
        }
    } else {
        echo "❌ Image upload failed!";
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
                <h2 class="mb-4">Add New Property</h2>

                <!-- Fetch categories for the dropdown -->
                <?php
                $categories = mysqli_query($conn, "SELECT * FROM categories");
                ?>
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form class="row g-3" action="add_property.php" method="POST" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <label for="">Property Image</label>
                                <br>
                                <input type="file" class="form-control" name="image" accept="image/*" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">Property Title</label>
                                <input type="text" class="form-control" id="inputEmail4" name="title" placeholder="Enter the property Title" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword4" class="form-label">Property Description</label>
                                <textarea type="text" name="description" placeholder="Enter the property description" required class="form-control" id="inputPassword4"></textarea>
                            </div>
                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Price</label>
                                <input type="text" name="price" placeholder="Enter the Price" required class="form-control" id="inputAddress">
                            </div>
                            <div class="col-6">
                                <label for="inputAddress2" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Enter the location" required class="form-control" id="inputAddress2">
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Category</label>
                                <select id="inputState" name="category_id" class="form-select">
                                    <option value="">Select a Category</option>
                                    <?php while ($category = mysqli_fetch_assoc($categories)) { ?>
                                        <option value="<?php echo $category['id']; ?>">
                                            <?php echo $category['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Size <small>(Enter is Sqft)</small> </label>
                                <input type="number" name="size" placeholder="Enter the size in Sqft" required class="form-control" id="inputAddress">
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Bedrooms </label>
                                <input type="number" name="bedrooms" placeholder="Enter the number of bedrooms" required class="form-control" id="inputAddress">
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Bathrooms </label>
                                <input type="number" name="bathrooms" placeholder="Enter the number of bathrooms" required class="form-control" id="inputAddress">
                            </div>
                            <div class="col-md-12">
                                <label for="inputState" class="form-label">Status</label>
                                <select id="inputState" name="status" class="form-select">
                                    <option value="">Select a Status</option>
                                    <option value="For Sale">For Sale</option>
                                    <option value="For Rent">For Rent</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn" name="add_property" style="background-color: #00B98E; color: #0E2E50; font-weight: bold;">Add Property</button>
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