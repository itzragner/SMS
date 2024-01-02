<?php 
session_start();
if ($_SESSION['adminlogged'] !== true) {
    header('Location: index.php');
    exit;
}
include 'config.php';
$sql = "SELECT *FROM tasks 
        INNER JOIN groupes ON tasks.id_groupetask = groupes.id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>

<?php include 'head.php'; ?>
<!-- data table -->
<script>
    $(document).ready(function() {
        $('#tabletasks').DataTable({
        columnDefs: [
            {  "targets": [0], "searchable": false, "orderable": false} ,{"visible": true }
        ],
        order: [[ 1,'asc']],
        language: { 
            search:"",
            searchPlaceholder: "Search",
            paginate: {
            previous: '<span class="fa fa-chevron-left"></span>',   
            next: '<span class="fa fa-chevron-right"></span>'
            },
            lengthMenu: 'Show <select class="form-control input-sm">'+
            '<option value="10">10</option>'+
            '<option value="20">20</option>'+
            '<option value="30">30</option>'+
            '<option value="40">40</option>'+
            '<option value="50">50</option>'+
            '<option value="-1">All</option>'
        }
    })  
    } );
</script> 
<body id="page-top">
    <div id="wrapper" >
        <?php include 'navbar.php'; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include 'header.php'; ?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-2">
                        <h3 class="text-dark mb-4 fw-bold">tasks</h3>
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block " role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i> Export</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3 flex-row justify-content-between align-items-center">
                            <div class="col-auto float-start pt-2">
                                <p class="text-primary fw-bold">tasks info</p>
                            </div>
                            <div class="btn-group float-end" role="group">
                                <button id="add-btn" type="button" class="btn btn-primary"  >Add</button>
                                <button id="edit-btn" type="button"class="btn btn-primary"  >Edit</button>
                                <button id="delete-btn" type="button"class="btn btn-primary" >Delete</button>
                            </div>
                            
                        </div>
                        <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" >
                                <table class="table my-0 table-striped" id="tabletasks">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;" ></th>
                                            <th>task name</th>
                                            <th>teacher task</th>
                                            <th>task started</th>
                                            <th>task deadline</th>
                                            <th>description</th>
                                            <th>Groupe</th>
                                            <th>action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                $description = $row["description"];
                                                $shortDescription = substr($description, 0, 15);
                                                if (strlen($description) > 15) {$shortDescription .= "...";}
                                                echo '<tr><td><input class="form-check-input" type="checkbox" /><p hidden>'.$row["id_tasks"].'</p></td>
                                                <td>' . $row["task_title"]. 
                                                "</td><td>" . $row["teachertask_name"]. 
                                                "</td><td>" . $row["task_started"]. 
                                                "</td><td>" . $row["task_deadline"].
                                                "</td><td>" . $shortDescription ."</td>".
                                                "</td><td>" . $row["name"].
                                                "<td><button type=\"button\" class=\"btn view-btn\" data-task-id=\"".$row["id_tasks"]."\" ><i class=\"fa-sharp fa-solid fa-pen-to-square\"></i> view</button>
                                                </td></tr>";
                                            }
                                          } else {
                                            echo "<tr>0 tasks founded</tr>";
                                          }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="col"  ><input id="check-all" class="form-check-input" type="checkbox" /> Check All</td>
                                            <td><strong>task name</strong></td>
                                            <td><strong>teacher task</strong></td>
                                            <td><strong>task started</strong></td>
                                            <td><strong>task deadline</strong></td>
                                            <td><strong>description</strong></td>
                                              <td><strong>Groupes</strong></td> 
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
            </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </div>

    <div id="popup" >
        <div id="popupadd">
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" value="Submit">Save changes</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
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
            <div class="modal fade" id="popup-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Task</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="taskNameview" class="form-label">Task Name</label>
                                        <input type="text" class="form-control" id="taskNameview" name="taskNameview" value="" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="taskStartedview" class="form-label">Task Started</label>
                                        <input type="date" class="form-control" id="taskStartedview" name="taskStartedview" value="" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="taskDeadlineview" class="form-label">Task Deadline</label>
                                        <input type="date" class="form-control" id="taskDeadlineview" name="taskDeadlineview" value="" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="taskDescriptionview" class="form-label">Task Description</label>
                                        <textarea class="form-control" id="taskDescriptionview" name="taskDescriptionview" disabled value="" ></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="teachergroupsview" class="form-label" >Groups</label>
                                        <input class="form-control" type="text" value="" disabled id="teachergroupsview" >
                                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

    <script>
        document.getElementById('taskStarted').addEventListener('change', function() {
            document.getElementById('taskDeadline').min = this.value;
        });
            document.getElementById('check-all').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('.form-check-input');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
        $('.view-btn').click(function(){
            var taskId = $(this).data('task-id'); 
            var btn = $(this);
            console.log(taskId)
            $.ajax({
                url: 'fetch_task_description.php',
                type: 'POST',
                data: { id: taskId },
                success: function(response) {
                    var taskDescription = response;
                    var row = btn.closest('tr');
                    var taskName = row.find('td:eq(1)').text();
                    var taskStarted = row.find('td:eq(3)').text(); 
                    var taskDeadline = row.find('td:eq(4)').text();
                    var taskGroup = row.find('td:eq(6)').text();
                    $('#popup-view').modal('show');
                    $('#taskNameview').val(taskName);
                    $('#taskStartedview').val(taskStarted);
                    $('#taskDeadlineview').val(taskDeadline);
                    $('#taskDescriptionview').val(taskDescription);
                    $('#teachergroupsview').val(taskGroup);
                }
            });
        });

        $('#add-btn').click(function() {
            $('#taskName').val('');
            $('#taskStarted').val('');
            $('#taskDeadline').val('');
            $('#taskDescription').val('');
            $('#message').html('');
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