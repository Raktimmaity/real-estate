<?php
// starting the session
session_start();

// including the database connection file
include '../include/db.php';

// deleting feature for user
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $deleteQuery = "DELETE FROM admin WHERE id='$id'";
    $runquery = mysqli_query($conn, $deleteQuery);
    if ($runquery) {
        echo "<script>alert('User deleted successfully!'); 
        window.location.href='./';</script>";
    } else {
        echo "<script>alert('Error deleting user.');</script>";
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
                <h2 class="mb-4">Dashboard Overview</h2>
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-white bg-success bg-gradient shadow-md h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $_SESSION['name'] ?></h5>
                                <p class="card-text">
                                    <?php
                                    if ($_SESSION['type'] == 1) {
                                        echo 'Admin';
                                    } else {
                                        echo 'User';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- fetch the number of users from the admin table -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-white bg-info bg-gradient h-100">
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text">
                                    <?php
                                    $query = "SELECT * FROM admin WHERE type = 0";
                                    $run_query = mysqli_query($conn, $query);
                                    $count = mysqli_num_rows($run_query);
                                    echo $count;
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- fetch the number of properties from the properties table -->
                    <div class="col-lg-4 col-md-12">
                        <div class="card text-white bg-warning bg-gradient h-100">
                            <div class="card-body">
                                <h5 class="card-title">Total Property</h5>
                                <p class="card-text">
                                    <?php
                                    $query = "SELECT * FROM properties";
                                    $run_query = mysqli_query($conn, $query);
                                    $count = mysqli_num_rows($run_query);
                                    echo $count;
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="card shadow-lg">
                        <div class="card-body">

                            <!-- fetch the users from the admin table -->

                            <h4>Users</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        $query = "SELECT * FROM admin";
                                        $run_query = mysqli_query($conn, $query);
                                        while ($data = mysqli_fetch_array($run_query)) {
                                        ?>
                                            <tr>
                                                <td><?= $count ?></td>
                                                <td><?= $data['name'] ?></td>
                                                <td><?= $data['email'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($data['type'] == 1) {
                                                        echo 'Admin';
                                                    } else {
                                                        echo 'User';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data['type'] != 1) {
                                                    ?>
                                                        <a href="./index.php?del=<?= $data['id'] ?>">
                                                            <button class="btn btn-danger" type="button">Delete</button>
                                                        </a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
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
    <!-- container section end -->

    <!-- incluing the footer from the footer.php -->
    <?php include './include/footer.php'; ?>

</body>
<!-- body end -->

</html>