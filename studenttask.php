
<?php 
include 'config.php';
session_start();
if (!$_SESSION['studentlogged'] && !$_SESSION['adminlogged'] ) {
    header('Location: index.php');
    exit;
}


$email=$_SESSION['email'];
if ($_SESSION['role'] == 'superadmin'){
    $username="admin";
    $firstname="admin";
    $lastname="admin";
    $mat="admin";
}else  {
    if ($_SESSION['role'] == 'student')
        $query= "SELECT * FROM students WHERE email ='$email'";
    elseif ($_SESSION['role'] == 'teacher')
        $query= "SELECT * FROM teachers WHERE email ='$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $username = $row['firstname']." ".$row['lastname'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $mat=$row['matricule'];
}
///session username
$_SESSION['username'] = $username;

$userId = $_SESSION['id'];
$username = $_SESSION['username'];

$sql = "SELECT * FROM tasks 
        INNER JOIN student_tasks ON tasks.id_tasks = student_tasks.task_id 
        WHERE student_tasks.student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
if ($stmt->execute()){
    $result = $stmt->get_result();
}

// if ($stmt->execute()) {
//     $result = $stmt->get_result();
//     if ($result->num_rows > 0) {
//         while($row = $result->fetch_assoc()) {
//             echo "<script>console.log('Row data: " . implode(", ", $row) . "');</script>";
//         }
//     } else {
//         echo "<script>console.log('Query successful but no rows returned');</script>";
//     }
// } else {
//     echo "<script>console.log('Query failed with error: " . $stmt->error . "');</script>";
// }

?>

