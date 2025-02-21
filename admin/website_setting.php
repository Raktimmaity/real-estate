<?php
// starting the session
session_start();

// including the database connection file
include '../include/db.php';

// update website feaure
if (isset($_POST['update_website'])) {
    $id = 1;
    $website_title = $_POST['website_title'];
    $website_name = $_POST['website_name'];
    $website_owner = $_POST['website_owner']; 
    $query = "UPDATE website SET website_title = '$website_title', website_name = '$website_name', website_owner = '$website_owner' WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script> alert('✅ Website data updated successfully!'); </script>";
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
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="mb-4">Website Settings</h2>
                        <?php
                        $query = "SELECT * FROM website";
                        $run_query = mysqli_query($conn, $query);
                        $data = mysqli_fetch_array($run_query)
                        ?>
                            <form class="row g-3" action="./website_setting.php" method="POST" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label"><strong> Website Title</strong></label>
                                    <input type="text" class="form-control" id="inputEmail4" name="website_title" value="<?= $data['website_title'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label"><strong> Website Name</strong></label>
                                    <input type="text" class="form-control" id="inputEmail4" name="website_name" value="<?= $data['website_name'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label"><strong> Website Owner Name</strong></label>
                                    <input type="text" class="form-control" id="inputEmail4" name="website_owner" value="<?= $data['website_owner'] ?>">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn" name="update_website" style="background-color: #00B98E; color: #0E2E50; font-weight: bold;">Update</button>
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