<?php
// starting the session
session_start();

// including the database connection file
include '../include/db.php';

// update password feaure
if (isset($_POST['update_password'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE admin SET password = '$hashed_password' WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script> alert('✅ Password updated successfully!'); </script>";
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
                        <h2 class="mb-4">Change Password</h2>
                        <?php
                        $query = "SELECT * FROM admin";
                        $run_query = mysqli_query($conn, $query);
                        $data = mysqli_fetch_array($run_query)
                        ?>
                        <form class="row g-3" action="./password.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label"><strong> New Passsword</strong></label>
                                <input type="password" class="form-control" id="inputEmail4" name="password" placeholder="Enter your new password">
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label"><strong> Confirm Password </strong></label>
                                <input type="password" class="form-control" id="inputEmail4" placeholder="Confirm your new password">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn" name="update_password" style="background-color: #00B98E; color: #0E2E50; font-weight: bold;">Update Password</button>
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