<?php include 'head.php'; ?>
<body id="page-top">
    <div id="wrapper" >
        <?php include 'navbar.php'; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                    </form>
                    <ul class="navbar-nav flex-nowrap ms-auto">
                        <li class="nav-item "  >
                            <a class="nav-link" id="darkbtn" href="#"><i class="fas fa-moon" id="moon"></i> <i id="sun" class="fas fa-sun" hidden></i></a>
                        </li>
                        <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                            <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="me-auto navbar-search w-100">
                                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                        <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                    <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="me-3">
                                            <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                        </div>
                                        <div><span class="small text-gray-500">December 12, 2019</span>
                                            <p>A new monthly report is ready to download!</p>
                                        </div>
                                    </a><a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="me-3">
                                            <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                        </div>
                                        <div><span class="small text-gray-500">December 7, 2019</span>
                                            <p>$290.29 has been deposited into your account!</p>
                                        </div>
                                    </a><a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="me-3">
                                            <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                        </div>
                                        <div><span class="small text-gray-500">December 2, 2019</span>
                                            <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                        </div>
                                    </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">7</span><i class="fas fa-envelope fa-fw"></i></a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                    <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg">
                                            <div class="bg-success status-indicator"></div>
                                        </div>
                                        <div class="fw-bold">
                                            <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                            <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                        </div>
                                    </a><a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg">
                                            <div class="status-indicator"></div>
                                        </div>
                                        <div class="fw-bold">
                                            <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                            <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                        </div>
                                    </a><a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg">
                                            <div class="bg-warning status-indicator"></div>
                                        </div>
                                        <div class="fw-bold">
                                            <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                            <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                        </div>
                                    </a><a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg">
                                            <div class="bg-success status-indicator"></div>
                                        </div>
                                        <div class="fw-bold">
                                            <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                            <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                        </div>
                                    </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </div>
                            <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                        </li>
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $username; ?></span><img id="header_image" class=" border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                    <a class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>Profile</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>Settings</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>Activity log</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
                <div  class="container-fluid main " >
                    <div class="d-sm-flex justify-content-between align-items-center mb-2">     
                        <h3 class="text-dark mb-4 fw-bold">Student tasks</h3>
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block " role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i> Export</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3 flex-row justify-content-between align-items-center">
                            <div class="col-auto float-start pt-2">
                                <p class="text-primary fw-bold">Student tasks info</p>
                            </div>
                            <div hidden class="btn-group float-end" role="group">
                                <button id="add-btn" type="button" class="btn btn-primary"  >Add</button>
                                <button id="edit-btn" type="button"class="btn btn-primary"  >Edit</button>
                                <button id="delete-btn" type="button"class="btn btn-primary" >Delete</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2"  role="grid" >
                                <table class="table my-0 table-striped" id="tabletasks">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;" ></th>
                                            <th>task name</th>
                                            <th>teacher task</th>
                                            <th>task started</th>
                                            <th>task deadline</th>
                                            <th>description</th>
                                            <th>task status</th>
                                            <th>action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if ($result->num_rows > 0) {    
                                            while($row = $result->fetch_assoc()) {
                                                $description = $row["description"];
                                                $shortDescription = substr($description, 0, 15);
                                                if (strlen($description) > 15) {
                                                    $shortDescription .= "...";
                                                }
                                                echo '<tr>
                                                        <td><input class="form-check-input" type="checkbox" /></td>
                                                        <td>' . $row["task_title"]. 
                                                        '</td><td>' . $row["teachertask_name"]. 
                                                        '</td><td>' . $row["task_started"]. 
                                                        '</td><td>' . $row["task_deadline"]. 
                                                        '</td><td>' . $shortDescription. 
                                                        '</td><td>' . $row["task_status"].
                                                        '</td><td><button type="button" class="btn view-btn" id='.$row["id_tasks"].' data-group-id="'.$row["id"].'"onclick="onview('.$row["id_tasks"].')"><i class=\"fa-sharp fa-solid fa-pen-to-square\"></i> view</button></td>
                                                      </tr>';
                                            }
                                        }
                                        else{
                                            echo" no homework ";
                                        }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="col"><input id="check-all" class="form-check-input" type="checkbox" /> Check All</td>
                                            <td><strong>task name</strong></td>
                                            <td><strong>teacher task</strong></td>
                                            <td><strong>task started</strong></td>
                                            <td><strong>task deadline</strong></td>
                                            <td><strong>description</strong></td>
                                            <td><strong>task status</strong></td> 
                                            <td><strong>action</strong></td> 
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    <footer class="bg-white sticky-footer">
                        <div class="container my-auto">
                            <div class="text-center my-auto copyright"><span>Copyright ©2023 devlopped By Med Arafet khadraoui</span></div>
                        </div>
                    </footer>
                </div>
                <div class="container-fluid main d-none" >
                    <div class="d-sm-flex justify-content-between align-items-center mb-2">
                        <div class="d-sm-flex">
                            <h3 class="text-dark mb-4 fw-bold">Student tasks </h3>
                        </div>
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block " role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i> Export</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3 flex-row justify-content-between align-items-center">
                            <div class="col-auto float-start pt-2">
                                <p class="text-primary fw-bold">students tasks info</p>
                            </div>
                            <div class="btn-group float-end" role="group">
                                <button id="delete-btn"  type="button"class="btn btn-primary return" >Close</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" role="grid">
                                <table class="table my-0 table-striped" id="studentTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Work</th>
                                            <th>Task Status</th>
                                            <th>groupe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                    </div>
                    <footer class="bg-white sticky-footer">
                        <div class="container my-auto">
                            <div class="text-center my-auto copyright"><span>Copyright ©2023 devlopped By Med Arafet khadraoui</span></div>
                        </div>
                    </footer>
                </div>

                </div>
            </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </div>

    <div id="popup" >
        <!-- <div id="popupadd">
            <div class="modal fade" id="popup-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                            <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <form id="addTaskForm" method="POST" action="addtask.php">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="taskName" class="form-label">Task Name</label>
                                    <input type="text" class="form-control" id="taskName" name="taskName" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="taskStarted" class="form-label">Task Started</label>
                                    <input type="date" class="form-control" id="taskStarted" name="taskStarted" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="taskDeadline" class="form-label">Task Deadline</label>
                                    <input type="date" class="form-control" id="taskDeadline" name="taskDeadline" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="taskDescription" class="form-label">Task Description</label>
                                    <textarea class="form-control" id="taskDescription" name="taskDescription" required></textarea>
                                </div>
                                <div class="mb-3">
                                            <label for="teachergroups" class="form-label" >Groups</label>
                                            <select id="teachergroups" name="group_ids[]" class="form-control" multiple >
                                                <?php
                                                    $sql3 = "SELECT * FROM groupes";
                                                    $result3 = $conn->query($sql3);
                                                    if ($result3->num_rows > 0) {
                                                        while($row3 = $result3->fetch_assoc()) {
                                                            echo '<option value="'.$row3["id"].'">'.$row3["name"].'</option>';
                                                        }
                                                    } else {
                                                        echo "<option value='0'>0 results</option>";
                                                    }
                                                ?>*
                                            </select>
                                </div>  
                            </div>
                            <div class="modal-footer">
                                <div id="message" class=" alert" ></div>
                                <div >
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" value="Submit">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="popupedit">
            <div class="modal fade" id="popup-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">edit Item</h5>
                            <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <form id="editTaskForm" method="POST" action="editTask.php">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="taskNameEdit" class="form-label">Task Name</label>
                                        <input type="text" class="form-control" id="taskNameEdit" name="taskNameEdit" value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="taskStartedEdit" class="form-label">Task Started</label>
                                        <input type="date" class="form-control" id="taskStartedEdit" name="taskStartedEdit" value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="taskDeadlineEdit" class="form-label">Task Deadline</label>
                                        <input type="date" class="form-control" id="taskDeadlineEdit" name="taskDeadlineEdit" value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="taskDescriptionEdit" class="form-label">Task Description</label>
                                        <textarea class="form-control" id="taskDescriptionEdit" name="taskDescriptionEdit" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="teachergroupsEdit" class="form-label" >Groups</label>
                                        <select id="teachergroupsEdit" name="group_ids[]" class="form-control" multiple >
                                            <?php
                                                // $sql3 = "SELECT * FROM groupes";
                                                // $result3 = $conn->query($sql3);
                                                // if ($result3->num_rows > 0) {
                                                //     while($row3 = $result3->fetch_assoc()) {
                                                //         echo '<option value="'.$row3["id"].'">'.$row3["name"].'</option>';
                                                //     }
                                                // } else {
                                                //     echo "<option value='0'>0 results</option>";
                                                // }
                                            ?>*
                                        </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" value="Submit">Save changes</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div> -->
        <div id="popupdelete" >
            <div class="modal fade" id="staticBackdrop"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>are you sure to delete </h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="delete-btn" class="btn btn-primary">delete</button>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div id="popupview">
            <div class="modal fade bd-example-modal-lg" id="popup-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Task</h5>
                            <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <form id="workform" method="POST" action="workstudent.php">
                            <div class="modal-body">
                                <input type="hidden" id="taskId" name="taskId">
                                <div class="mb-3">
                                    <label for="taskNameView" class="form-label">Task Name</label>
                                    <input type="text" class="form-control" id="taskNameView" name="taskNameView" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="teacherTaskView" class="form-label">Teacher Task</label>
                                    <input type="text" class="form-control" id="teacherTaskView" name="teacherTaskView" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="taskDeadlineView" class="form-label">Task Deadline</label>
                                    <input type="date" class="form-control" id="taskDeadlineView" name="taskDeadlineView" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="taskStatusView" class="form-label">Task Status</label>
                                    <select class="form-control" id="taskStatusView" name="taskStatusView">
                                        <option selected value="pending" >Pending</option>
                                        <option value="finished">Finished</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="taskWorkView" class="form-label">Your Work</label>
                                    <textarea class="form-control" id="taskWorkView" name="taskWorkView"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" value="Submit">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</body>

    <script>
        $('.view-btn').click(function() {
            var row = $(this).closest('tr');
            var taskId = $(this).attr('id');
            var taskName = row.find('td:eq(1)').text();
            var teacherTask = row.find('td:eq(2)').text();
            var taskDeadline = row.find('td:eq(4)').text();
            var taskStatus = row.find('td:eq(6)').text();

            $('#taskNameView').val(taskName);
            $('#teacherTaskView').val(teacherTask);
            $('#taskDeadlineView').val(taskDeadline);
            $('#popup-view').modal('show');
        });


        document.getElementById('taskStarted').addEventListener('change', function() {
            document.getElementById('taskDeadline').min = this.value;
        });
        document.getElementById('check-all').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('.form-check-input');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
        
        $('#add-btn').click(function() {
            
            $('#popup-add').modal('show');
        });
        $('#edit-btn').click(function() {
            var checkbox = $('input[type="checkbox"]:checked');
            if(checkbox.length === 1) { 
                var row = checkbox.closest('tr');
                var taskName = row.find('td:eq(1)').text();
                var taskStarted = row.find('td:eq(3)').text(); 
                var taskDeadline = row.find('td:eq(4)').text();
                var taskDescription = row.find('td:eq(5)').text();
                $('#popup-edit').modal('show');
                $('#taskNameEdit').val(taskName);
                $('#taskStartedEdit').val(taskStarted);
                $('#taskDeadlineEdit').val(taskDeadline);
                $('#taskDescriptionEdit').val(taskDescription);
            }
            else if(checkbox.length > 1){
                alert('select just one row');
            }
            else {
                alert('No row selected');
            }
        });

        $('#delete-btn').click(function() {
            var checkboxes = $('input[type="checkbox"]:checked');
            if(checkboxes.length > 0) { 
                if(confirm('Are you sure you want to delete ')) {
                    checkboxes.each(function() {
                        var row = $(this).closest('tr');
                        var taskName = row.find('td:eq(1)').text(); 
                        $.ajax({
                            url: 'deletetask.php',
                            type: 'POST',
                            data: { name: taskName },
                            success :function(response){
                                location.reload();
                            }
                        });
                    });
                }
            } else {
                alert('No row selected');
            }
        });
    </script>
</html>