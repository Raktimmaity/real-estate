<style>
    * {
        font-size: 14px;
    }
</style>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login/');
}
include('../include/db.php');
$query = "SELECT * FROM personal_setup,aboutus_setup,basic_setup,admin_users";
$queryrun = mysqli_query($db, $query);
$data = mysqli_fetch_array($queryrun);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Admin Panel</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />-->
  <link href="../assets/img/<?= $data['icon'] ?>" rel="icon">
  <link href="../assets/img/<?= $data['icon'] ?>" rel="apple-touch-icon"> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap core CSS -->
    <!-- <link href="assets/dist/css/bootstrap.css" rel="stylesheet"> -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Custom styles for this template -->
    <!-- <link href="css/dashboard.css" rel="stylesheet"> -->
</head>

<body>
    <!-- <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div> -->

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="index.html" class="logo">
                    <!-- <img src="../assets/img/<?= $data['icon'] ?>" alt=""> -->
                     <h3 class="text-center"><strong> Portfolio</strong></h3>
                </a>
                <a href="index.html" class="logo-small">
                    <img src="../assets/img/<?= $data['icon'] ?>" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">


                

                <li class="nav-item dropdown has-arrow main-drop" style="display: grid; place-items: center; margin-top: -15px;">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img" style="display: grid; place-items: center;"><img src="../assets/img/<?= $data['profilepic'] ?>" alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="../assets/img/<?= $data['profilepic'] ?>" alt="">
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    <h6><?= $_SESSION['username'] ?></h6>
                                    <h5>Admin</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="?editprofile=true"> <i class="me-2" data-feather="user"></i> My Profile</a>
                            <a class="dropdown-item" href="?updatepassword=true"><i class="me-2" data-feather="settings"></i>Settings</a>
                            <hr class="m-0">
                            <a class="dropdown-item logout pb-0" href="php/logout.php"><img src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>


            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="?editprofile=true">My Profile</a>
                    <a class="dropdown-item" href="?updatepassword=true">Settings</a>
                    <a class="dropdown-item" href="php/logout.php">Logout</a>
                </div>
            </div>

        </div>

        <?php
  if (isset($_GET['editprofile'])) {
    include ('php/profile.php'); //home
  } else if (isset($_GET['editcover'])) {
    include ('php/cover.php');
  } else if (isset($_GET['editsm'])){
    include ('php/sm.php');
  } else if (isset($_GET['editabout'])) {
    include ('php/about.php');
  } else if (isset($_GET['editskills'])) {
    include ('php/skills.php');
  } else if (isset($_GET['editlanguage'])) {
    include ('php/language.php');
  } else if (isset($_GET['editcv'])) {
    include ('php/cv.php');
  } else if (isset($_GET['editresume'])) {
    include ('php/resume.php');
  } else if (isset($_GET['viewproject'])) {
    include ('php/project_view.php');
  } else if (isset($_GET['editportfolio'])) {
    include ('php/portfolio.php');
  } else if (isset($_GET['viewcoact'])) {
    include ('php/coact_view.php');
  } else if (isset($_GET['editseo'])) {
    include ('php/seo.php');
  } else if (isset($_GET['edithobby'])) {
    include ('php/hobby.php');
  } else if (isset($_GET['addhobby'])) {
    include ('php/add_hobby.php');
  } else if (isset($_GET['addactivities'])) {
    include ('php/add_activities.php');
  } else if (isset($_GET['editactivities'])) {
    include ('php/activities.php');
  } else if (isset($_GET['viewcontact'])) {
    include ('php/contact_view.php');
  } else if (isset($_GET['viewfeedback'])) {
    include ('php/feedback_view.php');
  } else if (isset($_GET['viewtestimonial'])) {
    include ('php/testimonial_view.php');
  } else if (isset($_GET['editpost'])) {
    include ('php/post.php');
  } else if (isset($_GET['editcoact'])) {
    include ('php/coact.php');

  } else if (isset($_GET['updatepassword'])) { 
    include './php/password.php';
    ?>

     
              <!-- <div class="content-wrapper">
                <section class="content-header">
                  <div class="container-fluid">
                    <div class="row mb-2">
                      <div class="col-sm-6">
                        <h1>Account Settings</h1>
                      </div>
                      <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="../admin/">Home</a></li>
                          <li class="breadcrumb-item active">Edit Profile</li>
                        </ol>
                      </div>
                    </div>
                  </div>/.container-fluid -->
                <!-- </section>
                <section class="content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card card-primary card-outline container">
                          <div class="card-body box-profile">
                            <form method="post" action="php/uprofile.php">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="ptitle">Name</label>
                                  <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control"
                                    id="ptitle" placeholder="Monu Giri">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="psubtitle">Password</label>
                                  <input type="text" name="userpass" value="<?= $data['user_pass'] ?>" class="form-control"
                                    id="psubtitle" placeholder="*************">
                                </div>
                                <div class="form-group col-md-12">
                                  <label for="psubtitle">Email Id</label>
                                  <input type="text" name="userid" value="<?= $data['user_id'] ?>" class="form-control"
                                    id="psubtitle" placeholder="admin@admin.com">
                                </div>
                              </div>
                              <button type="submit" name="uprofile" class="btn btn-primary" value="Save Changes"
                                data-target="#modal-success"><i class="fa-solid fa-floppy-disk"></i> Save Changes</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section> -->

    <?php } else {
    include ('php/welcome.php');
  } ?>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="../admin/"><img src="assets/img/icons/dashboard.svg" alt="img"><span> Dashboard</span> </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="bi bi-house font-weight-bolder"></i><span> Home</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <!-- <li><a href="?editland=true">Landing Section</a></li> -->
                                <li><a href="?editcover=true">Cover Photo</a></li>
                                <li><a href="?editsm=true">Social Media</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="?editseo=true"><i data-feather="layers"></i><span> SEO</span> </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="bi bi-info-circle"></i><span> About</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="?editabout=true">Details</a></li>
                                <li><a href="?editskills=true">Skills</a></li>
                                <li><a href="?editlanguage=true">Language</a></li>
                                <li><a href="?editcv=true">CV/Resume</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/purchase1.svg" alt="img"><span> Resume</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="?editresume=true">View</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/expense1.svg" alt="img"><span> Projects</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="?viewproject=true">View</a></li>
                                <li><a href="?editportfolio=true">Add</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/quotation1.svg" alt="img"><span> Co-Activities</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="?viewcoact=true">View</a></li>
                                <li><a href="?editcoact=true">Add</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="bi bi-person-lines-fill"></i><span> Contact</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="?viewcontact=true">View</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/return1.svg" alt="img"><span> Testimonial</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="?viewtestimonial=true">View</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img"><span> Feedback</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="?viewfeedback=true">View</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="bi bi-heart" style="font-size: 15px; font-weight:bold;"></i><span> Strengths & Interests</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="?addhobby=true">Add</a></li>
                                <li><a href="?edithobby=true">View</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/places.svg" alt="img"><span> Activities</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="?addactivities=true">Add</a></li>
                                <li><a href="?editactivities=true">View</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img"><span> Profile</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="?editprofile=true">Setting</a></li>
                                <li><a href="?updatepassword=true">Change Password</a></li>
                            </ul>
                        </li>
                        <li>
                            <!-- <a href="?editprofile=true"><i data-feather="file"></i><span> Profile</span> </a> -->
                        </li>
                        <li>
                            <a href="php/logout.php"><img src="assets/img/icons/log-out.svg" alt=""><span> Log Out</span> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</body>
<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<script src="assets/js/script.js"></script>

</html>