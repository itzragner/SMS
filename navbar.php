<nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3"><span></span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" <?php if ($_SESSION['current_page'] =='index') {echo 'class="active"';} ?> href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link" <?php if (basename($_SERVER['PHP_SELF'])=='profile.php') echo 'class="active"' ?> href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
            <li class="nav-item "><a class="nav-link " <?php if (basename($_SERVER['PHP_SELF'])=='students.php') echo 'class="active"' ?> href="students.php"><i class="fas fa-table"></i><span>Students</span></a>
            <li class="nav-item"><a class="nav-link " <?php if (basename($_SERVER['PHP_SELF'])=='teachers.php') echo 'class="active"' ?> href="teachers.php"><i class="fas fa-table"></i><span>Teachers</span></a></li>
            <li class="nav-item"><a class="nav-link" href="login.php"><i class="far fa-user-circle"></i><span>Login</span></a></li>
            <li class="nav-item"><a class="nav-link" href="register.php"><i class="fas fa-user-circle"></i><span>Register</span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>