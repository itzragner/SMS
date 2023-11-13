<?php 
session_start();
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<?php include 'head.php'; ?>
<body id="page-top">
    <div id="wrapper">
        <?php include 'navbar.php'; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include 'header.php'; ?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-1">Blank Page</h3>
                </div>
            </div>
            <?php include 'footer.php'; ?>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>