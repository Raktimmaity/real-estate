<?php
$currentPage = basename($_SERVER['PHP_SELF']);  // Get the current page filename
?>

<!-- Sidebar Section Start -->
<nav class="col-md-2 col-12 bg-dark text-white p-3 min-vh-100 collapse d-md-block" id="sidebarMenu">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white <?= $currentPage == 'index.php' ? 'active-link' : '' ?>" href="./">
            <i class="bi bi-speedometer2"></i>  Dashboard
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white <?= ($currentPage == 'add_category.php' || $currentPage == 'view_category.php') ? 'active-link' : '' ?>" 
                href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-card-list"></i> Categories
            </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="categoryDropdown">
                <li>
                    <a class="dropdown-item text-white <?= $currentPage == 'add_category.php' ? 'active-link' : '' ?>" href="./add_category.php">
                    <i class="bi bi-folder-plus"></i> Add New Category
                    </a>
                </li>
                <li>
                    <a class="dropdown-item text-white <?= $currentPage == 'view_category.php' ? 'active-link' : '' ?>" href="./view_category.php">
                    <i class="bi bi-list-task"></i>  View Category
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white <?= ($currentPage == 'add_property.php' || $currentPage == 'view_property.php') ? 'active-link' : '' ?>" 
                href="#" id="propertyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-houses-fill"></i> Properties
            </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="propertyDropdown">
                <li>
                    <a class="dropdown-item text-white <?= $currentPage == 'add_property.php' ? 'active-link' : '' ?>" href="./add_property.php">
                    <i class="bi bi-house-add-fill"></i> Add New Property
                    </a>
                </li>
                <li>
                    <a class="dropdown-item text-white <?= $currentPage == 'view_property.php' ? 'active-link' : '' ?>" href="./view_property.php">
                    <i class="bi bi-house-gear-fill"></i>  View Properties
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white <?= ($currentPage == 'profile.php' || $currentPage == 'password.php') ? 'active-link' : '' ?>" 
                href="#" id="propertyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i> Profile
            </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="propertyDropdown">
                <li>
                    <a class="dropdown-item text-white <?= $currentPage == 'profile.php' ? 'active-link' : '' ?>" href="./profile.php">
                    <i class="bi bi-person-fill-gear"></i>  Settings
                    </a>
                </li>
                <li>
                    <a class="dropdown-item text-white <?= $currentPage == 'password.php' ? 'active-link' : '' ?>" href="./password.php">
                    <i class="bi bi-person-fill-lock"></i> Change Password
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white <?= $currentPage == 'website_setting.php' ? 'active-link' : '' ?>" href="./website_setting.php">
            <i class="bi bi-gear"></i>  Website Settings
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white <?= $currentPage == 'logout.php' ? 'active-link' : '' ?>" href="./logout.php">
            <i class="bi bi-box-arrow-left"></i>  Logout
            </a>
        </li>
    </ul>
</nav>
<!-- Sidebar Section End -->
