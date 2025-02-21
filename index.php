<?php
// including the database connection file
include './include/db.php';

$query = "SELECT * FROM website";
$run_query = mysqli_query($conn, $query);
$data_website = mysqli_fetch_array($run_query);
?>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$data_website['website_title'] ?></title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        .carousel-caption h1 {
            font-size: 2.5rem;
            /* Adjust size */
            font-weight: bold;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            /* Add shadow for better visibility */
        }

        /* First and Third Slide - Dark Blue */

        /* Background Overlay for Better Visibility */
        .carousel-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            /* Dark overlay */
            z-index: 1;
        }

        .carousel-caption {
            position: absolute;
            z-index: 2;
            /* Ensure text is above the overlay */
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
</head>

<body>
    <!-- header section start -->
    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top p-3 mt-2 rounded-pill shadow"
            style="background-color: #fff; color: black; border-bottom: 1px solid black;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="font-size: 30px; color:#00B98E; font-weight: bold;"><?=$data_website['website_name'] ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0 text-center">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    <div class="d-flex flex-column flex-md-row gap-2 text-center">
                        <a href="./login/">
                            <button class="btn btn-success w-100 w-md-auto" type="button"
                                style="background-color: #00B98E; color: #fff;">Login</button>
                        </a>
                        <a href="./register/">
                            <button class="btn btn-outline-success w-100 w-md-auto" type="button">Register</button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- header section end -->

    <!-- main section start -->
    <main>

        <!-- carousel section start -->
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class=""
                    aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
                    class=""></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"
                    class="active" aria-current="true"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6" class="d-block w-100" alt="Real Estate Image 1" height="500">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Luxury House</h1>
                            <p>Explore stunning modern homes with beautiful interiors.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1571939228382-b2f2b585ce15" class="d-block w-100" alt="Real Estate Image 2" height="500">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Modern Apartments</h1>
                            <p>Discover elegant apartment buildings with scenic views.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be" class="d-block w-100" alt="Real Estate Image 3" height="500">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>Beachside Villas</h1>
                            <p>Find luxurious villas by the sea with breathtaking views.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- carousel section start -->

        <!-- search property section start -->
        <div class="container-fluid mb-5 wow fadeIn" data-wow-delay="0.1s"
            style="padding: 35px; background-color: #00B98E;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" class="form-control border-0 py-3" placeholder="Search Keyword">
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0 py-3">
                                    <option selected>Property Type</option>
                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $run_query = mysqli_query($conn, $query);
                                    while($cat = mysqli_fetch_array($run_query)){
                                    ?>
                                    <option value="<?=$cat['name']?>"><?=$cat['name']?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0 py-3">
                                    <option selected>Location</option>
                                    <option value="kolkata">Kolkata</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn border-0 w-100 py-3"
                            style=" background-color: #0E2E50; color: #fff;">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- search property section start -->



        <!-- property type section start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                    <h1 class="mb-3" style="font-weight:bold; color: #0E2E50;">Property Types</h1>
                    <p class="text-secondary">Explore various types of properties available in different locations.</p>
                </div>
                <div class="row g-4">
                    <!-- fetch categories from the database -->
                    <?php
                    $query = "SELECT c.id, c.name, COUNT(p.id) AS property_count FROM categories c LEFT JOIN properties p ON c.id = p.category_id GROUP BY c.id, c.name";
                    $run_query = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_array($run_query)) {
                    ?>
                        <div class="col-lg-3 col-sm-6">
                            <a class="cat-item d-block bg-light text-center rounded p-3" href="#" style="text-decoration: none;">
                                <div class="rounded p-4">
                                    <div class="icon mb-3">
                                        <img class="img-fluid" src="img/icon-apartment.png" alt="Icon">
                                    </div>
                                    <h6 style="color: #0E2E50; font-weight: bold;"><?= $data['name']; ?></h6>
                                    <span style="color: #00B98E;"><?= $data['property_count']; ?> Properties</span>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- property type section end -->



        <!-- property list start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5">
                            <h1 class="mb-3" style="font-weight:bold; color: #0E2E50;">Property Listings</h1>
                            <p class="text-secondary">Find your perfect property with our latest listings.</p>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                        <?php
                        $query = "SELECT p.id, p.title, p.description, p.price, p.location, p.size, p.bedrooms, p.bathrooms, p.status, c.name AS category_name, p.image FROM properties p JOIN categories c ON p.category_id = c.id GROUP BY p.id"; 
                        $run_query = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($run_query)){
                        ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="property-item rounded overflow-hidden shadow">
                                        <div class="position-relative overflow-hidden">
                                            <a href="property-details.php?id=<?= $row['id']; ?>">
                                                <img class="img-fluid" src="./admin/<?= $row['image'] ?>" alt="Property Image">
                                            </a>
                                            <div class="rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"
                                                style="background-color: #00B98E; color: #fff;">
                                                <?= $row['status']; ?>
                                            </div>
                                            <div class="bg-white rounded-top position-absolute start-0 bottom-0 mx-4 pt-1 px-3"
                                                style="color: #00B98E;">
                                                <?= $row['category_name']; ?>
                                            </div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="mb-3" style="color: #00B98E; font-weight: bold; font-size: 23px;">
                                                <?= $row['price']; ?>
                                            </h5>
                                            <a class="d-block h5 mb-2" href="property-details.php?id=<?= $row['id']; ?>"
                                                style="text-decoration: none; color: #0E2E50;">
                                                <?= $row['title']; ?>
                                            </a>
                                            <p class="text-secondary">
                                                <i class="fa fa-map-marker-alt me-2" style="color: #00B98E;"></i>
                                                <?= $row['location']; ?>
                                            </p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2">
                                                <i class="fa fa-ruler-combined me-2" style="color: #00B98E;"></i><?= $row['size']; ?> Sqft
                                            </small>
                                            <small class="flex-fill text-center border-end py-2">
                                                <i class="fa fa-bed me-2" style="color: #00B98E;"></i><?= $row['bedrooms']; ?> Bed
                                            </small>
                                            <small class="flex-fill text-center py-2">
                                                <i class="fa fa-bath me-2" style="color: #00B98E;"></i><?= $row['bathrooms']; ?> Bath
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-12 text-center">
                                <a class="btn py-3 px-5" href="#" style="background-color: #00B98E; color: #fff;">
                                    Browse More Properties
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- property list end -->

    </main>
    <!-- main section end -->

    <!-- footer section start -->
    <footer class="p-3" style="background-color: #0E2E50; color: #fff;">
        <p class="float-end"><a href="#" style="text-decoration: none; color: #fff;"><i class="fas fa-arrow-up"></i> Back to top</a></p>
        <p>© 2025 <strong> <?= $data_website['website_owner'] ?></strong> <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </footer>
    <!-- footer section end -->
     
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

</body>

</html>