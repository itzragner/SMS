<?php 
session_start();
include 'config.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
</head>

<body id="page-top">
    <div id="wrapper" >
        <?php include 'navbar.php'; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <?php include 'header.php'; ?>
            <div class="container-fluid">
                <?php
                // Check if form is submitted by teacher
                if(isset($_POST['submit_task'])){
                    $task = $_POST['task'];
                    // Insert task into database
                    $sql = "INSERT INTO tasks (task, status) VALUES ('$task', 'uncompleted')";
                    mysqli_query($conn, $sql);
                }

                // Check if form is submitted by student
                if(isset($_POST['update_task'])){
                    $task_id = $_POST['task_id'];
                    $status = $_POST['status'];
                    // Update task status in database
                    $sql = "UPDATE tasks SET status='$status' WHERE id='$task_id'";
                    mysqli_query($conn, $sql);
                }
                ?>
                <?php if ($_SESSION['role'] != ('student' )):?>
                <!-- Form for teacher to submit task -->
                <form method="post" action="">
                    <input type="text" name="task" placeholder="Enter task here">
                    <input type="submit" name="submit_task" value="Submit Task">
                </form>
                <?php endif; ?>

                <?php if ($_SESSION['role'] != 'teacher'): ?>
                <!-- Form for student to update task status -->
                <form method="post" action="">
                    <input type="hidden" name="task_id" value="1"> <!-- Replace 1 with actual task ID -->
                    <select name="status">
                        <option value="uncompleted">Uncompleted</option>
                        <option value="ondoing">On Doing</option>
                        <option value="completed">Completed</option>
                    </select>
                    <input type="submit" name="update_task" value="Update Task">
                </form>
                <?php endif; ?>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright ©2023 designed By Med Arafet khadraoui</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>